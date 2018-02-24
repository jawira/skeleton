<?php
/**
 * Created by PhpStorm.
 * User: jawira
 * Date: 22/02/18
 * Time: 19:04
 */

namespace Jawira\Defaults;

use Composer\Composer;
use Composer\EventDispatcher\EventSubscriberInterface;
use Composer\Installer\PackageEvent;
use Composer\Installer\PackageEvents;
use Composer\IO\IOInterface;
use Composer\Plugin\PluginInterface;
use Composer\Plugin\PluginEvents;
use Composer\Plugin\PreFileDownloadEvent;
use Composer\Util\Filesystem;

class Plugin implements PluginInterface, EventSubscriberInterface
{

    /** @var  \Composer\Composer $composer */
    protected $composer;
    /** @var  \Composer\IO\IOInterface $io */
    protected $io;
    /** @var  \Composer\Config $config */
    protected $config;
    /** @var  \Composer\Util\Filesystem $filesystem */
    protected $filesystem;


    /**
     * @param \Composer\Composer       $composer
     * @param \Composer\IO\IOInterface $io
     */
    public function activate(Composer $composer, IOInterface $io)
    {
        $this->composer   = $composer;
        $this->io         = $io;
        $this->config     = $composer->getConfig();
        $this->filesystem = new Filesystem();
    }

    public static function getSubscribedEvents()
    {
        return [
            PackageEvents::POST_PACKAGE_INSTALL => 'prepareProject',
        ];
    }

    public function prepareProject(PackageEvent $event)
    {
        $basePath = $this->filesystem->normalizePath(realpath(realpath(getcwd())));
        if (!is_file($basePath. '/composer.json')) {
            echo 'xxxxxxxxxxx' . $basePath . 'xxxxxxxxxxx';
        }

        $job = $event->getOperation()->getJobType();
        $rea = $event->getOperation()->getReason();

        echo get_class($rea);
        print_r([$job, $rea->getRequiredPackage()]);

//        $this->filesystem->copy($readme, $home);
    }

}
