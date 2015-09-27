jQuery(document).ready(function(){
      jQuery('body').append('<div id="toTop" class="btn btn-primary"><i class="fa fa-arrow-up"></i>Back to Top</div>');
    	jQuery(window).scroll(function () {
			if (jQuery(this).scrollTop() != 0) {
				jQuery('#toTop').fadeIn();
			} else {
				jQuery('#toTop').fadeOut();
			}
		}); 
    jQuery('#toTop').click(function(){
        jQuery("html, body").animate({ scrollTop: 0 }, 600);
        return false;
    });
});