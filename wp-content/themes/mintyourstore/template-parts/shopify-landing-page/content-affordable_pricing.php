<?php
if (!empty($args)) {
    $e2_brands_title = isset($args['e2_brands_title']) ? $args['e2_brands_title'] : '';
    $e2_works_logos = isset($args['e2_works_logos']) ? $args['e2_works_logos'] : array();

    if (!empty($e2_brands_title) || !empty($e2_works_logos)) { ?>

        <section class="brand-logo-section py-40 py-md-60 py-lg-80">
            <div class="container">
                <div class="brand-block flex pb-20 pb-md-40 pb-lg-60">
                    <?php if (!empty($e2_brands_title)) { ?>
                        <?php echo $e2_brands_title; ?>
                    <?php } ?>

                    <?php if (!empty($e2_works_logos)) { ?>
                        <div class="brand-logos flex align-items-center">
                            <?php
                            foreach ($e2_works_logos as $key => $alllogo) {
                                $head_logo = isset($alllogo['head_logo']) ? $alllogo['head_logo'] : ''; ?>
                                <?php if (!empty($head_logo)) { ?>
                                    <div class="brand-logo">
                                        <?php echo wp_get_attachment_image($head_logo, 'full'); ?>
                                    </div>
                                <?php } ?>
                            <?php } ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </section>
    <?php
    }

    $e2_main_title = isset($args['e2_main_title']) ? $args['e2_main_title'] : '';
    $e2_description = isset($args['e2_description']) ? $args['e2_description'] : '';
    $e2_price_table_header = isset($args['e2_price_table_header']) ? $args['e2_price_table_header'] : '';
    $affordable_pricing_table = isset($args['affordable_pricing_table']) ? $args['affordable_pricing_table'] : array();
    $e2_package_cta = isset($args['e2_package_cta']) ? $args['e2_package_cta'] : '';
    $e2_project_costing = isset($args['e2_project_costing']) ? $args['e2_project_costing'] : ''; ?>

    <?php if (!empty($e2_main_title) || !empty($e2_description) || !empty($affordable_pricing_table) || !empty($e2_package_cta) || !empty($e2_project_costing)) { ?>

        <section class="pricing-section py-40 py-md-60 py-lg-80" id="pricing-row">
            <div class="container">
                <div class="heading-content text-center">
                    <?php if (!empty($e2_main_title)) { ?>
                        <h2 class="color-222222 font-22 lh-34 font-sm-26 lh-sm-37 font-lg-32 lh-lg-48 mb-20"><?php echo $e2_main_title; ?></h2>
                    <?php } ?>
                    <?php if (!empty($e2_description)) { ?>
                        <p class="color-444444 font-16 lh-26 font-xs-14 pb-60 pb-xs-20"><?php echo $e2_description; ?></p>
                    <?php } ?>
                </div>

                <div class="pricing-blocks flex">
                    <div class="pricing-left">
                        <?php if (!empty($e2_project_costing)) { ?>
                            <?php $e2_costing_title = isset($e2_project_costing['e2_costing_title']) ? $e2_project_costing['e2_costing_title'] : '';
                            $e2_costing_description = isset($e2_project_costing['e2_costing_description']) ? $e2_project_costing['e2_costing_description'] : '';
                            $e2_costing_form_cta = isset($e2_project_costing['e2_costing_form_cta']) ? $e2_project_costing['e2_costing_form_cta'] : array();
                            ?>

                            <?php if (!empty($e2_costing_title) || !empty($e2_costing_description) || !empty($e2_costing_form_cta)) { ?>
                                <?php if (!empty($e2_costing_title)) { ?>
                                    <label> <?php echo $e2_costing_title; ?> </label>
                                <?php } ?>

                                <?php if (!empty($e2_costing_description)) { ?>
                                    <?php echo $e2_costing_description; ?>
                                <?php } ?>

                                <?php if (!empty($e2_costing_form_cta)) {
                                    $cta_link = isset($e2_costing_form_cta['url']) ? $e2_costing_form_cta['url'] : '';
                                    $cta_title = isset($e2_costing_form_cta['title']) ? $e2_costing_form_cta['title'] : '';
                                    $cta_target = !empty($e2_costing_form_cta['target']) ? 'target="_blank"' : '';

                                    $cta_link = filter_var($cta_link, FILTER_SANITIZE_URL);
                                    if (filter_var($cta_link, FILTER_VALIDATE_URL) !== false) {
                                        $class = '';
                                        $url = $cta_link;
                                    } else {
                                        $class = 'CF7_openmodale project_title';
                                        $cta_target = '';
                                        $url = 'javascript:void(0);';
                                    }

                                    if (!empty($url) && !empty($cta_title)) { ?>
                                        <a class="project-btn <?php echo $class; ?>" href="<?php echo $url; ?>" <?php echo $cta_target; ?> title="Project Title">
                                            <?php echo $cta_title; ?>
                                        </a>
                                    <?php } ?>
                                <?php } ?>
                            <?php } ?>
                        <?php } ?>
                    </div>



                    <!-- MOBILE PART TABLE -->
                    <?php
                    $package_titles = array_column($affordable_pricing_table, 'e2_price_title');
                    $e2_sm_column_one = array_column($affordable_pricing_table, 'e2_price_column_one');
                    $e2_sm_column_two = array_column($affordable_pricing_table, 'e2_column_two');
                    $e2_sm_column_three = array_column($affordable_pricing_table, 'e2_column_three');
                    $final_data = array();
                    if (!empty($e2_sm_column_one)) {
                        $final_data[] = $e2_sm_column_one;
                    }
                    if (!empty($e2_sm_column_two)) {
                        $final_data[] = $e2_sm_column_two;
                    }
                    if (!empty($e2_sm_column_three)) {
                        $final_data[] = $e2_sm_column_three;
                    }
                    //echo '<pre>';print_r($e2_price_table_header);echo '</pre>';
                    //echo '<pre>';print_r($final_data);echo '</pre>';
                    //echo '<pre>';print_r($affordable_pricing_table);echo '</pre>';
                    if (!empty($final_data)) {
                        echo '<div class="packages-mobile d-block d-md-none">';
                        $e2_tbl_header_title = isset($e2_price_table_header['e2_tbl_header_title']) ? $e2_price_table_header['e2_tbl_header_title'] : '';
                        echo '<li class="text-white font-20 font-weight-bold mb-3">' . $e2_tbl_header_title . '</li>';
                        foreach ($final_data as $key => $final_cols) :

                            if (!empty($final_cols)) {
                                if (!empty($e2_price_table_header)) {
                                    $sec_label = '';
                                    $label = isset($e2_price_table_header['e2_col_one']) ? $e2_price_table_header['e2_col_one'] : '';
                                    $label_2 = isset($e2_price_table_header['e2_col_two']) ? $e2_price_table_header['e2_col_two'] : '';
                                    $label_3 = isset($e2_price_table_header['e2_col_three']) ? $e2_price_table_header['e2_col_three'] : '';
                                    if ($key == 0) {
                                        $e2_tbl_header_hours = isset($label['e2_tbl_header_hours']) ? $label['e2_tbl_header_hours'] : '';
                                        $e2_tbl_header_price = isset($label['e2_tbl_header_price']) ? $label['e2_tbl_header_price'] : '';
                                        $sec_label = '<span>' . $e2_tbl_header_price . '</span> | ' . $e2_tbl_header_hours;
                                    } elseif ($key == 1) {
                                        $e2_tbl_header_hours = isset($label_2['e2_tbl_header_hours']) ? $label_2['e2_tbl_header_hours'] : '';
                                        $e2_tbl_header_price = isset($label_2['e2_tbl_header_price']) ? $label_2['e2_tbl_header_price'] : '';
                                        $sec_label = '<span>' . $e2_tbl_header_price . '</span> | ' . $e2_tbl_header_hours;
                                    } elseif ($key == 2) {
                                        $e2_tbl_header_hours = isset($label_3['e2_tbl_header_hours']) ? $label_3['e2_tbl_header_hours'] : '';
                                        $e2_tbl_header_price = isset($label_3['e2_tbl_header_price']) ? $label_3['e2_tbl_header_price'] : '';
                                        $sec_label = '<span>' . $e2_tbl_header_price . '</span> | ' . $e2_tbl_header_hours;
                                    }
                                }
                                #remvoe first
                                //unset($final_cols[0]);
                                echo "<ul class='p-4' data-aos='fade-up'>";
                                if (!empty($sec_label)) {
                                    echo '<li class="text-white font-20 font-weight-bold mb-3">' . $sec_label . '</li>';
                                }
                                foreach ($final_cols as $key => $final_col) :
                                    $package_title = isset($package_titles[$key]) ? $package_titles[$key] : '';
                                    $type_one = isset($final_col['e2_column_one_type']) ? $final_col['e2_column_one_type'] : '';
                                    $column_data = '<span class="dashed"></span>';
                                    $column_class = 'dashed';
                                    if (!empty($type_one)) {
                                        if ($type_one == 'checkbox') {
                                            $one_checkbox = isset($final_col['e2_column_one_checkbox']) ? $final_col['e2_column_one_checkbox'] : '';
                                            $column_data = !empty($one_checkbox) ? '' : '';
                                            $column_class = !empty($one_checkbox) ? 'checked' : 'dashed';
                                        } else if ($type_one == 'text') {
                                            $one_text = isset($final_col['e2_column_one_text']) ? $final_col['e2_column_one_text'] : '';
                                            $column_data = !empty($one_text) ?  $one_text : '';
                                            $column_class = !empty($one_text) ? 'checked' : 'dashed';
                                        }
                                    }

                                    $type_two = isset($final_col['e2_column_two_type']) ? $final_col['e2_column_two_type'] : '';
                                    if (!empty($type_two)) {
                                        if ($type_two == 'checkbox') {
                                            $two_checkbox = isset($final_col['e2_column_two_checkbox']) ? $final_col['e2_column_two_checkbox'] : '';
                                            $column_data = !empty($two_checkbox) ? '' : '';
                                            $column_class = !empty($two_checkbox) ? 'checked' : 'dashed';
                                        } else if ($type_two == 'text') {
                                            $two_text = isset($final_col['e2_column_two_text']) ? $final_col['e2_column_two_text'] : '';
                                            $column_data = !empty($two_text) ? $two_text : '';
                                            $column_class = !empty($two_text) ? 'checked' : 'dashed';
                                        }
                                    }

                                    $type_three = isset($final_col['e2_column_three_type']) ? $final_col['e2_column_three_type'] : '';
                                    if (!empty($type_three)) {
                                        if ($type_three == 'checkbox') {
                                            $three_checkbox = isset($final_col['checkbox']) ? $final_col['checkbox'] : '';
                                            $column_data = !empty($three_checkbox) ? '' : '';
                                            $column_class = !empty($three_checkbox) ? 'checked' : 'dashed';
                                        } else if ($type_three == 'text') {
                                            $three_text = isset($final_col['e2_column_three_text']) ? $final_col['e2_column_three_text'] : '';
                                            $column_data = !empty($three_text) ?  $three_text : '';
                                            $column_class = !empty($three_text) ? 'checked' : 'dashed';
                                        }
                                    }
                                    echo '<li class="text-white font-16 ' . $column_class . '">' . $column_data . ' ' . $package_title . '</li>';
                                endforeach;
                                echo "</ul>";
                            }
                        endforeach;
                        echo '</div>';
                    } ?>
                    <!-- MOBILE PART TABLE -->







                    <div class="pricing-right flex flex-wrap ">
                        <?php if (!empty($e2_price_table_header)) { ?>
                            <?php
                            $e2_tbl_header_title = isset($e2_price_table_header['e2_tbl_header_title']) ? $e2_price_table_header['e2_tbl_header_title'] : '';
                            $e2_col_one = isset($e2_price_table_header['e2_col_one']) ? $e2_price_table_header['e2_col_one'] : '';
                            $e2_col_two = isset($e2_price_table_header['e2_col_two']) ? $e2_price_table_header['e2_col_two'] : '';
                            $e2_col_three = isset($e2_price_table_header['e2_col_three']) ? $e2_price_table_header['e2_col_three'] : '';
                            ?>

                            <!-- <div class="pricebox"> -->
                            <div class="pricing-col1 pricing-col flex">
                                <?php if (!empty($e2_tbl_header_title)) { ?>
                                    <div>
                                        <h4><?php echo $e2_tbl_header_title; ?></h4>
                                    </div>
                                <?php } ?>

                                <?php if (!empty($e2_col_one)) { ?>
                                    <?php $e2_tbl_header_hours = isset($e2_col_one['e2_tbl_header_hours']) ? $e2_col_one['e2_tbl_header_hours'] : '';
                                    $e2_tbl_header_price = isset($e2_col_one['e2_tbl_header_price']) ? $e2_col_one['e2_tbl_header_price'] : '';
                                    ?>
                                    <?php if (!empty($e2_tbl_header_hours) || !empty($e2_tbl_header_price)) { ?>
                                        <?php if (!empty($e2_tbl_header_hours)) { ?>
                                            <div>
                                                <h4><?php echo $e2_tbl_header_hours; ?></h4>
                                            </div>
                                        <?php } ?>
                                        <?php if (!empty($e2_tbl_header_price)) { ?>
                                            <div>
                                                <h4><?php echo $e2_tbl_header_price; ?></h4>
                                            </div>
                                        <?php } ?>

                                    <?php } ?>
                                <?php } ?>

                                <?php if (!empty($e2_col_two)) { ?>
                                    <?php $e2_tbl_header_hours = isset($e2_col_two['e2_tbl_header_hours']) ? $e2_col_two['e2_tbl_header_hours'] : '';
                                    $e2_tbl_header_price = isset($e2_col_two['e2_tbl_header_price']) ? $e2_col_two['e2_tbl_header_price'] : '';
                                    ?>
                                    <?php if (!empty($e2_tbl_header_hours) || !empty($e2_tbl_header_price)) { ?>
                                        <?php if (!empty($e2_tbl_header_hours)) { ?>
                                            <div>
                                                <h4><?php echo $e2_tbl_header_hours; ?></h4>
                                            </div>
                                        <?php } ?>
                                        <?php if (!empty($e2_tbl_header_price)) { ?>
                                            <div>
                                                <h4><?php echo $e2_tbl_header_price; ?></h4>
                                            </div>
                                        <?php } ?>

                                    <?php } ?>
                                <?php } ?>

                                <?php if (!empty($e2_col_three)) { ?>
                                    <?php $e2_tbl_header_hours = isset($e2_col_three['e2_tbl_header_hours']) ? $e2_col_three['e2_tbl_header_hours'] : '';
                                    $e2_tbl_header_price = isset($e2_col_three['e2_tbl_header_price']) ? $e2_col_three['e2_tbl_header_price'] : '';
                                    ?>
                                    <?php if (!empty($e2_tbl_header_hours) || !empty($e2_tbl_header_price)) { ?>
                                        <?php if (!empty($e2_tbl_header_hours)) { ?>
                                            <div>
                                                <h4><?php echo $e2_tbl_header_hours; ?></h4>
                                            </div>
                                        <?php } ?>
                                        <?php if (!empty($e2_tbl_header_price)) { ?>
                                            <div>
                                                <h4><?php echo $e2_tbl_header_price; ?></h4>
                                            </div>
                                        <?php } ?>

                                    <?php } ?>
                                <?php } ?>
                            </div>
                            <div class="pricelist">
                                <?php if (!empty($affordable_pricing_table)) {

                                    foreach ($affordable_pricing_table as $key => $pricing_table) {
                                        $e2_price_title = isset($pricing_table['e2_price_title']) ? $pricing_table['e2_price_title'] : '';
                                        $column_one = isset($pricing_table['e2_price_column_one']) ? $pricing_table['e2_price_column_one'] : array();
                                        $column_two = isset($pricing_table['e2_column_two']) ? $pricing_table['e2_column_two'] : array();
                                        $column_three = isset($pricing_table['e2_column_three']) ? $pricing_table['e2_column_three'] : array();
                                ?>

                                        <div class="package-cols flex justify-content-between">
                                            <?php if (!empty($e2_price_title)) : ?>
                                                <div class="py-4 text-white"><?php echo $e2_price_title; ?></div>
                                            <?php endif; ?>

                                            <?php if (!empty($column_one)) : ?>
                                                <?php
                                                $type_one = isset($column_one['e2_column_one_type']) ? $column_one['e2_column_one_type'] : '';
                                                $column_one_data = '<span class="dashed"><span></span></span>';
                                                if (!empty($type_one)) {
                                                    if ($type_one == 'checkbox') {
                                                        $one_checkbox = isset($column_one['e2_column_one_checkbox']) ? $column_one['e2_column_one_checkbox'] : '';
                                                        $column_one_data = !empty($one_checkbox) ? '<span class="checked"></span>' : '<span class="dashed"><span></span></span>';
                                                    } else if ($type_one == 'text') {
                                                        $one_text = isset($column_one['e2_column_one_text']) ? $column_one['e2_column_one_text'] : '';
                                                        $column_one_data = !empty($one_text) ? $one_text : '<span class="dashed"><span></span></span>';
                                                    }
                                                }
                                                ?>
                                                <div class="text-center text-white py-4">One check<?php echo $column_one_data; ?></div>
                                            <?php endif; ?>

                                            <?php if (!empty($column_two)) : ?>
                                                <?php
                                                $type_two = isset($column_two['e2_column_two_type']) ? $column_two['e2_column_two_type'] : '';
                                                $column_two_data = '<span class="dashed"><span></span></span>';
                                                if (!empty($type_two)) {
                                                    if ($type_two == 'checkbox') {
                                                        $two_checkbox = isset($column_two['e2_column_two_checkbox']) ? $column_two['e2_column_two_checkbox'] : '';
                                                        $column_two_data = !empty($two_checkbox) ? '<span class="checked"></span>' : '<span class="dashed"><span></span></span>';
                                                    } else if ($type_two == 'text') {
                                                        $two_text = isset($column_two['e2_column_two_text']) ? $column_two['e2_column_two_text'] : '';
                                                        $column_two_data = !empty($two_text) ? $two_text : '<span class="dashed"><span></span></span>';
                                                    }
                                                }
                                                ?>
                                                <div class="text-center text-white py-4">Two check checkbox <?php echo $column_two_data; ?></div>
                                            <?php endif; ?>

                                            <?php if (!empty($column_three)) : ?>
                                                <?php
                                                $type_three = isset($column_three['e2_column_three_type']) ? $column_three['e2_column_three_type'] : '';
                                                $column_three_data = '<span class="dashed"><span></span></span>';
                                                if (!empty($type_three)) {
                                                    if ($type_three == 'checkbox') {
                                                        $three_checkbox = isset($column_three['checkbox']) ? $column_three['checkbox'] : '';
                                                        $column_three_data = !empty($three_checkbox) ? '<span class="checked"></span>' : '<span class="dashed"><span></span></span>';
                                                    } else if ($type_three == 'text') {
                                                        $three_text = isset($column_three['e2_column_three_text']) ? $column_three['e2_column_three_text'] : '';
                                                        $column_three_data = !empty($three_text) ? $three_text : '<span class="dashed"><span></span></span>';
                                                    }
                                                }
                                                ?>
                                                <div class="text-center text-white py-4">three <?php echo $column_three_data; ?></div>
                                            <?php endif; ?>
                                        </div>
                                    <?php } ?>
                            </div>
                            <!-- </div> -->
                        <?php } ?>
                        <?php if (!empty($e2_package_cta)) {
                                $cta_link = isset($e2_package_cta['url']) ? $e2_package_cta['url'] : '';
                                $cta_title = isset($e2_package_cta['title']) ? $e2_package_cta['title'] : '';
                                $cta_target = !empty($e2_package_cta['target']) ? 'target="_blank"' : '';

                                $cta_link = filter_var($cta_link, FILTER_SANITIZE_URL);
                                if (filter_var($cta_link, FILTER_VALIDATE_URL) !== false) {
                                    $class = '';
                                    $url = $cta_link;
                                } else {
                                    $class = 'CF7_openmodale choose_package';
                                    $cta_target = '';
                                    $url = 'javascript:void(0);';
                                }

                                if (!empty($url) && !empty($cta_title)) { ?>
                                <a class="<?php echo $class; ?>" href="<?php echo $url; ?>" <?php echo $cta_target; ?> title="<?php echo $cta_title; ?>">
                                    <?php echo $cta_title; ?>
                                </a>
                            <?php } ?>
                        <?php } ?>
                    </div>
                </div>
            </div>
            </div>
        </section>
    <?php } ?>
<?php } ?>
<?php } ?>