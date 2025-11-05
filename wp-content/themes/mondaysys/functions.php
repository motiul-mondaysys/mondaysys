<?php
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Enqueue styles and scripts
 */
function mondaysys_enqueue_assets() {
    wp_enqueue_style( 'swiper-style', get_theme_file_uri('/assets/css/swiper-bundle.min.css') );
    wp_enqueue_style( 'parent-style', get_theme_file_uri('/style.css'), array(), '1.2.8');
    wp_enqueue_style( 'spacing-style', get_theme_file_uri('/assets/css/spacing.css'),array(), '1.0.4' );
    if(is_page_template ('templates/about-page.php')){
        wp_enqueue_style( 'about-page-style', get_theme_file_uri('/assets/css/about-us.css'), array(), '1.0.5' );
    }
    if(is_page_template ('templates/services.php') || is_singular( 'mondaysys_services' )){
        wp_enqueue_style( 'service-page-style', get_theme_file_uri('/assets/css/services.css'), array(), '1.1.3' );
    }
    if(is_page_template ('templates/contact-page.php')){
        wp_enqueue_style( 'contact-page-style', get_theme_file_uri('/assets/css/contact.css'), array(), '1.0.2' );
    }
    if(is_singular( 'industries' )){
        wp_enqueue_style( 'industries-style', get_theme_file_uri('/assets/css/industries.css'), array(), '1.0.1' );
    }
    if(is_page_template ('templates/careers.php')){
        wp_enqueue_style( 'careers-page-style', get_theme_file_uri('/assets/css/careers.css'), array(), '1.0.4' );
    }
    if(is_page_template ('templates/solutions.php')){
        wp_enqueue_style( 'solutions-page-style', get_theme_file_uri('/assets/css/solutions.css'), array(), '1.0.1' );
    }
    if(is_page_template ('templates/case-studies.php')){
        wp_enqueue_style( 'case-studies-page-style', get_theme_file_uri('/assets/css/case-studies.css'), array(), '1.0.2' );
    }
    
	wp_enqueue_script( 'jquery' );
    wp_enqueue_script(
        'swiper-js',
        get_template_directory_uri() . '/assets/js/swiper-bundle.min.js',
        array('jquery'),
        '12.0.2', 
        true
    );

    wp_enqueue_script(
        'theme-js',
        get_template_directory_uri() . '/assets/js/theme.js',
        array('jquery'), // Dependencies (e.g., 'jquery' if your script relies on jQuery)
        '1.0.9', 
        true // Load in the footer (true) or header (false)
    );
    
}
add_action( 'wp_enqueue_scripts', 'mondaysys_enqueue_assets' );

function mondaysys_admin_enqueue() {
    wp_enqueue_style( 'custom-admin-style', get_theme_file_uri('/assets/css/admin-style.css'), array(), '1.0.1' );
}
add_action( 'admin_enqueue_scripts', 'mondaysys_admin_enqueue' );

if ( file_exists( dirname( __FILE__ ) . '/cmb2/init.php' ) ) {
	require_once dirname( __FILE__ ) . '/cmb2/init.php';
} elseif ( file_exists( dirname( __FILE__ ) . '/CMB2/init.php' ) ) {
	require_once dirname( __FILE__ ) . '/CMB2/init.php';
}
//Global Meta Function
function meta($key, $post_id = null) {
    if (is_null($post_id)) {
        $post_id = get_the_ID();
    }
    $prefix = '_cmb2_';
    return get_post_meta($post_id, $prefix . $key, true);
}


add_filter('use_block_editor_for_post_type', function($can_edit, $post_type) {
    if ($post_type === 'page') {
        return false;
    }
    return $can_edit;
}, 10, 2);


require_once get_template_directory() . '/include/meta.php';
require_once get_template_directory() . '/include/cpt.php';
require_once get_template_directory() . '/include/theme-functions.php';
require_once get_template_directory() . '/include/careers-functions.php';
require_once get_template_directory() . '/include/case-studies-functions.php';


/**
 * Theme setup
 */
function mondaysys_theme_setup() {
    // Let WordPress manage the document title.
    add_theme_support( 'title-tag' );

    // Post thumbnails.
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 1200, 675, true );

    // HTML5 support for forms, galleries, captions.
    add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );

    // Register nav menu.
    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'mondaysys' ),
        'footer'  => __( 'Footer Menu', 'mondaysys' ),
    ) );

    // Add support for custom logo.
    add_theme_support( 'custom-logo', array(
        'height'      => 60,
        'width'       => 200,
        'flex-height' => true,
        'flex-width'  => true,
    ) );

    // Add feed links.
    add_theme_support( 'automatic-feed-links' );
}
add_action( 'after_setup_theme', 'mondaysys_theme_setup' );

//.SVG image support
add_filter( 'upload_mimes', function( $mimes ){
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
});


/**
 * Register widget areas
 */
