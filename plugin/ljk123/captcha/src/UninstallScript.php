<?php

declare(strict_types=1);
/**
 * This file is part of MineAdmin.
 *
 * @link     https://www.mineadmin.com
 * @document https://doc.mineadmin.com
 * @contact  root@imoi.cn
 * @license  https://github.com/mineadmin/MineAdmin/blob/master/LICENSE
 */

namespace Plugin\Captcha;

use Mine\AppStore\Utils\FileSystemUtils;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;

class UninstallScript
{
    private string $pluginPath;

    public function __invoke()
    {
        $this->pluginPath = dirname(dirname(__FILE__));
        $frontDirectory = config('mine-extension.front_directory');
        if (file_exists($this->pluginPath . DIRECTORY_SEPARATOR . 'web')) {
            $finder = Finder::create()
                ->files()
                ->in($this->pluginPath . DIRECTORY_SEPARATOR . 'web');
            foreach ($finder as $file) {
                /**
                 * @var SplFileInfo $file
                 */
                $relativeFilePath = $file->getRelativePathname();
                if (strpos($relativeFilePath, 'plugin') === 0) {
                    if (is_file($frontDirectory . $relativeFilePath)) {
                        unlink($frontDirectory . $relativeFilePath);
                    }
                } else {                    
                    FileSystemUtils::recovery($relativeFilePath, $frontDirectory);
                }
            }
        }
        $this->removeMainJsAndPluginJs();
    }

    /**
     * 删除生成的兼容文件.
     */
    private function removeMainJsAndPluginJs()
    {
        if (is_file($this->pluginPath . DIRECTORY_SEPARATOR . 'web' . DIRECTORY_SEPARATOR . 'main.js')) {
            unlink($this->pluginPath . DIRECTORY_SEPARATOR . 'web' . DIRECTORY_SEPARATOR . 'main.js');
        }
        if (is_file($this->pluginPath . DIRECTORY_SEPARATOR . 'web' . DIRECTORY_SEPARATOR . 'plugin' . DIRECTORY_SEPARATOR . 'index.js')) {
            unlink($this->pluginPath . DIRECTORY_SEPARATOR . 'web' . DIRECTORY_SEPARATOR . 'plugin' . DIRECTORY_SEPARATOR . 'index.js');
        }
        if (is_file($this->pluginPath . DIRECTORY_SEPARATOR . 'web' . DIRECTORY_SEPARATOR . 'i18n' . DIRECTORY_SEPARATOR . 'zh_CN' . DIRECTORY_SEPARATOR . 'plugin.js')) {
            unlink($this->pluginPath . DIRECTORY_SEPARATOR . 'web' . DIRECTORY_SEPARATOR . 'i18n' . DIRECTORY_SEPARATOR . 'zh_CN' . DIRECTORY_SEPARATOR . 'plugin.js');
        }
        if (is_file($this->pluginPath . DIRECTORY_SEPARATOR . 'web' . DIRECTORY_SEPARATOR . 'i18n' . DIRECTORY_SEPARATOR . 'en' . DIRECTORY_SEPARATOR . 'plugin.js')) {
            unlink($this->pluginPath . DIRECTORY_SEPARATOR . 'web' . DIRECTORY_SEPARATOR . 'i18n' . DIRECTORY_SEPARATOR . 'en' . DIRECTORY_SEPARATOR . 'plugin.js');
        }

        self::rmdir($this->pluginPath . DIRECTORY_SEPARATOR . 'web' . DIRECTORY_SEPARATOR . 'i18n');
    }

    private static function rmdir($directory)
    {
        if (is_dir($directory)) {
            $items = new \FilesystemIterator($directory);
            foreach ($items as $item) {
                // 如果是文件则删除文件
                if ($item->isFile()) {
                    throw new \RuntimeException('Directory not empty:' . $directory);
                }
                if ($item->isDir()) {
                    // 如果是文件夹则递归删除
                    self::rmdir($item->getPathname());
                }
            }
            return rmdir($directory);
        }
    }
}
