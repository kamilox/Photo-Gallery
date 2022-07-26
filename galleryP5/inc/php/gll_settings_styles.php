<?php
$settings = array(
	'post_type' => 'patients_settings',
    'post_status' => 'publish',
	'post_per_page' => 1
);
$styles = new WP_Query($settings); 
    while ( $styles->have_posts() ) : $styles->the_post(); 
        $add_sensitive_image = get_post_meta($post->ID , 'add_sensitive_image', true);
        $contact_slug = get_post_meta($post->ID , 'contact_slug', true);
        $logo_url = get_post_meta($post->ID , 'logo_url', true);
        $procedure_title_color = get_post_meta($post->ID , 'procedure_title_color', true);
        $title_color = get_post_meta($post->ID , 'title_color', true);
        $display_excerpt_in_gallery = get_post_meta($post->ID , 'display_excerpt_in_gallery', true);
        $primary_button_background_color = get_post_meta($post->ID , 'primary_button_background_color', true);
        $primary_button_border_color = get_post_meta($post->ID , 'primary_button_border_color', true);
        $primary_button_font_color = get_post_meta($post->ID , 'primary_button_font_color', true);
        $secondary_button_background_color = get_post_meta($post->ID , 'secondary_button_background_color', true);
        $secondary_button_border_color = get_post_meta($post->ID , 'secondary_button_border_color', true);
        $secondary_button_font_color = get_post_meta($post->ID , 'secondary_button_font_color', true);
    endwhile;
    wp_reset_postdata();
?>