<?php

use App\Helper\Form as FormHelper;

if ($element) :
    $name = FormHelper::hasValue('name', $element) ? ' name="' . $element['name'] . '"' : '';
    $checked = FormHelper::hasValue('value', $element) ? ' checked' : '';
    $id = FormHelper::hasValue('id', $element) ? ' id="' . $element['id'] . '"' : '';
    $class = FormHelper::hasValue('class', $element) ? $element['class'] : '';
    $title = FormHelper::hasValue('title', $element) ? $element['title'] : '';
    $required = FormHelper::hasValue('required', $element) ? '<i>*</i>' : '';
    $value = ' value="' . (FormHelper::hasValue('value', $element) ? $element['value'] : '') . '"';
    $placeholder = ' placeholder="' . (FormHelper::hasValue('placeholder', $element) ? $element['placeholder'] : '') . '"';
    $dataAttribute = '';
    if (FormHelper::hasValue('data-attributes', $element)) {
        foreach ($element['data-attributes'] as $n => $v) {
            $dataAttribute .= ' data-' . $n . '="' . $v . '"';
        }
    }
?>
    <div class="form-group <?= $class ?>">
        <label class="form-group__label"><?= $title ?><?= $required ?></label>
        <input <?= $id . $name . $checked . $value . $dataAttribute . $placeholder ?> class="form-group__input" type="number" />
    </div>
<?php endif; ?>