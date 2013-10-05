function resizeFooter(){
	var w_w = $(window).width();
	var w_h = $(window).height();
	var button_width = (w_w - 0) / 4;
	$(".footertext").css({
		"width" : button_width+"px"
	});

	var table_h = 0.10 * w_h;

	$('.pix').css({
		'width' : table_h+"px",
		'height' : table_h+"px"
	});

	$('.biox').css({
		'width' : (w_w - table_h)+"px",
		'height' : table_h+"px"
	});

	$(".pix").imgLiquid({
		fill : true,
		verticalAlign : 'top',
		horizontalAlign : 'center'
	});

	$("#search").css({
		"background-size" : (0.75 * table_h)+"px",
	})
};
