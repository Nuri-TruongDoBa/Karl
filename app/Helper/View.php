<?php

declare(strict_types=1);

namespace App\Helper;

use Inc\Registry;

class View
{
    private static $html = '';

    public static function loadHtml($fileName, $data, $show = true)
    {
        if ($fileName) {
            if (!is_array($fileName)) {
                $fileName = [$fileName];
            }

            if (is_array($data)) {
                extract($data, EXTR_PREFIX_SAME, "data");
            } else {
                $data = $data;
            }

            foreach ($fileName as $name) {
                $file = __DIR__ . '/../../views/' . $name . '.php';
                if (file_exists($file) && $show) {
                    include_once $file;
                }
            }
        }
    }

    public static function renderJsOrCssTag($data, $subType, $fileType = 'css')
    {
        if (!is_array($subType)) {
            $subType = [$subType];
        }

        foreach ($subType as $st) {
            $files = $data && key_exists($st, $data) ? $data[$st] : [];
            foreach ($files as $file) {
                switch ($fileType) {
                    case 'js':
                        echo '<script src="' . $file['name'] . '" ' . $file['attribute'] . '></script>';
                        break;

                    default:
                        echo '<link rel="stylesheet" href="' . $file . '" />';
                        break;
                }
            }
        }
    }

    public static function renderAdditionalHtml($data, $type = 'header')
    {
        $subType = $type === 'header' ? 'body_top_sections' : 'body_bottom_sections';
        $subShowLayoutKey = $subType . '_show';
        $isShow = $data && key_exists($subShowLayoutKey, $data) && $data[$subShowLayoutKey];

        if ($data && key_exists($subType, $data) && $isShow) {
            foreach ($data[$subType] as $layoutPath) {
                $layoutPath = __DIR__ . '/../../views/' . $layoutPath . '.php';
                if (file_exists($layoutPath)) {
                    include_once $layoutPath;
                }
            }
        }
    }

    public static function getConfigMenu($menuName)
    {
        $config = Registry::getInstance()->config;
        $menuItems = [];

        if ($config) {
            if (key_exists($menuName, $config)) {
                $menuItems = $config[$menuName];
            }
        }

        return $menuItems;
    }

    public static function renderMenu($menus, $data, $classNames, $parentClassName, $menuType = 'accordion')
    {
        static::recursiveMenu($menus, $data, $classNames, $parentClassName, $menuType);
        return static::$html;
    }

    public static function recursiveMenu($menus, $data, $classNames, $parentClassName, $menuType = 'accordion', $k = 0, $isReset = true)
    {
        switch ($menuType) {
            default:
                if ($menus) {
                    foreach ($menus as $menu) {
                        $k = $isReset ? 0 : $k + 1;
                        $slipButtonClass = $dataFooterSelector = '';
                        $dataToggle = 'accordion';
                        $dataIgnore = ' data-ignore="0"';
                        $activeClass = '';
                        if (strtolower($menu['name']) === 'collapse') {
                            $dataToggle = 'collapse';
                            $slipButtonClass = ' button-slip';
                            $dataFooterSelector = ' data-addition-selector=".admin-footer,.admin-pages"';
                            $dataIgnore = ' data-ignore="1"';
                        }

                        if ($data && key_exists('active_link', $data) && key_exists('slug', $menu) && $activeLink = $data['active_link']) {
                            $activeLinkArr = explode('_', $activeLink);

                            if (key_exists($k, $activeLinkArr) && strtolower($menu['slug']) === $activeLinkArr[$k]) {
                                $activeClass = ' _active';
                            }
                        }

                        $dataToggle = ' data-toggle="' . $dataToggle . '"';
                        $tagName = 'button';
                        $attr = $isActive = '';
                        if (key_exists('url', $menu) && $menu['url']) {
                            $tagName = 'a';
                            $attr = ' href="' . $menu['url'] . '"';
                        }
                        $hasContent = key_exists('items', $menu) && $menu['items'];
                        $dataTarget = '';
                        $dataParent = ' data-parent="#' . $parentClassName . '"';
                        if ($hasContent && strtolower($menu['name']) !== 'collapse') {
                            $dataTarget = ' data-target="#childSidebar-' . $menu['id'] . '"';
                            $dataParent = '';
                        }

                        static::$html .= '<li class="' . $classNames . $slipButtonClass . $activeClass . '">';
                        static::$html .= '<div class="accordion-header">';
                        static::$html .= '<' . $tagName . $attr . ' class="accordion-button' . $isActive . '"' . $dataFooterSelector . $dataIgnore . $dataToggle . $dataParent . $dataTarget . '>';
                        if (key_exists('icon', $menu) && $menu['icon']) {
                            static::$html .= '<span class="accordion-button__icon"><i class="' . $menu['icon'] . '"></i></span>';
                        }

                        static::$html .= '<span class="accordion-button__label">' . $menu['name'] . '</span></' . $tagName . '></div>';
                        if ($hasContent) {
                            static::$html .= '<div id="childSidebar-' . $menu['id'] . '" class="accordion-collapse collapse" data-parent="#' . $parentClassName . '">';
                            static::$html .= '<ul class="accordion" id="parentSidebar-' . $menu['id'] . '">';
                            self::recursiveMenu($menu['items'], $data, $classNames, 'parentSidebar-' . $menu['id'], $menuType, $k, false);
                            static::$html .= '</ul></div>';
                        }
                        static::$html .= '</li>';
                    }
                }
        }
    }


    public static function rendererFormHtml($data)
    {
        if (!empty($data)) {
            if (is_array($data)) {
                extract($data, EXTR_PREFIX_SAME, "data");
            } else {
                $data = $data;
            }

            $file = __DIR__ . '/../../views/components/form.php';
            if (file_exists($file)) {
                include_once $file;
            }
        }
    }
}
