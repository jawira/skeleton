<?php

namespace Jawira\Defaults;

use Composer\Composer;
use Composer\EventDispatcher\EventSubscriberInterface;
use Composer\Installer\PackageEvent;
use Composer\Installer\PackageEvents;
use Composer\IO\IOInterface;
use Composer\Plugin\PluginInterface;
use FilesystemIterator;

/**
 * Class CopyDefaultsPlugins
 * When you to a require of this composer plug-in the following files are
 * created in the root of the project:
 * - README.md
 * - phing.xml
 * - Makefile
 * - CONTRIBUTING.md
 *
 * @package Jawira\Defaults
 */
class DefaultFilesPlugin implements PluginInterface, EventSubscriberInterface
{
    /**
     * Must be the same package name as declared in ../composer.json
     */
    const PACKAGE_NAME = 'jawira/defaults';

    /**
     * Dir where resources files are located
     */
    const RESOURCES_DIR = '%s/jawira/defaults/resources/';

    /** @var  \Composer\Composer $composer */
    protected $composer;
    /** @var  \Composer\IO\IOInterface $io */
    protected $io;

    /**
     * @param \Composer\Composer       $composer
     * @param \Composer\IO\IOInterface $io
     *
     * @return \Jawira\Defaults\DefaultFilesPlugin
     */
    public function activate(Composer $composer, IOInterface $io)
    {
        $this->composer = $composer;
        $this->io       = $io;

        return $this;
    }

    /**
     * Registering plugin to event
     *
     * @return array
     */
    public static function getSubscribedEvents()
    {
        return [
            PackageEvents::POST_PACKAGE_INSTALL => 'start',
        ];
    }

    /**
     * Checking current execution before copying resource files
     *
     * @param \Composer\Installer\PackageEvent $event
     *
     * @return \Jawira\Defaults\DefaultFilesPlugin
     * @throws \RuntimeException
     */
    public function start(PackageEvent $event)
    {
        $basePath    = $this->getBasePath();
        $packageName = $this->getCurrentPackageName($event);
        $itsMe       = $packageName === self::PACKAGE_NAME;

        if (null === $basePath) {
            $this->io->writeError("<error>⚠️ Cannot locate project's base path</error>");
        }

        if ($itsMe && $basePath) {
            $vendorDir = $this->composer->getConfig()
                                        ->get('vendor-dir');
            $this->copyFiles($vendorDir, $basePath)
                 ->finalMessage();
        }

        return $this;
    }

    /**
     * Copy declared resources to Composer project
     *
     * @param $vendorDir
     * @param $basePath
     *
     * @return $this
     */
    protected function copyFiles($vendorDir, $basePath)
    {
        foreach ($this->pathsProvider($vendorDir, $basePath) as [$source, $target]) {
            if ($this->canICopyTo($target) && copy($source, $target)) {
                $this->io->write("<info>💾 Writing $target</info>");
            }
        }

        return $this;
    }

    /**
     * Provides source/target patterns for all files to be copied
     *
     * @param $vendorDir
     * @param $basePath
     *
     * @return \Generator
     */
    protected function pathsProvider($vendorDir, $basePath)
    {
        $fs = new FilesystemIterator(sprintf(self::RESOURCES_DIR, $vendorDir), FilesystemIterator::SKIP_DOTS);

        /** @var \SplFileInfo $file */
        foreach ($fs as $file) {
            if (!$file->isFile()) {
                continue;
            }

            yield [
                $file->getPathname(),
                $basePath . DIRECTORY_SEPARATOR . $file->getFilename(),
            ];
        }
    }

    /**
     * Returns true if target file doesn't exist or if it's empty
     *
     * @param $file
     *
     * @return bool
     */
    protected function canICopyTo($file)
    {
        $fileExists = file_exists($file);
        $emptyFile  = $fileExists ? filesize($file) === 0 : false;

        return (!$fileExists || $emptyFile);
    }

    /**
     * Retrieves the name of the package currently being installed
     *
     * @param \Composer\Installer\PackageEvent $event
     *
     * @return string
     */
    protected function getCurrentPackageName(PackageEvent $event)
    {
        return $event->getOperation()
                     ->getReason()->job['packageName'];
    }

    /**
     * Retuns project's base dir (where composer.json is)
     * This method assumes root contains composer.json
     *
     * @see https://github.com/mindplay-dk/composer-locator/ Original source of inspiration for this method
     * @return null|string Root of project
     */
    protected function getBasePath()
    {
        $basePath = dirname(__DIR__, 4);

        return is_file($basePath . '/composer.json') ? $basePath : null;
    }

    /**
     * Prints a last notification message to user
     *
     * @return $this
     */
    protected function finalMessage()
    {
        $this->io->write(sprintf('<comment>🏁 Done, please uninstall package with: composer remove %s</comment>',
                                 self::PACKAGE_NAME));

        return $this;
    }
}
