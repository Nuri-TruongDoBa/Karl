<?php

declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\BaseController;
use Inc\Registry;

class DashboardController extends BaseController
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
            'active_link' => 'dashboard',
            'title' => 'Administrator - Dashboard',
            'favicon' => $baseUrl . 'media/images/favicon.ico',
            'css_custom_files' => [
                $baseCssPath . 'admin/style.css'
            ],
            'js_custom_files' => [
                [
                    'name' => $baseJsPath . 'admin.js',
                    'attribute' => ''
                ]
            ],
        ];
        return $this->view('admin/dashboard', $data);
    }
}
