<?php
require_once('gll_save_settings_meta.php');

function add_custom_fields_settings() {
    $page = 'patients_settings';
    $context = 'normal';
    $priority = 'high';

    add_meta_box( 'sensitive-image', 'Sensitive Image Protection', 'sensitive_image',$page, $context, $priority );
    add_meta_box( 'contact-slug', 'Slug Contact Page', 'contact_slug',$page, $context, $priority );
    add_meta_box( 'logo_url', 'Select Your Logo', 'logo_url',$page, $context, $priority );
    add_meta_box( 'procedure-title-color', 'Procedure Title Color','procedure_title_color',$page, $context, $priority); 
    add_meta_box( 'title-color', 'Title Color','title_color',$page, $context, $priority); 
    add_meta_box( 'display-excerpt-in-gallery', 'Display Excerpt In Gallery','display_excerpt_in_gallery',$page, $context, $priority); 
    add_meta_box( 'primary-button-background-color', 'Primary Button Background Color','primary_button_background_color',$page, $context, $priority); 
    add_meta_box( 'primary-button-border-color', 'Primary Button Border Color','primary_button_border_color',$page, $context, $priority); 
    add_meta_box( 'primary-button-font-color', 'Primary Button Font Color','primary_button_font_color',$page, $context, $priority); 
    add_meta_box( 'secondary-button-background-color', 'Secondary Button Background Color','secondary_button_background_color',$page, $context, $priority); 
    add_meta_box( 'secondary-button-border-color', 'Secondary Button Border Color','secondary_button_border_color',$page, $context, $priority); 
    add_meta_box( 'secondary-button-font-color', 'Secondary Button Font Color','secondary_button_font_color',$page, $context, $priority); 
}
add_action( 'add_meta_boxes', 'add_custom_fields_settings' );

function sensitive_image($post){
    global $wpdb, $post;
    $id = get_the_ID();
    $add_sensitive_image = get_post_meta($id , 'add_sensitive_image', true);
    ?>
    <fieldset>
        <div class="custom-fields">
            <div class="custom-fields-title">
                <label for="sensitive_image">Add Sensitive Protection</label>
            </div>
            <div class="custom-fields-input">
                <select name="add_sensitive_image" id="add_sensitive_image">
                    <?php
                        if(isset($add_sensitive_image)){
                            echo '<option value="'.$add_sensitive_image.'">';
                                if($add_sensitive_image == '1'){
                                    echo 'Yes';
                                }else{
                                    echo 'No';
                                }
                            echo '</option>';
                        }
                    ?>
                    <option value="">Select</option>
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </select>
            </div>
        </div>
        
    </fieldset>
    <?php
    wp_nonce_field( '_namespace_form_metabox_settings', '_namespace_form_metabox_settings_fields' );
}

function contact_slug($post){
    global $wpdb, $post;
    $id = get_the_ID();
    $contact_slug = get_post_meta($id , 'contact_slug', true);
    ?>
    <fieldset>
        <div class="custom-fields">
            <div class="custom-fields-title">
                <label for="contact_slug">Your contact page slug</label>
            </div>
            <div class="custom-fields-input">
                <input type="text" name="contact_slug" id="contact_slug" value="<?php if(isset($contact_slug)){ echo $contact_slug ;} ?>"  />
            </div>
        </div>
        
    </fieldset>
    <?php
    wp_nonce_field( '_namespace_form_metabox_settings', '_namespace_form_metabox_settings_fields' );
}

function logo_url($post){
    global $wpdb, $post;
    $id = get_the_ID();
    $logo_url = get_post_meta($id , 'logo_url', true);
    ?>
    <fieldset>
        <div class="custom-fields">
            <div class="custom-fields-title">
                <label for="logo_url">Select the logo that you like display in your gallery</label>
            </div>
            <div class="custom-fields-input">
                <input id="load-logo" type="button" class="button loadLogo" value="Select Image" />
                <img src="<?php if(isset($logo_url)){ echo $logo_url ;} ?>" class="patients-settings-logo">
                <input type="hidden" class="logo_url" id="logo_url" name="logo_url" value="<?php if(isset($logo_url)){ echo $logo_url ;} ?>">
            </div>
        </div>
        
    </fieldset>
    <?php
    wp_nonce_field( '_namespace_form_metabox_settings', '_namespace_form_metabox_settings_fields' );
}

function procedure_title_color($post){
    global $wpdb, $post;
    $id = get_the_ID();
    $procedure_title_color = get_post_meta($id , 'procedure_title_color', true);
    ?>
    <fieldset>
        <div class="custom-fields">
            <div class="custom-fields-title">
                <label for="procedure_title_color">Select de color to procedures</label>
            </div>
            <div class="custom-fields-input">
                <input type="text" class="procedure_title_color" id="procedure_title_color" name="procedure_title_color" value="<?php if(isset($procedure_title_color)){ echo $procedure_title_color ;} ?>">
            </div>
        </div>
    </fieldset>
    <?php
    wp_nonce_field( '_namespace_form_metabox_settings', '_namespace_form_metabox_settings_fields' );
}

function title_color($post){
    global $wpdb, $post;
    $id = get_the_ID();
    $title_color = get_post_meta($id , 'title_color', true);
    ?>
    <fieldset>
        <div class="custom-fields">
            <div class="custom-fields-title">
                <label for="title_color">Select color title</label>
            </div>
            <div class="custom-fields-input">
                <input type="text" class="title_color" id="title_color" name="title_color" value="<?php if(isset($title_color)){ echo $title_color ;} ?>">
            </div>
        </div>
    </fieldset>
    <?php
    wp_nonce_field( '_namespace_form_metabox_settings', '_namespace_form_metabox_settings_fields' );
}

