<?php

//add_action('after_setup_theme', 'btc_add_menu_function', 10, 2);
/*after_setup_theme after_switch_theme*/

function btc_add_menu_function($oldname, $oldtheme = false) {
    /* Create header and footer menus */
    $menus = array(
        'main_menu' => array(
            'home' => 'Home',
            'sample-page' => 'Sample Page',
        ),/*
        'Top Menu' => array(
            'home' => 'Home',
            'contact' => 'Contact',
            'sitemap' => 'Sitemap'
        ),
        'Footer Menu' => array(
            'terms-of-use' => 'Terms of Use',
            'privacy-policy' => 'Privacy Policy'
        )*/
    );
    foreach($menus as $menuname => $menuitems) {
        $menu_exists = wp_get_nav_menu_object($menuname);
        // If it doesn't exist, let's create it.
        if (!$menu_exists) {
            $menu_id = wp_create_nav_menu($menuname);
            foreach($menuitems as $slug => $item) {
                wp_update_nav_menu_item(
                    $menu_id, 0, array(
                        'menu-item-title' => $item,
                        'menu-item-object' => 'page',
                        /*'menu-item-object-id' => get_page_by_path($slug) - > ID,*/
                        'menu-item-type' => 'post_type',
                        'menu-item-status' => 'publish'
                    )
                );
            }
        }
    }

}

?>
