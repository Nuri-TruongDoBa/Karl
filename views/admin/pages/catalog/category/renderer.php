<?php

use App\Helper\View;

$formData = key_exists('form_data', $data) && $data['form_data'] ? $data['form_data'] : [];
?>
<div class="admin-pages">
    <div class="page category-view-page">
        <?= View::loadHtml(['components/admin/breadcrumb'], $data) ?>

        <div class="page-messages"></div>

        <div class="actions flex-end">
            <button type="button" id="btnSubmit" class="btn-submit">Save</button>
        </div>
        <div class="container" id="container">
            <div id="page-left">
                <ul class="treeview treeview-root" id="category-treeview">
                    <li class="treeview-item">
                        <input type="checkbox" class="treeview-item__input" id="input-1">
                        <label for="input-1" class="treeview-item__label">Level 0</label>
                        <ul class="treeview">
                            <li class="treeview-item">
                                <input type="checkbox" class="treeview-item__input" id="input-11">
                                <label for="input-11" class="treeview-item__label">Level 1</label>
                                <ul class="treeview">
                                    <li class="treeview-item">
                                        <input type="checkbox" class="treeview-item__input" id="input-12">
                                        <label for="input-12" class="treeview-item__label">Level 2</label>
                                    </li>
                                </ul>
                            </li>
                            <li class="treeview-item">
                                <input type="checkbox" class="treeview-item__input" id="input-13">
                                <label for="input-13" class="treeview-item__label">Level 1</label>
                            </li>
                        </ul>
                    </li>
                    <li class="treeview-item">
                        <input type="checkbox" class="treeview-item__input" id="input-2">
                        <label for="input-2" class="treeview-item__label">Level 0</label>
                        <ul class="treeview">
                            <li class="treeview-item">
                                <input type="checkbox" class="treeview-item__input" id="input-21">
                                <label for="input-21" class="treeview-item__label">Level 1</label>
                                <ul class="treeview">
                                    <li class="treeview-item no-items">
                                        <input type="checkbox" checked class="treeview-item__input" id="input-22">
                                        <label for="input-22" class="treeview-item__label">Level 2</label>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div id="page-right">
                <?php View::rendererFormHtml($formData) ?>
            </div>
        </div>
    </div>
</div>