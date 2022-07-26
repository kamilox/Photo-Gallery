<?php
/**
 * Plugin class
 **/
if ( ! class_exists( 'CT_TAX_META_SURGEON' ) ) {

class CT_TAX_META_SURGEON {

  public function __construct() {
    //
  }
 
 /*
  * Initialize the class and start calling our hooks and filters
  * @since 1.0.0
 */
 public function init() {
   add_action( 'surgeons_add_form_fields', array ( $this, 'add_surgeons_image' ), 10, 2 );
   add_action( 'created_surgeons', array ( $this, 'save_surgeons_image' ), 10, 2 );
   add_action( 'surgeons_edit_form_fields', array ( $this, 'update_surgeons_image' ), 10, 2 );
   add_action( 'edited_surgeons', array ( $this, 'updated_surgeons_image' ), 10, 2 );
   add_action( 'admin_enqueue_scripts', array( $this, 'load_media' ) );
   add_action( 'admin_footer', array ( $this, 'add_script' ) );
 }

public function load_media() {
 wp_enqueue_media();
}
 
 /*
  * Add a form field in the new surgeons page
  * @since 1.0.0
 */
 public function add_surgeons_image ( $taxonomy ) { ?>
   <div class="form-field term-group">
     <label for="surgeons-image-id"><?php _e('Image', 'hero-theme'); ?></label>
     <input type="hidden" id="surgeons-image-id" name="surgeons-image-id" class="custom_media_url" value="">
     <div id="surgeons-image-wrapper"></div>
     <p>
       <input type="button" class="button button-secondary ct_tax_media_button" id="ct_tax_media_button" name="ct_tax_media_button" value="<?php _e( 'Add Image', 'hero-theme' ); ?>" />
       <input type="button" class="button button-secondary ct_tax_media_remove" id="ct_tax_media_remove" name="ct_tax_media_remove" value="<?php _e( 'Remove Image', 'hero-theme' ); ?>" />
    </p>
   </div>
 <?php
 }
 
 /*
  * Save the form field
  * @since 1.0.0
 */
 public function save_surgeons_image ( $term_id, $tt_id ) {
   if( isset( $_POST['surgeons-image-id'] ) && '' !== $_POST['surgeons-image-id'] ){
     $image = $_POST['surgeons-image-id'];
     add_term_meta( $term_id, 'surgeons-image-id', $image, true );
   }
 }
 
 /*
  * Edit the form field
  * @since 1.0.0
 */
 public function update_surgeons_image ( $term, $taxonomy ) { ?>
   <tr class="form-field term-group-wrap">
     <th scope="row">
       <label for="surgeons-image-id"><?php _e( 'Image', 'hero-theme' ); ?></label>
     </th>
     <td>
       <?php $image_id = get_term_meta ( $term ->term_id, 'surgeons-image-id', true ); ?>
       <input type="hidden" id="surgeons-image-id" name="surgeons-image-id" value="<?php echo $image_id; ?>">
       <div id="surgeons-image-wrapper">
         <?php if ( $image_id ) { ?>
           <?php echo wp_get_attachment_image ( $image_id, 'thumbnail' ); ?>
         <?php } ?>
       </div>
       <p>
         <input type="button" class="button button-secondary ct_tax_media_button" id="ct_tax_media_button" name="ct_tax_media_button" value="<?php _e( 'Add Image', 'hero-theme' ); ?>" />
         <input type="button" class="button button-secondary ct_tax_media_remove" id="ct_tax_media_remove" name="ct_tax_media_remove" value="<?php _e( 'Remove Image', 'hero-theme' ); ?>" />
       </p>
     </td>
   </tr>
 <?php
 }

/*
 * Update the form field value
 * @since 1.0.0
 */
 public function updated_surgeons_image ( $term_id, $tt_id ) {
   if( isset( $_POST['surgeons-image-id'] ) && '' !== $_POST['surgeons-image-id'] ){
     $image = $_POST['surgeons-image-id'];
     update_term_meta ( $term_id, 'surgeons-image-id', $image );
   } else {
     update_term_meta ( $term_id, 'surgeons-image-id', '' );
   }
 }

/*
 * Add script
 * @since 1.0.0
 */
  public function add_script() { ?>
   <script>
     jQuery(document).ready( function($) {
       function ct_media_upload(button_class) {
         var _custom_media = true,
         _orig_send_attachment = wp.media.editor.send.attachment;
         jQuery('body').on('click', button_class, function(e) {
           var button_id = '#'+jQuery(this).attr('id');
           var send_attachment_bkp = wp.media.editor.send.attachment;
           var button = jQuery(button_id);
           _custom_media = true;
           wp.media.editor.send.attachment = function(props, attachment){
             if ( _custom_media ) {
               jQuery('#surgeons-image-id').val(attachment.id);
               jQuery('#surgeons-image-wrapper').html('<img class="custom_media_image" src="" style="margin:0;padding:0;max-height:100px;float:none;" />');
               jQuery('#surgeons-image-wrapper .custom_media_image').attr('src',attachment.url).css('display','block');
             } else {
               return _orig_send_attachment.apply( button_id, [props, attachment] );
             }
            }
         wp.media.editor.open(button);
         return false;
       });
     }
     ct_media_upload('.ct_tax_media_button.button'); 
     jQuery('body').on('click','.ct_tax_media_remove',function(){
       jQuery('#surgeons-image-id').val('');
       jQuery('#surgeons-image-wrapper').html('<img class="custom_media_image" src="" style="margin:0;padding:0;max-height:100px;float:none;" />');
     });
     // Thanks: http://stackoverflow.com/questions/15281995/wordpress-create-surgeons-ajax-response
     jQuery(document).ajaxComplete(function(event, xhr, settings) {
       var queryStringArr = settings.data.split('&');
       if( $.inArray('action=add-tag', queryStringArr) !== -1 ){
         var xml = xhr.responseXML;
         $response = jQuery(xml).find('term_id').text();
         if($response!=""){
           // Clear the thumb image
           jQuery('#surgeons-image-wrapper').html('');
         }
       }
     });
   });
 </script>
 <?php 
    }
  }
$CT_TAX_META_SURGEON = new CT_TAX_META_SURGEON();
$CT_TAX_META_SURGEON -> init();
}
?>