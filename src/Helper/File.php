<?php
namespace Wtf\Generator\Helper;

class File
{
    /**
     * Get root dir of generator
     * @return string
     */
    public static function getGeneratorDir(): string
    {
        return __DIR__.'/../../';
    }

    /**
     * Get templates dir
     * @return string
     */
    public static function getTemplatesDir(): string
    {
        return self::getGeneratorDir().'templates/';
    }

    /**
     * Get composer autoload file
     * @return string|null
     */
    public static function getAutoload(): ?string
    {
        $files = [
            self::getGeneratorDir().'/../../autoload.php', //if used as library
            self::getGeneratorDir().'/vendor/autoload.php' //if used standalone
        ];

        foreach($files as $file) {
            if(file_exists($file)) {
                return $file;
            }
        }
        return null;
    }

    public static function getConfigDir(): string
    {
        return self::getGeneratorDir().'../../../config/'; //@todo dynamically get config dir from wtf
    }

    public static function getConfig(string $name): array
    {
        $path = self::getGeneratorDir().'../../../config/'.$name.'.php'; //@todo dynamically get config dir from wtf
        if(file_exists($path)) {
            return include($path);
        }

        return [];
    }

    public static function save(string $file, string $content)
    {
        file_put_contents($file, $content);
    }
}
