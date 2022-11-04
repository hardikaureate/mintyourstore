<?php
$dir_path = get_template_directory();
$dir_url = get_template_directory_uri();
if (!empty($args)) {
    $select_background_color = isset($args['select_background_color']) ? $args['select_background_color'] : '';
    $s3_service_title = isset($args['s3_service_title']) ? $args['s3_service_title'] : '';
    $s3_service_content = isset($args['s3_service_content']) ? $args['s3_service_content'] : '';
    $s3_theme_service_content = isset($args['s3_theme_service_content']) ? $args['s3_theme_service_content'] : '';
    $s3_theme_services = isset($args['s3_theme_services']) ? $args['s3_theme_services'] : array();

    $backColor = 'bg-white';
    if (!empty($select_background_color)) {
        if ($select_background_color == 'light') {
            $backColor = "bg-light";
        } elseif ($select_background_color == 'dark') {
            $backColor = "bg-dark";
        } else {
            $backColor = "bg-white";
        }
    } ?>

    <?php if (!empty($select_background_color) || !empty($s3_service_title) || !empty($s3_service_content) || !empty($s3_theme_services) || !empty($s3_theme_service_content)) { ?>

        <section class="store-development-section py-40 py-md-60 py-lg-80 <?php echo $backColor; ?>">
            <div class="container">
                <div class="heading-section mb-30">
                    <?php if (!empty($s3_service_title)) { ?>
                        <h2 class="color-222222 font-22 lh-34 font-sm-26 lh-sm-37 font-lg-32 lh-lg-48 m-auto"><?php echo $s3_service_title; ?></h2>
                    <?php } ?>
                    <?php if (!empty($s3_service_content)) { ?>
                        <p class="color-444444 font-16 lh-26 font-xs-14  mb-0"><?php echo $s3_service_content; ?></p>
                    <?php } ?>
                </div>
                <div class="row">
                    <?php if (!empty($s3_theme_services)) { ?>
                        <?php
                        foreach ($s3_theme_services as $key => $services_list) {
                            
                            $s3_service_icon = isset($services_list['s3_service_icon']) ? $services_list['s3_service_icon'] : '';
                            $s3_service_title = isset($services_list['s3_service_title']) ? $services_list['s3_service_title'] : ''; ?>
                            <div class="w-full col-sm-6 col-md-4 mb-xs-15 mb-20">
                                <div class="store-development-block-inner bg-white b-1-solid-DDDDDD rounded-medium p-25 relative h-full flex align-items-center ">
                                    <?php if (!empty($s3_service_icon) || !empty($s3_service_title)) { ?>
                                        <?php if (!empty($s3_service_icon)) {
                                            $svg_path = $dir_path . '/assets/icons/' . $s3_service_icon . '.svg';
                                            if (file_exists($svg_path)) {
                                                $svg = $dir_url . '/assets/icons/' . $s3_service_icon . '.svg';
                                                if (!empty($svg)) { ?>
                                                    <img class="mr-20" src="<?php echo $svg; ?>" title="<?php echo $s3_service_title; ?>" alt="<?php echo $s3_service_title; ?>" />
                                                <?php } ?>
                                            <?php } ?>
                                        <?php } else { ?>
                                            <?php echo $s3_service_title; ?>
                                        <?php } ?>
        
                                        <?php if (!empty($s3_service_title)) { ?>
                                            <h3 class="block-title font-16 font-md-16 lh-24 fw-400">
                                                <?php echo $s3_service_title; ?>
                                            </h3>
                                        <?php } ?>
                                    <?php } ?>
                                </div>
                            </div>
                        

                        <?php } ?>

                    <?php } ?>

                    
                </div>
                <?php if (!empty($s3_theme_service_content)) { ?>
                    <div class="p-30 bg-white font-16 text-center">
                        <?php echo $s3_theme_service_content; ?>
                    </div>
                <?php } ?>
            </div>
        </section>
    <?php } ?>
<?php } ?>