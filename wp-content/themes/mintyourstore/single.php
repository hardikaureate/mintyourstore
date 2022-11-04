<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package aureate
 */

get_header();
?>
<main id="primary" class="site-main">
	<?php
	while (have_posts()) :
		the_post();
			get_template_part('template-parts/content', get_post_type());
		?>
	<?php
	endwhile; // End of the loop.
	?>

	<?php 
	$args = array('posts_per_page' => 3, 'post__not_in'   => array(get_the_ID()), 'no_found_rows'  => true, 'orderby' => 'rand');
	$cats = wp_get_post_terms(get_the_ID(), 'category');
	$cats_ids = array();
	foreach ($cats as $wpex_related_cat) {
		$cats_ids[] = $wpex_related_cat->term_id;
	}
	if (!empty($cats_ids)) {
		$args['category__in'] = $cats_ids;
	}
	$wpex_query = new wp_query($args);
	if ($wpex_query->posts) :
	?>
		<section class="related-blog-wrap pb-xs-25 pb-sm-80">
			<div class="container">
				<h2 class="section-sub-heading mb-20">You May also like</h2>
				<div class="row">
						<?php
						$placeHolderImage = wp_get_attachment_image(get_field('theme_placeholder_image', 'option'), 'full');
						// Loop through posts
						foreach ($wpex_query->posts as $post) : setup_postdata($post); ?>
							<div class="w-full col-sm-6 col-md-4">
								<div class="resource-block">
									<a class="resource-image" href="<?php the_permalink(); ?>">
										<?php if (get_the_post_thumbnail(get_the_ID())) : ?>
											<?php the_post_thumbnail('medium_large'); ?>
										<?php else : ?>
											<?php echo $placeHolderImage; ?>
										<?php endif; ?>
									</a>
									<div class="clear">
										<?php ?>
											<div class="author_name">
												<?php 
												echo '<ul>';
												echo '<li>By '. get_the_author().'</li>';
												echo '<li>'.get_the_date( 'M jS, Y' ).'</li>';
												echo '</ul>'; ?>
											</div>
										<?php ?>
										<a class="also-like-blog-title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
									</div>
								</div>
							</div>
						<?php endforeach; ?>
						<?php wp_reset_postdata(); ?>
				</div>
			</div>
		</section>
	<?php
	endif;
	?>

</main><!-- #main -->

<?php
//get_sidebar();
get_footer();

