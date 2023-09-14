<?php

use App\Helper\Form as FormHelper;

if ($data) :
?>

    <form <?= FormHelper::renderAttribute($data['attributes'], $data) ?>>
        <?php 
            if (key_exists('elements', $data) && $data['elements']) :
                FormHelper::renderFormElement($data['elements']);
            endif;
        ?>
    </form>

<?php endif; ?>