<?php
$dir_path = get_template_directory();
$dir_url = get_template_directory_uri();
if (!empty($args)) {
    $s6_served_title = isset($args['s6_served_title']) ? $args['s6_served_title'] : '';
    $s6_served_content = isset($args['s6_served_content']) ? $args['s6_served_content'] : '';
    $s6_served_industries_list = isset($args['s6_served_industries_list']) ? $args['s6_served_industries_list'] : array(); ?>

    <?php if (!empty($s6_served_title) || !empty($s6_served_content) || !empty($s6_served_industries_list)) { ?>

        <section class="<?php echo $backColor; ?>">
            <div class="container">
                <div class="row">
                    <?php if (!empty($s6_served_title)) { ?>
                        <div>
                            <h4><?php echo $s6_served_title; ?></h4>
                        </div>
                    <?php } ?>

                    <?php if (!empty($s6_served_content)) { ?>
                        <div>
                            <p><?php echo $s6_served_content; ?></p>
                        </div>
                    <?php } ?>

                    <?php if (!empty($s6_served_industries_list)) { ?>
                        <?php
                        foreach ($s6_served_industries_list as $key => $serve_list) {
                            $s6_served_image = isset($serve_list['s6_served_image']) ? $serve_list['s6_served_image'] : '';
                            $s6_served_list_title = isset($serve_list['s6_served_list_title']) ? $serve_list['s6_served_list_title'] : ''; ?>

                            <?php if (!empty($s6_served_image) || !empty($s6_served_list_title)) { ?>
                                <?php if (!empty($s6_served_image)) { ?>
                                    <div>
                                        <?php echo wp_get_attachment_image($s6_served_image, 'full'); ?>
                                    </div>
                                <?php } ?>

                                <?php if (!empty($s6_served_list_title)) { ?>
                                    <div>
                                        <?php echo $s6_served_list_title; ?>
                                    </div>
                                <?php } ?>
                            <?php } ?>
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
        </section>
    <?php } ?>
<?php } ?>