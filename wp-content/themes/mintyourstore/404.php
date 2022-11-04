<?php

/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package mintyourstore
 */

get_header();
?>
<section class="page-not-found-row">
	<div class="page-not-found">
		<div class="page-not-found">
			<h1>Page Not Found!</h1>	
			<div class="error-img">
				<img src="<?php echo get_template_directory_uri().'/assets/images/page-not-found.svg'; ?>" />
			</div>
			<p>Apologies, but the page you requested could not be found.</p>
			<a href="/" class="btn">
				Go Home
				<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path fill-rule="evenodd" clip-rule="evenodd" d="M9.634 2.3999L8.79922 3.24052L12.9304 7.3999H-0.000781476V8.5999H12.9288L8.79922 12.7593L9.634 13.5999L14.3608 8.8399L14.3644 8.84465L15.1992 8.00403L9.634 2.3999Z" fill="white"></path>
				</svg>
			</a>
		</div>
	</div>
</section>

<?php
get_footer();
