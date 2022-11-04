<?php
if (!empty($args)) {
    $image_content_title = isset($args['image_content_title']) ? $args['image_content_title'] : '';
    $image_content_image = isset($args['image_content_image']) ? $args['image_content_image'] : '';
    $image_content_description = isset($args['image_content_description']) ? $args['image_content_description'] : array(); ?>

    <?php if (!empty($image_content_title) || !empty($image_content_description) || !empty($image_content_image)) { ?>
        <section class="image-content-section py-40 py-md-60 py-lg-80">
            <div class="container">
                <div class="row">
                    <?php if (!empty($image_content_title) || !empty($image_content_description)) { ?>
                        <div class="col-md-6 image-content-left-section order-xs-1">
                            <?php if (!empty($image_content_title)) { ?>
                                <div class="heading-section">
                                    <h2 class="color-222222 font-22 lh-34 font-sm-26 lh-sm-37 font-lg-32 lh-lg-48"><?php echo $image_content_title; ?></h2>
                                </div>
                            <?php } ?>
                            <?php if (!empty($image_content_description)) { ?>
                                <div class="section-description checklist color-666666 font-15 lh-24 font-lg-16 lh-lg-28">
                                    <?php echo $image_content_description; ?>
                                </div>
                            <?php } ?>
                        </div>
                    <?php } ?>
                    <?php if (!empty($image_content_image)) { ?>
                        <div class="col-md-6 image-section flex align-items-end m-auto ml-md-auto pt-20 pt-md-0">
                            <?php if (!empty($image_content_image)) { ?>
                                <?php echo wp_get_attachment_image($image_content_image, 'full','', array('class'=>'mb-30')); ?>
                            <?php } ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </section>
    <?php } ?>
<?php } ?>