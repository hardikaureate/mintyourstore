<?php
if (!empty($args)) {
    $ps_background_image = isset($args['ps_background_image']) ? $args['ps_background_image'] : array();
    $ps_title = isset($args['ps_title']) ? $args['ps_title'] : '';
    $ps_form_button = isset($args['ps_form_button']) ? $args['ps_form_button'] : '';
    $ps_trial_text = isset($args['ps_trial_text']) ? $args['ps_trial_text'] : ''; ?>

    <?php if (!empty($ps_background_image) || !empty($ps_title) || !empty($ps_form_button) || !empty($ps_trial_text)) {
        $bg_image = '';
        if (!empty($ps_background_image)) {
            $bg_image = 'style="background-image:url(' . $ps_background_image . ');"';
        }
    ?>

        <section class="" <?php echo $bg_image; ?>>
            <div class="container">
                <div class="row">
                    <?php if (!empty($ps_title)) { ?>
                        <div>
                            <h4><?php echo $ps_title; ?></h4>
                        </div>
                    <?php } ?>

                    <?php if (!empty($ps_form_button)) {
                        $cta_link = isset($ps_form_button['url']) ? $ps_form_button['url'] : '';
                        $cta_title = isset($ps_form_button['title']) ? $ps_form_button['title'] : '';
                        $cta_target = !empty($ps_form_button['target']) ? 'target="_blank"' : '';

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

                    <?php if (!empty($ps_trial_text)) { ?>
                        <div>
                            <p><?php echo $ps_trial_text; ?></p>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </section>
    <?php } ?>
<?php } ?>