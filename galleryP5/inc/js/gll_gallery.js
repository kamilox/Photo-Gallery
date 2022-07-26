jQuery(document).ready(function(){ 
//Load old gallery images in new element
/*var imagesArray = [];
jQuery('.gallery-item .image-container').each(function(){
	var eachImage = jQuery(this).children('img').attr('src');
	imagesArray.push(eachImage);
}); 
jQuery('#images_array').val(imagesArray);*/

//
  let allImages = [];
  var sortableImages = [];

  jQuery('#hide_from_live').click(function(){
    if(jQuery(this).prop('checked')){
      jQuery('#hide_from_live_hidden').attr('value', 1);
    }else{
      jQuery('#hide_from_live_hidden').attr('value', 0);
    }
  });
  if(jQuery('#hide_from_live_hidden').val() == '1' ){
    jQuery('#hide_from_live').attr('checked', true);
  }else{
    jQuery('#hide_from_live').attr('checked', false);
  }
  
// Gallery carousel
	var srcImage = "";
	jQuery('.gallery-carousel-item img').click(function(){
	    var srcImage = jQuery(this).attr('src');
	    //console.log(srcImage);
	    jQuery('.gallery-image-master img').attr('src', '');
	    jQuery('.gallery-image-master img').attr('srcset', '');
	    jQuery('.gallery-image-master img').attr('src', srcImage);
	    jQuery('.gallery-image-master img').attr('srcset', srcImage);
	});
  
  //Add images to gallery
  jQuery(document).on('click','.uploadImage', function(e){
    e.preventDefault();
    loadImages(this);
  });

  var mediaUploader;
  function loadImages(){
        if(mediaUploader){
            mediaUploader.open();
            return;
        }
        
        mediaUploader = wp.media.frames.file_frames = wp.media({
        title: 'Upload picture',
            button: {
                text: 'Choose picture'
            },
            multiple: true
        });

        mediaUploader.on('select', function(){

          var allImages = [];
          var stringAllImages = jQuery('input[name = "images_array"]').val();
          if(stringAllImages !== "")
            allImages = stringAllImages.split(',');
          console.log(allImages);
          var uploaded_images = mediaUploader.state().get('selection');
          uploaded_images.forEach(element => {
            if (allImages.includes(element.attributes.url) === false) {
              allImages.push(element.attributes.url);
            }
           
            var newLi = jQuery('.gallery-item:last').length;
            if(newLi == 0){
              jQuery(
                '<li class="gallery-item" id="'+jQuery('.gallery-item').length+'">'
                    +'<div class="image-container" id="">'
                        +'<img src="'+element.attributes.url+'" >'
                    +'</div>'
                        +'<input type="button" class="removeImages" value="Remove">'
                +'</li>').appendTo('.gallery-container');
            }else{
              var newLi = jQuery('.gallery-item:last').clone();

              //console.log(jQuery('.gallery-item').length);
              jQuery(newLi).attr('id', 'image_'+(jQuery('.gallery-item').length));
              jQuery(newLi).children('div').addClass('image-container').children('img').attr('src',element.attributes.url);
              jQuery(newLi).insertAfter('.gallery-item:last');
             
            }
          });    
          jQuery('input[name = "images_array"]').val(allImages);
        });//mediaUploader.on
            
        mediaUploader.open();
  };
  //Load logo image in seetings
  
  jQuery('.loadLogo').click(function(e) {
		e.preventDefault();

	  // If the uploader object has already been created, reopen the dialog
		if (mediaUploader) {
			mediaUploader.open();
			return;
		}

	  // Extend the wp.media object
	  mediaUploader = wp.media.frames.file_frames = wp.media({
      title: 'Upload picture',
          button: {
              text: 'Choose picture'
          },
          multiple: false
      });

	  // When a file is selected, grab the URL and set it as the text field's value
	  mediaUploader.on('select', function() {
			attachment = mediaUploader.state().get('selection').first().toJSON();
			jQuery('.patients-settings-logo').attr('src', attachment.url);
      jQuery('.logo_url').attr('value', attachment.url);
      
		});

	  // Open the uploader dialog
	  mediaUploader.open();
	});



  //Remove each image
    jQuery(document).on('click','.removeImages', function(e){
      e.preventDefault();
      let listImages = jQuery('input[name = "images_array"]').val().split(',');
      console.log(listImages);
      var url = jQuery(this).prev().children().attr('src');
      let indexDelete = listImages.findIndex((element) => { return element === url });
      console.log(indexDelete);
      listImages.splice(indexDelete, 1);
      console.log(listImages);
      jQuery('input[name = "images_array"]').val(listImages);
      jQuery(this).parent().remove();
    });
    
    // Allow move elements 
    let sortableListImages = jQuery('input[name = "images_array"]').val().split(',');
    

    jQuery('.gallery-container').sortable({
      update : function(event, ui) {
        sortableImages.splice(0, sortableImages.length);
        var countItems = jQuery('.gallery-container').children('li').length;
        var newSort = jQuery('.gallery-container').children('li').each(function() {
          sortableImages.push(jQuery(this).children('div').children('img').attr('src'));
        });
        jQuery('#images_array').val(sortableImages);
      }
    });

	


});// end document ready

 