<?php

declare(strict_types=1);

namespace App\Controller\Admin\Catalog\Category;

use App\Controller\BaseController;
use App\Helper\Request;

class SaveController extends BaseController
{
    public function execute()
    {
        $test = file_get_contents('php://input');
        echo json_encode($test);
    }
}
