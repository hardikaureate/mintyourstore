<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package aureate
 */

$blog_options = get_field('blog_options', 'options');
if (!empty($blog_options)) 
{   
	$place_attach_id = isset($blog_options['theme_placeholder_image']) ? $blog_options['theme_placeholder_image'] : '';
	if (!empty($place_attach_id)) {
		$blog_place = wp_get_attachment_image_src($place_attach_id, 'full');
		if ($blog_place) {
			$blog_place_img = $blog_place[0];
		}
	}
}

$blog_img = '';
$srcset = '';
if (has_post_thumbnail(get_the_ID())) {
	$attch_id = get_post_thumbnail_id(get_the_ID());
	$url = wp_get_attachment_image_src($attch_id, 'full');
	$srcset = wp_get_attachment_image_srcset($attch_id);
	if ($url) {
		$blog_img = $url[0];
	}
}
if (empty($blog_img)) {
	$blog_img = $blog_place_img;
}
?>
<section class="banner-section" <?php echo $bg_image;?>>
	<div class="container">
		<div class="row">
			<div class="w-full col-sm-6 banner-left">
				<?php 
				echo '<ul class="author-detail">';
				echo '<li>'.get_the_date( 'M j, Y' ).'</li>';
				echo '<li>By '. get_the_author().'</li>';
				echo '</ul>';
				if ( is_singular() ) :
					the_title( '<h1 class="entry-title">', '</h1>' );
				else :
					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				endif;
				
				if(!empty($content))
				{   ?>
					<p><?php echo $content;?></p>
					<?php
				}

				$post_tags = get_the_category();
				if ( ! empty( $post_tags ) ) {
					echo '<div class="blog-tags"><ul>';
					foreach( $post_tags as $post_tag ) {

						$tag_name = startsWith($post_tag->name,'#') ? $post_tag->name : '#'.$post_tag->name;
						echo '<li><a href="' . get_tag_link( $post_tag ) . '">'.$tag_name . '</a></li>';
					}
					echo '</ul></div>';
				}
        		?>
			</div>
				<?php
			
			if ($blog_img) {
				echo '<div class="w-full col-sm-6 banner-right">';
				echo '<img src="' . $blog_img . '" srcset="' . $srcset . '"  title="' . get_the_title() . '" alt="' . get_the_title() . '"/>';
				echo '</div>';
			}
			?>
		</div>
	</div>
