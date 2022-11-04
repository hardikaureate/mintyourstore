<?php

/**
 * mintyourstore functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package mintyourstore
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function mintyourstore_setup()
{
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on mintyourstore, use a find and replace
		* to change 'mintyourstore' to the name of your theme in all the template files.
		*/
	load_theme_textdomain('mintyourstore', get_template_directory() . '/languages');

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support('title-tag');

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support('post-thumbnails');

	// This theme uses wp_nav_menu() in one l

	register_nav_menus(
		array(
			'menu-1' => esc_html__('Primary', 'mintyourstore'),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'mintyourstore_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);

	# add capabality to subscriber
	$role_object = get_role('subscriber');
	$role_object->add_cap('edit_posts');
}
add_action('after_setup_theme', 'mintyourstore_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function mintyourstore_content_width()
{
	$GLOBALS['content_width'] = apply_filters('mintyourstore_content_width', 640);
}
add_action('after_setup_theme', 'mintyourstore_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function mintyourstore_widgets_init()
{
	register_sidebar(
		array(
			'name'          => esc_html__('Sidebar', 'mintyourstore'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here.', 'mintyourstore'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'mintyourstore_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function mintyourstore_scripts()
{
	//wp_enqueue_style('mintyourstore-style', get_stylesheet_uri(), array(), _S_VERSION);
	//wp_style_add_data('mintyourstore-style', 'rtl', 'replace');

	//wp_enqueue_script( 'mintyourstore-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'mintyourstore_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Code to remove the loading of block-library and remove the recaptcha css and js
 */
add_action('wp_enqueue_scripts', function () {
	wp_dequeue_style('wp-block-library');
	//wp_dequeue_script('google-recaptcha');
	//wp_dequeue_style('contact-form-7');
	//remove_action('wp_enqueue_scripts', 'wpcf7_recaptcha_enqueue_scripts', 20);
	#wp_dequeue_script('gtm4wp-contact-form-7-tracker');
	#wp_dequeue_script('utm_contact_form7_scripts');
	//wp_dequeue_script( 'jquery');
    //wp_deregister_script( 'jquery');   
	//wp_deregister_script( 'regenerator-runtime' );
	//wp_deregister_script( 'wp-polyfill' );
	//wp_dequeue_script('swv');
	//wp_deregister_script( 'swv');   
	
});

/**
 * Below code will load the css files depending upon the page/posts called.
 */
add_action('wp_enqueue_scripts', 'mys_theme_name_scripts');
function mys_theme_name_scripts()
{
	wp_enqueue_style('custom-style', get_template_directory_uri() . '/assets/css/style.css'); //For common 
	//wp_enqueue_style('header-style', get_template_directory_uri() . '/assets/css/header.css'); //For common 
	//wp_enqueue_style('footer-style', get_template_directory_uri() . '/assets/css/footer.css'); //For common 
	//wp_enqueue_style('header-style-vj', get_template_directory_uri() . '/assets/css/style-vj.css'); //For common 

	if (is_page('hire-shopify-experts')) {
		wp_enqueue_style('lp-pages', get_template_directory_uri() . '/assets/css/shopify-landing.css'); //For Shopify Landing pages
	}

	if (is_page('blog')) {
		wp_enqueue_style('bloglistingpage', get_template_directory_uri() . '/assets/css/blog-listing.css'); //For Blog Listing page
	} else if (is_category() || is_tag() || is_archive()) {
		wp_enqueue_style('bloglistingpage', get_template_directory_uri() . '/assets/css/blog-listing.css'); //For category blog Listing page
	} else if (is_single()) {
		wp_enqueue_style('blogdetailpage', get_template_directory_uri() . '/assets/css/blog-detail.css'); // For Blog detail page
	}
	$slugname = basename(get_page_template(), ".php");

	if (!empty($slugname)) {
		$css_slug_abs_path = get_template_directory() . '/assets/css/' . $slugname . '.css';

		if (file_exists($css_slug_abs_path)) {

			$css_slug_path = get_template_directory_uri() . '/assets/css/' . $slugname . '.css';
			wp_enqueue_style($slugname . '-theme', $css_slug_path);
		}
	}
	wp_enqueue_script('custom-js', get_template_directory_uri() . '/assets/js/custom.js', array(), '6.0.3', true); //For custom js
}

/**
 * Below code to allow SVG uplaod files from backend
 */
add_filter('wp_check_filetype_and_ext', function ($data, $file, $filename, $mimes) {
	global $wp_version;
	if ($wp_version !== '4.7.1') {
		return $data;
	}

	$filetype = wp_check_filetype($filename, $mimes);

	return [
		'ext'             => $filetype['ext'],
		'type'            => $filetype['type'],
		'proper_filename' => $data['proper_filename']
	];
}, 10, 4);

function mys_mime_types($mimes)
{
	//$mimes['ico'] = 'image/x-icon';
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_filter('upload_mimes', 'mys_mime_types');

function mys_fix_svg()
{
	echo '<style type="text/css">
		  .attachment-266x266, .thumbnail img {
			   width: 100% !important;
			   height: auto !important;
		  }
		  </style>';
}
add_action('admin_head', 'mys_fix_svg');


/*
# Add theme option for ACF
*/
add_action('acf/init', 'my_acf_op_init');
function my_acf_op_init()
{
	// Check function exists.
	if (function_exists('acf_add_options_page')) {

		// Add parent.
		$parent = acf_add_options_page(array(
			'page_title'  => __('Theme General Settings'),
			'menu_title'  => __('Theme Settings'),
			'redirect'    => false,
			'capability' => 'manage_options',
		));
	}
}

# remove editor from pages
function mys_remove_editor()
{
	remove_post_type_support('page', 'editor');
}
add_action('admin_init', 'mys_remove_editor');

# remove admin bar from frontend
add_filter('show_admin_bar', '__return_false');


# Remove CF7 JS & CSS Load on particular page
add_filter('wpcf7_load_js', '__return_false');
add_filter('wpcf7_load_css', '__return_false');
remove_action( 'wp_enqueue_scripts','wpcf7_recaptcha_enqueue_scripts', 20 );

add_filter('pre_do_shortcode_tag', 'mys_enqueue_wpcf7_css_js_as_needed', 10, 2 );
function mys_enqueue_wpcf7_css_js_as_needed ( $output, $shortcode ) {
	
    if ( 'contact-form-7' == $shortcode ) {
        wpcf7_recaptcha_enqueue_scripts();
        wpcf7_enqueue_scripts();
        wpcf7_enqueue_styles();
    }
    return $output;
}

function mys_add_css_js_to_pages()
{
	# remove code snippet script for other pages
	if (!is_singular('post')) {
		wp_dequeue_style('code-snippet-dm-main-min');
		wp_dequeue_script('code-snippet-dm-dm-clipboard');
		wp_dequeue_script('code-snippet-dm-dm-prism');
		wp_dequeue_script('code-snippet-dm-dm-manually-start-prism');
		wp_dequeue_script('code-snippet-dm');
		wp_dequeue_script('ht_toc-script-js');
		wp_dequeue_style('ht_toc-style-css');
	}
}
add_action('wp_enqueue_scripts', 'mys_add_css_js_to_pages');

# Add class to body
add_filter('body_class', 'al_body_class');
function al_body_class($classes)
{
	global $post;
	if (isset($post)) {
		$classes[] = $post->post_name . '-page';
	}

	if (is_404()) {
		$classes[] = '404-header';
	}
	// if (is_category()) {
	// 	$classes[] = 'white-header';
	// }
	// if (is_tag()) {
	// 	$classes[] = 'white-header';
	// }
	// if (is_singular('post')) {
	// 	$classes[] = 'white-header';
	// }
	// if (is_search()) {
	// 	$classes[] = 'white-header';
	// }
	return $classes;
}

# remove extra files
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('wp_enqueue_scripts', 'wp_enqueue_global_styles');
remove_action('wp_body_open', 'wp_global_styles_render_svg_filters');


# Get aria-label for wp defualt logo
function theme_get_custom_logo()
{
	if (has_custom_logo()) {
		$logovar = get_theme_mod('custom_logo');
		$image_data =  get_post($logovar);
		$image_title = $image_data->post_title;
		$site_title = get_bloginfo('name');
		$logo = wp_get_attachment_image_src(get_theme_mod('custom_logo'), 'full');
		echo '<a class="custom-logo-link d-block lh-0" href="' . get_site_url() . '" aria-label="' . get_bloginfo('name') . '" title="' . get_bloginfo('name') . '">';
		echo '<img class="custom-logo" src="' . esc_url($logo[0]) . '" title="' . get_bloginfo('name') . '" alt="' . get_bloginfo('name') . '">';
		echo "</a>";
	} else {
		echo '<h1>';
		echo '<a class="d-block lh-0" href="' . get_site_url() . '">' . get_bloginfo('name') . '</a>';
		echo '</h1>';
	}
}

# Change wp-admin logo
add_action('login_enqueue_scripts', 'mys_admin_logo_callback');
function mys_admin_logo_callback()
{
	# get saved data
	$wp_admin_options = get_field('wp_admin_options', 'option');
	$img_width = 250;
	$img_height = 50;
	if (!empty($wp_admin_options)) {
		$wp_admin_login_logo = isset($wp_admin_options['wp_admin_login_logo']) ? $wp_admin_options['wp_admin_login_logo'] : array();
		if (!empty($wp_admin_login_logo)) {
			$img_data_url = isset($wp_admin_login_logo['url']) ? $wp_admin_login_logo['url'] : '';
			if (isset($img_data_url)) {	?>
				<style type="text/css">
					body.login div#login h1 a {
						background-image: url(<?php echo esc_url($img_data_url); ?>);
						background-size: 100% !important;
						margin: 0 auto !important;
					}
				</style>
<?php
			}
		}
	}
}
# Change wp-admin logo link
add_action('login_headerurl', 'mys_login_headerurl_callback');
function mys_login_headerurl_callback()
{
	return home_url();
}

# modify the path to the icons directory
add_filter('acf_icon_path_suffix', 'mys_acf_icon_path_suffix');
function mys_acf_icon_path_suffix($path_suffix)
{
	return 'assets/icons/';
}

# Disable XML-RPC 
add_filter('xmlrpc_enabled', '__return_false');

/**
 * Remove & Disable XML-RPC Pingback
 * Unset XML-RPC Methods.
 * https://wordpress.org/plugins/disable-xml-rpc-pingback/#developers
 **/
add_filter('xmlrpc_methods', 'mys_block_xmlrpc_attacks');
function mys_block_xmlrpc_attacks($methods)
{
	unset($methods['pingback.ping']);
	unset($methods['pingback.extensions.getPingbacks']);
	return $methods;
}
if (version_compare(get_bloginfo('version'), '4.4', '>=')) {
	add_action('wp', 'sar_remove_x_pingback_header_44', 9999);
	function sar_remove_x_pingback_header_44()
	{
		header_remove('X-Pingback');
	}
} elseif (version_compare(get_bloginfo('version'), '4.4', '<')) {
	add_filter('wp_headers', 'sar_remove_x_pingback_header');
	function sar_remove_x_pingback_header($headers)
	{
		unset($headers['X-Pingback']);
		return $headers;
	}
}

# add title attribute
add_filter('wp_get_attachment_image_attributes', 'mys_add_image_attributes', 10, 3);
function mys_add_image_attributes($attr, $attachment, $size)
{
	if (!isset($attr['title'])) {
		$attr['title'] = $attachment->post_title;
	}
	return $attr;
}


# encode email address
function mys_eae_encode_str($string, $hex = false)
{
	$chars = str_split($string);
	$seed = mt_rand(0, (int) abs(crc32($string) / strlen($string)));
	foreach ($chars as $key => $char) {
		$ord = ord($char);

		if ($ord < 128) { // ignore non-ascii chars
			$r = ($seed * (1 + $key)) % 100; // pseudo "random function"

			if ($r > 75 && $char !== '@' && $char !== '.'); // plain character (not encoded), except @-signs and dots
			else if ($hex && $r < 25) $chars[$key] = '%' . bin2hex($char); // hex
			else if ($r < 45) $chars[$key] = '&#x' . dechex($ord) . ';'; // hexadecimal
			else $chars[$key] = "&#{$ord};"; // decimal (ascii)
		}
	}
	return implode('', $chars);
}

function mys_encode_emails($string)
{
	$regexp = '{
            (?:mailto:)?
            (?:
                [-!#$%&*+/=?^_`.{|}~\w\x80-\xFF]+
            |
                ".*?"
            )
            \@
            (?:
                [-a-z0-9\x80-\xFF]+(\.[-a-z0-9\x80-\xFF]+)*\.[a-z]+
            |
                \[[\d.a-fA-F:]+\]
            )
        }xi';

	$method = 'mys_eae_encode_str';

	$callback = function ($matches) use ($method) {
		return $method($matches[0]);
	};

	return preg_replace_callback($regexp, $callback, $string);
}

# remove empty p tag
add_filter('the_content', 'mys_remove_empty_p', 20, 1);
function mys_remove_empty_p($content)
{
	$content = force_balance_tags($content);
	return preg_replace('#<p>\s*+(<br\s*/*>)?\s*</p>#i', '', $content);
}

# disable feed
function mys_disable_feed()
{
	wp_die(__('No feed available, please visit the <a href="' . esc_url(home_url('/')) . '">homepage</a>!'));
}
add_action('do_feed', 'mys_disable_feed', 1);
add_action('do_feed_rdf', 'mys_disable_feed', 1);
add_action('do_feed_rss', 'mys_disable_feed', 1);
add_action('do_feed_rss2', 'mys_disable_feed', 1);
add_action('do_feed_atom', 'mys_disable_feed', 1);
add_action('do_feed_rss2_comments', 'mys_disable_feed', 1);
add_action('do_feed_atom_comments', 'mys_disable_feed', 1);
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'wp_resource_hints', 2);
remove_action( 'wp_head', 'wp_generator' );

# Caching code for JS and CSS file 
function mys_remove_wp_ver_css_js($src)
{
	if (strpos($src, 'ver=')) {
		$path = parse_url($src, PHP_URL_PATH);
		$slug_abs_path = $_SERVER['DOCUMENT_ROOT'] . $path;
		if (file_exists($slug_abs_path)) {
			$filetime = filemtime($slug_abs_path);
			$src = remove_query_arg('ver', $src);
			$src = add_query_arg(array('ver' => $filetime), $src);
		}
	}
	return $src;
}
add_filter('style_loader_src', 'mys_remove_wp_ver_css_js', 9999);
add_filter('script_loader_src', 'mys_remove_wp_ver_css_js', 9999);

function mys_posts_listing($ppp = 10, $page = 1, $catid = 0, $tagid = 0)
{
	$args = array(
		'post_type' => 'post',
		'order' => 'DESC',
		'orderby' => 'publish_date',
		'posts_per_page' => $ppp,
		'post_status' => array('publish'),
		'paged' => $page
	);
	if (!empty($catid)) {
		$args['tax_query'] = array(
			array(
				'taxonomy'  => 'category',
				'field'     => 'term_id',
				'terms'     => $catid
			)
		);
	}
	global $wp_query;
	$qwr_var = isset($wp_query->query_vars) ? ($wp_query->query_vars) : array();
	if (!empty($qwr_var)) {
		$year = isset($qwr_var['year']) ? $qwr_var['year'] : '';
		$monthnum = isset($qwr_var['monthnum']) ? $qwr_var['monthnum'] : '';
		if (!empty($monthnum)) {
			$args['monthnum'] = $monthnum;
		}
		if (!empty($year)) {
			$args['year'] = $year;
		}
	}

	if (!empty($tagid)) {
		$args['tag_id'] = $tagid;
	}
	$loop = new WP_Query($args);

	$html = $blog_place_img = $blog_img = '';
	$blog_options = get_field('blog_options', 'options');
	if (!empty($blog_options)) {
		$place_attach_id = isset($blog_options['theme_placeholder_image']) ? $blog_options['theme_placeholder_image'] : '';
		if (!empty($place_attach_id)) {
			$blog_place = wp_get_attachment_image_src($place_attach_id, 'full');
			if ($blog_place) {
				$blog_place_img = $blog_place[0];
			}
		}
	}
	if ($loop->have_posts()) :
		while ($loop->have_posts()) :
			$loop->the_post();
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
			$html .= '<div class="blog-list-block">';
			$html .= '<h2>';
			$html .= '<a href="' . get_the_permalink() . '">';
			$html .= get_the_title();
			$html .= '</a>';
			$html .= '</h2>';
			$html .= '<div class="category-tag">';
			$html .= '<label>';
			$html .= 'By: ' . get_the_author();
			$html .= '</label>';
			$html .= get_the_category_list();
			$html .= '</div>';
			$html .= '<a class="blog-list-image mb-2 mb-md-3" href="' . get_the_permalink() . '">';
			if ($blog_img) {
				$html .= '<img src="' . $blog_img . '" srcset="' . $srcset . '"  title="' . get_the_title() . '" alt="' . get_the_title() . '"/>';
			}
			$html .= '</a>';
			$html .= '<div class="">';
			$html .= '<p class="">';
			$html .=  get_the_excerpt(get_the_ID());
			$html .= '</p>';
			$html .= '</div>';

			$html .= '<a class="reading-links" href="' . get_the_permalink() . '">';
			$html .= 'Continue reading';
			$html .= '</a>';

			$html .= '</div>';

		endwhile;

		if (function_exists("mys_numeric_pagination")) :
			$html .=  mys_numeric_pagination($loop->max_num_pages, 1);
		endif;
	else :

		$html .= '<div class="col-12">';
		$html .= '<div class="text-center font-24 text-primary">';
		$html .=  'No blog found!';
		$html .= '</div>';
		$html .= '</div>';

	endif;
	wp_reset_postdata();

	return $html;
}


function mys_numeric_pagination($pages = '', $range = 4)
{
	$showitems = 2; //($range * 2)+1;  
	global $paged;
	if (empty($paged)) $paged = 1;
	if ($pages == '') {
		global $wp_query;
		$pages = $wp_query->max_num_pages;
		if (!$pages) {
			$pages = 1;
		}
	}
	$pagination_html = '';
	if (1 != $pages) {
		$pagination_html .=  "<div class=\"pagination\">";
		if ($paged > 1 && $showitems < $pages) $pagination_html .=  "<a href='" . get_pagenum_link($paged - 1) . "'>Previous Page</a>";
		for ($i = 1; $i <= $pages; $i++) {
			if (1 != $pages && (!($i >= $paged + $range + 1 || $i <= $paged - $range - 1) || $pages <= $showitems)) {
				$pagination_html .=  ($paged == $i) ? "<span class=\"current\">" . $i . "</span>" : "<a href='" . get_pagenum_link($i) . "' class=\"inactive\">" . $i . "</a>";
			}
		}
		if ($paged < $pages && $showitems < $pages) $pagination_html .=  "<a href=\"" . get_pagenum_link($paged + 1) . "\">Next Page</a>";
		$pagination_html .=  "</div>";
	}
	return $pagination_html;
}

# remove [..] from excerpt
add_filter('excerpt_more', 'mys_excerpt_more');
function mys_excerpt_more($more)
{
	return '...';
}

# excerpt length
add_filter('excerpt_length', 'mys_custom_excerpt_length', 999);
function mys_custom_excerpt_length($length)
{
	return 50;
}

# start with function
function startsWith($string, $startString)
{
	$len = strlen($startString);
	return (substr($string, 0, $len) === $startString);
}

# comment fields change
add_filter('comment_form_fields', 'al_move_comment_field_to_bottom', 10, 1);
function al_move_comment_field_to_bottom($fields)
{
	//$comment_field = $fields['comment'];
	unset($fields['comment']);
	unset($fields['url']);
	//$fields['comment'] = $comment_field;
	$fields['comment'] = '<p class="comment-form-comment col-md-12"><textarea id="comment" name="comment" placeholder="Type here.." aria-required="true"></textarea></p>';

	$fields['author'] = '<p class="comment-form-author col-md-6"><input type="text" id="author" name="author" placeholder="Name*" require="required" placeholder=""></p>';
	$fields['email'] = '<p class="comment-form-email col-md-6"><input id="email" name="email" placeholder="Email*" type="email" value="" size="30" maxlength="100" required=""></p>';

	unset($fields['cookies']);
	return $fields;
}


# add row before fields
function al_comment_form_before_fields()
{
	echo '<div class="row">';
}
add_action('comment_form_before_fields', 'al_comment_form_before_fields');

# close row before fields
function al_comment_form_after_fields()
{
	echo '</div>';
}
add_action('comment_form_after_fields', 'al_comment_form_after_fields');

# change comment forms
add_filter('comment_form_defaults', 'al_change_comment_form_submit_label');
function al_change_comment_form_submit_label($arg)
{
	$arg['label_submit'] = 'Post Comment »';
	 $arg['title_reply'] = 'Leave a Comment';
	 $arg['logged_in_as'] = '';
	 $arg['comment_notes_before'] = '';
	$arg['comment_notes_after'] = '<p class="recaptcha"> * This site is protected by reCAPTCHA and the Google <a href="https://policies.google.com/privacy" target="_blank">Privacy Policy</a> and <a href="https://policies.google.com/terms" target="_blank">Terms of Service</a> apply.</p>';
	return $arg;
}


# redirect to post page without die
class mys_Handle_Comment_Duplicate
{
	private $comment_post_id;
	public function __construct()
	{
		add_filter('preprocess_comment', [$this, 'mys_capture_post_id'], 10, 1);
		add_action('comment_flood_trigger', [$this, 'mys_handle_redirect'], 0, 0);
		add_action('comment_duplicate_trigger', [$this, 'mys_handle_redirect'], 0, 0);
	}

	public function mys_capture_post_id($comment)
	{
		$this->comment_post_id = isset($comment['comment_post_ID']) ? $comment['comment_post_ID'] : 0;
		return $comment;
	}

	public function mys_handle_redirect()
	{
		if (!empty($this->comment_post_id)) {
			wp_safe_redirect(get_permalink(get_post($this->comment_post_id)) . '?mys_duplicate_comment=yes#duplicate-msg');
			die();
		}
	}
}
new mys_Handle_Comment_Duplicate();

function mys_after_comment_listing_callback($post_id)
{
	if (isset($_GET['mys_duplicate_comment']) && !empty($_GET['mys_duplicate_comment'])) {
		if ($_GET['mys_duplicate_comment'] == 'yes') {
			echo '<div id="duplicate-msg" class="text-center mt-4">';
			echo '<span class="text-red font-md-24 text-primary">Duplicate comment detected; it looks as though you’ve already said that!</span>';
			echo '</div>';
		}
	}
}
add_action('mys_after_comment_listing', 'mys_after_comment_listing_callback');

# template redirect
add_action('template_redirect', 'al_page_template_redirect');
function al_page_template_redirect()
{
	if (is_page('lp')) {
		wp_redirect(home_url());
		exit();
	}
}

# Remove update options for WordPress and Plugins
add_action('init', 'mys_disable_update_for_live_and_staging');
function mys_disable_update_for_live_and_staging()
{
	if(site_url() == 'https://mintyourstore.com/' || site_url() == 'mintyourstostg.wpengine.com')
	{
		# hide plugin update
		add_filter('site_transient_update_plugins', '__return_false');

		# remove wordpress core update notification
		add_filter( 'pre_option_update_core', '__return_null' );
		remove_action( 'wp_version_check', 'wp_version_check' );
		remove_action( 'admin_init', '_maybe_update_core' );
		wp_clear_scheduled_hook( 'wp_version_check' );

	}
}