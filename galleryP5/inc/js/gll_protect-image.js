	jQuery("document").ready(function(){
		jQuery('head').append('<meta name="description" content="contains the gallery of patients of <?php echo get_bloginfo(); ?> "> ');
		//jQuery('head').append('<link rel="canonical" href="<?php echo home_url( $wp->request );?>">');
		jQuery('head').append('<meta name="robots" content="noindex, follow">');
		
		// image protector
	if(localStorage.getItem('age' ) != '21'){
		jQuery('.sensitive-images').append(
            '<div class="image-protected ">'
            +'<div class="text-protected">'
            +'Welcome! Please verify <br>'
            +'your age to enter.<br>'
            +'Are you 21 years or older?'
            +'<br>'
            +'Some material on this site may be deemed inappropriate for those under 21 by Google, Facebook and other organizations'
            +'</div>' //text-protected
            +'<div class="button-protected">'
            +'<input type="button" class="button-yes" value="Yes" >'
            +'<input type="button" class="button-no" value="No" >'
            +'</div>' //button-protected
            +'</div>'//image-protected
        );
//add div over each image sensitive in singular
        jQuery('.patient-detail-image-header-single').append(
            '<div class="image-protected ">'
            +'<div class="text-protected">'
            +'Welcome! Please verify <br>'
            +'your age to enter.<br>'
            +'Are you 21 years or older?'
            +'<br>'
            +'Some material on this site may be deemed inappropriate for those under 21 by Google, Facebook and other organizations'
            +'</div>' //text-protected
            +'<div class="button-protected">'
            +'<input type="button" class="button-yes" value="Yes" >'
            +'<input type="button" class="button-no" value="No" >'
            +'</div>' //button-protected
            +'</div>'//image-protected
        );
        jQuery('.patient-detail-image-carousel').append(
            '<div class="image-protected ">'
            +'<div class="text-protected">'
            +'Welcome! Please verify <br>'
            +'your age to enter.<br>'
            +'Are you 21 years or older?'
            +'<br>'
            +'Some material on this site may be deemed inappropriate for those under 21 by Google, Facebook and other organizations'
            +'</div>' //text-protected
            +'<div class="button-protected">'
            +'<input type="button" class="button-yes" value="Yes" >'
            +'<input type="button" class="button-no" value="No" >'
            +'</div>' //button-protected
            +'</div>'//image-protected
        );
	}
            jQuery('.button-yes').click(function(){
                localStorage.setItem('age', '21');
                jQuery('.image-protected').addClass('image-unprotected');
            });
            // if the user click in button no keep de backgrund image and clear the local storage 
            jQuery('.button-no').click(function(){
                alert('You must be over 21 to access the content, Thank you!');
                localStorage.removeItem('age');
            });
	
	
	});