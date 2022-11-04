<?php
$dir_path = get_template_directory();
$dir_url = get_template_directory_uri();
if (!empty($args)) {
    $background_color = isset($args['s9_select_background_color']) ? $args['s9_select_background_color'] : '';
    $s9_mint_title = isset($args['s9_mint_title']) ? $args['s9_mint_title'] : '';
    $s9_mint_content = isset($args['s9_mint_content']) ? $args['s9_mint_content'] : '';
    $s9_mint_sub_title = isset($args['s9_mint_sub_title']) ? $args['s9_mint_sub_title'] : '';
    $s9_why_mint_image = isset($args['s9_why_mint_image']) ? $args['s9_why_mint_image'] : '';
    $s9_why_mint_point = isset($args['s9_why_mint_point']) ? $args['s9_why_mint_point'] : array();

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

    <?php if (!empty($s9_select_background_color) || !empty($s9_mint_title) | !empty($s9_mint_content) || !empty($s9_mint_sub_title) || !empty($s9_why_mint_image) || !empty($s9_why_mint_point)) { ?>
        <section class="mint-your-section pt-40 pt-md-60 pt-lg-80  pb-10 pb-md-30 pb-lg-80 <?php echo $backColor; ?>">
            <div class="container">
                <?php 
                    if (!empty($s9_mint_title) | !empty($s9_mint_content) ){?>
                        <div class="row">
                            <div class="col-12 ">
                                <div class="heading-content pb-30 pb-md-60">
                                    <?php if (!empty($s9_mint_title)) { ?>
                                        <h2 class="color-white font-22 lh-34 font-sm-26 lh-sm-37 font-lg-32 lh-lg-48 mb-20 mb-xs-10"><?php echo $s9_mint_title; ?></h2>
                                    <?php } ?>
                                    <?php if (!empty($s9_mint_content)) { ?>
                                        <p class="color-A7A9AB font-16 lh-24 fw-500 font-xs-14"><?php echo $s9_mint_content; ?></p>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    <?php }
                ?>
                <div class="row">
                    <?php if(!empty($s9_mint_sub_title) || !empty($s9_why_mint_image)) { ?>
                        <div class="col-md-6 order-1 order-md-0">
                            <div class="when-you-work-section">
                                <?php if (!empty($s9_mint_sub_title)) { ?>
                                    <h3 class="when-you-work-title color-white font-18 lh-28 font-lg-24 fw-400 pb-25"><?php echo $s9_mint_sub_title; ?></h3>
                                <?php } ?>
    
                                <?php if (!empty($s9_why_mint_point)) { ?>
                                    <div class="row when-you-work-blocks">
                                        <?php
                                        foreach ($s9_why_mint_point as $key => $services_list) {
                                            $s9_point_icon = isset($services_list['s9_point_icon']) ? $services_list['s9_point_icon'] : '';
                                            $s9_point_title = isset($services_list['s9_point_title']) ? $services_list['s9_point_title'] : '';
                                            $s9_point_content = isset($services_list['s9_point_content']) ? $services_list['s9_point_content'] : ''; ?>
                                            <div class="col-sm-6 when-you-work-block mb-30 text-center text-sm-unset">
                                                <div class="when-you-work-block-icon mb-15 lh-1">
                                                    <?php if (!empty($s9_point_icon)) {
                                                        $svg_path = $dir_path . '/assets/icons/' . $s9_point_icon . '.svg';
                                                        if (file_exists($svg_path)) {
                                                            $svg = $dir_url . '/assets/icons/' . $s9_point_icon . '.svg';
                                                            if (!empty($svg)) { ?>
                                                                <img src="<?php echo $svg; ?>" title="<?php echo $s9_point_title; ?>" alt="<?php echo $s9_point_title; ?>" />
                                                            <?php } ?>
                                                        <?php } ?>
                                                    <?php } else { ?>
                                                        <?php echo $s9_point_title; ?>
                                                    <?php } ?>
                                                </div>
                                                <?php if (!empty($s9_point_title)) { ?>   
                                                    <h4 class="when-you-work-block-title color-white font-18 lh-27 mb-5 fw-600"><?php echo $s9_point_title; ?></h4>
                                                <?php } ?>
                                                <?php if (!empty($s9_point_content)) { ?>
                                                    <div class="when-you-work-block-content color-A7A9AB font-14 font-sm-16 lh-24">
                                                        <?php echo $s9_point_content; ?>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        <?php } ?>
                                    <?php } ?>
                                    </div>
                            </div>
                        </div>
                    <?php } ?>
                    <?php if (!empty($s9_why_mint_image)) { ?>
                        <div class="col-md-6 text-center text-md-center lh-1 mb-15 mb-md-0">
                            <?php echo wp_get_attachment_image($s9_why_mint_image, 'full'); ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </section>
    <?php } ?>
<?php } ?>