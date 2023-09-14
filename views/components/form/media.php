<?php

use App\Helper\Form as FormHelper;

if ($element) :
    $name = FormHelper::hasValue('name', $element) ? ' name="' . $element['name'] . '"' : '';
    $id = FormHelper::hasValue('id', $element) ? ' id="' . $element['id'] . '"' : '';
    $class = FormHelper::hasValue('class', $element) ? $element['class'] : '';
    $title = FormHelper::hasValue('title', $element) ? $element['title'] : '';
    $required = FormHelper::hasValue('required', $element) ? '<i>*</i>' : '';
    $path = FormHelper::hasValue('value', $element) ? $element['value'] : '';
    $placeholder = ' placeholder="' . (FormHelper::hasValue('placeholder', $element) ? $element['placeholder'] : '') . '"';
    $dataAttribute = '';
    if (FormHelper::hasValue('data-attributes', $element)) {
        foreach ($element['data-attributes'] as $n => $v) {
            $dataAttribute .= ' data-' . $n . '="' . $v . '"';
        }
    }
?>
    <div class="form-group <?= $class ?>">
        <div class="form-group__enter">
            <label class="form-group__label"><?= $title ?><?=  $required ?></label>
            <input <?= $id . $name . $dataAttribute . $placeholder ?> class="form-group__input" type="file" />
            <span class="form-group__buttonAlternative">Upload</span>
        </div>
        <div class="form-group__preview">
            <img src="<?= $path ?>" alt="" class="form-group__previewImage">
            <span class="form-group__previewRemove hide"><i class="fas fa-trash"></i></span>
            <span class="form-group__previewMask">
                Browse to find or drag image here
            </span>
        </div>
    </div>
<?php endif; ?>