<?php
if (!empty($args)) {
    $s8_dc_title = isset($args['s8_dc_title']) ? $args['s8_dc_title'] : '';
    $s8_dc_description = isset($args['s8_dc_description']) ? $args['s8_dc_description'] : '';
    $s8_checklist_data = isset($args['s8_checklist_data']) ? $args['s8_checklist_data'] : ''; ?>
    <?php if (!empty($s8_dc_title) || !empty($s8_dc_description) || !empty($s8_checklist_data)) { ?>
        <section class="development-checklist-section py-40 py-md-60 py-lg-80">
            <div class="container">
                <div class="heading-content text-center text-xs-left m-auto">
                    <?php if (!empty($s8_dc_title)) { ?>
                        <h2 class="color-222222 font-22 lh-34 font-sm-26 lh-sm-37 font-lg-32 lh-lg-48 mb-20"><?php echo $s8_dc_title; ?></h2>
                    <?php } ?>
                    <?php if (!empty($s8_dc_description)) { ?>
                        <p class="color-444444 font-16 lh-26 font-xs-14 pb-60 pb-xs-20" ><?php echo $s8_dc_description; ?></p>
                    <?php } ?>
                </div>
                <div class="development-blocks m-auto">
                    <?php if (!empty($s8_checklist_data)) { ?>
                        <?php
                            $count = 1;
                            foreach ($s8_checklist_data as $key => $checklist_data) {
                                ?>
                                <div class="development-block b-1-solid-DDDDDD rounded-medium">
                                    <?php
                                    $s8_list_title = isset($checklist_data['s8_list_title']) ? $checklist_data['s8_list_title'] : '';
                                    $s8_check_content = isset($checklist_data['s8_check_content']) ? $checklist_data['s8_check_content'] : ''; 
                                    ?>
                                    <span class="dev-digit bg-white color-222222 font-18 lh-28 font-xs-14 fw-600 flex justify-content-center align-items-center">
                                        <?php
                                            echo str_pad($count, 1, '0', STR_PAD_LEFT);
                                        ?>
                                    </span>
                                    <div>
                                        <?php if (!empty($s8_list_title) || !empty($s8_check_content)) { ?>
                                            <?php if (!empty($s8_list_title)) { ?>
                                                <p class="development-title color-222222 font-20 lh-30 font-xs-16 lh-xs-20 fw-500 mb-10"><?php echo $s8_list_title; ?></p>
                                            <?php } ?>
                                            <?php if (!empty($s8_check_content)) { ?>
                                                <p class="development-desc color-666666 font-16 lh-26 font-xs-14 lh-xs-20"><?php echo $s8_check_content; ?></p>
                                            <?php } ?>
                                            <?php $count++; ?>
                                        <?php } ?>
                                    </div>
                                </div>

                            <?php } ?>
                    <?php } ?>
                </div>
            </div>
        </section>
    <?php } ?>
<?php } ?>