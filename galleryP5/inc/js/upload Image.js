//upload Image
jQuery('.uploadImage').click(function(){
    var Img = jQuery(this).parents().eq(0).siblings('div').children('img');
    console.log(Img);
    var images = [];
    var ImgRefence = Img.attr('src');
     var mediaUploader;
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
             var uploaded_images = mediaUploader.state().get('selection');
             var attachment_ids = uploaded_images.map( function( attachment ) {
                 attachment = attachment.toJSON();
                 jQuery(
                         '<li class="gallery-item close-'+ attachment.id+'" id="'+ attachment.url+'">'
                             +'<div class="image-container">'
                                 +'<img src="'+ attachment.url+'"   class="picture-new">'
                                 +'<input type="hidden" value="'+ attachment.url+'"  class="gallery-item-url">'
                             +'</div>'
                             +'<div class="button-close-container">'
                                 +'<input type="button" class="close-div" value="Remove Image" onclick="closeDiv('+"'"+attachment.id+"'"+')"  id="close"/>'
                             +'</div>'
                         +'</li>').appendTo('.gallery-container');
             }).join();
             var url_images = [];

             for (var i = uploaded_images.toJSON().length - 1; i >= 0; i--) {
                 url_images += (uploaded_images.toJSON()[i].url)+',';
             }
             if(jQuery('#images').val() == "" ){
               jQuery('#images').val(url_images);
             }else{
               var back = jQuery('#images').val();
               jQuery('#images').val(back + ',' + url_images);
             }
         });
         
         mediaUploader.open();
});

var mediaUploader;

jQuery('#load-logo').click(function(e) {
 e.preventDefault();

 // If the uploader object has already been created, reopen the dialog
 if (mediaUploader) {
   mediaUploader.open();
   return;
 }

 // Extend the wp.media object
 mediaUploader = wp.media.frames.file_frame = wp.media({
     title: 'Choose Image',
     button: {
     text: 'Choose Image'
   }, multiple: false });

 // When a file is selected, grab the URL and set it as the text field's value
 mediaUploader.on('select', function() {
   attachment = mediaUploader.state().get('selection').first().toJSON();
   jQuery('.patients-settings-logo').attr('src',attachment.url);
   jQuery('.patient-detail-info-logo').attr('src',attachment.url);
   jQuery('#logo_url').val(attachment.url);
   
 });

 // Open the uploader dialog
 mediaUploader.open();
});

jQuery('#ct_tax_media_button_save').click(function(e) {
 e.preventDefault();

 // If the uploader object has already been created, reopen the dialog
 if (mediaUploader) {
   mediaUploader.open();
   return;
 }

 // Extend the wp.media object
 mediaUploader = wp.media.frames.file_frame = wp.media({
     title: 'Choose Image',
     button: {
     text: 'Choose Image'
   }, multiple: false });

 // When a file is selected, grab the URL and set it as the text field's value
 mediaUploader.on('select', function() {
   attachment = mediaUploader.state().get('selection').first().toJSON();
   jQuery('#procedures-image-wrapper').attr('src',attachment.url);
   jQuery('#procedures-image-id').val(attachment.url);
   
 });

 // Open the uploader dialog
 mediaUploader.open();
});

var urlGallery      = window.location.pathname.split('/');     // Returns full URL (https://example.com/path/example.html)
 //console.log(urlGallery[urlGallery.length - 2]);
 // Load the sortable actions for move the images
 if (urlGallery[urlGallery.length - 2] == "wp-admin") {
     jQuery('.gallery-container').sortable({
       update : function(event, ui) {
         jQuery('#resultado').html('');
         jQuery('#resultado').append(ui.item.parent().attr('id')+",");
         jQuery('#resultado').append(ui.item.parent().sortable('toArray')+",");
         var arrayResult = jQuery('#resultado').html();
         var clearArray = arrayResult.split(',').reverse();
         var imgArray = [];
         for (var i = clearArray.length - 1; i >= 0; i--) {
             if (clearArray[i] != "undefined") {
                 imgArray += clearArray[i]+',';
             }
         }
         jQuery('#images').val(imgArray);
       }
     });
}

//add_procedures

var sensitiveCheck = getCookie('sensitive_check');
 
 jQuery('#sensitive-material-proceed').click(function(){
         setCookie('sensitive_check', 'true', 7);
       jQuery('body').removeClass('sensitive');
 });
 jQuery('#sensitive-material-return').click(function(){
         window.history.back();
 });

     
