<?php

/**
 * The Custom template for Frontpage
 *
 * Template Name: Sub Services Page
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
    $ser_background_image = isset($banner_data['ser_background_image']) ? $banner_data['ser_background_image'] : array();
    $ser_header_sub_title = isset($banner_data['ser_header_sub_title']) ? $banner_data['ser_header_sub_title'] : '';
    $ser_header_title = isset($banner_data['ser_header_title']) ? $banner_data['ser_header_title'] : '';
    $ser_header_description = isset($banner_data['ser_header_description']) ? $banner_data['ser_header_description'] : '';
    $ser_header_cta = isset($banner_data['ser_header_cta']) ? $banner_data['ser_header_cta'] : array();
    $ser_header_form_or_image = isset($banner_data['ser_header_form_or_image']) ? $banner_data['ser_header_form_or_image'] : array();
    $ser_header_image = isset($banner_data['ser_header_image']) ? $banner_data['ser_header_image'] : array();
    $ser_header_cf7_form = isset($banner_data['ser_header_cf7_form']) ? $banner_data['ser_header_cf7_form'] : '';

    if (!empty($ser_background_image) || !empty($ser_header_sub_title) || !empty($ser_header_title) || !empty($ser_header_description) || !empty($ser_header_cta) || !empty($ser_header_form_or_image) || !empty($ser_header_image) || !empty($ser_header_cf7_form)) {

        $bg_image = '';
        if (!empty($ser_background_image)) {
            $bg_image = 'style="background-image:url(' . $ser_background_image . ');"';
        }   
        $type_class = '';
        if (!empty($ser_header_form_or_image)) {
            if ($ser_header_form_or_image == 'image') {
                $type_class = 'with-image-section';

            } else if ($ser_header_form_or_image == 'form') {
                $type_class = 'with-form-section';
            }
        }
?>
        <section class="banner-section <?php echo $type_class; ?>" <?php echo $bg_image; ?>>
            <div class="container">
                <div class="row">
                    <?php if (!empty($ser_header_sub_title) || !empty($ser_header_title) || !empty($ser_header_description) || !empty($ser_header_cta)) { ?>
                        <div class="col-md-6 banner-left">
                            <div class="banner-left-inner">
                                <?php if (!empty($ser_header_sub_title)) { ?>
                                    <p class="banner-up-text"><?php echo $ser_header_sub_title; ?></p>
                                <?php } ?>
                                <?php if (!empty($ser_header_title)) { ?>
                                    <h1><?php echo $ser_header_title; ?></h1>
                                <?php } ?>
                                <?php if (!empty($ser_header_description)) { ?>
                                    <p class="banner-subtext"><?php echo $ser_header_description; ?></p>
                                <?php } ?>
                                <?php if (!empty($ser_header_cta)) {
                                    $cta_link = isset($ser_header_cta['url']) ? $ser_header_cta['url'] : '';
                                    $cta_title = isset($ser_header_cta['title']) ? $ser_header_cta['title'] : '';
                                    $cta_target = !empty($ser_header_cta['target']) ? 'target="_blank"' : '';
    
                                    $cta_link = filter_var($cta_link, FILTER_SANITIZE_URL);
                                    if (filter_var($cta_link, FILTER_VALIDATE_URL) !== false) {
                                        $url = esc_url($cta_link);
                                    } else {
                                        $url = '#mys_footer_contactform';
                                        $cta_target = '';
                                    }
    
                                    if (!empty($url) && !empty($cta_title)) { ?>
                                        <a class="btn btn-white" href="<?php echo $url; ?>" <?php echo $cta_target; ?> title="<?php echo $cta_title; ?>">
                                            <?php echo $cta_title; ?>
                                        </a>
                                    <?php } ?>
                                <?php } ?>
                            </div>
                        </div>
                    <?php } ?>

                    <?php if (!empty($ser_header_image) || !empty($ser_header_cf7_form) || !empty($ser_header_form_or_image)) { ?> 
                        <div class="col-md-6 banner-right">
                            <?php
                            if (!empty($ser_header_form_or_image)) {
                                if ($ser_header_form_or_image == 'image') {
                                    if (!empty($ser_header_image)) { ?>
                                        <div class="image-right">
                                            <?php echo wp_get_attachment_image($ser_header_image, 'full'); ?>
                                        </div>
                            <?php
                                    }
                                } else if ($ser_header_form_or_image == 'form') {
                                    ?>
                                    <div class="contact-right">
                                        <div class="form-block">
                                            <?php
                                                $title = get_the_title($ser_header_cf7_form);
                                                echo do_shortcode('[contact-form-7 id="' . $ser_header_cf7_form . '" title="' . $title . '"]');
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
if (have_rows('service_page_section')) :
    while (have_rows('service_page_section')) : the_row();

        if (get_row_layout() == 's1_image_content') {
            $image_content = get_sub_field('s1_content_data');
            if (!empty($image_content)) :
                get_template_part('template-parts/all-services/content', 'image_content', $image_content);
            endif;
        } elseif (get_row_layout() == 's2_setup_services') {
            $setup_service = get_sub_field('s2_setup_services_data');
            if (!empty($setup_service)) :
                get_template_part('template-parts/all-services/content', 'setup_service', $setup_service);
            endif;
        } elseif (get_row_layout() == 's3_customized_theme_services') {
            $customized_theme_services = get_sub_field('s3_theme_services');
            if (!empty($customized_theme_services)) :
                get_template_part('template-parts/all-services/content', 'customized_theme_services', $customized_theme_services);
            endif;
        } elseif (get_row_layout() == 's8_development_checklist') {
            $checklist_data = get_sub_field('s8_development_checklist_data');
            if (!empty($checklist_data)) :
                get_template_part('template-parts/all-services/content', 'checklist_data', $checklist_data);
            endif;
        } elseif (get_row_layout() == 's9_why_mint_store') {
            $why_mint_store = get_sub_field('s9_why_mint');
            if (!empty($why_mint_store)) :
                get_template_part('template-parts/all-services/content', 'why_mint_store', $why_mint_store);
            endif;
        } elseif (get_row_layout() == 's10_testimonial_section') {
            $testimonials = get_sub_field('s10_client_section');
            if (!empty($testimonials)) :
                get_template_part('template-parts/all-services/content', 'testimonials', $testimonials);
            endif;
        } elseif (get_row_layout() == 'f5_faqs_section') {
            $faqs_data = get_sub_field('s5_faqs_data');
            if (!empty($faqs_data)) :
                get_template_part('template-parts/all-services/content', 'faqs_data', $faqs_data);
            endif;
        } elseif (get_row_layout() == 's11_cta_section') {
            $ctadata = get_sub_field('s11_cta_data');
            if (!empty($ctadata)) :
                get_template_part('template-parts/content', 'cta_section', $ctadata);
            endif;
        } elseif (get_row_layout() == 's6_cf7_form') {
            $cf7_service_form = get_sub_field('s6_contact_form');
            if (!empty($cf7_service_form)) :
                get_template_part('template-parts/content', 'contact-form');
            endif;
        } elseif (get_row_layout() == 's7_more_profitable') {
            $more_profitable = get_sub_field('s7_more_profitable_section');
            if (!empty($more_profitable)) :
                get_template_part('template-parts/all-services/content', 'more_profitable', $more_profitable);
            endif;
        } elseif (get_row_layout() == 's4_choose_mint_store') {
            $mint_store_service = get_sub_field('s4_mint_store_service');
            if (!empty($mint_store_service)) :
                get_template_part('template-parts/all-services/content', 'mint_store_service', $mint_store_service);
            endif;
        } elseif (get_row_layout() == 'shopify_agencies') {
            $shopify_agencies = get_sub_field('s12_shopify_agencies');
            if (!empty($shopify_agencies)) :
                get_template_part('template-parts/all-services/content', 'shopify_agencies', $shopify_agencies);
            endif;
        }

    endwhile;
endif;
?>
<?php
get_footer();
?>