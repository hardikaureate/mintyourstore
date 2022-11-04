<?php
if (!empty($args)) {
    $e4_heading = isset($args['e4_heading']) ? $args['e4_heading'] : '';
    $e4_all_logo = isset($args['e4_all_logo']) ? $args['e4_all_logo'] : array(); ?>

    <?php if (!empty($e4_heading) || !empty($e4_all_logo)) { ?>

        <section class="work-logos-section py-40 py-md-60 py-lg-80">
            <div class="container">
                <?php if (!empty($e4_heading)) { ?>
                    <div class="heading-section">
                        <h2 class="color-222222 font-22 lh-34 font-sm-26 lh-sm-37 font-lg-32 lh-lg-48 pb-34 text-center"><?php echo $e4_heading; ?></h2>
                    </div>
                <?php } ?>
                <?php if (!empty($e4_all_logo)) { ?>
                    <div class="row work-logos-wrap">
                        <?php
                        foreach ($e4_all_logo as $key => $logos_list) {
                            $e2_comp_logo = isset($logos_list['e2_comp_logo']) ? $logos_list['e2_comp_logo'] : ''; ?>
                            <div class="col-md-3 work-logo text-center">
                                <?php if (!empty($e2_comp_logo)) { ?>
                                    <div class="work-logo-inner">
                                        <?php echo wp_get_attachment_image($e2_comp_logo, 'full'); ?>
                                    </div>
                                <?php } ?>
                            </div>
                        <?php } ?>
                    </div>
                <?php } ?>
                <?php if (!empty($e3_description)) { ?>
                    <div>
                        <p><?php echo $e3_description; ?></p>
                    </div>
                <?php } ?>
            </div>
            </div>
        </section>
    <?php } ?>
<?php } ?>