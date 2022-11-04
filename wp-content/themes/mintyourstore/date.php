<?php
get_header();

# Banner Section
$banner_data = get_field('banner_data', 'options');
if(!empty($banner_data ))
{
    $background_image = isset($banner_data['background_image']) ? $banner_data['background_image'] : array();
    $title = isset($banner_data['title']) ? $banner_data['title'] : '';
    $sub_title = isset($banner_data['sub_title']) ? $banner_data['sub_title'] : '';
    $content = isset($banner_data['content']) ? $banner_data['content'] : '';
    $cta = isset($banner_data['cta']) ? $banner_data['cta'] : array();
    $image = isset($banner_data['image']) ? $banner_data['image'] : array();

    if(!empty($background_image) || !empty($title) || !empty($content) || !empty($sub_title) || !empty($cta) || !empty($image)) 
    {
        $bg_image = '';
        if(!empty($background_image))
        {
            $bg_image = 'style="background-image:url('.$background_image.');"';
        }
        ?>
        <section class="banner-section" <?php echo $bg_image;?>>
            <div class="container">
                <div class="row">
                    <?php 
                    if(!empty($title) || !empty($content) ||  !empty($sub_title) || !empty($cta))
                    {   ?>
                        <div class="w-full col-sm-6 banner-left">
                            <?php 
                            if(!empty($title))
                            {   ?>
                                <label class="fw-600 block mb-10 font-20"><?php echo $title;?></label>
                                <?php
                            }

                            if(!empty($sub_title))
                            {   ?>
                                <h1><?php echo $sub_title;?></h1>
                                <?php
                            }
                            
                            if(!empty($content))
                            {   ?>
                                <p><?php echo $content;?></p>
                                <?php
                            }
                            if (!empty($cta))
                            {
                                $cta_link = isset($cta['url']) ? $cta['url'] : '';
                                $cta_title = isset($cta['title']) ? $cta['title'] : '';
                                $cta_target = !empty($cta['target']) ? 'target="_blank"' : '';

                                $cta_link = filter_var($cta_link, FILTER_SANITIZE_URL);
                                if (filter_var($cta_link, FILTER_VALIDATE_URL) !== false) 
                                {
                                    $url = esc_url($cta_link);
                                }
                                else
                                {
                                    $url = '#mys_footer_contactform';
                                    $cta_target = '';
                                }

                                if (!empty($url) && !empty($cta_title)) 
                                {   ?>
                                    <a class="btn btn-white" href="<?php echo $url; ?>" <?php echo $cta_target; ?> title="<?php echo $cta_title; ?>">
                                        <?php echo $cta_title; ?>
                                    </a>
                                    <?php 
                                }
                            }?>

                        </div>
                        <?php
                    } 
                    
                    if(!empty($image))
                    {   ?>
                        <div class="w-full col-sm-6  banner-right">
                            <img src="<?php echo $image['url']; ?>" title="<?php echo $image['title'] ?>" alt="<?php echo $image['alt'] ?>">
                        </div>
                        <?php
                    } 
                    ?>
                </div>
            </div>
        </section>
        <?php
    }
}
?>
<!-- blog listing -->
<section class="blog-listing py-xs-35 py-sm-50">
    <div class="container">
            <?php
            $blog_options = get_field('blog_options', 'options');
            if (!empty($blog_options)) 
            {   ?>
                <div class="blog-catgeory-wrap">
                    <?php
                        echo '<a class="blog-catgeory-btn active" href="' . home_url(). '/blog/" data-blog_cat="0" id="cat_0">All</a>';
                        $selected_terms = isset($blog_options['selected_featured_categories']) ? $blog_options['selected_featured_categories'] : array();
                        if (!empty($selected_terms)) {
                            $terms = get_terms('category', array('include' => $selected_terms, 'hide_empty' => 0, 'orderby' => 'include', 'parent' => 0));
                            if ($terms) {
                                foreach ($terms as $key => $term) {
                                    $active_class = '';
                                    if($cat_id == $term->term_id)
                                    {
                                        $active_class = 'active';
                                    }
                                    echo '<a href="'.esc_url(get_term_link($term)).'" class="blog-catgeory-btn '.$active_class.'" data-blog_cat="'.$term->term_id.'" id="cat_'.$term->term_id.'">' . $term->name . '</a>';
                                }
                            }
                        }
                    ?>
                </div>
                <?php
            }
            ?>
            <div class="row">
                <div class="col-sm-9">
                    <?php
                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                    echo mys_posts_listing(10,$paged);
                    ?>
                </div>
                <?php 
                if ( is_active_sidebar( 'sidebar-1' ) ) 
                {   ?>
                    <div class="col-sm-3 archives-sidebar-wrap">
                        <label class="archives-sidebar-label">Archives</label>
                        <div class="archives-sidebar">
                            <?php 
                            dynamic_sidebar( 'sidebar-1' );
                            ?>
                        </div>
                    </div>
                    <?php 
                } ?>
            </div>
        </div>
</section>
        <?php
get_footer();