<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package mintyourstore
 */

?>

<footer id="colophon" class="site-footer bg-111111">
	<div class="">
		<div class="container">		
			<div class="footer-inner ">
				<div class="footer-top flex-sm color-white py-50  py-md-100">
					<?php
					$logo_section = get_field('logo_section', 'option');
					if (!empty($logo_section)) {
						$footer_logo = isset($logo_section['footer_logo']) ? $logo_section['footer_logo'] : array();
						$tagline = isset($logo_section['tagline']) ? $logo_section['tagline'] : '';
						$footer_email = isset($logo_section['footer_email']) ? $logo_section['footer_email'] : array();
						$footer_address = isset($logo_section['footer_address']) ? $logo_section['footer_address'] : array(); ?>
	
						<?php if (!empty($footer_logo) || !empty($tagline) || !empty($footer_email) || !empty($footer_address)) { ?>
							<div class="site-footer-section-1 site-footer-section column-logo mb-10 mb-sm-0">
								<div class="lh-0 mb-35 mb-md-40">
									<?php if (!empty($footer_logo)) { ?>
										<img src="<?php echo $footer_logo['url']; ?>" alt="<?php echo $footer_logo['alt']; ?>" height="79" width="79">
									<?php } ?>
								</div>
	
								<?php if (!empty($tagline)) { ?>
									<p class="font-12 font-md-14 mt-0 mb-10 mb-md-0"><?php echo $tagline; ?></p>
								<?php } ?>
								
								<div class="site-info pt-24 pb-20 pb-md-0 mb-30">
									<?php if (!empty($footer_email)) { ?>
										<p class="mt-0 mb-15">
											<a class="font-12" href="mailto: <?php echo $footer_email; ?>">
											<svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path fill-rule="evenodd" clip-rule="evenodd" d="M4.66602 8.66667V19.3333C4.66602 20.8061 5.85992 22 7.33268 22H20.666C22.1388 22 23.3327 20.8061 23.3327 19.3333V8.66667C23.3327 7.19391 22.1388 6 20.666 6H7.33268C5.85992 6 4.66602 7.19391 4.66602 8.66667Z" stroke="white" stroke-linecap="round" stroke-linejoin="round"></path>
												<path d="M7.33203 10L13.9987 14L20.6654 10" stroke="white" stroke-linecap="round" stroke-linejoin="round"></path>
											</svg>
											<?php echo $footer_email; ?>
											</a>
										</p>
									<?php } ?>

									<p class="mt-0 mb-15">
										<svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path fill-rule="evenodd" clip-rule="evenodd" d="M14 24.7209L14.8415 23.7718C15.796 22.6796 16.655 21.6407 17.4186 20.6549L18.0497 19.8229C20.6832 16.2742 22 13.4592 22 11.3779C22 6.93494 18.4183 3.33325 14 3.33325C9.58172 3.33325 6 6.93494 6 11.3779C6 13.4592 7.31678 16.2742 9.95033 19.8229L10.5814 20.6549C11.5632 21.9223 12.7027 23.2777 14 24.7209Z" stroke="white" stroke-linecap="round" stroke-linejoin="round"></path>
											<path d="M13.9993 14.6667C15.8403 14.6667 17.3327 13.1743 17.3327 11.3333C17.3327 9.49238 15.8403 8 13.9993 8C12.1584 8 10.666 9.49238 10.666 11.3333C10.666 13.1743 12.1584 14.6667 13.9993 14.6667Z" stroke="white" stroke-linecap="round" stroke-linejoin="round"></path>
										</svg>
										<?php if (!empty($footer_address)) {
											$cta_link = isset($footer_address['url']) ? $footer_address['url'] : '';
											$cta_title = isset($footer_address['title']) ? $footer_address['title'] : '';
											$cta_target = !empty($footer_address['target']) ? 'target="_blank"' : '';
		
											$cta_link = filter_var($cta_link, FILTER_SANITIZE_URL);
											if (filter_var($cta_link, FILTER_VALIDATE_URL) !== false) {
												$url = esc_url($cta_link);
											} else {
												$url = '#mys_footer_contactform';
												$cta_target = '';
											}
		
											if (!empty($url) && !empty($cta_title)) {   ?>
												<a class="" href="<?php echo $url; ?>" <?php echo $cta_target; ?> title="<?php echo $cta_title; ?>">
													<?php echo $cta_title; ?>
												</a>
											<?php } ?>
										<?php } ?>
									</p>
								</div>
	
							</div>
						<?php } ?>
					<?php } ?>
	
					<?php
					$footer_quick_links = get_field('footer_quick_link_section', 'option');
					if (!empty($footer_quick_links)) {
						$footer_links_lable = isset($footer_quick_links['footer_links_lable']) ? $footer_quick_links['footer_links_lable'] : '';
						$footer_quick_link = isset($footer_quick_links['footer_quick_link_list']) ? $footer_quick_links['footer_quick_link_list'] : array(); ?>
						<?php if (!empty($footer_links_lable) || !empty($footer_quick_link)) {  ?>
							<div class="site-footer-section-2 site-footer-section column-quick-links mb-10 mb-sm-0">
								<?php if (!empty($footer_links_lable)) { ?>
									<h5 class="font-18 font-md-24 fw-500 mt-0 mb-18 mb-md-24 color-white lh-2"><?php echo $footer_links_lable; ?></h5>
								<?php } ?>
	
								<ul class="list-stye-none">
									<?php if (!empty($footer_quick_link)) { ?>
										<?php foreach ($footer_quick_link as $key => $quick_links) {
											$footer_page_link = isset($quick_links['footer_page_link']) ? $quick_links['footer_page_link'] : array();
										?>
											<li class="pb-7">
												<?php if (!empty($footer_page_link)) {
													$cta_link = isset($footer_page_link['url']) ? $footer_page_link['url'] : '';
													$cta_title = isset($footer_page_link['title']) ? $footer_page_link['title'] : '';
													$cta_target = !empty($footer_page_link['target']) ? 'target="_blank"' : '';

													$cta_link = filter_var($cta_link, FILTER_SANITIZE_URL);
													if (filter_var($cta_link, FILTER_VALIDATE_URL) !== false) {
														$url = esc_url($cta_link);
													} else {
														$url = '#mys_footer_contactform';
														$cta_target = '';
													}

													if (!empty($url) && !empty($cta_title)) { ?>
														<a class="font-12 font-md-14" href="<?php echo $url; ?>" <?php echo $cta_target; ?> title="<?php echo $cta_title; ?>">
															<?php echo $cta_title; ?>
														</a>
													<?php } ?>
												<?php } ?>
											</li>
										<?php } ?>
									<?php } ?>
								</ul>
							</div>
						<?php } ?>
					<?php } ?>
					<?php
					$our_capability = get_field('footer_our_capability_section', 'option');
					if (!empty($our_capability)) {
						$capability_lable = isset($our_capability['footer_capability_lable']) ? $our_capability['footer_capability_lable'] : '';
						$capability_links = isset($our_capability['footer_our_capability_links']) ? $our_capability['footer_our_capability_links'] : array(); ?>
						<?php if (!empty($capability_lable) || !empty($capability_links)) {  ?>
							<div class="site-footer-section-3 site-footer-section column-our-capacity mb-10 mb-sm-0">
								<?php if (!empty($capability_lable)) { ?>
									<h5 class="font-18 font-md-24 fw-500 mt-0 mb-18 mb-md-24 color-white lh-2"><?php echo $capability_lable; ?></h5>
								<?php } ?>
								
								<ul class="list-stye-none">
									<?php if (!empty($capability_links)) { ?>
										<?php foreach ($capability_links as $key => $serviceLinks) {
											$capability_list = isset($serviceLinks['footer_capability_links_list']) ? $serviceLinks['footer_capability_links_list'] : array();
										?>
											<li class="pb-7">
												<?php if (!empty($capability_list)) {
													$cta_link = isset($capability_list['url']) ? $capability_list['url'] : '';
													$cta_title = isset($capability_list['title']) ? $capability_list['title'] : '';
													$cta_target = !empty($capability_list['target']) ? 'target="_blank"' : '';

													$cta_link = filter_var($cta_link, FILTER_SANITIZE_URL);
													if (filter_var($cta_link, FILTER_VALIDATE_URL) !== false) {
														$url = esc_url($cta_link);
													} else {
														$url = '#mys_footer_contactform';
														$cta_target = '';
													}

													if (!empty($url) && !empty($cta_title)) { ?>
														<a class="font-12 font-md-14" href="<?php echo $url; ?>" <?php echo $cta_target; ?> title="<?php echo $cta_title; ?>">
															<?php echo $cta_title; ?>
														</a>
													<?php } ?>
												<?php } ?>
											</li>
										<?php } ?>
									<?php } ?>
								</ul>
							</div>
						<?php } ?>
					<?php } ?>
				</div>
				<div class="footer-bottom py-24">
					<?php
					$footer_copyright = get_field('footer_copyright', 'option');
					$footer_powered_by_links = get_field('footer_powered_by_links', 'option'); ?>
					<div class="row">
						<div class="col-12 col-sm-4 order-1 order-md-0">
							<?php if (!empty($footer_copyright)) { ?>
								<p class="color-white text-center text-sm-unset ight font-12 font-md-14 my-0"><?php echo $footer_copyright; ?></p>
							<?php } ?>
						</div>
						<div class="col-12 col-sm-4 social-icons text-center flex justify-content-center align-items-center mb-10 mb-sm-10">
							<?php
							$social_media = get_field('social_media', 'option');
							if (!empty($social_media)) {
								foreach ($social_media as $key => $social) {
									$select_platform = isset($social['select_platform']) ? $social['select_platform'] : '';
									$link = isset($social['link']) ? $social['link'] : '';
									if (!empty($select_platform) && !empty($link)) {  
									?>
										<a class="<?php echo $select_platform; ?>" href="<?php echo $link; ?>" target="_blank" aria-label="<?php echo $select_platform; ?>">
										<?php 
											if($select_platform === "facebook-icon"){
											?>
												<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z"></path></svg>
											<?php 
											}else if($select_platform === "instagram-icon"){
											?>
												<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"></path></svg>
											<?php
											}else if($select_platform === "linkedin-icon"){
											?>
												<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M100.28 448H7.4V148.9h92.88zM53.79 108.1C24.09 108.1 0 83.5 0 53.8a53.79 53.79 0 0 1 107.58 0c0 29.7-24.1 54.3-53.79 54.3zM447.9 448h-92.68V302.4c0-34.7-.7-79.2-48.29-79.2-48.29 0-55.69 37.7-55.69 76.7V448h-92.78V148.9h89.08v40.8h1.3c12.4-23.5 42.69-48.3 87.88-48.3 94 0 111.28 61.9 111.28 142.3V448z"></path></svg>
											<?php 
											}
										?>
										</a>
									<?php } ?>
								<?php } ?>
							<?php } ?>
						</div>
						
						<div class="col-12 col-sm-4 order-1 order-md-0">
							<?php if (!empty($footer_powered_by_links)) { ?>
								<p class="powered_by text-center text-sm-right color-white font-12 font-md-14 my-0"><?php echo $footer_powered_by_links; ?></p>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</footer>

<a id="scroll-top" class="scroll-top-icon scroll-to-top-right bg-5f656c" data-on-devices="both" style="display: block;">
	<span class="icon icon-arrow flex justify-content-center align-items-center h-full">
        <svg width="14" height="8" viewBox="0 0 14 8" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M1 7L7 1L13 7" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
    </span>	
</a>


<?php wp_footer(); ?>

</body>

</html>