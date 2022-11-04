<?php
$dir_path = get_template_directory();
$dir_url = get_template_directory_uri();
if (!empty($args)) {
    $background_color = isset($args['select_background_color']) ? $args['select_background_color'] : '';
    $s2_service_title = isset($args['s2_service_title']) ? $args['s2_service_title'] : '';
    $s2_service_description = isset($args['s2_service_description']) ? $args['s2_service_description'] : '';
    $s2_content = isset($args['s2_content']) ? $args['s2_content'] : '';
    $s2_services_list = isset($args['s2_services_list']) ? $args['s2_services_list'] : array();

    $backColor = 'bg-white';
    if (!empty($background_color)) {
        if ($background_color == 'light') {
            $backColor = "bg-light";
        } elseif ($background_color == 'dark') {
            $backColor = "bg-dark";
        } else {
            $backColor = "bg-white";
        }
    } ?>

    <?php if (!empty($s2_service_title) || !empty($s2_service_description) || !empty($s2_services_list) || !empty($s2_content)) { ?>

        <section class="store-development-section pt-40 pt-md-60 pt-lg-80 pb-10 pb-md-30 pb-lg-50 text-center <?php echo $backColor; ?>">
            <div class="container">
                <?php if (!empty($s2_service_title)) { ?>
                    <div class="heading-section mb-30">
                        <h2 class="color-222222 font-22 lh-34 font-sm-26 lh-sm-37 font-lg-32 lh-lg-48 m-auto"><?php echo $s2_service_title; ?></h2>
                        <?php if (!empty($s2_service_description)) { ?>
                            <div class="section-subtitle text-center">
                                <?php echo $s2_service_description; ?>
                            </div>
                        <?php } ?>
                    </div>
                <?php } ?>
                <div class="row">
                    <?php if (!empty($s2_services_list)) { ?>
                        <?php
                        foreach ($s2_services_list as $key => $services_list) {
                            $s2_service_icon = isset($services_list['s2_service_icon']) ? $services_list['s2_service_icon'] : '';
                            $s2_title = isset($services_list['s2_title']) ? $services_list['s2_title'] : '';
                            $s2_description = isset($services_list['s2_description']) ? $services_list['s2_description'] : '';
                            $s2_cta_link = isset($services_list['s2_cta_link']) ? $services_list['s2_cta_link'] : ''; ?>
                            <div class="w-full col-sm-6 col-md-4 mb-30">
                                <div class="store-development-block-inner bg-white b-1-solid-DDDDDD rounded-medium p-20 p-sm-30 relative h-full flex flex-col align-items-center justify-content-between">
                                    <?php if (!empty($s2_service_icon) || !empty($s2_title) || !empty($s2_description) || !empty($s2_cta_link)) { ?>
                                        <div class="">
                                            <div class="mb-15 lh-1">
                                            <?php if (!empty($s2_cta_link)) {
                                                $CTA_link = isset($s2_cta_link['url']) ? $s2_cta_link['url'] : '';
                                                $CTA_title = isset($s2_cta_link['title']) ? $s2_cta_link['title'] : '';
                                                $CTA_target = !empty($s2_cta_link['target']) ? 'target="_blank"' : '';
                                                if (!empty($CTA_link)) {   ?>
                                                    <a class="d-inline-block" aria-label="<?php echo $CTA_title; ?>" href="<?php echo esc_url($CTA_link); ?>" <?php echo $CTA_target; ?>>
                                                    <?php } ?>
                                                <?php } ?>
            
                                                <?php if (!empty($s2_service_icon)) {
                                                    $svg_path = $dir_path . '/assets/icons/' . $s2_service_icon . '.svg';
                                                    if (file_exists($svg_path)) {
                                                        $svg = $dir_url . '/assets/icons/' . $s2_service_icon . '.svg';
                                                        if (!empty($svg)) { ?>
                                                            <img src="<?php echo $svg; ?>" title="<?php echo $CTA_title; ?>" alt="<?php echo $CTA_title; ?>" />
                                                        <?php } ?>
                                                    <?php } ?>
                                                <?php } else { ?>
                                                    <?php echo $CTA_title; ?>
                                                <?php } ?>
            
                                                <?php if (!empty($s2_cta_link)) {
                                                    $CTA_link = isset($s2_cta_link['url']) ? $s2_cta_link['url'] : '';
                                                    $CTA_title = isset($s2_cta_link['title']) ? $s2_cta_link['title'] : '';
                                                    $CTA_target = !empty($s2_cta_link['target']) ? 'target="_blank"' : '';
                                                    if (!empty($CTA_link)) {   ?>
                                                    </a>
                                                <?php } ?>
    
                                            <?php } ?>
                                            </div>
                                            
                                            <?php if (!empty($s2_title)) {
                                                $cta_link = isset($s2_title['url']) ? $s2_title['url'] : '';
                                                $cta_title = isset($s2_title['title']) ? $s2_title['title'] : '';
                                                $cta_target = !empty($s2_title['target']) ? 'target="_blank"' : '';
            
                                                $cta_link = filter_var($cta_link, FILTER_SANITIZE_URL);
                                                if (filter_var($cta_link, FILTER_VALIDATE_URL) !== false) {
                                                    $url = esc_url($cta_link);
                                                } else {
                                                    $url = '#mys_footer_contactform';
                                                    $cta_target = '';
                                                }
            
                                                if (!empty($url) && !empty($cta_title)) {   ?>
                                                    <a class="" href="<?php echo $url; ?>" <?php echo $cta_target; ?> title="<?php echo $cta_title; ?>">
                                                        <h3 class="block-title color-222222 font-20 lh-26 font-md-22 fw-600 lh-md-32 mb-15"><?php echo $cta_title; ?></h3>
                                                    </a>
                                                <?php } ?>
                                            <?php } ?>
    
                                            <?php if (!empty($s2_description)) { ?>
                                                <div class="block-desc color-666666 font-16 lh-25 mb-30 mb-sm-30 "> 
                                                    <?php echo $s2_description; ?>
                                                </div>
                                            <?php } ?>
                                        </div>

                                        <div class="">
                                        <?php if (!empty($s2_cta_link)) {
                                            $cta_link = isset($s2_cta_link['url']) ? $s2_cta_link['url'] : '';
                                            $cta_title = isset($s2_cta_link['title']) ? $s2_cta_link['title'] : '';
                                            $cta_target = !empty($s2_cta_link['target']) ? 'target="_blank"' : '';
                                            $cta_link = filter_var($cta_link, FILTER_SANITIZE_URL);
                                            if (filter_var($cta_link, FILTER_VALIDATE_URL) !== false) {
                                                $url = esc_url($cta_link);
                                            } else {
                                                $url = '#';
                                                $cta_target = '';
                                            }
                                            if (!empty($url) && !empty($cta_title)) {   ?>
                                                <a class="btn btn-white font-16" href="<?php echo $url; ?>" <?php echo $cta_target; ?> title="<?php echo $cta_title; ?>">
                                                    <?php echo $cta_title; ?>
                                                </a>
                                            <?php } ?>
                                        <?php } ?>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        <?php } ?>
                    <?php } ?>
                </div>
                <?php if (!empty($s2_content)) { ?>
                    <div class="p-30 bg-white font-16 text-center">
                        <?php echo $s2_content; ?>
                    </div>
                <?php } ?>
            </div>
        </section>
    <?php } ?>
<?php } ?>