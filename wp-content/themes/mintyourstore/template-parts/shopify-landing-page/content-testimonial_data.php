<?php
if (!empty($args)) {
    $s7_client_title = isset($args['s7_client_title']) ? $args['s7_client_title'] : '';
    $s7_clients_slider = isset($args['s7_clients_slider']) ? $args['s7_clients_slider'] : array();
    $s7_form_button = isset($args['s7_form_button']) ? $args['s7_form_button'] : '';
    $s7_trial_text = isset($args['s7_trial_text']) ? $args['s7_trial_text'] : '';
?>
    <?php if (!empty($s7_client_title) || !empty($s7_clients_slider) || !empty($s7_form_button) || !empty($s7_trial_text)) { ?>
        <section class="">
            <div class="container">
                <div class="row">
                    <?php if (!empty($s7_client_title)) { ?>
                        <div>
                            <h4><?php echo $s7_client_title; ?></h4>
                        </div>
                    <?php } ?>

                    <?php if (!empty($s7_clients_slider)) { ?>
                        <?php
                        foreach ($s7_clients_slider as $key => $testimonials_list) {
                            $s7_clients_image = isset($testimonials_list['s7_clients_image']) ? $testimonials_list['s7_clients_image'] : '';
                            $s7_client_name = isset($testimonials_list['s7_client_name']) ? $testimonials_list['s7_client_name'] : '';
                            $s7_clients_location = isset($testimonials_list['s7_clients_location']) ? $testimonials_list['s7_clients_location'] : '';
                            $s7_clients_rating = isset($testimonials_list['s7_clients_rating']) ? $testimonials_list['s7_clients_rating'] : '';
                            $s7_clients_content = isset($testimonials_list['s7_clients_content']) ? $testimonials_list['s7_clients_content'] : '';
                        ?>
                            <?php if (!empty($s7_clients_image) || !empty($s7_client_name) || !empty($s7_clients_location) || !empty($s7_clients_content)) { ?>
                                <?php if (!empty($s7_clients_content)) { ?>
                                    <div>
                                        <?php echo $s7_clients_content; ?>
                                    </div>
                                <?php } ?>

                                <?php if (!empty($s7_clients_rating)) { ?>
                                    <div class="testimonial-content">
                                        <?php
                                        for ($i = 1; $i <= 5; $i++) {
                                            if ($i <= $s7_clients_rating) {
                                                $url = get_template_directory_uri() . '/assets/images/single-star.svg';
                                            } else {
                                                $url = get_template_directory_uri() . '/assets/images/single-star-empty.svg';
                                            }
                                        ?>
                                            <img src="<?php echo $url; ?>" title="Star" alt="Star" width="22" height="20" />
                                        <?php } ?>
                                    </div>
                                <?php } ?>

                                <?php if (!empty($s7_clients_image)) { ?>
                                    <div>
                                        <?php echo wp_get_attachment_image($s7_clients_image, 'full'); ?>
                                    </div>
                                <?php } ?>

                                <?php if (!empty($s7_client_name)) { ?>
                                    <div>
                                        <?php echo $s7_client_name; ?>
                                    </div>
                                <?php } ?>

                                <?php if (!empty($s7_clients_location)) { ?>
                                    <div>
                                        <?php echo $s7_clients_location; ?>
                                    </div>
                                <?php } ?>

                            <?php } ?>
                        <?php } ?>
                    <?php } ?>

                    <?php if (!empty($s7_form_button)) {
                        $cta_link = isset($s7_form_button['url']) ? $s7_form_button['url'] : '';
                        $cta_title = isset($s7_form_button['title']) ? $s7_form_button['title'] : '';
                        $cta_target = !empty($s7_form_button['target']) ? 'target="_blank"' : '';

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

                    <?php if (!empty($s7_trial_text)) { ?>
                        <div>
                            <p><?php echo $s7_trial_text; ?></p>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </section>
    <?php } ?>
<?php } ?>