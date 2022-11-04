<?php
/**
 * The Custom template for Frontpage
 *
 * Template Name: Contact Us
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
    if(!empty($background_image) || !empty($title)) 
    {
        $bg_image = '';
        if(!empty($background_image))
        {
            $bg_image = 'style="background-image:url('.$background_image.');"';
        }
        if(!empty($title))
        {   ?>
            <section class="banner-section bg-center" <?php echo $bg_image;?>>
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h1 class="text-center font-32 fw-500"><?php echo $title;?></h1>
                        </div>
                    </div>
                </div>
            </section>
            <?php
        }
    }
}

# Start your eCommerce journey
$contact_detail = get_field('contact_detail');
if(!empty($contact_detail ))
{
    $heading = isset($contact_detail['heading']) ? $contact_detail['heading'] : array();
    $points = isset($contact_detail['points']) ? $contact_detail['points'] : '';
    $email_data = isset($contact_detail['email_data']) ? $contact_detail['email_data'] : '';
    $address_data = isset($contact_detail['address_data']) ? $contact_detail['address_data'] : '';
    $follow_us_data = isset($contact_detail['follow_us_data']) ? $contact_detail['follow_us_data'] : '';
    $select_form = isset($contact_detail['select_form']) ? $contact_detail['select_form'] : '';
    if(!empty($heading) || !empty($points) || !empty($email_data) || !empty($address_data) || !empty($follow_us_data) || !empty($select_form)) 
    {   ?>
        <section class="start-hourney-section py-xs-50 py-sm-60 py-md-100">
            <div class="container">
                <div class="row">
                    <?php 
                    if(!empty($heading) || !empty($points) || !empty($email_data) || !empty($address_data) || !empty($follow_us_data)) 
                    {   ?>
                        <div class="w-full col-sm-6 contact-left pb-xs-30">
                            <?php
                            if(!empty($heading) || !empty($points))
                            {  ?>
                                <div class="title-content-wrap">
                                    <?php 
                                    if(!empty($heading))
                                    {   ?>
                                        <div class="title-section">
                                            <h2><?php echo $heading;?></h2>
                                        </div>
                                        <?php
                                    }
                                    if(!empty($points))
                                    {   ?>
                                        <div class="points-section">
                                            <ul>
                                            <?php
                                            foreach ($points as $key => $point) 
                                            {
                                                $item = isset($point['point']) ? $point['point'] : '';
                                                if(!empty($item))
                                                {
                                                    echo '<li>'.$item.'</li>';
                                                }
                                            }
                                            ?>
                                            </ul>
                                        </div>
                                        <?php
                                    } 
                                    ?>
                                </div>
                                <?php
                            }

                            if(!empty($email_data) || !empty($address_data) || !empty($follow_us_data))
                            {   ?>
                                <div class="contact-us-wrap">
                                    <?php 
                                    if(!empty($email_data))
                                    {
                                        $label = isset($email_data['label']) ? $email_data['label'] : '';
                                        $email = isset($email_data['email']) ? $email_data['email'] : '';
                                        if(!empty($label) || !empty($email))
                                        {   ?>
                                            <p>
                                                <?php
                                                if(!empty($label))
                                                {   ?>
                                                    <b><?php echo $label;?></b>
                                                    <?php
                                                }
                                                if(!empty($email))
                                                {   $encoded_EmailAddress = mys_eae_encode_str( $email );
                                                    $encoded_mailto_EmailAddress = mys_eae_encode_str('mailto:'.$email );
                                                    
                                                    ?>
                                                    <a href="<?php echo $encoded_mailto_EmailAddress;?>"><?php echo $encoded_EmailAddress;?></a>
                                                    <?php
                                                }
                                                ?>
                                            </p>
                                            <?php
                                        }
                                    }
                                    
                                    if(!empty($address_data))
                                    {
                                        $label = isset($address_data['label']) ? $address_data['label'] : '';
                                        $address = isset($address_data['address']) ? $address_data['address'] : array();
                                        if(!empty($label) || !empty($address))
                                        {   ?>
                                            <p>
                                                <?php
                                                if(!empty($label))
                                                {   ?>
                                                    <b><?php echo $label;?></b>
                                                    <?php
                                                }
                                                if(!empty($address))
                                                {  
                                                    $cta_link = isset($address['url']) ? $address['url'] : '';
                                                    $cta_title = isset($address['title']) ? $address['title'] : '';
                                                    $cta_target = !empty($address['target']) ? 'target="_blank"' : '';
                                                    if (!empty($cta_link) && !empty($cta_title)) 
                                                    {   ?>
                                                        <a href="<?php echo $cta_link;?>" <?php echo $cta_target;?>><?php echo $cta_title;?></a>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </p>
                                            <?php
                                        }
                        
                                    }

                                    if(!empty($follow_us_data))
                                    {
                                        $label = isset($follow_us_data['label']) ? $follow_us_data['label'] : '';
                                        $social_media = isset($follow_us_data['social_media']) ? $follow_us_data['social_media'] : array();
                                        if(!empty($label) || !empty($social_media))
                                        {   ?>
                                            <p class="social-icons">
                                                <?php
                                                if(!empty($label))
                                                {   ?>
                                                    <b><?php echo $label;?></b>
                                                    <?php
                                                }
                                                if(!empty($social_media))
                                                { 
                                                    foreach ($social_media as $key => $social) 
                                                    {
                                                        $select_platform = isset($social['select_platform']) ? $social['select_platform'] : '';
                                                        $link = isset($social['link']) ? $social['link'] : '';
                                                        if(!empty($select_platform) && !empty($link))
                                                        {  ?>
                                                            <a class="<?php echo $select_platform;?>" href="<?php echo $link;?>" target="_blank" aria-label="<?php echo $select_platform;?>">
                                                            <?php 
                                                                if($select_platform === "facebook-icon"){
                                                                ?>
                                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z"></path></svg>
                                                                <?php 
                                                                }else if($select_platform === "instagram-icon"){
                                                                ?>
                                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"></path></svg>
                                                                <?php
                                                                }else if($select_platform === "linkedin-icon"){
                                                                ?>
                                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M100.28 448H7.4V148.9h92.88zM53.79 108.1C24.09 108.1 0 83.5 0 53.8a53.79 53.79 0 0 1 107.58 0c0 29.7-24.1 54.3-53.79 54.3zM447.9 448h-92.68V302.4c0-34.7-.7-79.2-48.29-79.2-48.29 0-55.69 37.7-55.69 76.7V448h-92.78V148.9h89.08v40.8h1.3c12.4-23.5 42.69-48.3 87.88-48.3 94 0 111.28 61.9 111.28 142.3V448z"></path></svg>
                                                                <?php 
                                                                }
                                                            ?>
                                                            </a>
                                                            <?php
                                                        }
                                                    } 
                                                }
                                                ?>
                                            </p>
                                            <?php
                                        }
                                    }
                                    ?>
                                </div>    
                                <?php 
                            }
                            ?>
                        </div>
                        <?php
                    }
                    if(!empty($select_form)) 
                    {   ?>
                        <div class="w-full col-sm-6 contact-right">
                            <?php
                            $title = get_the_title($select_form);
                            echo do_shortcode('[contact-form-7 id="' . $select_form . '" title="' . $title . '"]');
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

#map
$map_detail = get_field('map_detail');
if(!empty($map_detail ))
{
    $map_image = isset($map_detail['map_image']) ? $map_detail['map_image'] : '';
    $map_image_mobile = isset($map_detail['map_image_mobile']) ? $map_detail['map_image_mobile'] : '';
    if(!empty($map_image))
    {   ?>
        <section class="map-section">
            <div class="map-image desktop-map">
                <?php  echo wp_get_attachment_image($map_image,'full');  ?>
            </div>
            <?php 
             if(!empty($map_image_mobile))
             { ?>
                <div class="map-image mobile-map">
                    <?php  echo wp_get_attachment_image($map_image_mobile,'full');  ?>
                </div>
                <?php 
             }?>
        </section>
        <?php
    }
}

get_footer();