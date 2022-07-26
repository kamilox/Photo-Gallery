<?php
require_once('gll_settings_styles.php');
?>
<div class="procedures-title">
    <a href="<?php echo home_url('/gallery');?>" 
                style="
                    background:<?php if(isset($primary_button_background_color)){echo $primary_button_background_color;}?>
                    border-color:<?php if(isset($primary_button_border_color)){echo $primary_button_border_color;} ?>
                    color:<?php if(isset($primary_button_font_color)){echo $primary_button_font_color; }?>
                ">
            <?php echo _x('Gallery home', wp_get_theme() ); ?>
    </a>

    <h1 style="text-align: center; color:<?php if(isset($title_color)){echo $title_color;} ?>">
        <?php echo $term->name; ?>
    </h1>
    
    <a href="<?php echo home_url($contact_slug);?>" 
                style="
                    background:<?php if(isset($primary_button_background_color)){echo $primary_button_background_color;}?>
                    border-color:<?php if(isset($primary_button_border_color)){echo $primary_button_border_color;} ?>
                    color:<?php if(isset($primary_button_font_color)){echo $primary_button_font_color; }?>
                ">
            <?php echo _x('Contact Us', wp_get_theme() ); ?>
    </a>
</div>