<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package mintyourstore
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>

	<!-- Custom Header Structure -->
	<div class="header-section p-md-5">
		<div class="container">
			<?php
				include('templates/header_inner.php')
			?>
		</div>
	</div>

	<div class="header-section header-animate p-md-5" id="header">
		<div class="container">
			<?php
				include('templates/header_inner.php')
			?>
		</div>
	</div>