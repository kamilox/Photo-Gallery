<?php
/*
* 
* Template name: Page Gallery 
*
*
*/

get_header();
	echo '<div class="container">';
	require_once('gll_settings_styles.php');
		?>
			<h1 style="text-align: center; color:<?php if(isset($title_color)){echo $title_color;} ?>">
				Before and After Gallery
			</h1>
		<?php
		echo '<div class="container-procedures">';
			$taxonomy = 'procedures';
			$post_type = 'patients';
			$args = array(
				'post_type' => 'patients',
				'taxonomy'  => 'procedures',
				'parent' => 0
			  );
			$terms = get_terms( $args );

			foreach ($terms as $key => $term) {
				$name = $term->name;
				$link = get_term_link($term->term_id, $taxonomy);
				$image_id = get_term_meta($term->term_id, 'procedures-image-id', true );
				$url = wp_get_attachment_url( $image_id);
				$childs = get_term_children( $term->term_id, $taxonomy );

					echo '<div class="procedures-parents">';
						echo '<div class="procedures-parents-image">';
							echo '<div style="background-image:url('.$url.')">';
							echo '</div>';
						echo '</div>';
						?>
							<h2 style="color:<?php if(isset($procedure_title_color)){echo $procedure_title_color;}?>">
								<?php echo $name;?>
							</h2>
						<?php
						echo '<div class="procedures-items">';
						foreach ($childs as $key => $child) {
							$category = get_term($child, $taxonomy);
							$count = $category->count;
							if ($count > 0) {
								$link = get_term_link($child, $taxonomy);
								$termName = get_term_by('id', $child, 'procedures');
								echo '<div class="procedures-item">';
									echo '<a href="'.$link.'" rel="noindex">'.$termName->name.'</a>';
								echo '</div>'; //procedures-item
							}
							
						}
						echo '</div>';//close procedures-items
					echo '</div>';
			}
		echo '</div>';
	echo '</div>';
get_footer();
?>