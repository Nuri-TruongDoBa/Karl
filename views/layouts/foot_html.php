</main>

<?php

use App\Helper\View;

View::renderAdditionalHtml($data, 'footer');

View::renderJsOrCssTag($data, ['js_files', 'js_custom_files'], 'js');

?>

</body>

</html>