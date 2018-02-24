<?php
declare(strict_types=1);

namespace Jawira\Defaults;

use Composer\Composer;
use Composer\EventDispatcher\EventSubscriberInterface;
use Composer\Installer\PackageEvent;
use Composer\Installer\PackageEvents;
use Composer\IO\IOInterface;
use Composer\Plugin\PluginInterface;

class Plugin implements PluginInterface, EventSubscriberInterface
{

    /** @var  \Composer\Composer $composer */
    protected $composer;
    /** @var  \Composer\IO\IOInterface $io */
    protected $io;
    /** @var  \Composer\Util\Filesystem $filesystem */
    protected $filesystem;


    /**
     * @param \Composer\Composer       $composer
     * @param \Composer\IO\IOInterface $io
     *
     * @return \Jawira\Defaults\Plugin
     */
    public function activate(Composer $composer, IOInterface $io): self
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
            PackageEvents::POST_PACKAGE_INSTALL => 'prepareProject',
        ];
    }

    /**
     * Checking current execution before copying resource files
     *
     * @param \Composer\Installer\PackageEvent $event
     *
     * @return \Jawira\Defaults\Plugin
     * @throws \RuntimeException
     */
    public function prepareProject(PackageEvent $event)
    {

        $basePath    = $this->getBasePath();
        $packageName = $this->getPackageName($event);

        $event->getOperations();

        $itsMe = $packageName === 'jawira/defaults';

        if ($itsMe && is_dir($basePath)) {
            $vendorDir = $this->composer->getConfig()->get('vendor-dir');
            $this->copyResources($vendorDir, $basePath);
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
    public function copyResources($vendorDir, $basePath)
    {
        foreach ($this->pathsProvider() as [$sourceFormat, $targetFormat]) {
            $source = sprintf($sourceFormat, $vendorDir);
            $target = sprintf($targetFormat, $basePath);

            if ($this->canICopyTo($target) && copy($source, $target)) {
                $this->io->write("<info>Writing $target</info>");
            }
        }

        return $this;
    }

    /**
     * Provides patters for all files to copy
     *
     * @return array
     */
    public function pathsProvider()
    {
        return [
            [
                '%s/jawira/defaults/resources/README.md',
                '%s/README.md',
            ],
            [
                '%s/jawira/defaults/resources/demo.xml',
                '%s/demo.xml',
            ],
        ];
    }

    /**
     * Returns true if file doesn't exist or if it's empty
     *
     * @param $file
     *
     * @return bool
     */
    public function canICopyTo($file)
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
    protected function getPackageName(PackageEvent $event)
    {
        return $event->getOperation()->getReason()->job['packageName'];
    }


    /**
     * Retuns project's base dir (where composer.json is)
     *
     * @return null|string
     */
    protected function getBasePath()
    {
        $basePath = realpath(realpath(getcwd()));
        return is_file($basePath . '/composer.json') ? $basePath : null;
    }

}
