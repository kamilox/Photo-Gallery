<?php
require_once('gll_save_post_meta.php');

function add_custom_fields() {
    $page = 'patients';
    $context = 'normal';
    $priority = 'high';

    add_meta_box( 'case-details', 'Case Details', 'case_details',$page, $context, $priority );
    add_meta_box( 'surgeon', 'Surgeon', 'surgeon', $page, $context, $priority );
    add_meta_box( 'display_options', 'Display Options', 'display_options', $page, $context, $priority );
    add_meta_box( 'patient_information', 'Patient Information', 'patient_information', $page, $context, $priority );
    add_meta_box( 'images', 'Patient pictures', 'patient_images', $page, $context, $priority );
}
add_action( 'add_meta_boxes', 'add_custom_fields' );

function case_details($post){
    //recover data from db to edit
    global $wpdb, $post;
    $id = get_the_ID();
    $result = $wpdb->get_results('SELECT * FROM wp21v_patients_gallery WHERE post_id ='.$id.'');
    $gcase_details = get_post_meta($post->ID, 'gcase_details', true);
    $gcase_notes = get_post_meta($post->ID, 'gcase_notes', true);
    
    ?>
    <fieldset>
        <div class="custom-fields">
            <div class="custom-fields-title">
                <label for="case_details">Case Title*:</label>
            </div>
            <div class="custom-fields-input">
                <input type="text" name="gcase_details" id="gcase_details" value="<?php 
                    if(isset($gcase_details)) {
                        echo $gcase_details;
                    }else{
                       echo $result[0]->gcase_details;
                    }
                        
                ?>"  />
            </div>
            <div class="custom-fields-title">
                <label for="case_details">Case Notes*:</label>
            </div>
            <div class="custom-fields-input">
                <input type="text" name="gcase_notes" id="gcase_notes" value="<?php
                    if(isset($gcase_notes)){
                        echo $gcase_notes;
                    }else{
                        echo $result[0]->gcase_notes;
                    }
                    ?>"  />
                    
            </div>
        </div>
    </fieldset>
    <?php
    wp_nonce_field( '_namespace_form_metabox_patients', '_namespace_form_metabox_patients_fields' );
}

function surgeon($post){
    //recover data from db to edit
    global $wpdb, $post;
    $id = get_the_ID();
   $result = $wpdb->get_results('SELECT * FROM wp21v_patients_gallery WHERE post_id ='.$id.'');
    $surgeon = get_post_meta($post->ID, 'surgeon', true);
    $users = get_users();
    
    ?>
    <fieldset>
        <div class="custom-fields">
            <div class="custom-fields-title">
                <label for="surgeon">Surgeon:</label>
            </div>
            <div class="custom-fields-input">
                <select name="surgeon" id="surgeon">
                    <option value="<?php
                        if(isset($surgeon)){
                            echo $surgeon;
                        }else{
                            echo $result[0]->surgeon;
                        }
                    ?>" > 
                    <?php
                        if(isset($surgeon)){
                            echo $surgeon;
                        }else{
                            echo $result[0]->surgeon;
                        }
                    ?>
                    </option>
                    <?php foreach ($users as $key => $user) { ?>
                        <option value="<?php echo $user->display_name; ?>"><?php echo $user->display_name; ?></option>
                    <?php } ?>

                </select>
            </div>
        </div>    
        <p>If empty, surgeon name from gallery Settings will display at front.</p>
    </fieldset>
    <?php
    wp_nonce_field( '_namespace_form_metabox_patients', '_namespace_form_metabox_patients_fields' );
}

function display_options($post){
    //recover data from db to edit
    global $wpdb, $post;
    $id = get_the_ID();
    $result = $wpdb->get_results('SELECT * FROM wp21v_patients_gallery WHERE post_id ='.$id.'');
    $hide_from_live_hidden = get_post_meta($post->ID, 'hide_from_live_hidden', true);
    ?>
    <fieldset>
        <div class="custom-fields">
            <div class="custom-fields-title">
                <label for="display_options">Hide from live site:</label>
            </div>
            <div class="custom-fields-input">
                <input type="checkbox" name="hide_from_live" id="hide_from_live" value="" />
                <input type="hidden" name="hide_from_live_hidden" id="hide_from_live_hidden" value="<?php 
                    if(isset($hide_from_live_hidden)){
                        echo $hide_from_live_hidden;
                    }else{
                        echo $result[0]->hide_from_live;
                    }
                    ?>" />
            </div>
        </div>
    </fieldset>
    <?php
    wp_nonce_field( '_namespace_form_metabox_patients', '_namespace_form_metabox_patients_fields' );
}

