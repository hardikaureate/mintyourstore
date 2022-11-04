<?php
$dir_path = get_template_directory();
$dir_url = get_template_directory_uri();
if (!empty($args)) {
    $select_background_color = isset($args['select_background_color']) ? $args['select_background_color'] : '';
    $s4_title = isset($args['s4_title']) ? $args['s4_title'] : '';
    $s4_description = isset($args['s4_description']) ? $args['s4_description'] : '';
    $s4_mint_services = isset($args['s4_mint_services']) ? $args['s4_mint_services'] : array(); 
    
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

    <?php if (!empty($select_background_color) || !empty($s4_title) | !empty($s4_description) || !empty($s4_mint_services)) { ?>
        <section class="store-development-section py-40 py-md-60 py-lg-80 <?php echo $backColor; ?>">
            <div class="container">
                <?php if (!empty($s4_title) | !empty($s4_description)) { ?>
                    <div class="heading-section mb-30">
                        <?php if (!empty($s4_title)) { ?>
                            <h2 class="color-222222 font-22 lh-34 font-sm-26 lh-sm-37 font-lg-32 lh-lg-48 m-auto"><?php echo $s4_title; ?></h2>
                        <?php } ?>
                        <?php if (!empty($s4_description)) { ?>
                            <p class="color-444444 font-16 lh-26 font-xs-14 mb-0"><?php echo $s4_description; ?>
                        <?php } ?>
                    </div>
                
                    <?php if (!empty($s4_mint_services)) { ?>
                        <div class="row">
                            <?php
                            foreach ($s4_mint_services as $key => $services_list) {
                                $s4_mint_icon = isset($services_list['s4_mint_icon']) ? $services_list['s4_mint_icon'] : '';
                                $s4_mint_services_list = isset($services_list['s4_mint_services_list']) ? $services_list['s4_mint_services_list'] : '';
                            ?>
                            <div class="w-full col-sm-6 col-md-4 mb-xs-15 mb-20">
                                <div class="store-development-block-inner bg-white b-1-solid-DDDDDD rounded-medium p-25 relative h-full flex align-items-center ">
                                    <?php if (!empty($s4_mint_icon)) {
                                        $svg_path = $dir_path . '/assets/icons/' . $s4_mint_icon . '.svg';
                                        if (file_exists($svg_path)) {
                                            $svg = $dir_url . '/assets/icons/' . $s4_mint_icon . '.svg';
                                            if (!empty($svg)) { ?>
                                                <img class="mr-20" src="<?php echo $svg; ?>" title="<?php echo $s4_mint_services_list; ?>" alt="<?php echo $s4_mint_services_list; ?>" />
                                            <?php } ?>
                                        <?php } ?>
                                    <?php } else { ?>
                                        <?php echo $s4_mint_services_list; ?>
                                    <?php } ?>
                                    <?php if (!empty($s4_mint_services_list)) { ?>
                                        <h3 class="block-title color-222222 font-16 font-md-16 lh-24 fw-400"><?php echo $s4_mint_services_list; ?></h3>
                                    <?php } ?>
                                </div>
                            </div>
                            <?php } ?>
                        </div>

                    <?php } ?>
                <?php } ?>
            </div>
        </section>
    <?php } ?>
<?php } ?>