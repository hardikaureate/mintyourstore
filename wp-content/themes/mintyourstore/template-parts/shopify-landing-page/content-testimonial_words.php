<?php
if (!empty($args)) {
    $e5_heading = isset($args['e5_heading']) ? $args['e5_heading'] : '';
    $clients_words = isset($args['clients_words']) ? $args['clients_words'] : array();
    $building_data = isset($args['building_data']) ? $args['building_data'] : array();

?>
    <?php if (!empty($e5_heading) || !empty($clients_words) || !empty($building_data)) { ?>
        <section class="testimonial-words-section py-40 py-md-60 py-lg-80">
            <div class="container">
                <?php if (!empty($e5_heading)) { ?>
                    <div class="heading-section">
                        <h2 class="color-222222 font-22 lh-34 font-sm-26 lh-sm-37 font-lg-32 lh-lg-48 pb-34 text-center"><?php echo $e5_heading; ?></h2>
                    </div>
                <?php } ?>
                <div class="testimonial-words-row row">
                    <div class="col-md-6 dont-take-left">
                        <div class="pr-90">
                            <?php if (!empty($building_data)) {
                                $e5_title = isset($building_data['e5_title']) ? $building_data['e5_title'] : '';
                                $e5_sub_title = isset($building_data['e5_sub_title']) ? $building_data['e5_sub_title'] : '';
                                $smiley = isset($building_data['smiley']) ? $building_data['smiley'] : '';
                                $e5_counter_data = isset($building_data['e5_counter_data']) ? $building_data['e5_counter_data'] : array();
                            ?>
            
                            <?php if (!empty($e5_title) || !empty($e5_sub_title) || !empty($smiley) || !empty($e5_counter_data)) { ?>
            
                                <?php if (!empty($e5_title)) { ?>
                                    <h3 class="fonr-28 lh-38 fw-500 color-222222 pb-24">
                                        <?php echo $e5_title; ?>
                                    </h3>
                                <?php } ?>
            
                                <?php if (!empty($e5_sub_title)) { ?>
                                    <p class="font-18 lh-30 color-888888 pb-50 mb-50">
                                        <?php echo $e5_sub_title; ?>
                                    </p>
                                <?php } ?>
            
                                <?php if (!empty($smiley)) { ?>
                                    <div>
                                        <?php echo wp_get_attachment_image($smiley, 'full'); ?>
                                    </div>
                                <?php } ?>
            
                                <?php if (!empty($e5_counter_data)) { ?>
                                    <?php
                                    foreach ($e5_counter_data as $key => $counterdata) {
                                        $counter_number = isset($counterdata['counter_number']) ? $counterdata['counter_number'] : '';
                                        $counter_text = isset($counterdata['counter_text']) ? $counterdata['counter_text'] : '';
                                    ?>
                                        <?php if (!empty($counter_number) || !empty($counter_text)) { ?>
                                            <?php if (!empty($counter_number)) { ?>
                                                <div>
                                                    <?php echo $counter_number; ?>
                                                </div>
                                            <?php } ?>
            
                                            <?php if (!empty($counter_text)) { ?>
                                                <div>
                                                    <?php echo $counter_text; ?>
                                                </div>
                                            <?php } ?>
            
                                        <?php } ?>
                                    <?php } ?>
                                <?php } ?>
            
                            <?php } ?>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-md-6 dont-take-call">
                        <?php if (!empty($clients_words)) { ?>
                            <?php $e5_testimonials = isset($clients_words['e5_testimonials']) ? $clients_words['e5_testimonials'] : array();
                            if (!empty($e5_testimonials)) {
                                foreach ($e5_testimonials as $key => $testimonials_list) {
                                    $avtar = isset($testimonials_list['avtar']) ? $testimonials_list['avtar'] : '';
                                    $name = isset($testimonials_list['name']) ? $testimonials_list['name'] : '';
                                    $link_url = isset($testimonials_list['url']) ? $testimonials_list['url'] : '';
                                    $rating = isset($testimonials_list['rating']) ? $testimonials_list['rating'] : '';
                                    $content = isset($testimonials_list['content']) ? $testimonials_list['content'] : '';
                            ?>  
                                <div class="bg-white rounded-medium p-28 mb-20">
                                    <?php if (!empty($avtar) || !empty($name) || !empty($link_url) || !empty($content)) { ?>
                                        <div class="flex justify-content-between pb-10">
                                            <div class="flex align-items-center">
                                                <?php if (!empty($avtar)) { ?>
                                                    <?php echo wp_get_attachment_image($avtar, 'full'); ?>
                                                <?php } ?>
                                                <div>
                                                    <?php if (!empty($name)) { ?>
                                                        <h3 class="font-18 lh-26 color-222222 fw-600 pl-20">
                                                            <?php echo $name; ?>
                                                            <?php if (!empty($link_url)) { ?>
                                                                <span class="font-12 lh-18 color-888888 fw-400 d-block">
                                                                    <?php echo $link_url; ?>
                                                                </span>
                                                            <?php } ?>
                                                        </h3>
                                                    <?php } ?>
                                                    
                                                </div>
                                            </div>
                                            <?php if (!empty($rating)) { ?>
                                                <div class="testimonial-content flex align-items-center">
                                                    <?php
                                                    for ($i = 1; $i <= 5; $i++) {
                                                        if ($i <= $rating) {
                                                            $url = get_template_directory_uri() . '/assets/images/single-star.svg';
                                                        } else {
                                                            $url = get_template_directory_uri() . '/assets/images/single-star-empty.svg';
                                                        }
                                                    ?>
                                                        <img src="<?php echo $url; ?>" title="Star" alt="Star" width="22" height="20" />
                                                    <?php } ?>
                                                </div>
                                            <?php } ?>
                                        </div>
                                        <?php if (!empty($content)) { ?>
                                            <div class="font-16 lh-28 color-888888 pl-80">
                                                <?php echo $content; ?>
                                            </div>
                                        <?php } ?>
                                    <?php } ?>
                                </div>
                                <?php } ?>
                            <?php } ?>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </section>
    <?php } ?>
<?php } ?>