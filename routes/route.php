<?php

declare(strict_types=1);

use Inc\Route;

Route::get('/', 'App\Controller\HomeController@rendererHtml');

//Begin Admin Routes
$adminFrontName = (defined('ADMIN_FRONT_NAME') ? ADMIN_FRONT_NAME : 'admin') . '/';
Route::get($adminFrontName, 'App\Controller\Admin\DashboardController@rendererHtml');
Route::get($adminFrontName . 'catalog/category', 'App\Controller\Admin\Catalog\Category\IndexController@execute');
Route::get($adminFrontName . 'catalog/category/index', 'App\Controller\Admin\Catalog\Category\IndexController@execute');
Route::post($adminFrontName . 'catalog/category/save', 'App\Controller\Admin\Catalog\Category\SaveController@execute');
