<?php
    function redirect_gallery_archive($template) {
        global $wp, $wpdb, $post;
        $url = home_url( $wp->request );
        $url_xplode = explode('/', $url);
        foreach ($url_xplode as $key => $path) {
			
            if($path == "gallery"){
                $template = plugin_dir_path(__FILE__) . 'gll_gallery_index.php'; 
            }
            if($path == "procedures"){
                $template = plugin_dir_path(__FILE__) . 'gll_content.php'; 
            }
            if($path == "patients"){
                $template = plugin_dir_path(__FILE__) . 'gll_singular.php'; 
            }
        }
            
        if ( !file_exists( $template ) ) {
            include $template;
        }
        return $template;
    }
    add_filter( 'template_include', 'redirect_gallery_archive' );
?>