jQuery('#bmi-button-calculator').click(function(){
       
       var pounds = jQuery('#weight-user').val();
       var feet = jQuery('#height-feet-user').val();
       var inches = jQuery('#height-inches-user').val();
       var kg =  parseFloat(pounds) * 0.454;
       var cm1 =  parseFloat(feet) * 30.5;
       var cm2 =  parseFloat(inches) * 2.54;
       var cm =  (parseFloat(cm1) +  parseFloat(cm2))/100;
       var bmi = (parseFloat(kg)/(cm*cm));
       jQuery('.bmi-result').val(parseFloat((bmi).toFixed(2)));
       
       if(bmi < parseFloat(18.5)){
         jQuery('.underweight').css({
           '-webkit-box-shadow': '0px 0px 10px 10px rgba(240,240,240,0.76)',
             '-moz-box-shadow':'0px 0px 10px 10px rgba(240,240,240,0.76)',
             'box-shadow': '0px 0px 10px 10px rgba(240,240,240,0.76)',
             'background':'#65b568',
             'transition' : 'background 0.5s'
         })

         jQuery('.normal').css({
                                'background':'#b9b9b9',
                               '-webkit-box-shadow': 'none',
                               '-moz-box-shadow':'none',
                               'box-shadow': 'none',
                               'transition' : 'background 0.5s'
                               });
         jQuery('.overweight').css({
                                   'background':'#b9b9b9',
                                   '-webkit-box-shadow': 'none',
                                   '-moz-box-shadow':'none',
                                   'box-shadow': 'none',
                                   'transition' : 'background 0.5s'
                                     });
         jQuery('.obese').css({
                               'background':'#b9b9b9',
                               '-webkit-box-shadow': 'none',
                               '-moz-box-shadow':'none',
                               'box-shadow': 'none',
                               'transition' : 'background 0.5s'
                                 });
       }

       if(bmi >= parseFloat(18.5) && bmi <= parseFloat(24.9)){
         jQuery('.normal').css({
           '-webkit-box-shadow': '0px 0px 10px 10px rgba(240,240,240,0.76)',
              '-moz-box-shadow':'0px 0px 10px 10px rgba(240,240,240,0.76)',
           'box-shadow': '0px 0px 10px 10px rgba(240,240,240,0.76)',
           'background':'#65b568',
           'transition' : 'background 0.5s'
         });
         jQuery('.underweight').css({
                                     'background':'#b9b9b9',
                                   '-webkit-box-shadow': 'none',
                                   '-moz-box-shadow':'none',
                                   'box-shadow': 'none',
                                   'transition' : 'background 0.5s'
                                     });
         jQuery('.overweight').css({
                                   'background':'#b9b9b9',
                                   '-webkit-box-shadow': 'none',
                                   '-moz-box-shadow':'none',
                                   'box-shadow': 'none',
                                   'transition' : 'background 0.5s'
                                     });
         jQuery('.obese').css({
                               'background':'#b9b9b9',
                                   '-webkit-box-shadow': 'none',
                                   '-moz-box-shadow':'none',
                                   'box-shadow': 'none',
                                   'transition' : 'background 0.5s'
                                     });
       }

       if(bmi > parseFloat(25) && bmi < parseFloat(30)){
         jQuery('.overweight').css({
           '-webkit-box-shadow': '0px 0px 10px 10px rgba(240,240,240,0.76)',
              '-moz-box-shadow':'0px 0px 10px 10px rgba(240,240,240,0.76)',
           'box-shadow': '0px 0px 10px 10px rgba(240,240,240,0.76)',
           'background':'#dacf71',
           'transition' : 'background 0.5s'
         });
         jQuery('.underweight').css({
                                     'background':'#b9b9b9',
                                   '-webkit-box-shadow': 'none',
                                   '-moz-box-shadow':'none',
                                   'box-shadow': 'none',
                                   'transition' : 'background 0.5s'
                                     });
         jQuery('.normal').css({
                                'background':'#b9b9b9',
                                   '-webkit-box-shadow': 'none',
                                   '-moz-box-shadow':'none',
                                   'box-shadow': 'none',
                                   'transition' : 'background 0.5s'
                                     });

         jQuery('.obese').css({
                               'background':'#b9b9b9',
                                   '-webkit-box-shadow': 'none',
                                   '-moz-box-shadow':'none',
                                   'box-shadow': 'none',
                                   'transition' : 'background 0.5s'
                                     });
       }

       if(bmi > parseInt(30)){
         jQuery('.obese').css({
           '-webkit-box-shadow': '0px 0px 10px 10px rgba(240,240,240,0.76)',
             '-moz-box-shadow':'0px 0px 10px 10px rgba(240,240,240,0.76)',
             'box-shadow': '0px 0px 10px 10px rgba(240,240,240,0.76)',
           'background':'#dc3b2f',
           'transition' : 'background 0.5s'
         });
         jQuery('.underweight').css({
                                     'background':'#b9b9b9',
                                   '-webkit-box-shadow': 'none',
                                   '-moz-box-shadow':'none',
                                   'box-shadow': 'none',
                                   'transition' : 'background 0.5s'
                                     });
         jQuery('.normal').css({
                                    'background':'#b9b9b9',
                                   '-webkit-box-shadow': 'none',
                                   '-moz-box-shadow':'none',
                                   'box-shadow': 'none',
                                   'transition' : 'background 0.5s'
                                     });
         jQuery('.overweight').css({
                                   'background':'#b9b9b9',
                                   '-webkit-box-shadow': 'none',
                                   '-moz-box-shadow':'none',
                                   'box-shadow': 'none',
                                   'transition' : 'background 0.5s'
                                     });
       }
});
//display de bmi- calculator when the page load completely
jQuery('.loader').css('display', 'none');
     
