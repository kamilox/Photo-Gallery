<?php
/*
*	Template Name: Single patients
*
*/
get_header();
global $wp, $wpdb, $post;
$id = $post->ID;
$taxonomy = 'procedures';
$post_type = get_post_type($post->ID);
$term = wp_get_post_terms( $post->ID, $taxonomy);
$result = $wpdb->get_results('SELECT * FROM wp21v_patients_gallery WHERE post_id ='.$id.'');
$result_meta = get_post_meta($post->ID, 'images_array', true );

if(empty($result_meta)){
	$images = explode(',', $result[0]->images);
}else{
	$images = explode(',', $result_meta);
}

echo '<body>';
    echo '<div class="container">';
        echo '<div class="container-gallery">';
            echo '<div class="row-gallery">';
				require_once('gll_settings_styles.php');
				require_once('gll_singular_header.php');
            	//Content
				echo '<div class="patient-detail-title">';
				?>
					<h1 style="text-align: center; color:<?php if(isset($title_color)){echo $title_color;} ?>">
						<?php echo  get_the_title(); ?>
					</h1>
				<?php
				echo '</div>';
				echo '<div class="column-gallery-container">';
					echo '<div class="column-gallery">';
						echo '<div class="patient-detail-description">';
							echo $post->post_content;
						echo '</div>';
					echo'</div>';
	    			//images
					echo '<div class="column-gallery">';
						echo '<div class="patient-detail-image-container">';
							echo '<div class="patient-detail-image-carousel">';
									foreach ($images as $key => $image) {
										$total = count($images)-1;
										$number = $key + 1;
										if(!empty( $image)){ 
											echo'<div class="patient-detail-image-carousel-item">';
												echo '<img src="'.$image.'"
													class="'.$image.' patient-detail-image-carousel-item-tiny"
												alt="'.get_the_title().'">';
												echo '<div class="patient-detail-image-header-info-description">';
													echo '<div class="patient-detail-image-header-info-title patient-detail-image-header-info-title-tiny">';
														echo get_bloginfo();
													echo '</div>';
												echo '</div>';
											echo '</div>';
										}
									}
							echo '</div>';
						echo '</div>';
					echo '</div>';
				echo '</div>';
            echo '</div>';
        echo '</div>';
    echo '</div>';
echo '</body>';


get_footer();
?>