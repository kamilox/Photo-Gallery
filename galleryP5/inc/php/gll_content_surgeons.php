<?php
/*
* Template name: Page content 
*/
get_header();
global $wp, $wpdb, $post, $wp_query;

$post_type = 'patients';
$taxonomy = 'surgeon';

$current_slug = $wp->request;
$termName = explode('/', $current_slug);
$termItem = end($termName);

$term = get_term_by('slug', $termItem, $taxonomy); 

$args = array(
	'post_type' => $post_type, // the post type
	'posts_per_page' => 120,
	'tax_query' => array(
		array(
			'taxonomy' => $taxonomy, // the custom vocabulary
			'field'    => 'slug',                 
			'terms'    => $termItem,      // provide the term slugs
		),
	),
);

// The query
$posts = new WP_Query( $args );

echo '<div class="container">';
	require_once('gll_settings_styles.php');
	require_once('gll_content_header.php');
	echo '<div class="gallery-full-container">';
		
	if ( $posts->have_posts() ){
		while ( $posts->have_posts() ) {
			$posts->the_post();
			//$patient = $wpdb->get_results('SELECT * FROM '.$wpdb->prefix.'patients_gallery WHERE post_id ='.$post->ID.'');
			$images = get_post_meta($post->ID, 'images_array', true );
			echo '<div class="patient-detail">';
				echo '<a href="'.get_post_permalink($post->ID).'">'; 
					?>
						<h2 class="patient-detail-title" style="color:<?php if(isset($procedure_title_color)){echo $procedure_title_color;} ?>">
							<?php echo the_title();?>
						</h2>
					<?php

					echo '<div class="patient-detail-images patient-detail-images-content">';
						echo '<div class="sensitive-images"></div>';
							//if(!empty($images)){
								$allImages = explode(',', $images);
							//}else{
								//$allImages = explode(',', $patient[0]->images);
							//}

							foreach ($allImages as $keyImage => $image) {
								if(($image)!= "" && $keyImage < 2){
									echo '<div class="image-gallery image-gallery-content">';
										echo '<img src="'.$image.'" class="image_front_content_gallery">';
										echo '<div class="patient-detail-image-header-info-description-content">';
											echo '<div class="patient-detail-image-header-info-title-content">';
													echo get_bloginfo();
											echo '</div>';
											echo '<div class="patient-detail-image-header-info-logo">';
												?>
													<img src="<?php if(!empty($logo_url)){  echo $logo_url;} ?>" 
													class="patient-detail-info-logo"
													alt="<?php  the_title(); ?>">
												<?php
											echo '</div>';
										echo '</div>';
									echo'</div>'; // close image-gallery
								}
							}
							
							
						
						echo '</div>';// patient-detail-images
					if($display_excerpt_in_gallery == '1'){
						echo'<div class="patient-detail-excerpt" >';
						echo wp_trim_words( get_the_content(), 25, '<a href='.get_post_permalink($post->ID).'>for more info please use this link</a>' );
					echo'</div>';
					}
					
					echo'<div class="patient-detail-buttom">';
						?>
							<span
								style="
									background:<?php if(isset($primary_button_background_color)){echo $primary_button_background_color;}?>
									border-color:<?php if(isset($primary_button_border_color)){echo $primary_button_border_color;} ?>
									color:<?php if(isset($primary_button_font_color)){echo $primary_button_font_color; }?>
									"> 
									<?php echo _x('View Case Details', wp_get_theme() ); ?>
							</span>
						<?php
					echo '</div>';// close patient-detail-buttom
				echo '</a>';
			echo '</div>';// close patient-detail
		}
	}
wp_reset_postdata();
	echo '</div>'; //close gallery-full-container	
echo '</div>'; //close container

get_footer();
?>