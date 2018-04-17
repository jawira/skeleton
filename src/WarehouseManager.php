<?php

namespace Jawira\Skeleton;

use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use SplFileInfo;

/**
 * Class WarehouseManager
 *
 * @package Jawira\Skeleton
 */
class WarehouseManager
{
    /**
     * Dir template where warehouse dir should be located
     */
    const WAREHOUSE_DIR = '%s/vendor/jawira/skeleton/resources/warehouse/';

    /**
     * Project's base dir
     *
     * @var string
     */
    protected $basePath;

    /**
     * Full path where warehouse dir is located
     *
     * @var string
     */
    protected $warehousePath;

    /**
     * A list of all warehouse's files and it's targets
     *
     * @var array
     */
    protected $catalog;


    /**
     * WarehouseManager constructor.
     *
     * @throws \Jawira\Skeleton\SkeletonException
     */
    public function __construct()
    {
        $this->setBasePath($this->retrieveBasePath());
        $this->setWarehousePath($this->retrieveWarehousePath());
        $this->setCatalog($this->generateCatalog());
    }

    /**
     * @return array
     */
    protected function getCatalog()
    {
        return $this->catalog;
    }

    /**
     * @param array $catalog
     *
     * @return Warehouse
     */
    protected function setCatalog($catalog)
    {
        $this->catalog = $catalog;

        return $this;
    }

    /**
     * @return string
     */
    protected function getBasePath()
    {
        return $this->basePath;
    }

    /**
     * @param string $basePath
     *
     * @return Warehouse
     */
    protected function setBasePath($basePath)
    {
        $this->basePath = $basePath;

        return $this;
    }

    /**
     * @return mixed
     */
    protected function getWarehousePath()
    {
        return $this->warehousePath;
    }

    /**
     * @param mixed $warehousePath
     *
     * @return Warehouse
     */
    protected function setWarehousePath($warehousePath)
    {
        $this->warehousePath = $warehousePath;

        return $this;
    }

    /**
     * Copy declared resources to Composer project
     *
     * @param string $source File located in warehouse dir
     *
     * @return \Jawira\Skeleton\Warehouse
     * @throws \Jawira\Skeleton\SkeletonException
     */
    public function copy($source)
    {
        if (!array_key_exists($source, $this->getCatalog())) {
            throw new SkeletonException('Invalid source file');
        }
        $target = $this->getCatalog()[$source];
        if (!$this->canICopyTo($target)) {
            throw new SkeletonException('Target is not writable');
        }
        $this->makeDir($target);
        if (!copy($source, $target)) {
            throw new SkeletonException('Error while copying file');
        }

        return $this;
    }

    /**
     * Generates an array of all directories and files in warehouse dir
     *
     * @return array Directories and files in warehouse dir
     */
    protected function allWarehouseContent()
    {
        $warehouseContent = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($this->getWarehousePath()));
        $warehouseContent = iterator_to_array($warehouseContent);
        $warehouseContent = array_map(function (SplFileInfo $file) {
            return $file->getPathname();
        },
            $warehouseContent);

        return $warehouseContent;
    }

    /**
     * Provides "source/target" array of all files that can be copied
     *
     * @return array Copyable files
     */
    protected function generateCatalog()
    {
        $catalog = $this->allWarehouseContent();
        $catalog = array_filter($catalog, 'is_file');
        $catalog = array_combine($catalog, $catalog);
        $catalog = array_map([$this, 'toBasePath'], $catalog);

        return $catalog;
    }

    /**
     * Provides "source/short-name" array of all files that can be copied
     *
     * @return array
     */
    public function generateShowcase()
    {
        $showcase = array_filter($this->getCatalog(), [$this, 'canICopyTo']);
        $showcase = array_map([$this, 'toNicePath'], $showcase);

        return $showcase;
    }

    /**
     * Removes the base path suffix from a path, this allows to display shorter
     * names for a file.
     *
     * @param $fullPath
     *
     * @return string
     */
    protected function toNicePath($fullPath)
    {
        return str_replace($this->getBasePath() . DIRECTORY_SEPARATOR, '', $fullPath);
    }

    /**
     * Replaces warehouse path to base path, this allow to change a source path
     * to a target path.
     *
     * @param string $warehouseFilePath
     *
     * @return string
     */
    protected function toBasePath($warehouseFilePath)
    {
        $target = $this->getBasePath();
        $target .= DIRECTORY_SEPARATOR;
        $target .= str_replace($this->getWarehousePath(), '', $warehouseFilePath);

        return $target;
    }

    /**
     * Returns true if target file doesn't exist or if it's empty, therefore
     * the file can be safely written or overwritten.
     *
     * @param string $target File's target path
     *
     * @return bool
     */
    protected function canICopyTo($target)
    {
        $fileExists = file_exists($target);
        $emptyFile  = $fileExists ? filesize($target) === 0 : false;

        return (!$fileExists || $emptyFile);
    }

    /**
     * Returns project's base dir (where composer.json is)
     * This method assumes root contains composer.json
     *
     * @see https://github.com/mindplay-dk/composer-locator/ Original source of inspiration for this method
     * @return string Root of project
     * @throws \Jawira\Skeleton\SkeletonException
     */
    protected function retrieveBasePath()
    {
        $basePath = dirname(__DIR__, 4);
        if (!is_file($basePath . '/composer.json')) {
            throw new SkeletonException("Cannot locate project's base path");
        }

        return $basePath;
    }

    /**
     * @return string
     * @throws \Jawira\Skeleton\SkeletonException
     */
    protected function retrieveWarehousePath()
    {
        $warehousePath = sprintf(self::WAREHOUSE_DIR, $this->getBasePath());
        if (!is_dir($warehousePath)) {
            throw new SkeletonException('Cannot locate warehouse dir');
        }

        return $warehousePath;
    }

    /**
     * Create directory for $target file if required
     *
     * @param string $target Path to a file
     *
     * @return $this
     */
    protected function makeDir($target)
    {
        if (!file_exists(dirname($target))) {
            mkdir(dirname($target), 0777, true);
        }

        return $this;
    }
}
