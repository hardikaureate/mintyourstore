<?php
$dir_path = get_template_directory();
$dir_url = get_template_directory_uri();
if (!empty($args)) {
    $s2_title = isset($args['s2_title']) ? $args['s2_title'] : '';
    $s2_sub_title = isset($args['s2_sub_title']) ? $args['s2_sub_title'] : '';
    $s2_all_services = isset($args['s2_all_services']) ? $args['s2_all_services'] : array();
    $s2_form_button = isset($args['s2_form_button']) ? $args['s2_form_button'] : '';
    $s2_trial_text = isset($args['s2_trial_text']) ? $args['s2_trial_text'] : ''; ?>

    <?php if (!empty($s2_title) || !empty($s2_sub_title) || !empty($s2_all_services) || !empty($s2_form_button) || !empty($s2_sub_title)) { ?>

        <section class="">
            <div class="container">
                <div class="row">
                    <?php if (!empty($s2_title)) { ?>
                        <div>
                            <h4><?php echo $s2_title; ?></h4>
                        </div>
                    <?php } ?>

                    <?php if (!empty($s2_sub_title)) { ?>
                        <div>
                            <p><?php echo $s2_sub_title; ?></p>
                        </div>
                    <?php } ?>

                    <?php if (!empty($s2_all_services)) { ?>
                        <?php
                        foreach ($s2_all_services as $key => $services_list) {
                            $s2_service_icon = isset($services_list['s2_service_icon']) ? $services_list['s2_service_icon'] : '';
                            $s2_service_title = isset($services_list['s2_service_title']) ? $services_list['s2_service_title'] : '';
                            $s2_service_content = isset($services_list['s2_service_content']) ? $services_list['s2_service_content'] : ''; ?>

                            <?php if (!empty($s2_service_icon) || !empty($s2_service_title) || !empty($s2_service_content)) { ?>
                                <?php if (!empty($s2_service_icon)) {
                                    $svg_path = $dir_path . '/assets/icons/' . $s2_service_icon . '.svg';
                                    if (file_exists($svg_path)) {
                                        $svg = $dir_url . '/assets/icons/' . $s2_service_icon . '.svg';
                                        if (!empty($svg)) { ?>
                                            <img src="<?php echo $svg; ?>" title="<?php echo $s2_service_title; ?>" alt="<?php echo $s2_service_title; ?>" />
                                        <?php } ?>
                                    <?php } ?>
                                <?php } else { ?>
                                    <?php echo $s2_service_title; ?>
                                <?php } ?>

                                <?php if (!empty($s2_service_title)) { ?>
                                    <div>
                                        <?php echo $s2_service_title; ?>
                                    </div>
                                <?php } ?>

                                <?php if (!empty($s2_service_content)) { ?>
                                    <div>
                                        <?php echo $s2_service_content; ?>
                                    </div>
                                <?php } ?>
                            <?php } ?>
                        <?php } ?>
                    <?php } ?>

                    <?php if (!empty($s2_form_button)) {
                        $cta_link = isset($s2_form_button['url']) ? $s2_form_button['url'] : '';
                        $cta_title = isset($s2_form_button['title']) ? $s2_form_button['title'] : '';
                        $cta_target = !empty($s2_form_button['target']) ? 'target="_blank"' : '';

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

                    <?php if (!empty($s2_trial_text)) { ?>
                        <div>
                            <p><?php echo $s2_trial_text; ?></p>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </section>
    <?php } ?>
<?php } ?>