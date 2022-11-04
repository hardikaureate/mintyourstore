<?php
if (!empty($args)) {
    $s3_title = isset($args['s3_title']) ? $args['s3_title'] : '';
    $s3_slider_data = isset($args['s3_slider_data']) ? $args['s3_slider_data'] : array();
    $s3_form_button = isset($args['s3_form_button']) ? $args['s3_form_button'] : '';
    $s3_trail_text = isset($args['s3_trail_text']) ? $args['s3_trail_text'] : ''; ?>

    <?php if (!empty($s3_title) || !empty($s3_slider_data)) { ?>

        <section class="">
            <div class="container">
                <div class="row">
                    <?php if (!empty($s3_title)) { ?>
                        <div>
                            <h4><?php echo $s3_title; ?></h4>
                        </div>
                    <?php } ?>
                    <?php if (!empty($s3_slider_data)) { ?>
                        <div class="">
                            <?php
                            foreach ($s3_slider_data as $key => $slider_list) {
                                $s3_title = isset($slider_list['s3_title']) ? $slider_list['s3_title'] : ''; ?>
                                <div data-aos="fade-up">
                                    <?php if (!empty($s3_title)) { ?>
                                        <div>
                                            <h5><?php echo $s3_title; ?></h5>
                                        </div>
                                    <?php } ?>
                                </div>
                            <?php } ?>
                        </div>
                    <?php } ?>
                    <?php if (!empty($s3_form_button)) {
                        $cta_link = isset($s3_form_button['url']) ? $s3_form_button['url'] : '';
                        $cta_title = isset($s3_form_button['title']) ? $s3_form_button['title'] : '';
                        $cta_target = !empty($s3_form_button['target']) ? 'target="_blank"' : '';

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

                    <?php if (!empty($s3_trail_text)) { ?>
                        <div>
                            <p><?php echo $s3_trail_text; ?></p>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </section>
    <?php } ?>
<?php } ?>