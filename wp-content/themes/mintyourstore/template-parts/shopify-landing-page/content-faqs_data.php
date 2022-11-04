<?php
if (!empty($args)) {
    $s14_faqs_description = isset($args['s14_faqs_description']) ? $args['s14_faqs_description'] : '';
    $s14_faqs_heading = isset($args['s14_faqs_heading']) ? $args['s14_faqs_heading'] : '';
    $s14_faqs_list = isset($args['s14_faqs_list']) ? $args['s14_faqs_list'] : array();
?>
    <?php if (!empty($s14_faqs_description) || !empty($s14_faqs_heading) || !empty($s14_faqs_list)) { ?>
        <section class="">
            <div class="container">
                <div class="row">
                    <?php if (!empty($s14_faqs_heading)) { ?>
                        <div>
                            <h4><?php echo $s14_faqs_heading; ?></h4>
                        </div>
                    <?php } ?>

                    <?php if (!empty($s14_faqs_description)) { ?>
                        <div>
                            <?php echo $s14_faqs_description; ?>
                        </div>
                    <?php } ?>

                    <?php if (!empty($s14_faqs_list)) { ?>
                        <?php
                        foreach ($s14_faqs_list as $key => $faq_list) {
                            $faqs_title = isset($faq_list['faqs_title']) ? $faq_list['faqs_title'] : '';
                            $faqs_content = isset($faq_list['faqs_content']) ? $faq_list['faqs_content'] : '';
                        ?>
                            <?php if (!empty($faqs_title) || !empty($faqs_content)) { ?>
                                <?php if (!empty($faqs_title)) { ?>
                                    <div>
                                        <?php echo $faqs_title; ?>
                                    </div>
                                <?php } ?>

                                <?php if (!empty($faqs_content)) { ?>
                                    <div>
                                        <?php echo $faqs_content; ?>
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