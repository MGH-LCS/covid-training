$("document").ready (function(){	
	setProps();
});

function setProps(){
	var currentYear = new Date().getFullYear();
	$("#year").text(currentYear);

	// DIGITILER SPECIFIC
	$('.hidden-info').hide();
	$('.show-info').click(function() {
		$('.hidden-info').toggle();
	});

	var width = $(window).width();
	width = width - 30;
  	$('#openseadragon').css({'width' : width});

	var height = $(window).height();
	height = height - 80;
	$('#openseadragon').css({'height' : height});
	// END DIGITILER SPECIFIC

	// Show or hide the sticky footer button
    $(window).scroll(function() {
        if ($(this).scrollTop() > 200) {
            $('.go-top').fadeIn(200);
        } else {
            $('.go-top').fadeOut(200);
        }
    });
    
    // Animate the scroll to top
    $('.go-top').click(function(event) {
        event.preventDefault();
        
        $('html, body').animate({scrollTop: 0}, 300);
    });

}

function goBack() {
	window.history.back();
}