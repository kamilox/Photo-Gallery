<?php
function add_patients_submenu(){
    add_menu_page(
        'photo_patients',
        'Photo gallery',
        'manage_options',
        'photo_patients',
        'labels',
        'dashicons-admin-page', 
        6
    );

    add_submenu_page(
        'photo_patients',//parent slug
        '', // 
        'Add new patient', //
        'manage_options', // 
        'patients', //  
        'add_new_item' // 
    );

    add_submenu_page(
        'photo_patients',//parent slug
        '', // 
        'Procedures', //
        'manage_options', // 
        'procedures', //  
        'procedures' // 
    );
    
    add_submenu_page(
        'photo_patients',//parent slug
        '', // 
        'Default Procedures', //
        'manage_options', // 
        'default_procedures', //  
        'default_procedures' // 
    );
}
add_action('admin_menu', 'add_patients_submenu');

//url add new item
function add_new_item() {
    ?><script>window.location = "<?php echo admin_url('post-new.php?post_type=patients'); ?>";</script><?php 
}
//url add new item
function procedures() {
    ?><script>window.location = "<?php echo admin_url('edit-tags.php?taxonomy=procedures&post_type=patients'); ?>";</script><?php
}
function default_procedures() {
    require_once('gll_default_procedures.php');
}
?>