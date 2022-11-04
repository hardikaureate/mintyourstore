<div class="flex justify-content-between align-content-center">
    <div class="logo-block d-flex align-items-center">
            <?php theme_get_custom_logo(); ?>
    </div>
    <div class="menu-navigation flex align-items-center">
        <?php
        wp_nav_menu(
            array(
                'theme_location' => 'menu-1',
                // 'menu_class'        => 'primary-menu',
                'menu_id'        => 'primary-menu',
            )
        );
        ?>
        <div class="mobile-menu-toggle-icon d-md-none">
            <svg class="mobile-svg" fill="$color-ededed" version="1.1" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                <path d="M6 3c0-1.105 0.895-2 2-2s2 0.895 2 2c0 1.105-0.895 2-2 2s-2-0.895-2-2zM6 8c0-1.105 0.895-2 2-2s2 0.895 2 2c0 1.105-0.895 2-2 2s-2-0.895-2-2zM6 13c0-1.105 0.895-2 2-2s2 0.895 2 2c0 1.105-0.895 2-2 2s-2-0.895-2-2z"></path>
            </svg>
            <svg class="mobile-close" fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                <path d="M5.293 6.707l5.293 5.293-5.293 5.293c-0.391 0.391-0.391 1.024 0 1.414s1.024 0.391 1.414 0l5.293-5.293 5.293 5.293c0.391 0.391 1.024 0.391 1.414 0s0.391-1.024 0-1.414l-5.293-5.293 5.293-5.293c0.391-0.391 0.391-1.024 0-1.414s-1.024-0.391-1.414 0l-5.293 5.293-5.293-5.293c-0.391-0.391-1.024-0.391-1.414 0s-0.391 1.024 0 1.414z"></path>
            </svg>
        </div>
    </div>
</div>