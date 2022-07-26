<?php
require_once('gll_settings_styles.php');
if(isset($primary_button_background_color)){ $primary_button_background_color;}
if(isset($primary_button_border_color)){ $primary_button_border_color;} 
if(isset($primary_button_font_color)){ $primary_button_font_color; }
echo '<div class="navigator">';
    
    $prev = get_previous_post_link( '%link', 
            '<span 	class="btn"
                style="
                    background:'.$primary_button_background_color.';
                    border-color: '.$primary_button_border_color.';
                    color: '.$primary_button_font_color.';
                ">' .     
                _x( '< Previous', 'Previous post link','category' ,TRUE ) . '</span>' );
    

    if ($prev) :
        echo '<div class="nav-previous">  '.$prev.' </div>';
    endif; 

    echo '<div class="nav-next">';
        echo 	'<a href="'.home_url('/gallery').'" 
                    name="btn-gallery" 
                    id="btn-gallery" 
                    class="btn"
                    style="
                    background:'.$primary_button_background_color.';
                    border-color: '.$primary_button_border_color.';
                    color: '.$primary_button_font_color.';
                ">
                    Gallery
                </a>';
    echo '</div>';
        $next = get_next_post_link( '%link', 
            '<span class="btn"
                    style="
                    background:'.$primary_button_background_color.';
                    border-color: '.$primary_button_border_color.';
                    color: '.$primary_button_font_color.';
                    "
                >'. 
        _x( 'Next > ', 'Next post link', 'category',TRUE ) . '</span>' );

    if ($next) :
        echo'<div class="nav-next">'.$next.'</div>';
    endif;
    
    echo '<div class="patient-detail-contact">';

    echo '<a	href="'.home_url($contact_slug).'" 
                class="btn"
                style="
                background:'.$primary_button_background_color.';
                border-color: '.$primary_button_border_color.';
                color: '.$primary_button_font_color.';
            ">
            Contact Us
        </a>';
    echo'</div>';
echo'</div>';

?>