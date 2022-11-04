<?php
if (!empty($args)) {
    $e6_heading = isset($args['e6_heading']) ? $args['e6_heading'] : '';
    $e6_counter_data = isset($args['e6_counter_data']) ? $args['e6_counter_data'] : array();
    $e6_image = isset($args['e6_image']) ? $args['e6_image'] : '';
    $e6_description = isset($args['e6_description']) ? $args['e6_description'] : ''; ?>

    <?php if (!empty($e6_heading) || !empty($e6_description) || !empty($e6_counter_data)) { ?>

        <section class="">
            <div class="container">
                <div class="row">
                    <?php if (!empty($e6_heading)) { ?>
                        <div>
                            <h2><?php echo $e6_heading; ?></h2>
                        </div>
                    <?php } ?>

                    <?php if (!empty($e6_description)) { ?>
                        <div>
                            <p><?php echo $e6_description; ?></p>
                        </div>
                    <?php } ?>

                    <?php if (!empty($e6_image)) { ?>
                        <div>
                            <?php echo wp_get_attachment_image($e6_image, 'full'); ?>
                        </div>
                    <?php } ?>

                    <div class="col-12">
                        <?php if (!empty($e6_counter_data)) { ?>
                            <div class="">
                                <?php
                                foreach ($e6_counter_data as $key => $countdata) {
                                    $e6_number = isset($countdata['e6_number']) ? $countdata['e6_number'] : '';
                                    $e6_content = isset($countdata['e6_content']) ? $countdata['e6_content'] : ''; ?>

                                    <?php if (!empty($e6_number) || !empty($e6_content)) { ?>
                                        <div data-aos="fade-up">
                                            <?php if (!empty($e6_number)) { ?>
                                                <div>
                                                    <p><?php echo $e6_number; ?></p>
                                                </div>
                                            <?php } ?>

                                            <?php if (!empty($e6_content)) { ?>
                                                <div>
                                                    <p><?php echo $e6_content; ?></p>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    <?php } ?>
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