</section>
<div class="blog_main pb-xs-15 pt-xs-35 py-sm-70">
	<div class="container">
		<div class="row justify-content-center">
				<div class="w-full blog-content col-sm-8 sing_post_main_left">
						<?php
								the_content();
					?>
					<ul class="below-social-list">
						<li>Share :</li>
						<li>
							<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_permalink(); ?>" target="_blank">
								<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
									<!-- Font Awesome Pro 5.15.4 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) -->
									<path d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z" />
								</svg>
							</a>
						</li>
						<li>
							<a href="https://twitter.com/intent/tweet?text=<?php echo get_the_title(); ?>&amp;url=<?php echo urlencode(get_permalink()); ?>&via=aureate_labs" target="_blank">
								<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
									<!-- Font Awesome Pro 5.15.4 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) -->
									<path d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z" />
								</svg>
							</a>
						</li>
						<li>
							<a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo get_permalink(); ?>" target="_blank">
								<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
									<!-- Font Awesome Pro 5.15.4 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) -->
									<path d="M100.28 448H7.4V148.9h92.88zM53.79 108.1C24.09 108.1 0 83.5 0 53.8a53.79 53.79 0 0 1 107.58 0c0 29.7-24.1 54.3-53.79 54.3zM447.9 448h-92.68V302.4c0-34.7-.7-79.2-48.29-79.2-48.29 0-55.69 37.7-55.69 76.7V448h-92.78V148.9h89.08v40.8h1.3c12.4-23.5 42.69-48.3 87.88-48.3 94 0 111.28 61.9 111.28 142.3V448z" />
								</svg>
							</a>
						</li>
					</ul>
					<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if (comments_open() || get_comments_number()) :
						comments_template();
					endif;
						?>
				</div>
				<div class="w-full col-sm-4 sing-post-main-right">
				<?php
				$posts = get_field('blog_related_services');
				echo '<div class="blog-advertise-item">';
				if ($posts) :
					foreach ($posts as $post) :
						setup_postdata($post);
						$link = get_permalink($post->ID);
						if(!empty($link))
						{
							echo '<a class="d-block" href="' . $link . '">';
							echo get_the_post_thumbnail();
							echo '</a>';
						}
					endforeach;

					wp_reset_postdata();
				endif;
				/* End to show job banner on single post page */
				echo '</div>';
				?>
				</div>
		</div>
		<ul class="social_list">
			<li class="facebook"><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_permalink(); ?>" target="_blank">
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
						
						<path d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z" />
					</svg></a></li>
			<li class="twitter"><a href="https://twitter.com/intent/tweet?text=<?php echo get_the_title(); ?>&amp;url=<?php echo urlencode(get_permalink()); ?>&via=aureate_labs" target="_blank">
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
						
						<path d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z" />
					</svg></a></li>
			<li class="linkedin"><a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo get_permalink(); ?>" target="_blank">
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
						
						<path d="M100.28 448H7.4V148.9h92.88zM53.79 108.1C24.09 108.1 0 83.5 0 53.8a53.79 53.79 0 0 1 107.58 0c0 29.7-24.1 54.3-53.79 54.3zM447.9 448h-92.68V302.4c0-34.7-.7-79.2-48.29-79.2-48.29 0-55.69 37.7-55.69 76.7V448h-92.78V148.9h89.08v40.8h1.3c12.4-23.5 42.69-48.3 87.88-48.3 94 0 111.28 61.9 111.28 142.3V448z" />
					</svg></a></li>
			<li><a href="mailto:?subject=<?php echo get_the_title(); ?>&amp;body=<?php echo get_the_permalink(); ?>" title="Share by Email">
					<svg width="232" height="143" viewBox="0 0 232 143" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M10.5761 11.5225C16.6992 14.751 101.754 61.1191 104.927 62.7891C108.1 64.459 111.328 65.2383 116.338 65.2383C121.348 65.2383 124.576 64.459 127.749 62.7891C130.922 61.1191 215.977 14.751 222.1 11.5225C224.382 10.3535 228.223 8.23828 229.058 5.84473C230.505 1.61426 228.946 0 222.768 0H116.338H9.90817C3.72946 0 2.17086 1.66992 3.61813 5.84473C4.45309 8.29395 8.29391 10.3535 10.5761 11.5225Z" fill="black" />
						<path d="M226.942 14.0273C222.378 16.3652 181.409 45.5332 154.301 63.0674L200.057 114.557C201.17 115.67 201.671 117.006 201.059 117.674C200.391 118.286 198.943 117.952 197.774 116.895L142.89 70.582C134.596 75.9258 128.751 79.5996 127.749 80.1562C123.463 82.3271 120.457 82.6055 116.338 82.6055C112.219 82.6055 109.213 82.3271 104.927 80.1562C103.869 79.5996 98.0801 75.9258 89.7861 70.582L34.9014 116.895C33.7881 118.008 32.2852 118.342 31.6172 117.674C30.9492 117.062 31.4502 115.67 32.5635 114.557L78.2637 63.0674C51.1553 45.5332 9.74121 16.3652 5.17676 14.0273C0.27832 11.5225 0 14.4727 0 16.7549C0 19.0371 0 130.866 0 130.866C0 136.043 7.62598 142.5 13.0811 142.5H116.338H219.595C225.05 142.5 231.562 135.987 231.562 130.866C231.562 130.866 231.562 18.9814 231.562 16.7549C231.562 14.417 231.896 11.5225 226.942 14.0273Z" fill="black" />
					</svg>

				</a></li>
		</ul>
	</div>
</div>
<script>
    const containers = document.querySelectorAll(".blog-content ul");
    containers.forEach(container => {
        const li = container.querySelectorAll('li');
        const li_lenght = li.length;
        if(li_lenght<=1){
            container.classList.add("single-li");
        }
    });

</script>