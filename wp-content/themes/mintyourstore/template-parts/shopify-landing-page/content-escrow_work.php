<?php
if (!empty($args)) {
    $e3_title = isset($args['e3_title']) ? $args['e3_title'] : '';
    $e3_work_list = isset($args['e3_work_list']) ? $args['e3_work_list'] : array();
    $e3_description = isset($args['e3_description']) ? $args['e3_description'] : ''; ?>

    <?php if (!empty($e3_title) || !empty($e3_description) || !empty($e3_work_list)) { ?>

        <section class="escrow-section py-40 py-md-60 py-lg-80">
            <div class="container">
                <?php if (!empty($e3_title)) { ?>
                    <div class="heading-section">
                        <h2 class="color-white font-22 lh-34 font-sm-26 lh-sm-37 font-lg-32 lh-lg-48 pb-34 text-center"><?php echo $e3_title; ?></h2>
                    </div>
                <?php } ?>

                <div class="col-12">
                    <?php if (!empty($e3_work_list)) { ?>
                        <div class="work-row">
                            <?php
                            $count = 1;
                            foreach ($e3_work_list as $key => $slider_list) {
                                $e3_content = isset($slider_list['e3_content']) ? $slider_list['e3_content'] : ''; ?>
                                <div class="work-col">
                                    <?php if (!empty($e3_content)) { ?>
                                        <div class="work-col-box">
                                            <p><?php echo $e3_content; ?></p>
                                        </div>
                                        <span>
                                            <b>
                                                <?php echo $count; ?>
                                            </b>
                                        </span>
                                    <?php } ?>
                                </div>
                                <?php $count++; ?>
                            <?php } ?>
                        </div>
                    <?php } ?>
                </div>
                <div class="row">

                    <?php if (!empty($e3_description)) { ?>
                        <div class="howit-work-msg">
                            <p><?php echo $e3_description; ?></p>
                        </div>
                    <?php } ?>

                </div>
            </div>
            </div>
        </section>
    <?php } ?>
<?php } ?>