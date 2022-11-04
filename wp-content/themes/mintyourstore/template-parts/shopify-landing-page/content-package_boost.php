<?php
if (!empty($args)) {
    $s4_title = isset($args['s4_title']) ? $args['s4_title'] : '';
    $s4_content = isset($args['s4_content']) ? $args['s4_content'] : '';
    $s4_costing_title = isset($args['s4_costing_title']) ? $args['s4_costing_title'] : '';
    $s4_package_list = isset($args['s4_package_list']) ? $args['s4_package_list'] : array();
    $s4_form_button = isset($args['s4_form_button']) ? $args['s4_form_button'] : '';
    $s4_trial_text = isset($args['s4_trial_text']) ? $args['s4_trial_text'] : ''; ?>

    <?php if (!empty($s4_title) || !empty($s4_content) || !empty($s4_costing_title) || !empty($s4_package_list) || !empty($s4_form_button) || !empty($s4_trial_text)) { ?>

        <section class="">
            <div class="container">
                <div class="row">
                    <?php if (!empty($s4_title)) { ?>
                        <div>
                            <h4><?php echo $s4_title; ?></h4>
                        </div>
                    <?php } ?>

                    <?php if (!empty($s4_content)) { ?>
                        <div>
                            <h4><?php echo $s4_content; ?></h4>
                        </div>
                    <?php } ?>

                    <div class="col-12">
                        <div class="col-6">
                            <?php if (!empty($s4_costing_title)) { ?>
                                <div>
                                    <h4><?php echo $s4_costing_title; ?></h4>
                                </div>
                            <?php } ?>

                            <?php if (!empty($s4_form_button)) {
                                $cta_link = isset($s4_form_button['url']) ? $s4_form_button['url'] : '';
                                $cta_title = isset($s4_form_button['title']) ? $s4_form_button['title'] : '';
                                $cta_target = !empty($s4_form_button['target']) ? 'target="_blank"' : '';

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

                            <?php if (!empty($s4_trial_text)) { ?>
                                <div>
                                    <p><?php echo $s4_trial_text; ?></p>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="col-6">
                            <?php if (!empty($s4_package_list)) { ?>
                                <div class="">
                                    <?php
                                    foreach ($s4_package_list as $key => $slider_list) {
                                        $s4_package_title = isset($slider_list['s4_package_title']) ? $slider_list['s4_package_title'] : ''; ?>
                                        <div data-aos="fade-up">
                                            <?php if (!empty($s4_package_title)) { ?>
                                                <div>
                                                    <h5><?php echo $s4_package_title; ?></h5>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    <?php } ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php } ?>
<?php } ?>