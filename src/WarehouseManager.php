<?php declare(strict_types=1);

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
    const WAREHOUSE_DIRS = [
        'prod' => '%s/vendor/jawira/skeleton/resources/warehouse/',
        'dev'  => '%s/resources/warehouse/',
    ];

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

    protected function getCatalog(): array
    {
        return $this->catalog;
    }

    protected function setCatalog(array $catalog): self
    {
        $this->catalog = $catalog;

        return $this;
    }

    protected function getBasePath(): string
    {
        return $this->basePath;
    }

    protected function setBasePath(string $basePath): self
    {
        $this->basePath = $basePath;

        return $this;
    }

    protected function getWarehousePath(): string
    {
        return $this->warehousePath;
    }

    protected function setWarehousePath(string $warehousePath): self
    {
        $this->warehousePath = $warehousePath;

        return $this;
    }

    /**
     * Copy declared resources to Composer project
     *
     * @param string $source File located in warehouse dir
     *
     * @return \Jawira\Skeleton\WarehouseManager
     * @throws \Jawira\Skeleton\SkeletonException
     */
    public function copy(string $source): self
    {
        if (!array_key_exists($source, $this->getCatalog())) {
            throw new SkeletonException('Invalid source file');
        }
        $target = $this->getCatalog()[$source];
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
        sort($catalog, SORT_NATURAL | SORT_FLAG_CASE);
        $catalog = array_combine($catalog, $catalog);
        $catalog = array_map([$this, 'toBasePath'], $catalog);

        return $catalog;
    }

    /**
     * Provides "full-path => relative-path" array of all files that can be copied
     *
     * @return array
     */
    public function generateShowcase(): array
    {
        return array_map([$this, 'toNicePath'], $this->getCatalog());
    }

    /**
     * Removes the base path suffix from a path, this allows to display shorter
     * names for a file.
     *
     * @param $fullPath
     *
     * @return string
     */
    protected function toNicePath($fullPath): string
    {
        $icon = $this->fileNonExistentOrEmpty($fullPath) ? '' : "\u{2203} ";
        return str_replace($this->getBasePath() . DIRECTORY_SEPARATOR, $icon, $fullPath);
    }

    /**
     * Replaces warehouse path to base path, this allow to change a source path
     * to a target path.
     *
     * @param string $warehouseFilePath
     *
     * @return string
     */
    protected function toBasePath(string $warehouseFilePath): string
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
     * @param string $target File's target absolute path
     *
     * @return bool
     */
    protected function fileNonExistentOrEmpty(string $target): bool
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
    protected function retrieveBasePath(): string
    {
        foreach (range(4, 1) as $level) {
            $basePath = dirname(__DIR__, $level);
            if (is_file($basePath . '/composer.json')) {
                return $basePath;
            }
        }

        throw new SkeletonException("Cannot locate project's base path");
    }

    /**
     * Returns the location of warehouse directory
     *
     * @return string
     * @throws \Jawira\Skeleton\SkeletonException
     */
    protected function retrieveWarehousePath(): string
    {
        foreach (self::WAREHOUSE_DIRS as $candidate) {
            $warehousePath = sprintf($candidate, $this->getBasePath());
            if (is_dir($warehousePath)) {
                return $warehousePath;
            }
        }

        throw new SkeletonException('Cannot locate warehouse dir');
    }

    /**
     * Create directory for $target file if required
     *
     * @param string $target Path to a file
     *
     * @return $this
     */
    protected function makeDir(string $target): self
    {
        if (!file_exists(dirname($target))) {
            mkdir(dirname($target), 0777, true);
        }

        return $this;
    }
}
