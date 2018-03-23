<?php
namespace Wtf\Generator\Helper;
use League\Plates\Engine;
class Template
{
    /**
     * Get rendered template
     * @param string $name Template name
     * @param array $vars Variables array
     */
    public static function render(string $name, array $vars = []): string
    {
        $tpl = implode('',file(File::getTemplatesDir().$name.'.tpl'));
        foreach($vars as $field => $value) {
            $vars['{{'.$field.'}}'] = $value;
            unset($vars[$field]);
        }

        return strtr($tpl, $vars);
    }
}