function mondaysys_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Footer Widget 01', 'mondaysys' ),
        'id'            => 'footer-widget-1',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );
    register_sidebar( array(
        'name'          => __( 'Footer Widget 02', 'mondaysys' ),
        'id'            => 'footer-widget-2',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );
    register_sidebar( array(
        'name'          => __( 'Footer Widget 03', 'mondaysys' ),
        'id'            => 'footer-widget-3',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );
    register_sidebar( array(
        'name'          => __( 'Footer Widget 04', 'mondaysys' ),
        'id'            => 'footer-widget-4',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );
}
add_action( 'widgets_init', 'mondaysys_widgets_init' );


//Create Meta Field in menu item
add_action('wp_nav_menu_item_custom_fields', function($id, $item, $depth, $args) {
    $enable = get_post_meta($item->ID, 'megamenu_enable', true);
    ?>
    <p class="field-mega-menu description description-wide">
        <label>
            <input type="checkbox" 
                   name="menu-item-megamenu_enable[<?php echo $item->ID; ?>]" 
                   value="1" <?php checked($enable, 1); ?> />
            <?php _e('<b>Enable Mega Menu</b>', 'mondaysys'); ?>
        </label>
    </p>
    <?php

    $image_url = get_post_meta($item->ID, 'megamenu_image', true);
    ?>
    <p class="field-mega-menu-image description description-wide">
        <label>
            <?php _e('<b>Menu Image URL</b>', 'mondaysys'); ?><br>
            <input style="width: 100%;" type="text" 
                   name="menu-item-megamenu_image[<?php echo $item->ID; ?>]" 
                   value="<?php echo esc_attr($image_url); ?>" 
                   placeholder="https://example.com/image.jpg" />
        </label>
    </p>
    <?php
}, 10, 4);
//Save meta field for menu item
add_action('wp_update_nav_menu_item', function($menu_id, $menu_item_db_id, $args) {
    $enable = isset($_POST["menu-item-megamenu_enable"][$menu_item_db_id]) ? 1 : 0;
    update_post_meta($menu_item_db_id, 'megamenu_enable', $enable);

    if (isset($_POST["menu-item-megamenu_image"][$menu_item_db_id])) {
        update_post_meta($menu_item_db_id, 'megamenu_image', sanitize_text_field($_POST["menu-item-megamenu_image"][$menu_item_db_id]));
    }
}, 10, 3);


class Mega_Menu_Walker extends Walker_Nav_Menu {

    function start_lvl(&$output, $depth = 0, $args = array()) {
        $output .= '<ul class="sub-menu">';
    }

    function end_lvl(&$output, $depth = 0, $args = array()) {
        $output .= '</ul>';
    }

    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $enable = get_post_meta($item->ID, 'megamenu_enable', true);
        $image_url = get_post_meta($item->ID, 'megamenu_image', true);

        if ($enable && $depth === 0) $classes[] = 'mega_menu_enable';

        $class_names = join(' ', array_filter($classes));
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

        $output .= '<li id="menu-item-'.$item->ID.'" ' . $class_names . '>';

        $atts = array('href' => !empty($item->url) ? $item->url : '');
        $attributes = '';
        foreach ($atts as $attr => $value) {
            if (!empty($value)) $attributes .= " $attr='" . esc_attr($value) . "'";
        }

        $title = apply_filters('the_title', $item->title, $item->ID);
        $output .= '<a' . $attributes . '>' . esc_html($title) . '</a>';

        if ($enable && $depth === 0) {
            $output .= '<div class="mega-menu-wrapper">';
            $output .= '<div class="mega-menu-left">';
            $output .= '<span class="mega-menu-title d-none d-lg-block">' . esc_html($title) . '</span>';
        }

        if ($enable && $depth === 0) $this->current_image = $image_url;
    }

    function end_el(&$output, $item, $depth = 0, $args = array()) {
        $enable = get_post_meta($item->ID, 'megamenu_enable', true);
        if ($enable && $depth === 0) {
            if ($item->ID == 60 || $item->ID == 188) { 
                $output .= '<div class="mega_menu_btn d-non d-lg-block">';
                $output .= '<a href="'.get_site_url().'/services/" class="btn btn-primary">All Services</a>';
                $output .= '</div>';
            }
            $output .= '</div>'; // close mega-menu-left
            if (!empty($this->current_image)) 
                $output .= '<div class="mega-menu-right d-none d-lg-flex text-light" style="--menu-bg:url('.esc_url($this->current_image).');">';
                    $output .='<h4>Ready to Transform Your Business Growth with us ?</h4>';
                    $output .='<a href="'.get_site_url().'/contact-us/" class="btn btn-tertiary w-100">Book a Discovery Call</a>'; 
                $output .='</div>';
            $output .= '</div>'; // close mega-menu-wrapper
        }
        $output .= '</li>';
    }
}












