<?php
if (!empty($args)) {
    $s12_heading = isset($args['s12_heading']) ? $args['s12_heading'] : '';
    $s12_content = isset($args['s12_content']) ? $args['s12_content'] : '';
    $s12_description = isset($args['s12_description']) ? $args['s12_description'] : '';
    $s12_agencies_list = isset($args['s12_agencies_list']) ? $args['s12_agencies_list'] : array();?>

    <?php if (!empty($s12_heading) | !empty($s12_content) || !empty($s12_description) || !empty($s12_agencies_list)) { ?>
        <section class="shopify-agencies-section py-40 py-md-60 py-lg-80 <?php echo $backColor; ?>">
            <div class="container">
                <div class="services-block p-30 p-sm-50 bg-F1F8FA mb-40">
                    <?php if (!empty($s12_heading) | !empty($s12_content) || !empty($s12_description)) { ?>
                        <div class="row service-item">
                            <div class="col-sm-6 pr-sm-50">
                                <?php if (!empty($s12_heading)) {
                                        $cta_link = isset($s12_heading['url']) ? $s12_heading['url'] : '';
                                        $cta_title = isset($s12_heading['title']) ? $s12_heading['title'] : '';
                                        $cta_target = !empty($s12_heading['target']) ? 'target="_blank"' : '';
    
                                        $cta_link = filter_var($cta_link, FILTER_SANITIZE_URL);
                                        if (filter_var($cta_link, FILTER_VALIDATE_URL) !== false) {
                                            $url = esc_url($cta_link);
                                        } else {
                                            $url = '#';
                                            $cta_target = '';
                                        }
    
                                        if (!empty($url) && !empty($cta_title)) {   ?>
                                        <h3 class="font-20 font-md-22 font-lg-24 lh-1-4 mb-10">
                                            <a class="color-222222" href="<?php echo $url; ?>" <?php echo $cta_target; ?> title="<?php echo $cta_title; ?>">
                                                <?php echo $cta_title; ?>
                                            </a>
                                        </h3>
                                        <?php } ?>
                                <?php } ?>
                                <?php if (!empty($s12_content)) { ?>
                                    <p class="font-15 font-sm-16 lh-1-5 lh-sm-1-7 fw-400 color-444444 mb-20"><?php echo $s12_content; ?></p>
                                <?php } ?>
                                
                            </div>
                            <div class="col-sm-6 pl-sm-50 checkdash-full">
                                <ul>
                                <?php if (!empty($s12_agencies_list)) { ?>
                                    <?php
                                    foreach ($s12_agencies_list as $key => $services_list) {
                                        $s12_list_of_mint = isset($services_list['s12_list_of_mint']) ? $services_list['s12_list_of_mint'] : ''; ?>
                                            <?php if (!empty($s12_list_of_mint)) { ?>
                                                <li>
                                                    <?php echo $s12_list_of_mint; ?>
                                                </li>
                                            <?php } ?>
                                        <?php } ?>    
                                    <?php } ?>
                                </ul>
                                <div class="font-15 font-sm-16 lh-1-5 lh-sm-1-6 fw-400 color-444444 mt-20">
                                    <?php if (!empty($s12_description)) { ?>
                                        <i><?php echo $s12_description; ?></i>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </section>
    <?php } ?>
<?php } ?>