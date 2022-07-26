<?php
    function gallery_styles(){
        wp_enqueue_style('gll-style',  plugin_dir_url( __FILE__ ).'../css/gll_style.css', 5.9);
        wp_enqueue_script('jquery');
        wp_enqueue_script('gll-query', plugin_dir_url( __FILE__ ).'../js/gll_gallery.js', array('jquery'), 5.9);
        wp_enqueue_script('gll-protect-images', plugin_dir_url( __FILE__ ).'../js/gll_image_protector.js', array('jquery'), 5.9);
    }
    add_action('init', 'gallery_styles');
    function meta_box_scripts() {
        global $post;
        wp_enqueue_media( array( 
            'post' => $post, 
        ) );
    }
    add_action( 'admin_enqueue_scripts', 'meta_box_scripts' );
?>