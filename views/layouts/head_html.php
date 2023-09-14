<?php

use App\Helper\View;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['title'] ?></title>
    <link rel="shortcut icon" href="<?= $data['favicon'] ?>" type="image/x-icon" />
    <?php View::renderJsOrCssTag($data, ['css_files', 'css_custom_files']) ?>
</head>

<body>
    <?php View::renderAdditionalHtml($data); ?>
    
    <main id="wrapper">