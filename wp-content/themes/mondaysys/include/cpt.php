<?php

// Register Mondaysys Custom Post Type
function register_modaysys_cpt() {
    $labels_slideshow = array(
        'name'          => __('Banner Slideshow', 'mondaysys' ),
        'singular_name' => __('Banner Slider','mondaysys' ),
        'add_new'       => __( 'Add New', 'mondaysys' ),
        'add_new_item'  => __( 'Add New Slide', 'mondaysys' ),
        'menu_name'     => __('Banner Slider', 'mondaysys' ),
    );

    $args_slideshow = array(
        'labels'              => $labels_slideshow,
        'public'              => false,          // not publicly queryable
        'show_ui'             => true,           
        'show_in_menu'        => true,
        'exclude_from_search' => true,           // hides from search
        'publicly_queryable'  => false,          // hides from front-end
        'rewrite'             => false,          // no permalink structure
        'supports'            => array('title', 'thumbnail', 'page-attributes'),
        'menu_icon'           => 'dashicons-images-alt2',
    );

    register_post_type('banner_slideshow', $args_slideshow);

    $labels_services = array(
        'name'                  => __( 'Mondaysys Services', 'mondaysys' ),
        'singular_name'         => __( 'Mondaysys Service', 'mondaysys' ),
        'menu_name'             => __( 'Mondaysys Services', 'mondaysys' ),
        'name_admin_bar'        => __( 'Service', 'mondaysys' ),
        'add_new'               => __( 'Add New', 'mondaysys' ),
        'add_new_item'          => __( 'Add New Service', 'mondaysys' ),
        'new_item'              => __( 'New Service', 'mondaysys' ),
        'edit_item'             => __( 'Edit Service', 'mondaysys' ),
        'view_item'             => __( 'View Service', 'mondaysys' ),
        'all_items'             => __( 'All Services', 'mondaysys' ),
        'search_items'          => __( 'Search Services', 'mondaysys' ),
        'parent_item_colon'     => __( 'Parent Service:', 'mondaysys' ),
        'not_found'             => __( 'No services found.', 'mondaysys' ),
        'not_found_in_trash'    => __( 'No services found in Trash.', 'mondaysys' ),
        'featured_image'        => __( 'Service Image', 'mondaysys' ),
        'set_featured_image'    => __( 'Set Service Image', 'mondaysys' ),
        'remove_featured_image' => __( 'Remove Service Image', 'mondaysys' ),
        'use_featured_image'    => __( 'Use as Service Image', 'mondaysys' ),
        'archives'              => __( 'Service Archives', 'mondaysys' ),
        'insert_into_item'      => __( 'Insert into service', 'mondaysys' ),
        'uploaded_to_this_item' => __( 'Uploaded to this service', 'mondaysys' ),
        'filter_items_list'     => __( 'Filter services list', 'mondaysys' ),
        'items_list_navigation' => __( 'Services list navigation', 'mondaysys' ),
        'items_list'            => __( 'Services list', 'mondaysys' ),
    );

    $args_services = array(
        'labels'              => $labels_services,
        'public'              => true,        
        'show_ui'             => true,           
        'show_in_menu'        => true,
        'exclude_from_search' => false,          
        'publicly_queryable'  => true,          
        'rewrite'            => array( 'slug' => 'services' ),
        'supports'            => array('title', 'editor', 'author', 'thumbnail', 'page-attributes'),
        'menu_icon'           => 'dashicons-admin-generic',
    );

    register_post_type('mondaysys_services', $args_services);

    $labels_testimonials = array(
        'name'          => __('Testimonials', 'mondaysys' ),
        'singular_name' => __('Testimonials','mondaysys' ),
        'add_new'       => __( 'Add New', 'mondaysys' ),
        'add_new_item'  => __( 'Add New Testimonial', 'mondaysys' ),
        'menu_name'     => __('Testimonials', 'mondaysys' ),
    );

    $args_testimonials = array(
        'labels'              => $labels_testimonials,
        'public'              => false,          // not publicly queryable
        'show_ui'             => true,           
        'show_in_menu'        => true,
        'exclude_from_search' => true,           // hides from search
        'publicly_queryable'  => false,          // hides from front-end
        'rewrite'             => false,          // no permalink structure
        'supports'            => array('title', 'editor', 'thumbnail', 'page-attributes'),
        'menu_icon'           => 'dashicons-format-quote',
    );

    register_post_type('testimonials', $args_testimonials);

    $labels_process = array(
        'name'          => __('Working Process', 'mondaysys' ),
        'singular_name' => __('Working Process','mondaysys' ),
        'add_new'       => __( 'Add New', 'mondaysys' ),
        'add_new_item'  => __( 'Add New Process', 'mondaysys' ),
        'menu_name'     => __('Working Process', 'mondaysys' ),
    );

    $args_process = array(
        'labels'              => $labels_process,
        'public'              => false,         
        'show_ui'             => true,           
        'show_in_menu'        => true,
        'exclude_from_search' => true,          
        'publicly_queryable'  => false,          
        'rewrite'             => false,          
        'supports'            => array('title', 'editor', 'page-attributes'),
        'menu_icon'           => 'dashicons-image-rotate-right',
    );

    register_post_type('working_process', $args_process);

    $labels_faq = array(
        'name'          => __('FAQs', 'mondaysys' ),
        'singular_name' => __('FAQs','mondaysys' ),
        'add_new'       => __( 'Add New', 'mondaysys' ),
        'add_new_item'  => __( 'Add New FAQ', 'mondaysys' ),
        'menu_name'     => __('FAQs', 'mondaysys' ),
    );

    $args_faq = array(
        'labels'              => $labels_faq,
        'public'              => false,         
        'show_ui'             => true,           
        'show_in_menu'        => true,
        'exclude_from_search' => true,          
        'publicly_queryable'  => false,          
        'rewrite'             => false,          
        'supports'            => array('title', 'editor', 'page-attributes'),
        'menu_icon'           => 'dashicons-editor-help',
    );
    register_post_type('faqs', $args_faq);

    $labels_technology = array(
        'name'          => __('Technology', 'mondaysys' ),
        'singular_name' => __('Technology','mondaysys' ),
        'add_new'       => __( 'Add New', 'mondaysys' ),
        'add_new_item'  => __( 'Add New Technology', 'mondaysys' ),
        'menu_name'     => __('Technology', 'mondaysys' ),
    );

    $args_technology = array(
        'labels'              => $labels_technology,
        'public'              => false,         
        'show_ui'             => true,           
        'show_in_menu'        => true,
        'exclude_from_search' => true,          
        'publicly_queryable'  => true, 
        'rewrite'             => false,
        'supports'            => array('title', 'thumbnail', 'page-attributes'),
    );
    register_post_type('technology', $args_technology);

    $taxonomy_labels_technology = array(
        'name'              => __( 'Technology Categories', 'mondaysys' ),
        'singular_name'     => __( 'Technology Category', 'mondaysys' ),
        'search_items'      => __( 'Search Technology', 'mondaysys' ),
        'all_items'         => __( 'All Categories', 'mondaysys' ),
        'parent_item'       => __( 'Parent Category', 'mondaysys' ),
        'parent_item_colon' => __( 'Parent Category:', 'mondaysys' ),
        'edit_item'         => __( 'Edit Category', 'mondaysys' ),
        'update_item'       => __( 'Update Category', 'mondaysys' ),
        'add_new_item'      => __( 'Add New Category', 'mondaysys' ),
        'new_item_name'     => __( 'New Category Name', 'mondaysys' ),
        'menu_name'         => __( 'Categories', 'mondaysys' ),
    );

    $taxonomy_args_technology = array(
        'hierarchical'      => true,
        'labels'            => $taxonomy_labels_technology,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'public'            => false, 
        'show_in_nav_menus' => false,
        'rewrite'           => false,
    );

    register_taxonomy( 'technology_cat', array( 'technology' ), $taxonomy_args_technology );

    $labels_industry = array(
        'name'                  => __('Industries We Serve', 'mondaysys'),
        'singular_name'         => __('Industry', 'mondaysys'),
        'menu_name'             => __('Industries We Serve', 'mondaysys'),
        'name_admin_bar'        => __('Industry', 'mondaysys'),
        'add_new'               => __('Add New', 'mondaysys'),
        'add_new_item'          => __('Add New Industry', 'mondaysys'),
        'new_item'              => __('New Industry', 'mondaysys'),
        'edit_item'             => __('Edit Industry', 'mondaysys'),
        'view_item'             => __('View Industry', 'mondaysys'),
        'all_items'             => __('All Industries', 'mondaysys'),
        'search_items'          => __('Search Industries', 'mondaysys'),
        'not_found'             => __('No industries found.', 'mondaysys'),
        'not_found_in_trash'    => __('No industries found in Trash.', 'mondaysys'),
    );

    $args_industry = array(
        'labels'             => $labels_industry,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'industries'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_icon'          => 'dashicons-businessperson',
        'supports'           => array('title', 'thumbnail', 'page-attributes'),
        'show_in_rest'       => false, 
    );

    register_post_type('industries', $args_industry);

    
}
add_action('init', 'register_modaysys_cpt');