<?php
if (!empty($args)) {
    $s10_client_heading = isset($args['s10_client_heading']) ? $args['s10_client_heading'] : '';
    $s10_client_desc = isset($args['s10_client_desc']) ? $args['s10_client_desc'] : '';
    $s10_client_testi_list = isset($args['s10_client_testi_list']) ? $args['s10_client_testi_list'] : array();
?>
    <?php if (!empty($s10_client_heading) || !empty($s10_client_desc) || !empty($s10_client_testi_list)) { ?>
        <section class="testimonial-section pt-40 pt-md-60 pt-lg-80 pb-10 pb-md-30 pb-lg-50">
            <div class="container">
                <div class="heading-content m-auto text-center">
                    <?php if (!empty($s10_client_heading)) { ?>
                        <h2 class="font-22 lh-34 font-sm-26 lh-sm-37 font-lg-32 lh-lg-48 mb-10"><?php echo $s10_client_heading; ?></h2>
                    <?php } ?>
    
                    <?php if (!empty($s10_client_desc)) { ?>
                        <p class="color-444444 font-14 font-sm-16 lh-24"><?php echo $s10_client_desc; ?></p>
                    <?php } ?>
                </div>

                <div class="row mt-50">

                    <?php if (!empty($s10_client_testi_list)) { ?>
                        <?php
                        foreach ($s10_client_testi_list as $key => $testimonials_list) {
                            $s10_testi_image = isset($testimonials_list['s10_testi_image']) ? $testimonials_list['s10_testi_image'] : '';
                            $s10_testi_name = isset($testimonials_list['s10_testi_name']) ? $testimonials_list['s10_testi_name'] : '';
                            $s10_testi_url = isset($testimonials_list['s10_testi_url']) ? $testimonials_list['s10_testi_url'] : '';
                            $s10_testi_star = isset($testimonials_list['s10_testi_star']) ? $testimonials_list['s10_testi_star'] : '';
                            $s10_testi_content = isset($testimonials_list['s10_testi_content']) ? $testimonials_list['s10_testi_content'] : '';
                        ?>
                        <div class="col-sm-4 mb-20 mb-sm-30">
                            <div class="p-25 b-1-solid-DDDDDD rounded-medium h-full">
                                <?php if (!empty($s10_testi_image) || !empty($s10_testi_name) || !empty($s10_testi_url) || !empty($s10_testi_content)) { ?>
                                    <div class="testimoanial-user-name flex align-items-center mb-25">
                                        <?php if (!empty($s10_testi_image)) { ?>
                                            <?php echo wp_get_attachment_image($s10_testi_image, 'full','',array('class'=>'mr-12')); ?>
                                        <?php } ?>
                                        <?php if (!empty($s10_testi_name)) { ?>
                                            <div>
                                                <h3 class="color-000000 font-18 lh-24 fw-600 mb-0"><?php echo $s10_testi_name; ?></h3>
                                                <?php if (!empty($s10_testi_url)) { ?>
                                                    <div class="web-url color-888888 font-12 lh-18">
                                                        <?php echo $s10_testi_url; ?>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        <?php } ?>
                                    </div>
    
    
                                    <?php if (!empty($s10_testi_star)) { ?>
                                        <div class="testimonial-rating flex mb-15">
                                            <?php
                                            for ($i = 1; $i <= 5; $i++) {
                                                if ($i <= $s10_testi_star) {
                                                    $url = get_template_directory_uri() . '/assets/images/single-star.svg';
                                                } else {
                                                    $url = get_template_directory_uri() . '/assets/images/single-star-empty.svg';
                                                }
                                            ?>
                                                <img src="<?php echo $url; ?>" title="Star" alt="Star" width="22" height="20" />
                                            <?php } ?>
                                        </div>
                                    <?php } ?>
    
                                    <?php if (!empty($s10_testi_content)) { ?>
                                        <div class="color-666666 font-xs-14 lh-xs-22 font-sm-16 lh-sm-28">
                                            <?php echo $s10_testi_content; ?>
                                        </div>
                                    <?php } ?>
                                <?php } ?>
                            </div>
                        </div>
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
        </section>
    <?php } ?>
<?php } ?>