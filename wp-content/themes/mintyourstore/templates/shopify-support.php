<?php

/**
 * The Custom template for Frontpage
 *
 * Template Name: Landing Page of Shopify
 * 
 * @package Aureatelabs
 * @subpackage Aureatelabs
 * @since 1.0
 * @version 1.0
 */

get_header();
?>

<?php
# Banner Section
$banner_data = get_field('general_hero_section');
if (!empty($banner_data)) {
    $hero_background_image = isset($banner_data['hero_background_image']) ? $banner_data['hero_background_image'] : array();
    $hero_sub_title = isset($banner_data['hero_sub_title']) ? $banner_data['hero_sub_title'] : '';
    $hero_title = isset($banner_data['hero_title']) ? $banner_data['hero_title'] : '';
    $hero_description = isset($banner_data['hero_description']) ? $banner_data['hero_description'] : '';
    $hero_form_button = isset($banner_data['hero_form_button']) ? $banner_data['hero_form_button'] : array();
    $hero_trial_text = isset($banner_data['hero_trial_text']) ? $banner_data['hero_trial_text'] : '';
    $hero_partner_logo = isset($banner_data['hero_partner_logo']) ? $banner_data['hero_partner_logo'] : '';
    $hero_services = isset($banner_data['hero_services']) ? $banner_data['hero_services'] : array();
    $hero_cta_button = isset($banner_data['hero_cta_button']) ? $banner_data['hero_cta_button'] : array();
    $hero_cta_link = isset($banner_data['hero_cta_link']) ? $banner_data['hero_cta_link'] : array();
    $hero_form_or_image = isset($banner_data['hero_form_or_image']) ? $banner_data['hero_form_or_image'] : array();
    $hero_right_image = isset($banner_data['hero_right_image']) ? $banner_data['hero_right_image'] : array();
    $hero_cf7_form = isset($banner_data['hero_cf7_form']) ? $banner_data['hero_cf7_form'] : '';

    if (!empty($hero_background_image) || !empty($hero_sub_title) || !empty($hero_title) || !empty($hero_description) || !empty($hero_form_button) || !empty($hero_trial_text) || !empty($hero_partner_logo) || !empty($hero_services) || !empty($hero_cta_button) || !empty($hero_cta_link) || !empty($hero_form_or_image) || !empty($hero_right_image) || !empty($hero_cf7_form)) {

        $bg_image = '';
        if (!empty($hero_background_image)) {
            $bg_image = 'style="background-image:url(' . $hero_background_image . ');"';
        }

        $type_class = '';
        if (!empty($hero_form_or_image)) {
            if ($hero_form_or_image == 'image') {
                $type_class = 'with-image-section';

            } else if ($hero_form_or_image == 'form') {
                $type_class = 'with-form-section';
            }
        }
?>

        <section class="banner-section <?php echo $type_class; ?>" <?php echo $bg_image; ?>>
            <div class="container">
                <div class="row">
                    <?php if (!empty($hero_sub_title) || !empty($hero_title) || !empty($hero_description) || !empty($hero_form_button) || !empty($hero_trial_text) || !empty($hero_partner_logo) || !empty($hero_services) || !empty($hero_cta_button) || !empty($hero_cta_link)) { ?>
                        <div class="col-6 banner-left">
                            <div class="banner-left-inner">
                                <?php if (!empty($hero_sub_title)) { ?>
                                    <div>
                                        <p><?php echo $hero_sub_title; ?></p>
                                    </div>
                                <?php } ?>
    
                                <?php if (!empty($hero_title)) { ?>
                                    <h1><?php echo $hero_title; ?></h1>
                                <?php } ?>
    
                                <?php if (!empty($hero_description)) { ?>
                                    <p><?php echo $hero_description; ?></p>
                                <?php } ?>
    
                                <?php if (!empty($hero_form_button)) {
                                    $cta_link = isset($hero_form_button['url']) ? $hero_form_button['url'] : '';
                                    $cta_title = isset($hero_form_button['title']) ? $hero_form_button['title'] : '';
                                    $cta_target = !empty($hero_form_button['target']) ? 'target="_blank"' : '';
    
                                    $cta_link = filter_var($cta_link, FILTER_SANITIZE_URL);
                                    if (filter_var($cta_link, FILTER_VALIDATE_URL) !== false) {
                                        $class = '';
                                        $url = $cta_link;
                                    } else {
                                        $class = 'CF7_openmodale';
                                        $cta_target = '';
                                        $url = 'javascript:void(0);';
                                    }
    
                                    if (!empty($url) && !empty($cta_title)) { ?>
                                        <a class="<?php echo $class; ?>" href="<?php echo $url; ?>" <?php echo $cta_target; ?> title="<?php echo $cta_title; ?>">
                                            <?php echo $cta_title; ?>
                                        </a>
                                    <?php } ?>
                                <?php } ?>
    
                                <?php if (!empty($hero_trial_text)) { ?>
                                    <div>
                                        <p><?php echo $hero_trial_text; ?></p>
                                    </div>
                                <?php } ?>
    
                                <?php if (!empty($hero_partner_logo)) { ?>
                                    <div class="lh-1">
                                        <?php echo wp_get_attachment_image($hero_partner_logo, 'full'); ?>
                                    </div>
                                <?php } ?>
    
                                <?php if (!empty($hero_services)) { ?>
                                    <ul class="service-list">
                                    <?php
                                    foreach ($hero_services as $key => $list_data) {
                                            $hero_service_list = isset($list_data['hero_service_list']) ? $list_data['hero_service_list'] : ''; ?>
                                            <?php if (!empty($hero_service_list)) { ?>
                                                <li>
                                                    <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M16.3405 2.7334H7.67049C4.28049 2.7334 2.00049 5.10068 2.00049 8.62175V16.7481C2.00049 20.2592 4.28049 22.6265 7.67049 22.6265H16.3405C19.7305 22.6265 22.0005 20.2592 22.0005 16.7481V8.62175C22.0005 5.10068 19.7305 2.7334 16.3405 2.7334Z" fill="#02C303"></path>
                                                        <path d="M10.8134 15.9096C10.5894 15.9096 10.3654 15.8251 10.1944 15.655L7.82144 13.295C7.47944 12.9549 7.47944 12.4039 7.82144 12.0648C8.16344 11.7247 8.71644 11.7237 9.05844 12.0638L10.8134 13.8092L14.9414 9.70382C15.2834 9.3637 15.8364 9.3637 16.1784 9.70382C16.5204 10.044 16.5204 10.5949 16.1784 10.935L11.4324 15.655C11.2614 15.8251 11.0374 15.9096 10.8134 15.9096Z" fill="white"></path>
                                                    </svg>
                                                    <span> <?php echo $hero_service_list; ?></span>
                                                </li>
                                            <?php } ?>
                                    <?php } ?>
                                    </ul>
                                <?php } ?>
    
                                <?php if (!empty($hero_cta_button)) {
                                    $cta_link = isset($hero_cta_button['url']) ? $hero_cta_button['url'] : '';
                                    $cta_title = isset($hero_cta_button['title']) ? $hero_cta_button['title'] : '';
                                    $cta_target = !empty($hero_cta_button['target']) ? 'target="_blank"' : '';
    
                                    if (!empty($cta_link) && !empty($cta_title)) { ?>
                                        <a class="btn btn-white pricing-btn" href="<?php echo $cta_link; ?>" <?php echo $cta_target; ?> title="<?php echo $cta_title; ?>">
                                            <?php echo $cta_title; ?>
                                        </a>
                                    <?php } ?>
                                <?php } ?>
    
                                <?php if (!empty($hero_cta_link)) {
                                    $cta_link = isset($hero_cta_link['url']) ? $hero_cta_link['url'] : '';
                                    $cta_title = isset($hero_cta_link['title']) ? $hero_cta_link['title'] : '';
                                    $cta_target = !empty($hero_cta_link['target']) ? 'target="_blank"' : '';
    
                                    if (!empty($cta_link) && !empty($cta_title)) { ?>
                                        <span class="or-text"> or </span>
                                        <a class="browse-link" href="<?php echo $cta_link; ?>" <?php echo $cta_target; ?> title="<?php echo $cta_title; ?>">
                                            <?php echo $cta_title; ?>
                                        </a>
                                    <?php } ?>
                                <?php } ?>
                            </div>
                        </div>
                    <?php } ?>

                    <?php if (!empty($hero_right_image) || !empty($hero_cf7_form) || !empty($hero_form_or_image)) { ?>
                        <div class="col-6 banner-right">
                            <?php
                            if (!empty($hero_form_or_image)) {
                                if ($hero_form_or_image == 'image') {
                                    if (!empty($hero_right_image)) { ?>
                                        <div>
                                            <?php echo wp_get_attachment_image($hero_right_image, 'full'); ?>
                                        </div>
                                    <?php } ?>
                            <?php } elseif ($hero_form_or_image == 'form') {
                                ?>
                                <div class="contact-right">
                                    <div class="form-block">
                                        <?php
                                    $title = get_the_title($hero_cf7_form);
                                    echo do_shortcode('[contact-form-7 id="' . $hero_cf7_form . '" title="' . $title . '"]');
                                    ?>
                                    </div>
                                </div>
                               <?php }
                            } ?>
                        </div>
                    <?php }
                    ?>
                </div>
            </div>
        </section>
    <?php } ?>
<?php } ?>


