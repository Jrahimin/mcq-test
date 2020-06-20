var mn = $(".main-nav");
	mns = "main-nav-scrolled";
	hdr = $('header').header();

$(window).scroll(function() {
	if( $(this).scrollTop() > hdr ) {
		mn.addClass(mns);
	} else {
		mn.removeClass(mns);
	}
});