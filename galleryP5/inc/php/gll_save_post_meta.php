<?php
/**
* Save the metabox
* @param  Number $post_id The post ID
* @param  Array  $post    The post data
*/
function save_patients_custom_fields( $post_id, $post ) {
    
    // Verify that our security field exists. If not, bail.
    if ( !isset( $_POST['_namespace_form_metabox_patients_fields'] ) ) return;
 
    // Verify data came from edit/dashboard screen
    if ( !wp_verify_nonce( $_POST['_namespace_form_metabox_patients_fields'], '_namespace_form_metabox_patients' ) ) {
        return $post->ID;
    }
 
    // Verify user has permission to edit post
    if ( !current_user_can( 'edit_post', $post->ID )) {
        return $post->ID;
    }
    
    // Check that our custom fields are being passed along
    // This is the `name` value array. We can grab all
    // of the fields and their values at once.
     if ( !isset( $_POST['gcase_details'] ) ) {
         return $post->ID;
     }
     if ( !isset( $_POST['gcase_notes'] ) ) {
         return $post->ID;
     }
     if ( !isset( $_POST['surgeon'] ) ) {
         return $post->ID;
     }
     if ( !isset( $_POST['hide_from_live_hidden'] ) ) {
         return $post->ID;
     }
     if ( !isset( $_POST['gheight'] ) ) {
         return $post->ID;
     }
     if ( !isset( $_POST['gweight'] ) ) {
         return $post->ID;
     }
     if ( !isset( $_POST['age'] ) ) {
         return $post->ID;
     }
     if ( !isset( $_POST['implant_size_left'] ) ) {
         return $post->ID;
     }
     if ( !isset( $_POST['implant_size_right'] ) ) {
         return $post->ID;
     }
     if ( !isset( $_POST['cup_size_before'] ) ) {
         return $post->ID;
     }
     if ( !isset( $_POST['cup_size_after'] ) ) {
         return $post->ID;
     }
     if ( !isset( $_POST['images_array'] ) ) {
         return $post->ID;
     }
    /**
     * Sanitize the submitted data
     * This keeps malicious code out of our database.
     * `wp_filter_post_kses` strips our dangerous server values
     * and allows through anything you can include a post.
     */
     //save and update case details
     $sanitized_gcase_details     = wp_filter_post_kses( $_POST['gcase_details'] );
     update_post_meta( $post->ID, 'gcase_details', $sanitized_gcase_details );
     // Save and update case notes
     $sanitized_gcase_notes       = wp_filter_post_kses( $_POST['gcase_notes'] );
     update_post_meta( $post->ID, 'gcase_notes', $sanitized_gcase_notes );
     // Save and update surgeon
     $sanitized_surgeon       = wp_filter_post_kses( $_POST['surgeon'] );
     update_post_meta( $post->ID, 'surgeon', $sanitized_surgeon );
     // Save and update surgeon
     $sanitized_hide_from_live_hidden       = wp_filter_post_kses( $_POST['hide_from_live_hidden'] );
     update_post_meta( $post->ID, 'hide_from_live_hidden', $sanitized_hide_from_live_hidden );
     // Save and update surgeon
     $sanitized_gheight       = wp_filter_post_kses( $_POST['gheight'] );
     update_post_meta( $post->ID, 'gheight', $sanitized_gheight );
     // Save and update surgeon
     $sanitized_gweight       = wp_filter_post_kses( $_POST['gweight'] );
     update_post_meta( $post->ID, 'gweight', $sanitized_gweight );
     // Save and update surgeon
     $sanitized_age       = wp_filter_post_kses( $_POST['age'] );
     update_post_meta( $post->ID, 'age', $sanitized_age );
     // Save and update surgeon
     $sanitized_implant_size_left       = wp_filter_post_kses( $_POST['implant_size_left'] );
     update_post_meta( $post->ID, 'implant_size_left', $sanitized_implant_size_left );
     // Save and update surgeon
     $sanitized_implant_size_right       = wp_filter_post_kses( $_POST['implant_size_right'] );
     update_post_meta( $post->ID, 'implant_size_right', $sanitized_implant_size_right );
     // Save and update surgeon
     $sanitized_cup_size_before       = wp_filter_post_kses( $_POST['cup_size_before'] );
     update_post_meta( $post->ID, 'cup_size_before', $sanitized_cup_size_before );
     // Save and update surgeon
     $sanitized_cup_size_after        = wp_filter_post_kses( $_POST['cup_size_after'] );
     update_post_meta( $post->ID, 'cup_size_after', $sanitized_cup_size_after  );
     // Save and update images
     $sanitized_images_array        = wp_filter_post_kses( $_POST['images_array'] );
     update_post_meta( $post->ID, 'images_array', $sanitized_images_array  );
 
 }
 add_action( 'save_post', 'save_patients_custom_fields', 1, 2 );
?>