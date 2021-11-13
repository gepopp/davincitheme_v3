<?php
get_header();
get_template_part('headers', 'banderole');

?>
<div class="mt-10"></div>
<?php
( new \davinci\codebase\IndexWalker())->walk();


get_footer();