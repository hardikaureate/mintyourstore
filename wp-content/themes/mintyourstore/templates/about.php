<?php

/**
 * The Custom template for Frontpage
 *
 * Template Name: About
 * 
 * @package Aureatelabs
 * @subpackage Aureatelabs
 * @since 1.0
 * @version 1.0
 */

get_header();

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
                        <div class="col-sm-6 banner-left">
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
                        <div class="col-sm-6 banner-right">
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

# About us
$about_us = get_field('about_us');
if(!empty($about_us))
{
    $heading = isset($about_us['heading']) ? $about_us['heading'] : '';
    $content = isset($about_us['content']) ? $about_us['content'] : '';
    if(!empty($heading) || !empty($content))
    {   ?>
        <section class="about-section py-50">
            <div class="container">
                <div class="about-top bg-F5F5F5">
                    <?php 
                    if(!empty($heading) || !empty($content))
                    {   ?>
                        <?php 
                        if(!empty($heading))
                        {   ?>
                            <h2><?php echo $heading;?></h2>
                            <?php
                        }
                        
                        if(!empty($content))
                        {   ?>
                            <p class="color-444444"><?php echo $content;?></p>
                            <?php
                        }
                        ?>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </section>
        <?php
    }
}

# Why Choose Us
$why_choose_us = get_field('why_choose_us');
if(!empty($why_choose_us))
{
    $heading = isset($why_choose_us['heading']) ? $why_choose_us['heading'] : '';
    $points = isset($why_choose_us['points']) ? $why_choose_us['points'] : array();
    if(!empty($heading) || !empty($points))
    {
        $dir_path = get_template_directory();
        $dir_url = get_template_directory_uri();
        ?>
        <section class="why-choose-us-section py-30">
            <div class="container">
                <?php 
                if(!empty($heading))
                {   ?>
                        <?php 
                        if(!empty($heading))
                        {   ?>
                            <div class="title-section text-center pb-35">
                                <h2><?php echo $heading;?></h2>
                            </div>
                            <?php
                        }
                        
                        if(!empty($points))
                        {   ?>
                            <div class="row">
                                <?php
                                foreach ($points as $key => $point) 
                                {
                                    $icon = isset($point['icon']) ? $point['icon'] : '';
                                    $label = isset($point['label']) ? $point['label'] : '';
                                    $content = isset($point['content']) ? $point['content'] : '';
                                    if(!empty($icon) || !empty($label) || !empty($content))
                                    {   ?>
                                        <div class="w-full col-sm-6 py-15">
                                            <div class="col_box p-25 flex h-full bg-FBFBFB">
                                                <?php
                                                if (!empty($icon)) 
                                                {
                                                    $svg_path = $dir_path . '/assets/icons/' . $icon . '.svg';
                                                    if (file_exists($svg_path)) {
                                                        $svg = $dir_url . '/assets/icons/' . $icon . '.svg';
                                                        if (!empty($svg)) 
                                                        {   ?>
                                                            <div class="bg-F5F5F5 icon-section flex justify-content-center align-items-center mr-30">
                                                                <img src="<?php echo $svg; ?>" alt="<?php echo strip_tags($label); ?>" title="<?php echo strip_tags($label); ?>" />
                                                            </div>
                                                            <?php
                                                        }
                                                    }
                                                }
                                                ?>
                                                <div class="box-content ">
                                                    <?php  if (!empty($label)) 
                                                        {   ?>
                                                            <h4 class="mb-10 color-222222"><?php echo $label;?></h4>
                                                            <?php
                                                        }
                                                        if (!empty($content)) 
                                                        {   ?>
                                                            <p class="color-444444"><?php echo $content;?></p>
                                                            <?php
                                                        }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                }
                                ?>
                            </div>
                            <?php
                        }
                        ?>
                    <?php
                }
                ?>
            </div>
        </section>
        <?php
    }
}

# Our Process
$our_process = get_field('data_of_our_peocess');

if(!empty($our_process))
{
    $heading = isset($our_process['heading']) ? $our_process['heading'] : '';
    $sub_heading = isset($our_process['sub_heading']) ? $our_process['sub_heading'] : '';
    $image = isset($our_process['image']) ? $our_process['image'] : array();
    if(!empty($heading) || !empty($sub_heading) || !empty($image))
    {
        ?>
        <section class="our-process bg-F5F5F5 py-50 text-center">
            <div class="container">
                        <?php 
                        if(!empty($heading))
                        {   ?>
                            <div class="title-section">
                                <h2 class="mb-8"><?php echo $heading;?></h2>
                            </div>
                            <?php
                        }
                        if(!empty($sub_heading))
                        {   ?>
                            <div class="sub-title-section color-888888 pb-40 font-22">
                                <?php echo $sub_heading;?>
                            </div>
                            <?php
                        }
                        if(!empty($image))
                        {   ?>
                            <div class="image-section">
                               <?php echo wp_get_attachment_image($image,'full'); ?>
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
get_footer();