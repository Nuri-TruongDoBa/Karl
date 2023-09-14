<?php

declare(strict_types=1);

namespace App\Controller\Admin\Catalog\Category;

use App\Controller\BaseController;
use Inc\Registry;

class IndexController extends BaseController
{
    public function execute()
    {
        $config = Registry::getInstance()->config;
        $baseUrl = $config && key_exists('store_url', $config) && $config['store_url'] ? $config['store_url'] : 'https://karl.dev.com/';
        $baseJsPath = $baseUrl . 'static/js/';
        $baseCssPath = $baseUrl . 'static/css/';

        $formData = static::getDataForm();

        $data = [
            'active_link' => 'catalog_category',
            'title' => 'Administrator - Categories',
            'breadcrumb' => 'Categories',
            'css_custom_files' => [
                $baseCssPath . 'admin/style.css',
                $baseCssPath . 'admin/category.css'
            ],
            'js_custom_files' => [
                [
                    'name' => $baseJsPath . 'admin.js',
                    'attribute' => ''
                ],
                [
                    'name' => $baseJsPath . 'category.js',
                    'attribute' => ''
                ]
            ],
            'main_sections' => 'admin/pages/catalog/category/renderer',
            'form_data' => $formData
        ];
        return  $this->view('admin/pages/catalog/category/index', $data);
    }

    private static function getDataForm()
    {
        return [
            'attributes' => ['action', 'class', 'id', 'enctype', 'method'],
            'action' => 'catalog/category/save',
            'method' => 'post',
            'class' => 'page-form category-form',
            'id' => 'formCategory',
            'enctype' => 'multipart/form-data',
            'elements' => [
                'enabled' => [
                    'name' => 'enabled',
                    'type' => 'switch',
                    'value' => 1,
                    'title' => 'Enable Category',
                    'id' => 'categoryEnabled'
                ],
                'include_menu' => [
                    'name' => 'include_menu',
                    'type' => 'switch',
                    'value' => 1,
                    'title' => 'Include Menu',
                    'id' => 'categoryIncludeMenu'
                ],
                'name' => [
                    'name' => 'name',
                    'title' => 'Category Name',
                    'type' => 'text',
                    'required' => true,
                    'id' => 'categoryName',
                    'class' => 'form-group',
                    'placeholder' => 'Category Name',
                    'data-attributes' => [
                        'slug' => '[name=slug]',
                        'parent' => '.page-form'
                    ]
                ],
                'slug' => [
                    'name' => 'slug',
                    'title' => 'Category Slug',
                    'type' => 'text',
                    'required' => true,
                    'class' => 'hidden'
                ],
                'parent_id' => [
                    'name' => 'parent_id',
                    'title' => 'Parent Id',
                    'type' => 'number',
                    'required' => true,
                    'value' => 0,
                    'class' => 'hidden'
                ],
                'image' => [
                    'name' => 'thumb',
                    'title' => 'Category Image',
                    'type' => 'media',
                    'class' => 'category-image',
                    'data-attributes' => [
                        'toggle' => 'media',
                        'parent' => '.form-group',
                        'alternative' => '.form-group__buttonAlternative,.form-group__previewMask',
                        'drop-selector' => '.form-group__previewMask',
                        'remove-selector' => '.form-group__previewRemove',
                        'preview-selector' => '.form-group__previewImage'
                    ]
                ]
            ]
        ];
    }
}
