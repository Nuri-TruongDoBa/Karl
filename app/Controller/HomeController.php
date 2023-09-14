<?php

declare(strict_types=1);

namespace App\Controller;

use Inc\Registry;

class HomeController extends BaseController
{
    protected $config;

    public function __construct()
    {
        $this->config = Registry::getInstance()->config;
    }

    public function rendererHtml()
    {
        $baseUrl = $this->config && $this->config['store_url'] ? $this->config['store_url'] : 'https://karl.dev.com/';
        $baseJsPath = $baseUrl . 'static/js/';
        $baseCssPath = $baseUrl . 'static/css/';
        $data = [
            'title' => 'Karl Fashion | Home Page',
            'favicon' => $baseUrl . 'media/images/favicon.ico',
            'css_files' => [
                $baseCssPath . 'font-awesome.min.css',
                $baseCssPath . 'reset.css',
                $baseCssPath . 'animation.css',
                $baseCssPath . 'common.css',
                $baseCssPath . 'utilities.css'
            ],
            'js_files' => [
                [
                    'name' => $baseJsPath . 'common.js',
                    'attribute' => ''
                ],
                [
                    'name' => $baseJsPath . 'utilities.js',
                    'attribute' => ''
                ]
            ],
            'body_top_sections_show' => true,
            'body_top_sections' => ['components/frontend_sidebar']
        ];
        return $this->view('home', $data);
    }
}
