<?php

//require_once('gll_save_post_meta_settings.php');
global $wp, $wpdb, $post, $wp_query;
$table = $wpdb->prefix.'patients_settings';
$settings = $wpdb->get_results('SELECT * FROM '.$table.' ORDER BY id DESC LIMIT 1');


?>

<div class="gallery-settings-title">
	<h1>Define the look of your gallery</h1>
</div>
<div class="patients-settings">
	<div class="col-6">
		<form action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" method="post">
			<input type="hidden" name="action" value="your_action_name">
				
				<input type="hidden" name="add_sensitive_image" id="add_sensitive_image" value="false">
				<fieldset>	
					<div class="col-11 gallery-slug">
						<div class="col-12 slug_label-content ">
							<label class="slug_label"><?php echo _x('Do you want to activate the gallery´s sensitive image protection service?', wp_get_theme()) ?></label>
						</div>
						<div class="col-6">
						<select name="add_sensitive_image" id="add_sensitive_image">
									<option value="">Select</option>
									<option value="true">Yes</option>
									<option value="false">No</option>
								</select>
						</div>
					</div>
				</fieldset>

				<div class="col-11 gallery-slug">

					<div class="col-12 slug_label-content">
						<label class="slug_label"><?php echo _x('Please add the page slug of your contact page', wp_get_theme()) ?></label>
					</div>
					<div class="col-6">
						<input type="text" placeholder="/contact" name="contact_slug" id="contact_slug" value="<?php echo $settings[0]->contact_slug ?>"> 
					</div>
				</div>

				<div class="col-11 gallery-slug">
					<input type="hidden" name="action" value="add_settings">
					<div class="input-form-gallery-patients">
						<input  type="hidden" id="id" name="id" value="" >
						<div class="col-12">
							<label>Logo image</label>
						</div>
						<div class="col-12">
							<div class="gallery-patients-button col-12">
								<input id="load-logo" type="button" class="button loadLogo" value="Select Image" />
								<div class="center-gallery width-100 relative pd-20">
									Please select the image from the library
							</div>
							</div>
							<div class="gallery-patients-image col-12">
								<img src="<?php echo $settings[0]->logo_url ?>" class="patients-settings-logo">
								<input type="hidden" id="logo_url" name="logo_url" value="<?php echo $settings[0]->logo_url ?>">
							</div>
						</div>
					</div>
					<div class="input-form-gallery-patients">
						<div class="col-12">
							<label>Procedure title color</label>
						</div>
						<div class="col-12 colors-settings-col title-settings">
							<div class="color-settings" id="title-color-settings" name="title-color-settings" style="background: <?php echo $settings[0]->procedure_title_color;?>"></div>
							<input type="hidden" id="procedure_title_color" name="procedure_title_color" class="gallery-patients-input" value="<?php echo $settings[0]->procedure_title_color; ?>">
							<input type="text" id="title_color" name="title_color" value="<?php echo $settings[0]->procedure_title_color; ?>" >
						</div>
					</div>
					<div class="input-form-gallery-patients">
						<div class="col-12">
							<label>Display excerpt in gallery</label>
						</div>
						<div class="col-12">
							<select name="display_excerpt_in_gallery" id="display_excerpt_in_gallery">
								<option value="">Select</option>
								<option value="true">Yes</option>
								<option value="false">No</option>
							</select>
						</div>
					</div>
					<div class="input-form-gallery-patients">
						<div class="col-12">
							<label>Background color primary button</label>
						</div>
						<div class="col-12 colors-settings-col primary-button-background">
							<div class="color-settings" id="primary-button-background" style="background: <?php  echo $settings[0]->primary_button_background_color ?>"></div>
							<input type="hidden" id="primary_button_background_color" name="primary_button_background_color" class="gallery-patients-input" value="<?php echo $settings[0]->primary_button_background_color; ?>">
							<input type="text" id="primary_button_color" value="<?php echo $settings[0]->primary_button_background_color; ?>" >
						</div>
					</div>
					<div class="input-form-gallery-patients">
						<div class="col-12">
							<label>Border color primary button </label>
						</div>
						<div class="col-12 colors-settings-col primary-button-border">
							<div class="color-settings" id="primary-button-border" style="background: <?php  echo $settings[0]->primary_button_border_color ?>"></div>
							<input type="hidden" id="primary_button_border_color" name="primary_button_border_color" class="gallery-patients-input" value="<?php echo $settings[0]->primary_button_border_color ?>">
							<input type="text" id="primary_button_color_border" value="<?php echo $settings[0]->primary_button_border_color ?>" >
						</div>
					</div>
					<div class="input-form-gallery-patients">
						<div class="col-12">
							<label>Font color primary button</label>
						</div>
						<div class="col-12 colors-settings-col primary-button-font-color">
							<div class="color-settings" id="primary-button-font-color" style="background: <?php  echo $settings[0]->primary_button_font_color ?>"></div>
							<input type="hidden" id="primary_button_font_color" name="primary_button_font_color" class="gallery-patients-input" value="<?php echo $settings[0]->primary_button_font_color?>">
							<input type="text" id="primary_button_color_font" value="<?php echo $settings[0]->primary_button_font_color?>" >
						</div>
					</div>
					<div class="input-form-gallery-patients">
						<div class="col-12">
							<label>Backgroud color secondary button </label>
						</div>
						<div class="col-12 colors-settings-col secondary-button-background">
							<div class="color-settings" id="secondary-button-background" style="background: <?php  echo $settings[0]->secondary_button_background_color ?>"></div>
							<input type="hidden" id="secondary_button_background_color" name="secondary_button_background_color" class="gallery-patients-input" value="<?php echo $settings[0]->secondary_button_background_color; ?>">
							<input type="text" id="secondary_button_color" value="<?php echo $settings[0]->secondary_button_background_color; ?>" >
						</div>
					</div>
					<div class="input-form-gallery-patients">
						<div class="col-12">
							<label>Border color secondary button</label>
						</div>
						<div class="col-12 colors-settings-col secondary-button-border">
							<div class="color-settings" id="secondary-button-border" style="background: <?php  echo $settings[0]->secondary_button_border_color ?>"></div>
							<input type="hidden" id="secondary_button_border_color" name="secondary_button_border_color" class="gallery-patients-input" value="<?php echo $settings[0]->secondary_button_border_color ?>">					
							<input type="text" id="secondary_button_color_border" value="<?php echo $settings[0]->secondary_button_border_color ?>" >
						</div>
					</div>
					<div class="input-form-gallery-patients">
						<div class="col-12">
							<label>Font color secondary button</label>
						</div>
						<div class="col-12 colors-settings-col secondary-button-font-color">
							<div class="color-settings" id="secondary-button-font-color" style="background: <?php  echo $settings[0]->secondary_button_font_color ?>"></div>
							<input type="hidden" id="secondary_button_font_color" name="secondary_button_font_color" class="gallery-patients-input" value="<?php echo $settings[0]->secondary_button_font_color?>">
							<input type="text" id="secondary_button_color_font" value="<?php echo $settings[0]->secondary_button_font_color?>" >
						</div>
					</div>
				</div>


				<input type="submit" name="submit-settings" id="submit-settings" class="button add-procedures" value="Submit" >
			<?php
				if($_POST){
					require_once('gll_save_post_meta_settings.php');
				}else{
					echo "Please your prefer styles";
				}
			?>
		</form>
	</div>
	
	
	<div class="col-6">
		<div class="col-11 gallery-slug">
			
				<div class="center-gallery width-100 relative pd-20">
					This is how will look the title of your gallery
					<img src="<?php echo plugins_url( '/../img/arrow-down.png', __FILE__) ?>" class="arrow-point-down">
				</div>
			<div class="gallery-full-container-settings">
				<div class="center-gallery width-100">
					<h2 id="procedure_title_color-settings" name="procedure_title_color-settings" style="
											color:<?php echo $settings[0]->procedure_title_color  
										?>"> Procedure Title</h2>
					<!-- -->
					
		
					<div class="gallery-full-container-settings-img">
						<img src="<?php echo plugins_url( '/../img/carousel-settings.png', __FILE__) ?>">
					</div>
				</div>

			</div>
			<div class="center-gallery width-100 pd-20 relative">
				This is how will look your patients detail
				<img src="<?php echo plugins_url( '/../img/arrow-down.png', __FILE__) ?>" class="arrow-point-down">
			</div>
			<div class="container-settings-example">
				<div class="container-gallery">
					<div class="row-gallery">
						<!-- Content -->
						<div class="pd-20 col-6 col-6-responsive padding-settings-responsive">
							<div class="navigator">
								<div class="nav-next-settings">
									<span class="button btn-primary-settings"  style="
																					background: <?php echo $settings[0]->primary_button_background_color; ?>;
																					border: solid 1px <?php echo $settings[0]->primary_button_border_color; ?>;
																					color:<?php echo $settings[0]->primary_button_font_color;?>;

																			
																					
								"> Preview - Primary</span>
								</div>
								<div class="nav-next-settings">
									<a href="<?php echo home_url($settings[0]->gallery_slug) ?>" name="btn-gallery" id="btn-gallery" class="button btn-secondary-settings" style="
																					background: <?php echo $settings[0]->secondary_button_background_color; ?>;
																					border: solid 1px <?php echo $settings[0]->secondary_button_border_color; ?>;
																					color:<?php echo $settings[0]->secondary_button_font_color?>;

									">Gallery - Secondary</a>
								</div>
								<div class="nav-next-settings">
									<span class="button btn-primary-settings"  style="
																					background: <?php echo $settings[0]->primary_button_background_color; ?>;
																					border: solid 1px <?php echo $settings[0]->primary_button_border_color ?>;
																					color:<?php echo $settings[0]->primary_button_font_color?>;
									">Next - Primary</span>
								</div>
							</div>
							<div class="patient-detail-title">
								Case #: XXX
							</div>
							<div class="patient-detail-description">
								Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vitae metus sed dolor tempor volutpat. Vivamus congue elit eget elementum porta. Ut nisl lorem, condimentum et sollicitudin at, efficitur at mauris. In hac habitasse platea dictumst. Donec pharetra facilisis justo at lacinia. Vestibulum in accumsan est, eget feugiat libero. 
							</div>
							<div class="navigator">
								<div class="nav-next-settings">
									<a href="<?php echo home_url($settings[0]->contact_slug) ?>" class="button btn-primary-settings"  style="
																					background: <?php echo $settings[0]->primary_button_background_color ?>;
																					border: solid 1px <?php echo $settings[0]->primary_button_border_color ?>;
																					color:<?php echo $settings[0]->primary_button_font_color ?>;
									">Contact Us - Primary</a>
								</div> 
							</div>
						</div>
						<!-- images -->
						<div class="pd-20 col-6 col-6-responsive padding-settings-responsive">
							<div class="patient-detail-image-carousel-settings">
								<div class="patient-detail-image-carousel-item-settings">
									<img src="<?php echo plugins_url( '/../img/female-before.png', __FILE__) ?>">
									<div class="patient-detail-image-header-info-description">
										<div class="patient-detail-image-header-info-title">
											Website's title
										</div>
									</div>
									<div class="patient-detail-image-counter">
										Before 
									</div>
								</div>
								<div class="patient-detail-image-carousel-item-settings">
									<img src="<?php echo plugins_url( '/../img/female-after.png', __FILE__) ?>">
									<div class="patient-detail-image-header-info-description">
										<div class="patient-detail-image-header-info-title">
											Website's title
										</div>
									</div>
									<div class="patient-detail-image-counter">
										After
									</div>
								</div>
								<div class="patient-detail-image-carousel-item-settings">
									<img src="<?php echo plugins_url( '/../img/male-before.png', __FILE__) ?>">
									<div class="patient-detail-image-header-info-description">
										<div class="patient-detail-image-header-info-title">
											Website's title
										</div>
									</div>
									<div class="patient-detail-image-counter">
										Before 
									</div>
								</div>
								<div class="patient-detail-image-carousel-item-settings">
									<img src="<?php echo plugins_url( '/../img/male-after.png', __FILE__) ?>">
									<div class="patient-detail-image-header-info-description">
										<div class="patient-detail-image-header-info-title">
											Website's title
										</div>
									</div>
									<div class="patient-detail-image-counter">
										After
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	jQuery('document').ready(function(){
		jQuery('#title_color').wheelColorPicker();
		jQuery('#title_color').on('colorchange',function(e){
			jQuery('#procedure_title_color').val('#'+jQuery(this).val());
			jQuery('#title-color-settings').css('background', '#'+jQuery(this).val());
			jQuery('#procedure_title_color-settings').css('color','#'+jQuery(this).val());
		});

		jQuery('#primary_button_color').wheelColorPicker();
		jQuery('#primary_button_color').on('colorchange',function(e){
			jQuery('#primary_button_background_color').val('#'+jQuery(this).val());
			jQuery('#primary-button-background').css('background', '#'+jQuery(this).val());
			jQuery('.btn-primary-settings').css('background','#'+jQuery(this).val());
		});

		jQuery('#primary_button_color_border').wheelColorPicker();
		jQuery('#primary_button_color_border').on('colorchange',function(e){
			jQuery('#primary_button_border_color').val('#'+jQuery(this).val());
			jQuery('#primary-button-border').css('background', '#'+jQuery(this).val());
			jQuery('.btn-primary-settings').css('border-color','#'+jQuery(this).val());
		});

		jQuery('#primary_button_color_font').wheelColorPicker();
		jQuery('#primary_button_color_font').on('colorchange',function(e){
			jQuery('#primary_button_font_color').val('#'+jQuery(this).val());
			jQuery('#primary-button-font-color').css('background', '#'+jQuery(this).val());
			jQuery('.btn-primary-settings').css('color','#'+jQuery(this).val());
		});

		jQuery('#secondary_button_color').wheelColorPicker();
		jQuery('#secondary_button_color').on('colorchange',function(e){
			jQuery('#secondary_button_background_color').val('#'+jQuery(this).val());
			jQuery('#secondary-button-background').css('background', '#'+jQuery(this).val());
			jQuery('.btn-secondary-settings').css('background','#'+jQuery(this).val());
		});

		jQuery('#secondary_button_color_border').wheelColorPicker();
		jQuery('#secondary_button_color_border').on('colorchange',function(e){
			jQuery('#secondary_button_border_color').val('#'+jQuery(this).val());
			jQuery('#secondary-button-border').css('background', '#'+jQuery(this).val());
			jQuery('.btn-secondary-settings').css('border-color','#'+jQuery(this).val());
		});

		jQuery('#secondary_button_color_font').wheelColorPicker();
		jQuery('#secondary_button_color_font').on('colorchange',function(e){
			jQuery('#secondary_button_font_color').val('#'+jQuery(this).val());
			jQuery('#secondary-button-font-color').css('background', '#'+jQuery(this).val());
			jQuery('.btn-secondary-settings').css('color','#'+jQuery(this).val());
		});
	});
</script>