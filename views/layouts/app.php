<?php
use App\Helper\View;

View::loadHtml('layouts/head_html', $data);

View::loadHtml('components/frontend_header', $data);

View::loadHtml('layouts/foot_html', $data);