jQuery('#bmi-button-clear').click(function(){
       jQuery('#weight-user').val(0);
       jQuery('#height-feet-user').val(0);
       jQuery('#height-inches-user').val(0);
       jQuery('.bmi-result').val(0);
       jQuery('.underweight').css({
                                         'background':'#33304b',
                                        '-webkit-box-shadow': 'none',
                                        '-moz-box-shadow':'none',
                                        'box-shadow': 'none',
                                         'transition' : 'background 0.5s'
                                       });
         jQuery('.normal').css({
                                'background':'#61cede',
                               '-webkit-box-shadow': 'none',
                                 '-moz-box-shadow':'none',
                                 'box-shadow': 'none',
                               'transition' : 'background 0.5s'
                               });
         jQuery('.overweight').css({
                                   'background':'#c3425f',
                                   '-webkit-box-shadow': 'none',
                                   '-moz-box-shadow':'none',
                                   'box-shadow': 'none',
                                   'transition' : 'background 0.5s'
                                     });
         jQuery('.obese').css({
                               'background':'#5c1727',
                               '-webkit-box-shadow': 'none',
                               '-moz-box-shadow':'none',
                               'box-shadow': 'none',
                               'transition' : 'background 0.5s'
                                 });
});//end bmi-calculator

jQuery('.glsr-button').click(function() {
     location.reload();
});

var url_website = (window.location.href.split('wp-admin/'));
var url_post = url_website[0]+'wp-content/plugins/gallery/add_setings.php';

jQuery("#submit-settings").submit(function() {
   $.ajax({
     type: "POST",
     url: url_post,
     data: $("#submit-settings").serializeArray(),
     success: function() {
         window.location.reload();
     }
   });
 return false;
});

///////

function setCookie(name,value,days) {
    var expires = "";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days*24*60*60*1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "")  + expires + "; path=/";
  }

  function getCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0;i < ca.length;i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    }
    return null;
  }

  function eraseCookie(name) {   
    document.cookie = name+'=; Max-Age=-99999999;';  
  }

  function closeDiv(className){
      var close = jQuery('.close-'+className).attr('id');
      if(jQuery('#images').val() != ''){
          var imagesArray = jQuery('#images').val().split(',');
          const itemToRemove = imagesArray.indexOf(close);
          imagesArray.splice(itemToRemove, 1);
          jQuery('.close-'+className).remove();
          jQuery('#images').val(imagesArray.join(','))
      }
  }



  ////


  jQuery(document).ready(function(){ 
    let allImages = [];
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
  
    function loadImages(){
          var mediaUploader;
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
            var uploaded_images = mediaUploader.state().get('selection');
            uploaded_images.forEach(element => {
              if (allImages.includes(element.attributes.url) === false) {
                allImages.push(element.attributes.url);
              }
            });
            jQuery('#images_edit').val(allImages);
          });//mediaUploader.on
              
          mediaUploader.open();
    };
  
    //Remove each image
    jQuery(document).on('click','.removeImages', function(e){
      e.preventDefault();
      var url = jQuery(this).prev().children().attr('src');
      let indexDelete = allImages.findIndex((element) => { return element === url });
      allImages.splice(indexDelete, 1);
      jQuery('#images_edit').val(allImages);
      jQuery(this).parent().remove();
    });
  
    // Allow move elements 
    jQuery('.gallery-container').sortable({
      
    });
      
  
  
  });// end document ready
  
   