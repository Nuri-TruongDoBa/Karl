<?php

use App\Helper\View;

View::loadHtml('components/admin/sidebar', $data);

if (key_exists('main_sections', $data) && $data['main_sections']) {
    View::loadHtml($data['main_sections'], $data);
}
