<?php

declare(strict_types=1);

namespace App\Helper;

use Inc\Registry;

class Form
{
    public static function hasValue($attributeName, $data)
    {
        return $data && key_exists($attributeName, $data) && $data[$attributeName];
    }

    public static function renderAttribute($attributes, $data)
    {
        $attributeText = '';
        if ($attributes) {
            foreach ($attributes as $attribute) {
                if (static::hasValue($attribute, $data)) {
                    $attributeText .= ' ' . $attribute . '="' . $data[$attribute] . '"';
                }
            }
        }

        return $attributeText;
    }

    public static function renderFormElement($elements)
    {
        if ($elements && is_array($elements)) {
            foreach ($elements as $element) {
                if (is_array($element)) {
                    extract($element, EXTR_PREFIX_SAME, "element");
                } else {
                    $element = $element;
                }
    
                $file = __DIR__ . '/../../views/components/form/'. $element['type'] .'.php';
                if (file_exists($file)) {
                    include $file;
                }
            }
        }
    }
}
