<?php

declare(strict_types=1);

namespace Wtf\Generator\Helper;

class Config
{
    protected static $config = [];
    protected static $file = null;

    /**
     * Get config value from WTF config dir.
     *
     * @param string $key
     * @param mixed  $default
     *
     * @return mixed
     */
    public static function get(string $key, $default = null)
    {
        $keys = explode('.', $key);
        if (!self::$config) {
            self::$config = include self::$file;
        }
        $group = self::$config;
        if (!$keys) {
            return $group;
        }
        $total = count($keys);
        foreach ($keys as $i => $key) {
            if (isset($group[$key])) {
                if ($i === $total - 1) {
                    return $group[$key];
                }
                $group = &$group[$key];
            }
        }

        return $default;
    }

    public static function setFile(string $file): void
    {
        self::$file = $file;
    }
}
