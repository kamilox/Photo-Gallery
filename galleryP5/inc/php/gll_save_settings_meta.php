<?php
/**
* Save the metabox
* @param  Number $post_id The post ID
* @param  Array  $post    The post data
*/
function save_settings_custom_fields( $post_id, $post ) {
    
    // Verify that our security field exists. If not, bail.
    if ( !isset( $_POST['_namespace_form_metabox_settings_fields'] ) ) return;
 
    // Verify data came from edit/dashboard screen
    if ( !wp_verify_nonce( $_POST['_namespace_form_metabox_settings_fields'], '_namespace_form_metabox_settings' ) ) {
        return $post->ID;
    }
 
    // Verify user has permission to edit post
    if ( !current_user_can( 'edit_post', $post->ID )) {
        return $post->ID;
    }
    
    // Check that our custom fields are being passed along
    // This is the `name` value array. We can grab all
    // of the fields and their values at once.
    if ( !isset( $_POST['add_sensitive_image'])){
        return $post->ID;
    }
    if ( !isset( $_POST['contact_slug'])){
        return $post->ID;
    }
    if ( !isset( $_POST['logo_url'])){
        return $post->ID;
    }
    if ( !isset( $_POST['procedure_title_color'])){
        return $post->ID;
    }
    if ( !isset( $_POST['title_color'])){
        return $post->ID;
    }
    if ( !isset( $_POST['display_excerpt_in_gallery'])){
        return $post->ID;
    }
    if ( !isset( $_POST['primary_button_background_color'])){
        return $post->ID;
    }
    if ( !isset( $_POST['primary_button_border_color'])){
        return $post->ID;
    }
    if ( !isset( $_POST['primary_button_font_color'])){
        return $post->ID;
    }
    if ( !isset( $_POST['secondary_button_background_color'])){
        return $post->ID;
    }
    if ( !isset( $_POST['secondary_button_border_color'])){
        return $post->ID;
    }
    if ( !isset( $_POST['secondary_button_font_color'])){
        return $post->ID;
    }
    
    /**
     * Sanitize the submitted data
     * This keeps malicious code out of our database.
     * `wp_filter_post_kses` strips our dangerous server values
     * and allows through anything you can include a post.
     */

    $sensitive_image = wp_filter_kses($_POST['add_sensitive_image']);
    update_post_meta($post->ID, 'add_sensitive_image', $sensitive_image);

    $contact_slug = wp_filter_kses($_POST['contact_slug']);
    update_post_meta($post->ID, 'contact_slug', $contact_slug);

    $logo_url = wp_filter_kses($_POST['logo_url']);
    update_post_meta($post->ID, 'logo_url', $logo_url);

    $procedure_title_color = wp_filter_kses($_POST['procedure_title_color']);
    update_post_meta($post->ID, 'procedure_title_color', $procedure_title_color);

    $title_color = wp_filter_kses($_POST['title_color']);
    update_post_meta($post->ID, 'title_color', $title_color);

    $display_excerpt_in_gallery = wp_filter_kses($_POST['display_excerpt_in_gallery']);
    update_post_meta($post->ID, 'display_excerpt_in_gallery', $display_excerpt_in_gallery);

    $primary_button_background_color = wp_filter_kses($_POST['primary_button_background_color']);
    update_post_meta($post->ID, 'primary_button_background_color', $primary_button_background_color);

    $primary_button_border_color = wp_filter_kses($_POST['primary_button_border_color']);
    update_post_meta($post->ID, 'primary_button_border_color', $primary_button_border_color);

    $primary_button_font_color = wp_filter_kses($_POST['primary_button_font_color']);
    update_post_meta($post->ID, 'primary_button_font_color', $primary_button_font_color);

    $secondary_button_background_color = wp_filter_kses($_POST['secondary_button_background_color']);
    update_post_meta($post->ID, 'secondary_button_background_color', $secondary_button_background_color);

    $secondary_button_border_color = wp_filter_kses($_POST['secondary_button_border_color']);
    update_post_meta($post->ID, 'secondary_button_border_color', $secondary_button_border_color);

    $secondary_button_font_color = wp_filter_kses($_POST['secondary_button_font_color']);
    update_post_meta($post->ID, 'secondary_button_font_color', $secondary_button_font_color);

 
 }
 add_action( 'save_post', 'save_settings_custom_fields', 1, 2 );
?>

