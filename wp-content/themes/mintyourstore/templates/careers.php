<?php

/**
 * The Custom template for Frontpage
 *
 * Template Name: Careers
 * 
 * @package Aureatelabs
 * @subpackage Aureatelabs
 * @since 1.0
 * @version 1.0
 */

get_header();

$dir_path = get_template_directory();
$dir_url = get_template_directory_uri();

# Banner Section
$banner_data = get_field('banner_data');
if(!empty($banner_data ))
{
    $background_image = isset($banner_data['background_image']) ? $banner_data['background_image'] : array();
    $title = isset($banner_data['title']) ? $banner_data['title'] : '';
    $content = isset($banner_data['content']) ? $banner_data['content'] : '';
    $sub_heading = isset($banner_data['sub_heading']) ? $banner_data['sub_heading'] : '';
    $cta = isset($banner_data['cta']) ? $banner_data['cta'] : array();
    $image = isset($banner_data['image']) ? $banner_data['image'] : array();

    if(!empty($background_image) || !empty($title) || !empty($content) || !empty($sub_heading) || !empty($cta) || !empty($image)) 
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

                            if(!empty($sub_heading))
                            {   ?>
                                    <p class=""><?php echo $sub_heading;?></p>
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
                                    $url = '#mys_open_positions';
                                    $cta_target = '';
                                }

                                if (!empty($url) && !empty($cta_title)) 
                                {   ?>
                                    <a class="btn btn-white" href="<?php echo $url; ?>" 
                                        <?php echo $cta_target; ?> title="<?php echo $cta_title; ?>">
                                        <?php echo $cta_title; ?>
                                        <svg width="12" class="ml-7" height="8" viewBox="0 0 12 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M11 1L6 6.29412L1 1" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
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

# Our Culture
$our_culture = get_field('our_culture');
if(!empty($our_culture))
{
    $heading = isset($our_culture['heading']) ? $our_culture['heading'] : '';
    $sub_heading = isset($our_culture['sub_heading']) ? $our_culture['sub_heading'] : '';
    $points = isset($our_culture['points']) ? $our_culture['points'] : array();
    if(!empty($heading) || !empty($sub_heading) || !empty($points))
    {   ?>
        <section class="why-choose-us-section py-40 py-md-60 py-lg-80">
            <div class="container">
                <?php 
                if(!empty($heading))
                {   ?>
                        <?php 
                        if(!empty($heading))
                        {   ?>
                            <div class="title-section text-center pb-20">
                                <h2 class="m-0"><?php echo $heading;?></h2>
                            </div>
                            <?php
                        }
                        if(!empty($sub_heading))
                        {   ?>
                                <p class="text-center pb-10 color-444444 m-0 font-16"><?php echo $sub_heading;?></p>
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
                                                            <div class="bg-F5F5F5 icon-section flex justify-content-center align-items-center mr-30 ml-xs-0">
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
                                                            <h4 class="text-left text-sm-center mb-10 color-222222"><?php echo $label;?></h4>
                                                            <?php
                                                        }
                                                        if (!empty($content)) 
                                                        {   ?>
                                                            <p class="text-left text-sm-center color-444444"><?php echo $content;?></p>
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
# Perks
$perks = get_field('perks');
if(!empty($perks))
{
    $heading = isset($perks['heading']) ? $perks['heading'] : '';
    $sub_heading = isset($perks['sub_heading']) ? $perks['sub_heading'] : '';
    $points = isset($perks['points']) ? $perks['points'] : array();
    if(!empty($heading) || !empty($sub_heading) || !empty($points))
    {
        ?>
        <section class="perk-section bg-light py-35 pt-md-80 pb-md-70">
            <div class="container">
                <?php 
                if(!empty($heading) || !empty($sub_heading))
                {   ?>
                        <?php 
                        if(!empty($heading))
                        {   ?>
                            <div class="title-section text-center pb-sm-10">
                                <h2><?php echo $heading;?></h2>
                            </div>
                            <?php
                        }
                        if(!empty($sub_heading))
                        {   ?>
                            <div class="sub-title-section">
                                <p class="text-center pb-20 pb-md-30 color-444444 m-0 font-16"><?php echo $sub_heading;?></p>
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
                                    if(!empty($icon) || !empty($label))
                                    {   ?>
                                        <div class="w-full col-sm-6 py-15 col-lg-4 py-15">
                                            <div class="box-content p-15 p-md-25 bg-white flex align-items-center">
                                                <?php
                                                if (!empty($icon)) 
                                                {
                                                    $svg_path = $dir_path . '/assets/icons/' . $icon . '.svg';
                                                    if (file_exists($svg_path)) {
                                                        $svg = $dir_url . '/assets/icons/' . $icon . '.svg';
                                                        if (!empty($svg)) 
                                                        {   ?>
                                                            <div class="icon-section mr-10 lh-0">
                                                                <img src="<?php echo $svg; ?>" alt="<?php echo strip_tags($label); ?>" title="<?php echo strip_tags($label); ?>" />
                                                            </div>
                                                            <?php
                                                        }
                                                    }
                                                }
                                                if (!empty($label)) 
                                                {   ?>
                                                    <p class="font-16 fw-500"><?php echo $label;?></p>
                                                    <?php
                                                }
                                                ?>
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

# Open Positions
$open_positions_data = get_field('open_positions_data');
if(!empty($open_positions_data))
{
    $section_label = isset($open_positions_data['section_label']) ? $open_positions_data['section_label'] : '';
    $Position_label = isset($open_positions_data['Position_label']) ? $open_positions_data['Position_label'] : '';
    $location_label = isset($open_positions_data['location_label']) ? $open_positions_data['location_label'] : '';
    $positions_details = isset($open_positions_data['positions_details']) ? $open_positions_data['positions_details'] : array();
    if(!empty($section_label) || !empty($Position_label) || !empty($location_label) || !empty($positions_details))
    {
        ?>
        <section class="our-positions-section py-35 py-md-80" id="mys_open_positions">
            <div class="container">
                <?php 
                if(!empty($section_label))
                {   ?>
                    <div class="title-section text-center pb-xs-20 pb-sm-40">
                        <h2 class="m-0"><?php echo $section_label;?></h2>
                    </div>
                    <?php
                }

                if(!empty($positions_details))
                {   ?>
                    <div class="points-section">
                        <?php
                        if(!empty($Position_label) || !empty($location_label))
                        {   ?>
                            <div class="row row-th align-items-center ">
                                <?php 
                                if(!empty($Position_label))
                                {   ?>
                                    <div class="col-sm-6">
                                        <?php echo $Position_label;?>
                                    </div>
                                    <?php
                                }
                                if(!empty($location_label))
                                {   ?>
                                    <div class="col-sm-6">
                                        <?php echo $location_label;?>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                            <?php
                        }
                    
                        foreach ($positions_details as $key => $point) 
                        {
                            $position = isset($point['position']) ? $point['position'] : '-';
                            $location = isset($point['location']) ? $point['location'] : '-';
                            $apply_button = isset($point['apply_button']) ? $point['apply_button'] : array();
                            if(!empty($position) || !empty($location) || !empty($apply_button))
                            {   ?>
                                    <div class="row row-td align-items-center">
                                    <?php
                                    if (!empty($position)) 
                                    {   ?>
                                        <div class="col-sm-6">
                                            <?php echo $position;?>
                                        </div>
                                        <?php
                                    }
                                    if (!empty($location)) 
                                    {   ?>
                                        <div class="col-sm-4">
                                            <?php echo $location;?>
                                        </div>
                                        <?php
                                    }
                                    if (!empty($apply_button)) 
                                    {   ?>
                                        <div class="col-sm-2 text-right">
                                            <?php 
                                            $cta_link = isset($apply_button['url']) ? $apply_button['url'] : '';
                                            $cta_title = isset($apply_button['title']) ? $apply_button['title'] : '';
                                            $cta_target = !empty($apply_button['target']) ? 'target="_blank"' : '';
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
                                            ?>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>
                                <?php
                            }
                        }
                        ?>
                    </div>
                    <?php
                }
                ?>
            </div>
        </section>
        <?php
    }
}

#RECRUITMENT PROCESS
$recruitment_process = get_field('recruitment_process');
if(!empty($recruitment_process))
{
    $sub_heading = isset($recruitment_process['sub_heading']) ? $recruitment_process['sub_heading'] : '';
    $heading = isset($recruitment_process['heading']) ? $recruitment_process['heading'] : '';
    $content = isset($recruitment_process['content']) ? $recruitment_process['content'] : '';
    $points = isset($recruitment_process['points']) ? $recruitment_process['points'] : array();
    if(!empty($sub_heading) || !empty($heading) || !empty($location_label) || !empty($points))
    {
        ?>
        <section class="recruitment-process-section bg-24282C py-35 py-md-80 color-CCCCCC">
            <div class="container">
                <div class="row">
                    <?php 
                    if(!empty($sub_heading) || !empty($heading) || !empty($content))
                    {   ?>
                        <div class="pb-xs-20 w-full col-sm-6">
                            <?php 
                            if(!empty($sub_heading))
                            {   ?>
                                <label class="color-E7B900 uppercase fw-700 font-14"><?php echo $sub_heading;?></label>
                                <?php
                            }

                            if(!empty($heading))
                            {   ?>
                                <h2 class="color-white pt-10 mb-25"><?php echo $heading;?></h2>
                                <?php
                            }
                            
                            if(!empty($content))
                            {   ?>
                                <p class="font-xs-14 font-md-16 elementor-widget-container"><?php echo $content;?></p>
                                <?php
                            }
                            ?>
                        </div>
                        <?php
                    }

                    if(!empty($points))
                    {   ?>
                        <div class="w-full col-sm-6">
                            <?php
                            $count = 1;
                            foreach ($points as $key => $point) 
                            {
                                $label = isset($point['label']) ? $point['label'] : '';
                                $content = isset($point['content']) ? $point['content'] : '';
                                if(!empty($label) || !empty($content))
                                {   ?>
                                    <div class="recruitment-row relative">
                                        <span class="text-A1A1A1 font-16 font-md-20">
                                            <?php echo str_pad( $count, 2, '0', STR_PAD_LEFT ).'.'; ?>
                                        </span>
                                        <?php
                                        if (!empty($label)) 
                                        {   ?>
                                            <h3><?php echo $label;?></h3>
                                            <?php
                                        }
                                        if (!empty($content)) 
                                        {   ?>
                                            <p><?php echo $content;?></p>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                    <?php
                                    $count++;
                                }
                            }
                            ?>
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

# contact form section
$contact_form_detail = get_field('contact_form_detail');
if(!empty($contact_form_detail))
{
    $heading = isset($contact_form_detail['heading']) ? $contact_form_detail['heading'] : '';
    $content = isset($contact_form_detail['content']) ? $contact_form_detail['content'] : '';
    $form = isset($contact_form_detail['form']) ? $contact_form_detail['form'] : '';
    if(!empty($form) || !empty($heading) || !empty($location_label))
    {
        ?>
        <section class="contact-section py-35 py-md-80" id="mys_footer_contactform">
            <div class="container">
                <div class="recruitment-box">
                    <?php 
                    if(!empty($form) || !empty($heading) || !empty($content))
                    { 
                        if(!empty($heading))
                        {   ?>
                            <div class="title-section text-center pb-0">
                                <h2 class="mb-xs-10 mb-sm-20"><?php echo $heading;?></h2>
                            </div>
                            <?php
                        }
                        
                        if(!empty($content))
                        {   ?>
                            <p class="text-center color-666666 font-18 pb-xs-25 pb-sm-35"><?php echo $content;?></p>
                            <?php
                        }
                        if(!empty($form)) 
                        {   ?>
                            <div class="contact-form-wrap">
                                <?php
                                $title = get_the_title($form);
                                echo do_shortcode('[contact-form-7 id="' . $form . '" title="' . $title . '"]');
                                ?>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </section>
        <?php
    }
}
get_footer();