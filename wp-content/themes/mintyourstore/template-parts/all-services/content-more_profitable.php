<?php
$dir_path = get_template_directory();
$dir_url = get_template_directory_uri();
if (!empty($args)) {
    $s7_profitable_title = isset($args['s7_profitable_title']) ? $args['s7_profitable_title'] : '';
    $s7_profitable_desc = isset($args['s7_profitable_desc']) ? $args['s7_profitable_desc'] : '';
    $profitable_image = isset($args['profitable_image']) ? $args['profitable_image'] : '';
    $s7_profitable_content = isset($args['s7_profitable_content']) ? $args['s7_profitable_content'] : ''; ?>

    <?php if (!empty($s7_profitable_title) || !empty($s7_profitable_desc) | !empty($profitable_image) || !empty($s7_profitable_content)) { ?>
        <section class="more-profitable-section py-40 py-md-60 py-lg-80">
            <div class="container">
                <?php if (!empty($s7_profitable_title) | !empty($s7_profitable_desc) || !empty($profitable_image) || !empty($s7_profitable_content)) { ?>
                    <div class="p-25 p-sm-60 b-1-solid-DDDDDD rounded-medium">
                        <div class="row">
                            <div class="col-md-6 more-left-section">
                                <div class="more-left-section-inner pr-0 pr-md-0">
                                    <?php if (!empty($s7_profitable_title)) { ?>
                                        <div class="heading-content">
                                            <h2 class="color-222222 font-22 lh-34 font-sm-26 lh-sm-37 font-lg-32 lh-lg-48 mb-30"><?php echo $s7_profitable_title; ?></h2>
                                        </div>
                                    <?php } ?>
        
                                    <?php if (!empty($s7_profitable_desc)) { ?>
                                        <div class="desc-block color-444444 font-14 font-sm-16 lh26 fw-400 "><?php echo $s7_profitable_desc; ?></div>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="col-md-6 more-right-section text-center mt-20 mt-md-0">
                                <?php if (!empty($profitable_image)) { ?>
                                    <div>
                                        <?php echo wp_get_attachment_image($profitable_image, 'full'); ?>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <?php if (!empty($s7_profitable_content)) { ?>
                            <div class="row">
                                <div class="col-12 checkmark-round checkdash">
                                    <?php echo $s7_profitable_content; ?>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>
        </section>
    <?php } ?>
<?php } ?>