<?php
if (!empty($args)) {
    $s5_script_heading = isset($args['s5_script_heading']) ? $args['s5_script_heading'] : '';
    $s5_script_content = isset($args['s5_script_content']) ? $args['s5_script_content'] : '';
    $s5_faqs_heading = isset($args['s5_faqs_heading']) ? $args['s5_faqs_heading'] : '';
    $s5_faqs_list = isset($args['s5_faqs_list']) ? $args['s5_faqs_list'] : array();
?>
    <?php if (!empty($s5_script_heading) || !empty($s5_script_content) || !empty($s5_faqs_heading) || !empty($s5_faqs_list)) { ?>
        <section class="faq-section py-40 py-md-60 py-lg-80">
            <div class="container">
                <?php if (!empty($s5_script_heading) || !empty($s5_script_content)) { ?>
                    <div class="why-mint-hire-section bg-F5F5F5 mb-40 mb-sm-60 p-30 p-md-60 rounded-medium">
                        <?php if (!empty($s5_script_heading)) { ?>
                            <h2 class="font-sm-26 lh-sm-37 font-lg-32 lh-lg-40"><?php echo $s5_script_heading; ?></h2>
                        <?php } ?>

                        <?php if (!empty($s5_script_content)) { ?>
                            <div class="why-mint-desc">
                                <?php echo $s5_script_content; ?>
                            </div>
                        <?php } ?>
                    </div>
                <?php } ?>


                <?php if (!empty($s5_faqs_heading)) { ?>
                    <h2 class="text-center font-22 lh-34 font-sm-26 lh-sm-37 font-lg-32 lh-lg-48 mb-20 mb-sm-30"><?php echo $s5_faqs_heading; ?></h2>
                <?php } ?>

                <?php if (!empty($s5_faqs_list)) {
                ?>
                    <div class="accordian-main m-auto">
                        <?php
                        foreach ($s5_faqs_list as $key => $faq_list) {
                            $s5_faq_title = isset($faq_list['s5_faq_title']) ? $faq_list['s5_faq_title'] : '';
                            $s5_faq_content = isset($faq_list['s5_faq_content']) ? $faq_list['s5_faq_content'] : '';
                        ?>
                            <div class="accordion-wrap">
                                <?php if (!empty($s5_faq_title) || !empty($s5_faq_content)) { ?>
                                    <?php if (!empty($s5_faq_title)) { ?>
                                        <div class="accordion-link color-222222 font-14 lh-22 fw-500 font-sm-18 lh-sm-27 flex">
                                            <?php echo $s5_faq_title; ?>
                                        </div>
                                    <?php } ?>

                                    <?php if (!empty($s5_faq_content)) { ?>
                                        <div class="accordion-content color-444444 font-14 font-sm-16">
                                            <?php echo $s5_faq_content; ?>
                                        </div>
                                    <?php } ?>
                                <?php } ?>
                            </div>
                        <?php } ?>
                    </div>
                    <script>
                        const accordionBtns = document.querySelectorAll(".accordion-link");

                        const first_accordion = document.querySelector('.accordion-link');
                        first_accordion.classList.toggle("is-open");
                        let first_content = first_accordion.nextElementSibling;
                        first_content.style.maxHeight = first_content.scrollHeight + "px";

                        accordionBtns.forEach((accordion) => {
                            accordion.onclick = function() {
                                this.classList.toggle("is-open");
                                let content = this.nextElementSibling;

                                const accordionlink = document.querySelectorAll(".accordion-link");
                                accordionlink.forEach((al) => {
                                    if (al != this) {
                                        al.classList.remove('is-open');
                                    }
                                });

                                const accordioncontent = document.querySelectorAll(".accordion-content");
                                accordioncontent.forEach((ac) => {
                                    if (ac != content) {
                                        ac.style.maxHeight = null;
                                    }
                                });

                                if (content.style.maxHeight) {
                                    content.style.maxHeight = null;
                                } else {
                                    content.style.maxHeight = content.scrollHeight + "px";
                                }
                            };
                        });
                    </script>
                <?php }
                ?>
            </div>
        </section>
    <?php } ?>
<?php } ?>