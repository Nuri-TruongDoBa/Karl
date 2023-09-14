<?php

use App\Helper\View;
use Inc\Registry;

$config = Registry::getInstance()->config;
$storeUrl = 'https://karl.dev.com/';
if ($config && key_exists('store_url', $config) && $config['store_url']) {
    $storeUrl = $config['store_url'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['title'] ?></title>
    <base href="<?= $storeUrl.(defined('ADMIN_FRONT_NAME') ? ADMIN_FRONT_NAME : 'admin').'/' ?>" target="_blank">
    <link rel="shortcut icon" href="<?= $storeUrl ?>media/images/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="<?= $storeUrl ?>static/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= $storeUrl ?>static/css/reset.css">
    <link rel="stylesheet" href="<?= $storeUrl ?>static/css/common.css">
    <link rel="stylesheet" href="<?= $storeUrl ?>static/css/animation.css">
    <link rel="stylesheet" href="<?= $storeUrl ?>static/css/utilities.css">
    <?php View::renderJsOrCssTag($data, ['css_custom_files']) ?>
</head>

<body>
    <?php 
    
    View::renderAdditionalHtml($data); 

    View::loadHtml('components/admin/header', $data);

    ?>
    <main id="wrapper">