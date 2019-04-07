<?php
/**
 * Boot WP functions and definitions.
 *
 * Sets up the theme and provides some helper functions, which are used
 * in the theme as custom template tags. Others are attached to action and
 * filter hooks in WordPress to change core functionality.
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development and
 * http://codex.wordpress.org/Child_Themes), you can override certain functions
 * (those wrapped in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before the parent
 * theme's file, so the child theme functions would be used.
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are instead attached
 * to a filter or action hook.
 *
 * For more information on hooks, actions, and filters, see http://codex.wordpress.org/Plugin_API.
 *
 * @package WordPress
 * @subpackage boot-wp
 * @since boot-wp 1.0
 */

/** Note: custom post types, custom taxonomies & metaboxes has been moved to the btc_site_functionality plugin */

require TEMPLATEPATH.'/libs/theme_default_setup.php';

function boot_setup() {

	//load_theme_textdomain( 'btc', get_template_directory() . '/languages' );
	//add_editor_style( array( 'css/editor-style.css', 'fonts/genericons.css', btc_fonts_url() ) );

	// Remove some stuff we don't need

	remove_action('wp_head', 'wp_generator');
	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'wlwmanifest_link');

	function remove_dashboard_widgets() {
		global $wp_meta_boxes;
		unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
		unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
		unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
		//unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_drafts']);
		//unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
		unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
		unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
	}

	add_action('wp_dashboard_setup', 'remove_dashboard_widgets' );


	// Adds RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Switches default core markup for search form, comment form,
	 * and comments to output valid HTML5.
	 */
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );

	/*
	 * This theme supports all available post formats by default.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	/*add_theme_support( 'post-formats', array(
		'aside', 'audio', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video'
	) );*/

	// Register Custom Navigation Walker
	//require_once('bootstrap-navwalker/wp_bootstrap_navwalker-4.php');
    require_once('bootstrap-navwalker/bs4navwalker.php');


	// Register Custom Comment Walker
	//require_once('custom_comment_walker.php');

	// This theme uses wp_nav_menu() in one location.
	register_nav_menu( 'main_menu', __( 'main_menu', 'boot-wp' ) );
	register_nav_menu( 'footer_menu', __( 'footer_menu', 'boot-wp' ) );

	/*
	 * This theme uses a custom image size for featured images, displayed on
	 * "standard" posts and pages.
	 */
	add_theme_support( 'post-thumbnails' );
	//set_post_thumbnail_size( 604, 270, true );

	// Custom image sizes
	//add_image_size( 'side-thumbnail', 40, 40, true ); // 40px square crop

	// Add image size to media panel
	//add_filter( 'image_size_names_choose', 'my_custom_sizes' );

	function my_custom_sizes( $sizes ) {
	    return array_merge( $sizes, array(
	        'your-custom-size' => __( 'Your Custom Size Name' ),
	    ) );
	}

	// This theme uses its own gallery styles.
	//add_filter( 'use_default_gallery_style', '__return_false' );
}
add_action( 'after_setup_theme', 'boot_setup' );

	// Custom image sizes
	//add_image_size( 'sidebar', 40, 40, true ); // 40px square crop


// Sidebars

function boot_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'News Sidebar', 'boot' ),
		'id'            => 'news-sidebar',
		'description'   => __( 'Appears in left sidebar of Site.', 'boot' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => __( 'Page Sidebar', 'boot' ),
		'id'            => 'page-sidebar',
		'description'   => __( 'Appears in left sidebar of Pages', 'boot' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );



}
add_action( 'widgets_init', 'boot_widgets_init' );

// Register some javascript files, because we love javascript files. Enqueue a couple as well

function boot_load_javascript_files() {

  //wp_register_script( string $handle, string $src, array $deps = array(), string|bool|null $ver = false, bool $in_footer = false )
  //
  //wp_register_script( 'info-caroufredsel', get_template_directory_uri() . '/js/jquery.carouFredSel-5.5.0-packed.js', array('jquery'), '5.5.0', true );
  //wp_register_script( 'info-carousel-instance', get_template_directory_uri() . '/js/info-carousel-instance.js', array('info-caroufredsel'), '1.0', true );
  //wp_register_script( 'imagesLoaded', get_template_directory_uri().'/js/imagesLoaded.min.js', array('jquery'), false, true );
  //wp_register_script( 'masonry', get_template_directory_uri().'/js/masonry.min.js', array('jquery'), false, true);
  //wp_register_script( 'popper', get_template_directory_uri().'/bower_components/popper.js/dist/umd/popper.min.js', array(''), '1.12.9', true );
  wp_register_script( 'popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js', array('jquery'), '1.12.9', true );
  //wp_register_script( 'tether', get_template_directory_uri().'/bower_components/tether/dist/js/tether.min.js', array('jquery'), '1.1.0', true );
  wp_register_script( 'bootstrap-js', get_template_directory_uri().'/bower_components/bootstrap/dist/js/bootstrap.min.js', array('jquery'), '4.0.0', true );
  //wp_register_script( 'vegas', get_template_directory_uri().'/js/vegas/jquery.vegas.min.js', array('jquery'), false, true );
  //wp_register_script( 'ddsmoothmenu-init', get_template_directory_uri().'/js/ddsmoothmenu-init.js', array('ddsmoothmenu'), '', true);
  //wp_register_script( 'pinterest', '//assets.pinterest.com/js/pinit.js', false, false, true );
  //wp_register_script( 'bootstrap-toolkit', get_template_directory_uri().'/js/bootstrap-toolkit.min.js', array('jquery'), '2.1.0', true );
  wp_register_script( 'site-js', get_template_directory_uri().'/js/site.min.js', array('jquery'), '1.0', true );
  //wp_register_script( 'home-page-main-flex-slider', get_template_directory_uri().'/js/home-page-main-flex-slider.js', array('jquery.flexslider'), '1.0', true );

  //wp_enqueue_script( 'jquery' );
  //wp_enqueue_script( 'jquery-ui-core' );
  //wp_enqueue_script( 'imagesLoaded' );
  //wp_enqueue_script( 'masonry' );
  wp_enqueue_script( 'popper' );
  //wp_enqueue_script( 'tether' );
  wp_enqueue_script( 'bootstrap-js' );
  //wp_enqueue_script( 'vegas' );
  //wp_enqueue_script( 'pinterest' );
  //wp_enqueue_script( 'bootstrap-toolkit' );
  wp_enqueue_script( 'site-js' );

}

add_action( 'wp_enqueue_scripts', 'boot_load_javascript_files' );

// add first and last class to menu items

add_filter( 'wp_nav_menu_objects', 'btc_filter_menu_class');

function btc_filter_menu_class( $objects ) {

    // Only apply the classes to the primary navigation menu.
    /*if ( isset( $args->theme_location ) ) {
        if ( 'primary' !== $args->theme_location ) {
            return $objects;
        }
    }*/

    // Add "first-menu-item" class to the first menu object.
    $objects[1]->classes[] = 'first-menu-item';

    // Add "last-menu-item" class to the last menu object.
    $objects[count( $objects )]->classes[] = 'last-menu-item';

    // Return the menu objects
    return $objects;

}


