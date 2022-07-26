<?php
        global $wpdb;

        $table = 'wp_patients_settings';
        $settings = $wpdb->get_results('SELECT * FROM '.$table.'');
        $count = (count($settings))+1;
        $id = $count;
        $logo_url = sanitize_text_field($_POST['logo_url']);
        $procedure_title_color = sanitize_text_field($_POST['procedure_title_color']);
        $display_excerpt_in_gallery = sanitize_text_field($_POST['display_excerpt_in_gallery']);
        $primary_button_background_color = sanitize_text_field($_POST['primary_button_background_color']);
        $primary_button_border_color = sanitize_text_field($_POST['primary_button_border_color']);
        $primary_button_font_color = sanitize_text_field($_POST['primary_button_font_color']);
        $secondary_button_background_color = sanitize_text_field($_POST['secondary_button_background_color']);
        $secondary_button_border_color = sanitize_text_field($_POST['secondary_button_border_color']);
        $secondary_button_font_color = sanitize_text_field($_POST['secondary_button_font_color']);
        $add_sensitive_image = sanitize_text_field($_POST['add_sensitive_image']);
        $gallery_slug = sanitize_text_field($_POST['gallery_slug']);
        $contact_slug = sanitize_text_field($_POST['contact_slug']);

        $data = array(
            'id' => $id,
            'logo_url' => $logo_url,
            'procedure_title_color' => $procedure_title_color,
            'display_excerpt_in_gallery' => $display_excerpt_in_gallery,
            'primary_button_background_color' => $primary_button_background_color,
            'primary_button_border_color' => $primary_button_border_color,
            'primary_button_font_color' => $primary_button_font_color,
            'secondary_button_background_color' => $secondary_button_background_color,
            'secondary_button_border_color' => $secondary_button_border_color,
            'secondary_button_font_color' => $secondary_button_font_color,
            'add_sensitive_image' => $add_sensitive_image,
            'gallery_slug' => $gallery_slug,
            'contact_slug' => $contact_slug
        );

        $format = array(
            '%d', //id
            '%s',//logo_url,
            '%s',//procedure_title_color,
            '%s',//display_excerpt_in_gallery,
            '%s',//primary_button_background_color,
            '%s',//primary_button_border_color,
            '%s',//primary_button_font_color,
            '%s',//secondary_button_background_color,
            '%s',//secondary_button_border_color,
            '%s',//secondary_button_font_color,
            '%s',//add_sensitive_image,
            '%s',// gallery_slug,
            '%s'// contact_slug
        );
        $wpdb->insert($table, $data, $format);
        wp_redirect(admin_url('/admin.php?page=gallery_settings'));
?>