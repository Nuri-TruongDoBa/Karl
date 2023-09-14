<?php

use App\Helper\View;  

?>
</main>

<?php

View::loadHtml('components/admin/footer', $data);

?>

<script src="../../static/js/common.js"></script>
<script src="../../static/js/utilities.js"></script>

<?php

View::renderJsOrCssTag($data, ['js_custom_files'], 'js');

View::renderAdditionalHtml($data, 'footer');

?>

</body>

</html>