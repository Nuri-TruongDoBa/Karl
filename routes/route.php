<?php

declare(strict_types=1);

use Inc\Route;

Route::get('/', function() {
    include '../views/test.php';
});
