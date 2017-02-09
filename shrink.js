$(window).scroll(function(){
	if ($(document).scrollTop() > 50) {
		$('.navbar-fixed-top').addClass('shrink');
		$('.nav').addClass('shrink');
	}
	else {
		$('.navbar-fixed-top').removeClass('shrink');
		$('.nav').removeClass('shrink');
	}
});
$(function() {
  $('a[href*="#"]:not([href="#"])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html, body').animate({
          scrollTop: target.offset().top
        }, 1000);
        return false;
      }
    }
  });
});