<?php
/**
 * @var $is_sticky
 */
$is_sticky = false;
extract($args);
?>

<!doctype html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.typekit.net/gth2vfs.css">
	<?php wp_head(); ?>

	<script>
        window.ajaxurl = "<?php echo admin_url('admin-ajax.php') ?>";
        window.home = "<?php echo home_url() ?>";
	</script>

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-137371315-1"></script>
	<script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'UA-151997158-1');
	</script>
</head>
<body <?php body_class(); ?> >
<main class="bg-repeat-x w-full min-h-screen">
<?php get_template_part('headers', 'stickymenu', ['is_sticky' => $is_sticky]) ?>