<?php
if (have_rows('shopify_support_section')) :
    while (have_rows('shopify_support_section')) : the_row();

        if (get_row_layout() == 's14_faqs_section') {
            $faqs_data = get_sub_field('s14_faqs_data');
            if (!empty($faqs_data)) :
                get_template_part('template-parts/shopify-landing-page/content', 'faqs_data', $faqs_data);
            endif;
        } elseif (get_row_layout() == 's2_maintenance_services_section') {
            $maintenance_services = get_sub_field('s2_maintenance_services');
            if (!empty($maintenance_services)) :
                get_template_part('template-parts/shopify-landing-page/content', 'maintenance_services', $maintenance_services);
            endif;
        } elseif (get_row_layout() == 's3_why_choose_us') {
            $why_choose_us = get_sub_field('s3_why_choose_us');
            if (!empty($why_choose_us)) :
                get_template_part('template-parts/shopify-landing-page/content', 'why_choose_us', $why_choose_us);
            endif;
        } elseif (get_row_layout() == 's4_simple_package') {
            $package_boost = get_sub_field('s4_simple_package_boost');
            if (!empty($package_boost)) :
                get_template_part('template-parts/shopify-landing-page/content', 'package_boost', $package_boost);
            endif;
        } elseif (get_row_layout() == 's8_industries_we_have_served') {
            $industries_served = get_sub_field('s6_industries_we_served');
            if (!empty($industries_served)) :
                get_template_part('template-parts/shopify-landing-page/content', 'industries_served', $industries_served);
            endif;
        } elseif (get_row_layout() == 's7_what_clients_say') {
            $testimonial_data = get_sub_field('s7_testimonial_data');
            if (!empty($testimonial_data)) :
                get_template_part('template-parts/shopify-landing-page/content', 'testimonial_data', $testimonial_data);
            endif;
        } elseif (get_row_layout() == 'problem_solving') {
            $problem_solving = get_sub_field('problem_solving');
            if (!empty($problem_solving)) :
                get_template_part('template-parts/shopify-landing-page/content', 'problem_solving', $problem_solving);
            endif;
        } elseif (get_row_layout() == 'e3_escrow_work') {
            $escrow_work = get_sub_field('escrow_work');
            if (!empty($escrow_work)) :
                get_template_part('template-parts/shopify-landing-page/content', 'escrow_work', $escrow_work);
            endif;
        } elseif (get_row_layout() == 'e4_work_logos') {
            $work_logos = get_sub_field('work_logos');
            if (!empty($work_logos)) :
                get_template_part('template-parts/shopify-landing-page/content', 'work_logos', $work_logos);
            endif;
        } elseif (get_row_layout() == 'e5_testimonial_words') {
            $testimonial_words = get_sub_field('testimonial_words');
            if (!empty($testimonial_words)) :
                get_template_part('template-parts/shopify-landing-page/content', 'testimonial_words', $testimonial_words);
            endif;
        } elseif (get_row_layout() == 'e6_capable_hands') {
            $capable_hands = get_sub_field('capable_hands');
            if (!empty($capable_hands)) :
                get_template_part('template-parts/shopify-landing-page/content', 'capable_hands', $capable_hands);
            endif;
        } elseif (get_row_layout() == 'e2_affordable_pricing') {
            $affordable_pricing = get_sub_field('affordable_pricing');
            if (!empty($affordable_pricing)) :
                get_template_part('template-parts/shopify-landing-page/content', 'affordable_pricing', $affordable_pricing);
            endif;
        } elseif (get_row_layout() == 'e1_popular_requests') {
            $popular_requests = get_sub_field('popular_requests');
            if (!empty($popular_requests)) :
                get_template_part('template-parts/shopify-landing-page/content', 'popular_requests', $popular_requests);
            endif;
        }

    endwhile;
endif;

$cf7_form = get_field('popup_form');
if (!empty($cf7_form)) :
    print_r($cf7_form);
    get_template_part('template-parts/content', 'cf7_form', $cf7_form);
endif;

get_template_part('template-parts/content', 'affordable_pricing');
//get_template_part('template-parts/content', 'project_based');
?>

<?php
get_footer();
?>