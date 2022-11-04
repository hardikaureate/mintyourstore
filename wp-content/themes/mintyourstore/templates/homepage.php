<?php

/**
 * The Custom template for Frontpage
 *
 * Template Name: Homepage
 * 
 * @package Aureatelabs
 * @subpackage Aureatelabs
 * @since 1.0
 * @version 1.0
 */

get_header();
$dir_path = get_template_directory();
$dir_url = get_template_directory_uri();
?>
<?php
# Banner Section
$banner_data = get_field('s1_banner');
if (!empty($banner_data)) {
    $background_image = isset($banner_data['s1_banner_bg_image']) ? $banner_data['s1_banner_bg_image'] : array();
    $title = isset($banner_data['s1_title']) ? $banner_data['s1_title'] : '';
    $booster_image = isset($banner_data['s1_booster_image']) ? $banner_data['s1_booster_image'] : array();
    $buttons = isset($banner_data['s1_buttons']) ? $banner_data['s1_buttons'] : array();
    $cta = isset($banner_data['s1_cta']) ? $banner_data['s1_cta'] : array();

    if (!empty($background_image) || !empty($title) || !empty($buttons) || !empty($cta)) {
        $bg_image = '';
        if (!empty($background_image)) {
            $bg_image = 'style="background-image:url(' . $background_image . ');"';
        }
?>
        <section class="banner-section" <?php echo $bg_image; ?>>
            <div class="container">
                <div class="banner-content">
                    <?php
                    if (!empty($title) || !empty($buttons) || !empty($cta)) { ?>
                        
                    <?php if (!empty($title)) { ?>
                        <h1 class="mt-0 font-32 font-sm-40 mb-30"><?php echo $title; ?></h1>
                    <?php } ?>
                        
                    <div class="shopify-plus">
                        <?php foreach ($buttons as $key => $button) {
                            $s1_btn_icon = isset($button['s1_btn_icon']) ? $button['s1_btn_icon'] : '';
                            $s1_button_link = isset($button['s1_button_link']) ? $button['s1_button_link'] : array();
        
                            if (!empty($s1_button_link)) {
                                $CTA_link = isset($s1_button_link['url']) ? $s1_button_link['url'] : '';
                                $CTA_title = isset($s1_button_link['title']) ? $s1_button_link['title'] : '';
                                $CTA_target = !empty($s1_button_link['target']) ? 'target="_blank"' : '';
                                if (!empty($CTA_link)) {   ?>
                                    <a class="d-inline-block" aria-label="<?php echo $CTA_title; ?>" href="<?php echo esc_url($CTA_link); ?>" <?php echo $CTA_target; ?>>
                                    <?php } ?>
                                <?php } ?>
        
                                <?php if (!empty($s1_btn_icon)) {
                                    $svg_path = $dir_path . '/assets/icons/' . $s1_btn_icon . '.svg';
                                    if (file_exists($svg_path)) {
                                        $svg = $dir_url . '/assets/icons/' . $s1_btn_icon . '.svg';
                                        if (!empty($svg)) { ?>
                                            <img class="py-10 px-15  py-sm-13 px-sm-20 bg-hover-222222" src="<?php echo $svg; ?>" title="<?php echo $CTA_title; ?>" alt="<?php echo $CTA_title; ?>" />
                                        <?php } ?>
                                    <?php } ?>
                                <?php } else { ?>
                                    <?php echo $CTA_title; ?>
                                <?php } ?>
        
                                <?php if (!empty($s1_button_link)) {
                                    $CTA_link = isset($s1_button_link['url']) ? $s1_button_link['url'] : '';
                                    $CTA_title = isset($s1_button_link['title']) ? $s1_button_link['title'] : '';
                                    $CTA_target = !empty($s1_button_link['target']) ? 'target="_blank"' : '';
                                    if (!empty($CTA_link)) {   ?>
                                    </a>
                                <?php } ?>
                            <?php } ?>
                        <?php } ?>
                    </div>
    
                    <?php
                    if (!empty($cta)) {
                        $cta_link = isset($cta['url']) ? $cta['url'] : '';
                        $cta_title = isset($cta['title']) ? $cta['title'] : '';
                        $cta_target = !empty($cta['target']) ? 'target="_blank"' : '';
    
                        $cta_link = filter_var($cta_link, FILTER_SANITIZE_URL);
                        if (filter_var($cta_link, FILTER_VALIDATE_URL) !== false) {
                            $url = esc_url($cta_link);
                        } else {
                            $url = '#mys_footer_contactform';
                            $cta_target = '';
                        }
    
                        if (!empty($url) && !empty($cta_title)) {   ?>
                            <a class="banner-btn btn btn-white font-16 font-sm-18 text-decoration-none mt-40 mt-sm-60" href="<?php echo $url; ?>" <?php echo $cta_target; ?> title="<?php echo $cta_title; ?>">
                                <?php echo $cta_title; ?>
                            </a>
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
        </section>
    <?php } ?>
<?php } ?>
<?php } ?>

<?php
# About us
$about_us = get_field('s2_about_data');
if (!empty($about_us)) {
    $title = isset($about_us['s2_title']) ? $about_us['s2_title'] : '';
    $subTitle = isset($about_us['s2_sub_title']) ? $about_us['s2_sub_title'] : '';
    $description = isset($about_us['s2_description']) ? $about_us['s2_description'] : '';
    $image = isset($about_us['s2_about_image']) ? $about_us['s2_about_image'] : array();
    $counter = isset($about_us['s2_counter']) ? $about_us['s2_counter'] : array();
    $brand_slider = isset($about_us['brand_slider']) ? $about_us['brand_slider'] : array();

    if (!empty($title) || !empty($subTitle) || !empty($description) || !empty($image)) { ?>
        <section class="about-section py-40 py-md-60 py-lg-90">
            <div class="container">
                <div class="heading-section mb-20 mb-md-40">
                    <?php
                    if (!empty($title) || !empty($subTitle) || !empty($description) || !empty($image)) {   ?>
                    <?php if (!empty($title)) { ?>
                        <h2 class="text-center"><?php echo $title; ?></h2>
                    <?php } ?>

                    <?php if (!empty($subTitle)) { ?>
                        <p class="section-subtitle text-center"><?php echo $subTitle; ?></p> 
                    <?php } ?>
                </div>
                <div class="row mt-xs-0 mt-sm-50">
                    <div class="col-sm-6">
                        <div class="color-444444 font-16 font-md-18" >
                            <?php if (!empty($description)) { ?>
                                <?php echo $description; ?>
                            <?php } ?>
                        </div>
                        <div class="counter flex justify-content-center mt-30 bg-FBFBFB rounded-medium">
                            <?php if (!empty($counter)) { ?>
                                <?php foreach ($counter as $key => $counter_data) {
                                        $c_digit = isset($counter_data['s2_counter_digit']) ? $counter_data['s2_counter_digit'] : '';
                                        $c_text = isset($counter_data['s2_counter_text']) ? $counter_data['s2_counter_text'] : '';
                                        $c_options = isset($counter_data['s2_add_plus_sign']) ? $counter_data['s2_add_plus_sign'] : ''; ?>
                                    <div class="counter-single w-half p-20 p-sm-30 text-center color-222222">
                                        <?php if (!empty($c_digit) || !empty($c_text)) { ?>
                                            <?php if (!empty($c_digit)) { ?>
                                                <div class="counting  font-30 fw-500">
                                                    <span data-counter="<?php echo $c_digit; ?>">0</span>
                                                    <?php if (!empty($c_options)) { ?>
                                                        <?php echo '+'; ?>
                                                    <?php } ?>
                                                </div>
                                            <?php } ?>
                                            <div class="counting-text font-xs-16 ">
                                                <?php if (!empty($c_text)) { ?>
                                                    <?php echo $c_text; ?>
                                                <?php } ?>
                                            </div>
                                        <?php } ?>
                                    </div>
                                <?php } ?>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <?php if (!empty($image)) { ?>
                            <div class="image-section mt-40 mt-sm-0 text-xs-center">
                                <?php echo wp_get_attachment_image($image, 'full'); ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </section>
    <?php } ?>
<?php } ?>

<div class="slider-section pb-60">
    <div class="container">
        <?php
            if (!empty($brand_slider)) { ?>
            <div class="items">
                <?php foreach ($brand_slider as $key => $brand_slider_img) :
                    $brand_image = isset($brand_slider_img['s2_brand_image_list']) ? $brand_slider_img['s2_brand_image_list'] : '';
                ?>
                    <?php if (!empty($brand_image)) { ?>
                        <div class="item">
                            <img src="<?php echo $brand_image['url']; ?>" height="<?php echo $brand_image['url']; ?>" width="<?php echo $brand_image['url']; ?>">
                        </div>
                    <?php } ?>
                <?php
                endforeach; ?>
        
            </div>
        <?php } ?>
        <?php } ?>
    </div>
</div>


<?php
# We Serve
$we_server_section = get_field('s3_we_server_section');
if (!empty($we_server_section)) {
    $s3_title = isset($we_server_section['s3_title']) ? $we_server_section['s3_title'] : '';
    $s3_description = isset($we_server_section['s3_description']) ? $we_server_section['s3_description'] : '';
    $s3_serve_list = isset($we_server_section['s3_serve_list']) ? $we_server_section['s3_serve_list'] : array();
    $s3_view_all_btn = isset($we_server_section['s3_view_all_button']) ? $we_server_section['s3_view_all_button'] : array();

    if (!empty($s3_title) || !empty($s3_description) || !empty($s3_serve_list) || !empty($s3_view_all_btn)) { ?>
        <section class="we-serve-section bg-light py-40 py-md-60">
            <div class="container">
                <div class="heading-section mb-20 mb-md-40">
                    <?php if (!empty($s3_title)) { ?>
                        <h2 class="text-center"><?php echo $s3_title; ?></h2>
                    <?php } ?>
    
                    <?php if (!empty($s3_description)) { ?>
                        <p class="section-subtitle text-center"><?php echo $s3_description; ?></p>
                    <?php } ?>
                </div>

                <?php if (!empty($s3_serve_list)) { ?>
                    <div class="row mt-40 mb-sm-50">
                        <?php foreach ($s3_serve_list as $key => $serve_lists) {
                            $s3_serve_list_icon = isset($serve_lists['s3_serve_list_icon']) ? $serve_lists['s3_serve_list_icon'] : '';
                            $s3_serve_list_title = isset($serve_lists['s3_serve_list_title']) ? $serve_lists['s3_serve_list_title'] : '';
                            $s3_serve_list_content = isset($serve_lists['s3_serve_list_content']) ? $serve_lists['s3_serve_list_content'] : ''; ?>
                            <div class="w-full col-sm-6 col-md-4 mb-30 mb-md-0">
                                <div class="serve-block-inner bg-white p-30 h-full">
                                    <?php
                                    if (!empty($s3_serve_list_icon)) {
                                        $svg_path = $dir_path . '/assets/icons/' . $s3_serve_list_icon . '.svg';
                                        if (file_exists($svg_path)) {
                                            $svg = $dir_url . '/assets/icons/' . $s3_serve_list_icon . '.svg';
                                            if (!empty($svg)) {   ?>
                                                <div class="serve-icon mb-20">
                                                    <img src="<?php echo $svg; ?>" title="<?php echo $s3_serve_list_title; ?>" alt="<?php echo $s3_serve_list_title; ?>" width="64" height="64" loading="lazy" />
                                                </div>
                                            <?php } ?>
                                        <?php } ?>
                                    <?php } ?>

                                    <?php if (!empty($s3_serve_list_title)) { ?>
                                        <p class="we-serve-title mb-10 color-222222 font-16 font-md-18 font-lg-20 fw-500 lh-1-4"><?php echo $s3_serve_list_title; ?></p>
                                    <?php } ?>

                                    <?php if (!empty($s3_serve_list_content)) { ?>
                                        <p class="font-15 font-md-16"><?php echo $s3_serve_list_content; ?></p>
                                    <?php } ?>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                <?php } ?>

                <?php if (!empty($s3_view_all_btn)) { ?>
                    <?php
                    if (!empty($s3_view_all_btn)) {
                        $cta_link = isset($s3_view_all_btn['url']) ? $s3_view_all_btn['url'] : '';
                        $cta_title = isset($s3_view_all_btn['title']) ? $s3_view_all_btn['title'] : '';
                        $cta_target = !empty($s3_view_all_btn['target']) ? 'target="_blank"' : '';

                        $cta_link = filter_var($cta_link, FILTER_SANITIZE_URL);
                        if (filter_var($cta_link, FILTER_VALIDATE_URL) !== false) {
                            $url = esc_url($cta_link);
                        } else {
                            $url = '#mys_footer_contactform';
                            $cta_target = '';
                        }

                        if (!empty($url) && !empty($cta_title)) {   ?>
                        <div class="text-center">
                            <a class="view-all-service-btn btn btn-dark-hover font-weight-medium uppercase"  href="<?php echo $url; ?>" <?php echo $cta_target; ?> title="<?php echo $cta_title; ?>">
                                <span class="flex align-items-center">
                                    <?php echo $cta_title; ?> 
                                    <svg class="ml-8" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M13.025 1l-2.847 2.828 6.176 6.176h-16.354v3.992h16.354l-6.176 6.176 2.847 2.828 10.975-11z"/></svg>
                                </span>
                            </a>
                        </div>
                        <?php } ?>
                    <?php } ?>
                <?php } ?>
            </div>
            
        </section>
    <?php }
}

# How Mint
$how_mint_section = get_field('s4_how_mint_section');
if (!empty($how_mint_section)) {
    $s4_title = isset($how_mint_section['s4_title']) ? $how_mint_section['s4_title'] : '';
    $s4_mint_title = isset($how_mint_section['s4_mint_title']) ? $how_mint_section['s4_mint_title'] : '';
    $s4_list_of_services = isset($how_mint_section['s4_list_of_services']) ? $how_mint_section['s4_list_of_services'] : array();

    if (!empty($s4_title) || !empty($s4_mint_title) || !empty($s4_list_of_services)) { ?>
        <section class="how-mint-section py-40 py-md-60 py-lg-80">
            <div class="container">
                <div class="heading-section mb-20 mb-md-40">
                    <?php if (!empty($s4_title)) { ?>
                        <h2 class="text-center"><?php echo $s4_title; ?></h2>
                    <?php } ?>
                </div>
                <div class="bg-dark color-white rounded-medium p-40 p-md-60 mt-10">
                    <div class="row align-items-center">
                        <div class="col-12 col-sm-6">
                            <?php if (!empty($s4_mint_title)) { ?>
                                <h3 class="font-22 font-sm-24 font-md-32 fw-500 pr-md-40 lh-1-4 mb-xs-30 mb-sm-60"><?php echo $s4_mint_title; ?></h3>
                            <?php } ?>
                        </div>
                        <div class="col-12 col-sm-6">
                            <?php if (!empty($s4_list_of_services)) { ?>
                                <ul class="checklist">
                                    <?php foreach ($s4_list_of_services as $key => $list_of_services) {
                                        $s4_service_list = isset($list_of_services['s4_service_list']) ? $list_of_services['s4_service_list'] : ''; ?>
                                        <li class="list-stye-none font-16 fw-400 mt-10 pb-10 lh-1-7">
                                            <?php if (!empty($s4_service_list)) { ?>
                                                <?php echo $s4_service_list; ?>
                                            <?php } ?>
                                        </li>
                                    <?php } ?>
                                </ul>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    <?php } ?>
<?php } ?>

<?php
# Our Shopify Services
$s5_all_shopify_service = get_field('s5_all_shopify_service');
if (!empty($s5_all_shopify_service)) {
    $s5_service_title = isset($s5_all_shopify_service['s5_service_title']) ? $s5_all_shopify_service['s5_service_title'] : '';
    $s5_all_service_list = isset($s5_all_shopify_service['s5_all_service_list']) ? $s5_all_shopify_service['s5_all_service_list'] : array();

    if (!empty($s5_service_title) || !empty($s5_all_service_list)) { ?>
        <section class="shopify-service-section py-xs-10 py-sm-60 py-lg-80">
            <div class="container">
                <div class="heading-section mb-20 mb-md-40">
                    <?php if (!empty($s5_service_title)) { ?>
                        <h2 class="text-center"><?php echo $s5_service_title; ?></h2>
                    <?php } ?>
                </div>
                <?php if (!empty($s5_all_service_list)) { ?>
                    <div class="service-blocks-items-main mt-xs-15 mt-sm-30">
                        <?php foreach ($s5_all_service_list as $key => $all_service_list) {
                            $s5_service_image = isset($all_service_list['s5_service_image']) ? $all_service_list['s5_service_image'] : '';
                            $s5_title = isset($all_service_list['s5_title']) ? $all_service_list['s5_title'] : '';
                            $s5_sub_title = isset($all_service_list['s5_sub_title']) ? $all_service_list['s5_sub_title'] : '';
                            $s5_description = isset($all_service_list['s5_description']) ? $all_service_list['s5_description'] : '';
                            $s5_service_button = isset($all_service_list['s5_service_button']) ? $all_service_list['s5_service_button'] : ''; ?>
                            <div class="item-single flex-sm ">
                                <div class="item-image lh-0">
                                    <?php if (!empty($s5_service_image)) { ?>
                                        <?php echo wp_get_attachment_image($s5_service_image, 'full'); ?>
                                    <?php } ?>
                                </div>
                                <div class="item-content p-25 p-sm-30 p-lg-40">
                                    <?php if (!empty($s5_title)) { ?>
                                        <h3 class="mb-10 font-22 font-md-24 font-lg-26"><?php echo $s5_title; ?></h3>
                                    <?php } ?>
                                    
                                    <?php if (!empty($s5_sub_title)) { ?>
                                        <h4 class="mb-20 pb-20 bb-1-solid-DDDDDD font-16 font-md-18 font-lg-20"><?php echo $s5_sub_title; ?></h4>
                                    <?php } ?>
                                    
                                    <div class="checkdash-content mt-20 list-stye-none checkdash">
                                        <?php if (!empty($s5_description)) { ?>
                                            <?php echo $s5_description; ?>
                                        <?php } ?>
                                    </div>
    
                                    <div>
                                        <?php if (!empty($s5_service_button)) {
                                            $cta_link = isset($s5_service_button['url']) ? $s5_service_button['url'] : '';
                                            $cta_title = isset($s5_service_button['title']) ? $s5_service_button['title'] : '';
                                            $cta_target = !empty($s5_service_button['target']) ? 'target="_blank"' : '';
    
                                            $cta_link = filter_var($cta_link, FILTER_SANITIZE_URL);
                                            if (filter_var($cta_link, FILTER_VALIDATE_URL) !== false) {
                                                $url = esc_url($cta_link);
                                            } else {
                                                $url = '#mys_footer_contactform';
                                                $cta_target = '';
                                            }
    
                                            if (!empty($url) && !empty($cta_title)) {   ?>
                                                <a class="btn btn-dark-hover font-weight-medium uppercase mt-30" href="<?php echo $url; ?>" <?php echo $cta_target; ?> title="<?php echo $cta_title; ?>">
                                                    <?php echo $cta_title; ?>
                                                </a>
                                            <?php } ?>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>
        </section>

    <?php } ?>
<?php } ?>


<?php
# Our Success Stories
$s6_success_stories_section = get_field('s6_success_stories_section');
if (!empty($s6_success_stories_section)) {
    $s6_title = isset($s6_success_stories_section['s6_title']) ? $s6_success_stories_section['s6_title'] : '';
    $s6_stories_list = isset($s6_success_stories_section['s6_stories_list']) ? $s6_success_stories_section['s6_stories_list'] : array();

    if (!empty($s6_title) || !empty($s6_stories_list)) { ?>
        <section class="success-section py-40 py-md-60 py-lg-80">
            <div class="heading-section mb-20 mb-md-40">
                <?php if (!empty($s6_title)) { ?>
                    <h2 class="text-center"><?php echo $s6_title; ?></h2>
                <?php } ?>
            </div>
            <div class="container">
                <?php if (!empty($s6_stories_list)) { ?>
                    <div class="row">
                        <?php foreach ($s6_stories_list as $key => $all_stories_list) {
                            $s6_stories_image = isset($all_stories_list['s6_stories_image']) ? $all_stories_list['s6_stories_image'] : '';
                            $s6_stories_title = isset($all_stories_list['s6_stories_title']) ? $all_stories_list['s6_stories_title'] : '';
                            $s6_stories_category = isset($all_stories_list['s6_stories_category']) ? $all_stories_list['s6_stories_category'] : '';
                            $s6_stories_description = isset($all_stories_list['s6_stories_description']) ? $all_stories_list['s6_stories_description'] : ''; ?>
                            <div class="w-full col-sm-6 col-md-4 mb-30 mb-md-0">
                                <div class="b-1-solid-DDDDDD h-full rounded-medium">
                                    <div class="lh-0">
                                        <?php if (!empty($s6_stories_image)) { ?>
                                            <?php echo wp_get_attachment_image($s6_stories_image, 'full','',array('class'=>'w-full')); ?>
                                        <?php } ?>
                                    </div>
                                    <div class="p-20">
                                        <div>
                                            <?php if (!empty($s6_stories_category)) { ?>
                                                <p class="font-14 color-888888"><?php echo $s6_stories_category; ?></p>
                                            <?php } ?>
                                        </div>
        
                                        <div class="mb-15">
                                            <?php if (!empty($s6_stories_title)) {
                                                $cta_link = isset($s6_stories_title['url']) ? $s6_stories_title['url'] : '';
                                                $cta_title = isset($s6_stories_title['title']) ? $s6_stories_title['title'] : '';
                                                $cta_target = !empty($s6_stories_title['target']) ? 'target="_blank"' : '';
        
                                                $cta_link = filter_var($cta_link, FILTER_SANITIZE_URL);
                                                if (filter_var($cta_link, FILTER_VALIDATE_URL) !== false) {
                                                    $url = esc_url($cta_link);
                                                } else {
                                                    $url = '#mys_footer_contactform';
                                                    $cta_target = '';
                                                }
        
                                                if (!empty($url) && !empty($cta_title)) {   ?>
                                                    <a class="success-link font-16 font-sm-20 color-222222" href="<?php echo $url; ?>" <?php echo $cta_target; ?> title="<?php echo $cta_title; ?>">
                                                        <?php echo $cta_title; ?>
                                                    </a>
                                                <?php } ?>
                                            <?php } ?>
                                        </div>
                                        <?php if (!empty($s6_stories_description)) { ?>
                                            <p class="font-15 color-222222"><?php echo $s6_stories_description; ?></p>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </section>
                <?php } ?>
            </div>
        </section>

    <?php } ?>
<?php } ?>


<?php
# CTA Section
$cta = get_field('s7_cta');
if (!empty($cta)) {
    get_template_part('template-parts/content', 'cta_section', $cta);
}

get_template_part('template-parts/content', 'contact-form');
?>


<?php get_footer(); ?>