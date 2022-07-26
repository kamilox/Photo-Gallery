<?php
    $title_1 = 'Gallery';
    if(get_page_by_title($title_1) == NULL){
        $page_gallery = array(
            'post_title' => $title_1,
            'post_content' => 'content',
            'post_status' => 'publish',
            'post_type' => 'page'
        );
        wp_insert_post($page_gallery);
    }
?>