function patient_information($post){
    //recover data from db to edit
    global $wpdb, $post;
    $id = get_the_ID();
    $result = $wpdb->get_results('SELECT * FROM wp21v_patients_gallery WHERE post_id ='.$id.'');
    $gheight = get_post_meta($post->ID, 'gheight', true);
    $gweight = get_post_meta($post->ID, 'gweight', true);
    $age = get_post_meta($post->ID, 'age', true);
    $implant_size_left = get_post_meta($post->ID, 'implant_size_left', true);
    $implant_size_right = get_post_meta($post->ID, 'implant_size_right', true);
    $cup_size_before = get_post_meta($post->ID, 'cup_size_before', true);
    $cup_size_after = get_post_meta($post->ID, 'cup_size_after', true);
    ?>
    <fieldset>
        <div class="custom-fields">
            <div class="custom-fields-title">
                <label for="patient_information">Height:</label>
            </div>
            <div class="custom-fields-input">
                <input type="text" name="gheight" id="gheight" value="<?php 
                    if(isset($gheight )){
                        echo $gheight;
                    }else{
                        echo $result[0]->gheight;
                    }
                    
                ?>" />
            </div>
            <div class="custom-fields-title">
                <label for="patient_information">Weight:</label>
            </div>
            <div class="custom-fields-input">
                <input type="text" name="gweight" id="gweight" value="<?php
                    if(isset($gweight) ){
                        echo $gweight;
                    }else{
                        echo $result[0]->gweight;
                    }
                    
                ?>" />
            </div>
            <div class="custom-fields-title">
                <label for="patient_information">Age:</label>
            </div>
            <div class="custom-fields-input">
                <input type="text" name="age" id="age" value="<?php 
                    if(isset($age )){
                        echo $age;
                    }else{
                        echo $result[0]->age;
                    }
                    
                ?>" />
            </div>
            <div class="custom-fields-title">
                <label for="patient_information">Implant Size Left:</label>
            </div>
            <div class="custom-fields-input">
                <input type="text" name="implant_size_left" id="implant_size_left" value="<?php 
                    if(isset($implant_size_left )){
                        echo $implant_size_left ;
                    }else{
                        echo $result[0]->implant_size_left;
                    }
                    ?>" />
            </div>
            <div class="custom-fields-title">
                <label for="patient_information">Implant Size Right:</label>
            </div>
            <div class="custom-fields-input">
                <input type="text" name="implant_size_right" id="implant_size_right" value="<?php 
                    if(isset($implant_size_right )){
                        echo $implant_size_right;
                    }else{
                        echo $result[0]->implant_size_right ;
                    }
                    ?>" />
            </div>
            <div class="custom-fields-title">
                <label for="patient_information">Cup Size Before:</label>
            </div>
            <div class="custom-fields-input">
                <input type="text" name="cup_size_before" id="cup_size_before" value="<?php 
                    if(isset($cup_size_before )){
                        echo $cup_size_before;
                    }else{
                        echo $result[0]->cup_size_before;
                    }
                    ?>" />
            </div>
            <div class="custom-fields-title">
                <label for="patient_information">Cup Size After:</label>
            </div>
            <div class="custom-fields-input">
                <input type="text" name="cup_size_after" id="cup_size_after" value="<?php 
                    if(isset($cup_size_after)){
                        echo $cup_size_after;
                    }else{
                        echo $result[0]->cup_size_after;
                    }
                    ?>" />
            </div>
        </div>
    </fieldset>
    <?php
    wp_nonce_field( '_namespace_form_metabox_patients', '_namespace_form_metabox_patients_fields' );
}

function patient_images($post){
    global $wpdb, $post;
    $id = get_the_ID();
    $result = $wpdb->get_results('SELECT * FROM wp21v_patients_gallery WHERE post_id ='.$id.'');
    $images = get_post_meta($post->ID, 'images_array', true );
	print_r($images);
    if(!empty($images)){
        $result = '';
        $arrayImages = explode(',', $images);
    }else{
        $images = '';
        $arrayImages = explode(',', $result[0]->images);
    }
    ?>
    <fieldset>
        <div class="select-files-button center-gallery">
           <input type="button" class="button uploadImage" value="Add Photos" />
        </div>
        <ul class="gallery-container">
            <?php foreach ($arrayImages as $key => $image) { ?>
                <li class="gallery-item" id="image_<?php echo $key ?>>">
                    <div class="image-container">
                        <img src="<?php echo $image; ?>" >
                    </div>
                    <input type="button" class="removeImages" value="Remove">
                </li>
            <?php } ?> <!-- end foreach -->
        </ul>
            <input type="hidden" class="images_array" name="images_array" id="images_array" value="<?php echo implode(',', $arrayImages); ?>">

    </fieldset>
    <?php
    wp_nonce_field( '_namespace_form_metabox_patients', '_namespace_form_metabox_patients_fields' );
}

?>