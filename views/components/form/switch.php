<?php

use App\Helper\Form as FormHelper;

if ($element) :
    $name = FormHelper::hasValue('name', $element) ? ' name="' . $element['name'] . '"' : '';
    $checked = FormHelper::hasValue('value', $element) ? ' checked' : '';
    $id = FormHelper::hasValue('id', $element) ? ' id="' . $element['id'] . '"' : '';
    $class = FormHelper::hasValue('class', $element) ? $element['class'] : '';
    $title = FormHelper::hasValue('title', $element) ? $element['title'] : '';
    $required = FormHelper::hasValue('required', $element) ? '<i>*</i>' : '';
    $dataAttribute = '';
    if (FormHelper::hasValue('data-attributes', $element)) {
        foreach ($element['data-attributes'] as $n => $v) {
            $dataAttribute .= ' data-' . $n . '="' . $v . '"';
        }
    }
?>
    <label class="switch-label <?= $class ?>">
        <span class="switch-label__title"><?= $title ?><?= $required ?></span>
        <div class="switch-group">
            <input <?= $id . $name . $checked . $dataAttribute ?> class="switch-input" type="checkbox" />
            <span class="switch-slider"></span>
        </div>
    </label>
<?php endif; ?>