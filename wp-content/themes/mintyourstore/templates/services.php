<?php
/**
 * The Custom template for Frontpage
 *
 * Template Name: Services
 * 
 * @package Aureatelabs
 * @subpackage Aureatelabs
 * @since 1.0
 * @version 1.0
 */

use function Complex\divideby;

get_header();

#our Services
$our_services = get_field('our_services');

# Banner Section
$banner_data = get_field('banner_data');
if(!empty($banner_data ))
{
    $background_image = isset($banner_data['background_image']) ? $banner_data['background_image'] : array();
    $title = isset($banner_data['title']) ? $banner_data['title'] : '';
    $content = isset($banner_data['content']) ? $banner_data['content'] : '';
    $cta = isset($banner_data['cta']) ? $banner_data['cta'] : array();
    $image = isset($banner_data['image']) ? $banner_data['image'] : array();

    if(!empty($background_image) || !empty($title) || !empty($content) || !empty($cta) || !empty($image)) 
    {
        $bg_image = '';
        if(!empty($background_image))
        {
            $bg_image = 'style="background-image:url('.$background_image.');"';
        }
        ?>
        <section class="banner-section bg-overlay" <?php echo $bg_image;?>>
            <div class="container">
                <div class="row">
                    <?php 
                    if(!empty($title) || !empty($content) || !empty($cta))
                    {   ?>
                        <div class="banner-left col-6">
                            <?php 
                            if(!empty($title))
                            {   ?>
                                <h1><?php echo $title;?></h1>
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
                                    <a class="btn btn-dark-hover font-weight-medium uppercase" href="<?php echo $url; ?>" 
                                        <?php echo $cta_target; ?> title="<?php echo $cta_title; ?>">
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
                        <div class="banner-right col-6 text-right pl-50">
                            <img src="<?php echo $image['url']; ?>" title="<?php echo $image['title'] ?>" alt="<?php echo $image['alt'] ?>">
                        </div>
                        <?php
                    } 
                    ?>
                </div>
                <div class="banner-blocks pt-50">
                    <?php 
                    if(!empty($our_services ))
                    {
                        $services = isset($our_services['services']) ? $our_services['services'] : array(); 
                        if(!empty($services))
                        {
                            ?>
                            <div class="banner-blocks-inner flex flex-wrap flex-lg-nowrap align-items-center justify-lg-content-between ">
                                <?php 
                                foreach ($services as $key => $service) 
                                {?>
                                    <div class="banner-blocks-single flex-sm align-items-center p-15 p-sm-25 mb-xs-15 mb-30 rounded-medium">                        
                                    <?php
                                    $tab_name = isset($service['tab_name']) ? $service['tab_name'] : '';
                                    if(!empty($tab_name))
                                    {
                                        $string = str_replace(' ', '-', $tab_name);
                                        $tar_id =  preg_replace('/[^A-Za-z0-9\-]/', '', $string); 
                                        ?>
                                        <svg class="mb-xs-10 mr-sm-15 va-xs-middle" xmlns="http://www.w3.org/2000/svg" width="31" height="31" viewBox="0 0 31 31" fill="none"><path d="M15.5 1C23.508 1 30 7.492 30 15.5C30 23.508 23.508 30 15.5 30C7.492 30 1 23.508 1 15.5C1 7.492 7.492 1 15.5 1Z" stroke="white" stroke-width="1.5"></path><path d="M14.292 18.521L10.667 15.5L14.013 19.729L21.542 12.479L14.292 18.521Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                                        <a class="text-xs-center d-xs-block font-16 color-white lh-1-2" href="<?php echo "#".strtolower($tar_id); ?>"><?php echo $tab_name; ?></a>
                                        <?php    
                                    }
                                    ?>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                            <?php
                        }
                    }?>
                </div>
            </div>
        </section>
        <?php
    }
}

# Our Shopify Services
if(!empty($our_services ))
{
    $title = isset($our_services['title']) ? $our_services['title'] : '';
    $content = isset($our_services['content']) ? $our_services['content'] : '';
    $services = isset($our_services['services']) ? $our_services['services'] : array();
    if(!empty($title) || !empty($content) || !empty($services)) 
    {   ?>
        <section class="our-services-section py-40 py-md-60 py-lg-80">
            <div class="container">
                
                    <?php 
                    if(!empty($title) || !empty($content))
                    {   ?>
                        <div class="heading-section mb-20 mb-md-40">
                            <?php 
                                if(!empty($title))
                                {   ?>
                                    <h2 class="text-center"><?php echo $title;?></h2>
                                    <?php
                                }
                                if(!empty($content))
                                {   ?>
                                    <p class="section-subtitle text-center"><?php echo $content;?></p>
                                    <?php
                                }
                            ?>
                        </div>
                        <?php
                    }
                    
                    if(!empty($services))
                    {   ?>
                            <div class="services-blocks">
                                <?php 
                                foreach ($services as $key => $service) 
                                {
                                    $heading = isset($service['heading']) ? $service['heading'] : '';
                                    $content = isset($service['content']) ? $service['content'] : '';
                                    $cta = isset($service['cat']) ? $service['cat'] : '';
                                    $point_content = isset($service['point_content']) ? $service['point_content'] : '';
                                    $tab_name = isset($service['tab_name']) ? $service['tab_name'] : '';
                                    
                                    if(!empty($label) || !empty($content) || !empty($cta) || !empty($points))
                                    {
                                        $sec_id = '';
                                        if(!empty($tab_name))
                                        {
                                            $string = str_replace(' ', '-', $tab_name);
                                            $sec_id =  strtolower(preg_replace('/[^A-Za-z0-9\-]/', '', $string)); 
                                        }  
                                        ?>
                                            <div class="services-block p-30 p-sm-50 bg-F1F8FA mb-40">
                                                <div class="row service-item" id="<?php echo $sec_id; ?>">
                                                    <?php 
                                                    if(!empty($heading) || !empty($content) || !empty($cta))
                                                    { 
                                                        $cta_link =  $cta_title  = $cta_target = '';
                                                        if (!empty($cta))
                                                        {
                                                            $cta_link = isset($cta['url']) ? $cta['url'] : '';
                                                            $cta_title = isset($cta['title']) ? $cta['title'] : '';
                                                            $cta_target = !empty($cta['target']) ? 'target="_blank"' : '';
                                                        }
                                                        ?>
                                                        <div class="col-sm-6 pr-sm-50">
                                                                <?php 
                                                                if(!empty($heading))
                                                                { ?>
                                                                    <h3 class="font-20 font-md-22 font-lg-24 lh-1-4 mb-10">
        
                                                                        <?php
                                                                        if (!empty($cta_link) && !empty($cta_title)) 
                                                                        {   ?>
                                                                            <a class="color-222222" href="<?php echo $cta_link; ?>"<?php echo $cta_target; ?> title="<?php echo $cta_title; ?>">
                                                                            <?php 
                                                                        }
                                                                        echo $heading;
                                                                        if (!empty($cta_link) && !empty($cta_title)) 
                                                                        {   ?>
                                                                            </a>
                                                                            <?php 
                                                                        } 
                                                                        ?>
                                                                    </h3>
                                                                    <?php
                                                                }
                                                                if(!empty($content))
                                                                {   ?>
                                                                    <p class="font-15 font-sm-16 lh-1-5 lh-sm-1-7 fw-400 color-444444 mb-20"><?php echo $content;?></p>
                                                                    <?php
                                                                }
                                                                
                                                                if (!empty($cta_link) && !empty($cta_title)) 
                                                                {   ?>
                                                                    <a class="btn mb-xs-10" href="<?php echo $cta_link; ?>"<?php echo $cta_target; ?> title="<?php echo $cta_title; ?>">
                                                                        <?php echo $cta_title; ?>
                                                                    </a>
                                                                    <?php 
                                                                }
                                                                ?>
                                                        </div>
                                                        <?php
                                                    }
                                                    if(!empty($point_content))
                                                    {   ?>
                                                        <div class="col-sm-6 pl-sm-50 checkdash-full">
                                                            <?php
                                                                echo $point_content;
                                                            ?>
                                                        </div>
                                                        <?php
                                                    } 
                                                    ?>
                                                </div>
                                            </div>
                                        <?php
                                    }
                                }  ?>
                            </div>
                        <?php 
                    }
                    ?>
                
            </div>
        </section>
        <?php
    }
}

# Testimonials
$testimonials_details = get_field('testimonials_details');
if(!empty($testimonials_details ))
{
    $title = isset($testimonials_details['title']) ? $testimonials_details['title'] : '';
    $content = isset($testimonials_details['content']) ? $testimonials_details['content'] : '';
    $testimonial = isset($testimonials_details['testimonial']) ? $testimonials_details['testimonial'] : array();
    if(!empty($title) || !empty($content) || !empty($testimonial)) 
    {   ?>
        <section class="testimonials-section pb-40 pb-md-60 pb-lg-80">
            <div class="container">
                <?php 
                    if(!empty($title) || !empty($content))
                    {   ?>
                        <div class="heading-section mb-20 mb-md-40">
                            <?php 
                            if(!empty($title))
                            {   ?>
                                <h2 class="text-center mb-5 mb-sm-10"><?php echo $title;?></h2>
                                <?php
                            }
                            if(!empty($content))
                            {   ?>
                                <p class="section-subtitle text-center"><?php echo $content;?></p>
                                <?php
                            }
                            ?>
                        </div>
                        <?php
                    }
                ?>
                <?php 
                if(!empty($testimonial))
                {
                    $name = isset($testimonial['name']) ? $testimonial['name'] : '';
                    $tm_content = isset($testimonial['testimonials_content']) ? $testimonial['testimonials_content'] : '';
                    $rating = isset($testimonial['rating']) ? $testimonial['rating'] : '';
                    $photo = isset($testimonial['photo']) ? $testimonial['photo'] : '';
                    if(!empty($name)  || !empty($photo) || !empty($tm_content) || !empty($rating)) 
                    {   ?>
                        <div class="testimonial-block flex-sm p-30 p-sm-40 b-1-solid-DDDDDD rounded-medium">
                            <?php 
                            if(!empty($photo))
                            {   ?>
                                <div class="testimonial-image">
                                    <?php  echo wp_get_attachment_image($photo,'full', '', array('class'=>'rounded-medium'));  ?>
                                </div>
                                <?php
                            }
                            if(!empty($name) || !empty($tm_content) || !empty($rating)) 
                            {   ?>
                                <div class="testimonial-content pl-sm-35 pr-sm-10 mt-xs-30">
                                    <?php
                                    if(!empty($name))
                                    {   ?>
                                        <h3 class="font-20 font-sm-22 fw-600 lh-1-6 color-222222 mb-5" ><?php echo $name;?></h3>
                                        <?php
                                    }
                                    if(!empty($rating))
                                    {   ?>
                                        <div class="testimonial-star flex">
                                            <?php 
                                            for($i=1;$i<=5;$i++)
                                            {
                                                if($i<=$rating)
                                                {
                                                    $url = get_template_directory_uri().'/assets/images/single-star.svg';
                                                    
                                                }
                                                else
                                                {
                                                    $url = get_template_directory_uri().'/assets/images/single-star-empty.svg';
                                                }
                                                ?>
                                                <img src="<?php echo $url; ?>" title="Star" alt="Star" width="22" height="20"/>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                        <?php
                                    }
                                    if(!empty($tm_content))
                                    {   ?>
                                        <p class="testimonial-paragraph font-15 font-sm-16 color-222222 lh-1-7 mb-0 mt-25"><?php echo $tm_content;?></p>
                                        <?php
                                    }
                                    ?>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                        <?php
                    }
                }?>
            </div>
        </section>
        <?php
    }
}

# Our Process
$our_process = get_field('our_process');
if(!empty($our_process ))
{
    $heading = isset($our_process['heading']) ? $our_process['heading'] : '';
    $sub_heading = isset($our_process['sub_heading']) ? $our_process['sub_heading'] : '';
    $points = isset($our_process['points']) ? $our_process['points'] : array();
    if(!empty($heading) || !empty($sub_heading) || !empty($points))
    {   ?>
        <section class="our-process-section pt-40 pt-md-60 pt-lg-80  pb-20 pb-md-40 pb-lg-60 bg-F5F5F5">
            <div class="container">
                <?php 
                 if(!empty($heading) || !empty($sub_heading))
                 {
                ?>
                    <div class="heading-section mb-25 mb-sm-40 mb-md-50">
                        <?php 
                            if(!empty($heading))
                            {   ?>
                                <div class="title-section text-center mb-5 mb-sm-10">
                                    <h2><?php echo $heading;?></h2>
                                </div>
                                <?php
                            }
                            if(!empty($sub_heading))
                            {   ?>
                                <p class="section-subtitle text-center"><?php echo $sub_heading;?></p>
                                <?php
                            }
                        ?>
                    </div>
                <?php } 
                if(!empty($points))
                    {?>
                <div class="points-section">
                    <div class="row">
                        <?php
                        $count = 1;
                        $dir_path = get_template_directory();
                        $dir_url = get_template_directory_uri();
                        foreach ($points as $key => $point) 
                        {
                            $icon = isset($point['icon']) ? $point['icon'] : '';
                            $label = isset($point['label']) ? $point['label'] : '';
                            $content = isset($point['content']) ? $point['content'] : '';
                            if(!empty($icon) || !empty($label) || !empty($content))
                            {   ?>
                                <div class="points-item col-sm-6 col-md-4 mb-20">
                                    <div class="points-item-inner bg-white b-1-solid-DDDDDD rounded-medium p-30 relative h-full">
                                        <span class="point-digit color-F5F5F5 font-16 font-md-20 absolute">
                                            <?php echo str_pad( $count, 2, '0', STR_PAD_LEFT ); ?>
                                        </span>
                                        <?php
                                        if (!empty($icon)) 
                                        {
                                            $svg_path = $dir_path . '/assets/icons/' . $icon . '.svg';
                                            if (file_exists($svg_path)) {
                                                $svg = $dir_url . '/assets/icons/' . $icon . '.svg';
                                                if (!empty($svg)) 
                                                {   ?>
                                                    <div class="icon-section mb-20 lh-1">
                                                        <img src="<?php echo $svg; ?>" alt="<?php echo strip_tags($label); ?>" title="<?php echo strip_tags($label); ?>" />
                                                    </div>
                                                    <?php
                                                }
                                            }
                                        }
                                        if (!empty($label)) 
                                        {   ?>
                                            <h3 class="font-20 font-sm-22 font-md-24 color-222222 lh-1-1 mb-xs-15 mb-10"><?php echo $label;?></h3>
                                            <?php
                                        }
                                        if (!empty($content)) 
                                        {   ?>
                                            <p class="font-15 font-sm-16 color-222222 lh-xs-1-5 lh-1-7"><?php echo $content;?></p>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                                <?php
                                    $count++;
                            }
                        }
                        ?>
                    </div>
                </div>
                <?php
                    }
                ?>
            </div>
        </section>
        <?php
    }
}

# CTA Section
$cta = get_field('cta');
if(!empty($cta ))
{
    get_template_part('template-parts/content', 'cta_section', $cta);
}

get_template_part('template-parts/content', 'contact-form');

get_footer();