<?php

declare(strict_types=1);

namespace Wtf\Generator\Helper;

class Template
{
    /**
     * Get rendered template.
     *
     * @param string $name Template name
     * @param array  $vars Variables array
     */
    public static function render(string $name, array $vars = []): string
    {
        $tpl = implode('', file(File::getTemplatesDir().$name.'.tpl'));
        foreach ($vars as $field => $value) {
            $vars['{{'.$field.'}}'] = $value;
            unset($vars[$field]);
        }

        return strtr($tpl, $vars);
    }

    /**
     * Render template and save it to file.
     */
    public static function renderSave(string $type, string $name, array $vars = []): string
    {
        return File::save(File::getPath($type, $name), self::render($type, $vars));
    }
}
