<?php
if (!empty($args)) {
    $e1_heading = isset($args['e1_heading']) ? $args['e1_heading'] : '';
    $e1_request_data = isset($args['e1_request_data']) ? $args['e1_request_data'] : array(); ?>

    <?php if (!empty($e1_heading) || !empty($e1_request_data)) { ?>
        <section class="popular-requests-section bg-F9F9F9" id="popular-requests">
            <div class="container">
                <!-- <div class="row"> -->
                    <?php if (!empty($e1_heading)) { ?>
                        <div class="heading-section">
                            <h2 class="color-222222 font-22 lh-34 font-sm-26 lh-sm-37 font-lg-32 lh-lg-48 pb-34"><?php echo $e1_heading; ?></h2>
                        </div>
                    <?php } ?>

                    <?php if (!empty($e1_request_data)) { ?>
                        <?php $tab_count = 1; ?>
                        <div class="product-service-tab-wrap">
                            <ul class="wap-tab-name-wrap">
                                <?php
                                foreach ($e1_request_data as $key => $package_list) {
                                    $active = $tab_count == 1 ? 'active' : '';
                                    $e1_rd_title = isset($package_list['e1_rd_title']) ? $package_list['e1_rd_title'] : '';
                                    $tab_count_val = 'tab_' . $tab_count;
                                ?>
                                <?php if (!empty($e1_rd_title)) { ?>
                                    <?php echo '<li class="tab-name wap-tab-btn text-center ' . $active . '" onClick="tab_HideShowhandleClick(\'' . $tab_count_val . '\');" id="cat_' . $tab_count_val . '"> <span>' . $e1_rd_title . '</span></li>'; ?>
                                <?php } ?>
                                    <?php $tab_count++; ?>
                                <?php } ?>
                            </ul>
                        </div>
                        <?php
                        $tab_sec_count = 1;
                        foreach ($e1_request_data as $key => $package_list) {
                            $e1_rd_blocks = isset($package_list['e1_rd_blocks']) ? $package_list['e1_rd_blocks'] : array();
                            $tab_sec_count_val = 'tab_' . $tab_sec_count;
                            $style = $tab_sec_count == 1 ? '' : 'style="display:none;"';
                        ?>
                            <div class="wap-tab-content-wrap <?php echo $tab_sec_count_val; ?>" <?php echo $style; ?>>
                                <div class="row web-app-package-sec flex justify-content-center">
                                    
                                    <?php
                                    foreach ($e1_rd_blocks as $key => $pricedata) {
                                        $rd_title = isset($pricedata['rd_title']) ? $pricedata['rd_title'] : '';
                                        $rd_days = isset($pricedata['rd_days']) ? $pricedata['rd_days'] : '';
                                        $rd_price = isset($pricedata['rd_price']) ? $pricedata['rd_price'] : '';
                                        $rd_cta = isset($pricedata['rd_cta']) ? $pricedata['rd_cta'] : '';
                                    ?>
                                        <div class="col-md-4 mb-30">
                                            <div class="web-app-package-block p-38 rounded-medium bg-white h-full flex flex-col">
                                                <?php if (!empty($rd_title)) { ?>
                                                    <h3 class="web-app-package-block-title font-22 lh-32 fw-600 color-222222 pb-22 "><?php echo $rd_title; ?></h3>
                                                <?php } ?>
        
                                                <?php if (!empty($rd_days)) { ?>
                                                    <div class="delivery-text flex align-items-center font-14 lh-21 color-888888 mb-15">
                                                        <svg class="mr-8" width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <circle opacity="0.1" cx="18" cy="18" r="18" fill="#EF7C33"></circle>
                                                            <path d="M18 26.3809C13.3714 26.3809 9.61908 22.6286 9.61908 18C9.61908 13.3713 13.3714 9.61902 18 9.61902C22.6287 9.61902 26.381 13.3713 26.381 18C26.381 22.6286 22.6287 26.3809 18 26.3809Z" stroke="#EF7C33" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                            <path d="M18.0001 14.8571V19.0475H21.6667" stroke="#EF7C33" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        </svg>
                                                        Delivery In :
                                                        <span class="color-black pl-4"> <?php echo $rd_days; ?> </span>
                                                    </div>
                                                <?php } ?>
                                                <div class="starts-from mt-auto flex justify-content-between align-items-center">
                                                    <?php if (!empty($rd_price)) { ?>
                                                        <div>
                                                            <span class="font-12 lh-10 fw-400 color-888888 d-block pb-10">Starts From</span>
                                                            <lable class="font-24 lh-20 fw-700 color-EF7C33"><?php echo $rd_price; ?></lable>
                                                        </div>
                                                    <?php } ?>
            
                                                    <?php if (!empty($rd_cta)) { ?>
                                                            <?php if (!empty($rd_cta)) { ?>
                                                                <a class="CF7_openmodale project_title font-16 lh-24 color-222222" href="javascript:void(0);" title="<?php echo $rd_title; ?>">
                                                                    <?php echo $rd_cta; ?>
                                                                    <svg class="ml-4" width="14" height="12" viewBox="0 0 14 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M12.3333 9.40001V1.46667H3" stroke="#222222" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                        <path d="M12.3332 1.46667L1.6665 10.5333" stroke="#222222" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                    </svg>
                                                                </a>
                                                            <?php } ?>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                            <?php $tab_sec_count++; ?>
                        <?php } ?>
                    <?php } ?>
                <!-- </div> -->
            </div>
        </section>
    <?php } ?>
<?php } ?>


<script>
    function tab_HideShowhandleClick(id) {
        console.log(id);
        document.querySelectorAll('.wap-tab-name-wrap .wap-tab-btn').forEach(ele => {
            ele.classList.remove('active');
        });
        document.querySelectorAll('.wap-tab-content-wrap').forEach(ele => {
            ele.style.display = 'none';
        });

        document.querySelectorAll('.' + id + ' .web-app-package-sec').forEach(ele => {
            ele.classList.add('aos-animate');
        })

        document.getElementById("cat_" + id).classList.add("active");
        document.getElementsByClassName(id)[0].style.display = 'block';
    }
</script>