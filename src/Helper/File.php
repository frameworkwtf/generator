<?php

declare(strict_types=1);

namespace Wtf\Generator\Helper;

class File
{
    /**
     * Get root dir of generator.
     *
     * @return string
     */
    public static function getGeneratorDir(): string
    {
        return __DIR__.'/../../';
    }

    /**
     * Get app dir.
     *
     * @return string
     */
    public static function getAppDir(): string
    {
        return Config::get('paths.app', self::getGeneratorDir().'../../../');
    }

    /**
     * Get app config dir.
     *
     * @return string
     */
    public function getConfigDir(): string
    {
        return Config::get('paths.config', self::getAppDir().'config/');
    }

    /**
     * Get templates dir.
     *
     * @return string
     */
    public static function getTemplatesDir(): string
    {
        return self::getGeneratorDir().'templates/';
    }

    public static function getPrettyPath(string $path): string
    {
        $path = str_replace(['/', '\\'], DIRECTORY_SEPARATOR, $path);
        $parts = array_filter(explode(DIRECTORY_SEPARATOR, $path), 'strlen');
        $absolutes = [];
        foreach ($parts as $part) {
            if ('.' === $part) {
                continue;
            }
            if ('..' === $part) {
                array_pop($absolutes);
            } else {
                $absolutes[] = $part;
            }
        }
        $path = implode(DIRECTORY_SEPARATOR, $absolutes);

        return str_replace(getcwd(), '.', '/'.$path);
    }

    /**
     * Get pretty path for file, based on type.
     *
     * @param string $type File type (eg: controller, entity, etc)
     * @param string $name File name (eg: User)
     * @param string $ext  File extension, default: php
     *
     * @return string
     */
    public static function getPath(string $type, string $name, string $ext = 'php'): string
    {
        $path = Config::get('paths.'.strtolower($type));
        if (!$path) {
            switch (strtolower($type)) {
            case 'controller':
            case 'entity':
                $path = self::getAppDir().'src/'.ucfirst($type).'/';
                break;
            case 'route':
                $path = self::getAppDir().'config/routes/';
                break;
            case 'test':
                $path = self::getAppDir().'tests/';
                break;
            }
        }

        return self::getPrettyPath($path.$name.'.'.$ext);
    }

    /**
     * Save file and return file path.
     *
     * @param string $file
     * @param string $content
     *
     * @return string
     */
    public static function save(string $file, string $content): string
    {
        $dir = dirname($file);
        if (!is_dir($dir)) {
            mkdir($dir, 0700, true);
        }
        file_put_contents($file, $content);

        return $file;
    }
}