function display_excerpt_in_gallery($post){
    global $wpdb, $post;
    $id = get_the_ID();
    $display_excerpt_in_gallery = get_post_meta($id , 'display_excerpt_in_gallery', true);
    ?>
    <fieldset>
        <div class="custom-fields">
            <div class="custom-fields-title">
                <label for="display_excerpt_in_gallery">Display Excerpt In Gallery</label>
            </div>
            <div class="custom-fields-input">
                <select name="display_excerpt_in_gallery" id="display_excerpt_in_gallery">
                <?php
                        if(isset($display_excerpt_in_gallery)){
                            echo '<option value="'.$display_excerpt_in_gallery.'">';
                                if($display_excerpt_in_gallery == '1'){
                                    echo 'Yes';
                                }else{
                                    echo 'No';
                                }
                            echo '</option>';
                        }
                    ?>
                    <option value="">Select</option>
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </select>
            </div>
        </div>
    </fieldset>
    <?php
    wp_nonce_field( '_namespace_form_metabox_settings', '_namespace_form_metabox_settings_fields' );
}

function primary_button_background_color($post){
    global $wpdb, $post;
    $id = get_the_ID();
    $primary_button_background_color = get_post_meta($id , 'primary_button_background_color', true);
    ?>
    <fieldset>
        <div class="custom-fields">
            <div class="custom-fields-title">
                <label for="primary_button_background_color">Primary Buttons Background Color</label>
            </div>
            <div class="custom-fields-input">
                <input type="text" class="primary_button_background_color" id="primary_button_background_color" name="primary_button_background_color" value="<?php if(isset($primary_button_background_color)){ echo $primary_button_background_color ;} ?>">
            </div>
        </div>
    </fieldset>
    <?php
    wp_nonce_field( '_namespace_form_metabox_settings', '_namespace_form_metabox_settings_fields' );
}

function primary_button_border_color($post){
    global $wpdb, $post;
    $id = get_the_ID();
    $primary_button_border_color = get_post_meta($id , 'primary_button_border_color', true);
    ?>
    <fieldset>
        <div class="custom-fields">
            <div class="custom-fields-title">
                <label for="primary_button_border_color">Primary Button Border Color</label>
            </div>
            <div class="custom-fields-input">
                <input type="text" class="primary_button_border_color" id="primary_button_border_color" name="primary_button_border_color" value="<?php if(isset($primary_button_border_color)){ echo $primary_button_border_color ;} ?>">
            </div>
        </div>
    </fieldset>
    <?php
    wp_nonce_field( '_namespace_form_metabox_settings', '_namespace_form_metabox_settings_fields' );
}

function primary_button_font_color($post){
    global $wpdb, $post;
    $id = get_the_ID();
    $primary_button_font_color = get_post_meta($id , 'primary_button_font_color', true);
    ?>
    <fieldset>
        <div class="custom-fields">
            <div class="custom-fields-title">
                <label for="primary_button_font_color">Primary Button Font Color</label>
            </div>
            <div class="custom-fields-input">
                <input type="text" class="primary_button_font_color" id="primary_button_font_color" name="primary_button_font_color" value="<?php if(isset($primary_button_font_color)){ echo $primary_button_font_color ;} ?>">
            </div>
        </div>
    </fieldset>
    <?php
    wp_nonce_field( '_namespace_form_metabox_settings', '_namespace_form_metabox_settings_fields' );
}

function secondary_button_background_color($post){
    global $wpdb, $post;
    $id = get_the_ID();
    $secondary_button_background_color = get_post_meta($id , 'secondary_button_background_color', true);
    ?>
    <fieldset>
        <div class="custom-fields">
            <div class="custom-fields-title">
                <label for="secondary_button_background_color">Secondary Button Background Color</label>
            </div>
            <div class="custom-fields-input">
                <input type="text" class="secondary_button_background_color" id="secondary_button_background_color" name="secondary_button_background_color" value="<?php if(isset($secondary_button_background_color)){ echo $secondary_button_background_color ;} ?>">
            </div>
        </div>
    </fieldset>
    <?php
    wp_nonce_field( '_namespace_form_metabox_settings', '_namespace_form_metabox_settings_fields' );
}

function secondary_button_border_color($post){
    global $wpdb, $post;
    $id = get_the_ID();
    $secondary_button_border_color = get_post_meta($id , 'secondary_button_border_color', true);
    ?>
    <fieldset>
        <div class="custom-fields">
            <div class="custom-fields-title">
                <label for="secondary_button_border_color">Secondary Button Border Color</label>
            </div>
            <div class="custom-fields-input">
                <input type="text" class="secondary_button_border_color" id="secondary_button_border_color" name="secondary_button_border_color" value="<?php if(isset($secondary_button_border_color)){ echo $secondary_button_border_color ;} ?>">
            </div>
        </div>
    </fieldset>
    <?php
    wp_nonce_field( '_namespace_form_metabox_settings', '_namespace_form_metabox_settings_fields' );
}

function secondary_button_font_color($post){
    global $wpdb, $post;
    $id = get_the_ID();
    $secondary_button_font_color = get_post_meta($id , 'secondary_button_font_color', true);
    ?>
    <fieldset>
        <div class="custom-fields">
            <div class="custom-fields-title">
                <label for="secondary_button_font_color">Secondary Button Font Color</label>
            </div>
            <div class="custom-fields-input">
                <input type="text" class="secondary_button_font_color" id="secondary_button_font_color" name="secondary_button_font_color" value="<?php if(isset($secondary_button_font_color)){ echo $secondary_button_font_color ;} ?>">
            </div>
        </div>
    </fieldset>
    <?php
    wp_nonce_field( '_namespace_form_metabox_settings', '_namespace_form_metabox_settings_fields' );
}
?>