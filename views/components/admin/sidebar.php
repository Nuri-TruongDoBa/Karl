<?php

use App\Helper\View;

?>
<aside class="admin-sidebar" id="sidebarMenu">
    <ul class="sidebar-menu accordion">
        <?= View::renderMenu(View::getConfigMenu('admin_sidebar'), $data, 'accordion-item sidebar-menu__item', 'sidebarMenu'); ?>
    </ul>
</aside>