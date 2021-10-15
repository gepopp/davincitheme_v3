<?php
get_header();
get_template_part('headers', 'banderole');


( new \davinci\codebase\IndexWalker())->walk();


get_footer();