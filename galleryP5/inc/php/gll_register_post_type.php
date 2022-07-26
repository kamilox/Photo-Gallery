<?php

function patients(){
    $labels = array(
        'name' => _x('All Patients gallery', 'textdomain'),
        'singular_name' => _x('patients', 'textdomain'),
        'menu_name' => _x('patients', 'textdomain'),
        'name_admin_bar' =>  _x('Admin bar', 'textdomain'),
        'add_new' =>  _x('Add New Patient' , 'textdomain'),
        'add_new_item' =>  _x('Add new patient', 'textdomain'),
        'new_item' =>  _x('New Patient', 'textdomain'),
        'edit_item' =>  _x('Edit Patient', 'textdomain'),
        'view_item' =>  _x('View Patient', 'textdomain'),
        'all_items' =>  _x('All patients', 'textdomain'),
        'search_item' =>  _x('Search Patient', 'textdomain'),
        'parent_item_colon' =>  _x('Parent item colon', 'textdomain'),
        'not_found' =>  _x('Patient not found ', 'textdomain'),
        'not_found_in_trash' => _x('Patient not found in trash', 'textdomain'),
       'featured_image'        => __( 'Featured Image', 'textdomain' ),
        'set_featured_image'    => __( 'Set featured image', 'textdomain' ),
        'remove_featured_image' => __( 'Remove featured image', 'textdomain' ),
        'use_featured_image'    => __( 'Use as featured image', 'textdomain' ),
        'insert_into_item'      => __( 'Insert into item', 'textdomain' ),
        'uploaded_to_this_item' => __( 'Uploaded to this item', 'textdomain' ),
        'items_list'            => __( 'Items list', 'textdomain' ),
        'items_list_navigation' => __( 'Items list navigation', 'textdomain' ),
        'filter_items_list'     => __( 'Filter items list', 'textdomain' ),
    );
    $args = array(
        'labels' => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'query_var'          => true,
        'description' => __('Post images types', 'textdomain'),
        'show_ui' => true,
        'show_in_menu' => 'photo_patients',
        'rewrite' => array('slug' => 'patients'),
        'has_archive' => true,
        'menu_position' => 5,
        'supports' =>  array( 
                            'title',
                            'editor',
                            'thumbnail',
                            'author',
                        ),
        'can_export' => true,
        'menu_icon' => 'dashicons-format-gallery',
        'taxonomies'    => array(
            'procedures'
        )        
    );
    register_post_type('patients', $args);
}
add_action('init', 'patients');

function patients_settings(){
    $labels = array(
        'name' => _x('Gallery Settings', 'textdomain'),
        'singular_name' => _x('settings ', 'textdomain'),
        'menu_name' => _x('settings ', 'textdomain'),
        'name_admin_bar' =>  _x('Admin bar', 'textdomain'),
        'add_new' =>  _x('Add New Settings' , 'textdomain'),
        'add_new_item' =>  _x('Add new Settings', 'textdomain'),
        'new_item' =>  _x('New Settings', 'textdomain'),
        'edit_item' =>  _x('Edit Settings', 'textdomain'),
        'view_item' =>  _x('View Settings', 'textdomain'),
        'all_items' =>  _x('All settings ', 'textdomain'),
        'search_item' =>  _x('Search Settings', 'textdomain'),
        'parent_item_colon' =>  _x('Parent item colon', 'textdomain'),
        'not_found' =>  _x('Settings not found ', 'textdomain'),
        'not_found_in_trash' => _x('Settings not found in trash', 'textdomain'),
       'featured_image'        => __( 'Featured Image', 'textdomain' ),
        'set_featured_image'    => __( 'Set featured image', 'textdomain' ),
        'remove_featured_image' => __( 'Remove featured image', 'textdomain' ),
        'use_featured_image'    => __( 'Use as featured image', 'textdomain' ),
        'insert_into_item'      => __( 'Insert into item', 'textdomain' ),
        'uploaded_to_this_item' => __( 'Uploaded to this item', 'textdomain' ),
        'items_list'            => __( 'Items list', 'textdomain' ),
        'items_list_navigation' => __( 'Items list navigation', 'textdomain' ),
        'filter_items_list'     => __( 'Filter items list', 'textdomain' ),
    );
    $args = array(
        'labels' => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'query_var'          => true,
        'description' => __('Post images types', 'textdomain'),
        'show_ui' => true,
        'show_in_menu' => 'photo_patients',
        'rewrite' => array('slug' => 'gallery_settings'),
        'has_archive' => true,
        'menu_position' => 5,
        'supports' =>  array( 
                            'title',
                        ),
        'can_export' => true,
        'menu_icon' => 'dashicons-format-gallery',
        'taxonomies'    => array(
            'procedures'
        )        
    );
    register_post_type('patients_settings', $args);
}
add_action('init', 'patients_settings');
?>