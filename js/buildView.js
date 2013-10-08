//this will fill in the search bar with the name
function buildView(result_view){
	$("#search").val(result_view['first'] + " " + result_view['last']);
	$("#viewpic").html("<img src='"+result_view['picture']+"' alt='"+result_view['first']+ " " + result_view['last'] + "'>");
	$("#viewbio").html("<p>" + result_view['bio']+"</p>");
	resizeView();
};

function resizeView(){
	var w_w = $(window).width();
	var result_h = $("#view_result").height();
	var spacing = w_w * 0.05;
	var img_w = 0.25 * w_w;
	var img_h = (4/3) * img_w;
	var img_t = (result_h - img_h) / 2;
	$("#viewpic").css({
		"width" : img_w+"px",
		"height" : img_h+"px",
		"left" : spacing+"px",
		"top" : img_t+"px"
	});

	$("#viewpic").imgLiquid({
		fill : true,
		verticalAlign : 'center',
		horizontalAlign : 'center'
	});

	var bio_w = w_w * 0.60;
	var bio_l = 2 * spacing;//$("#viewpic").position()['left'] + img_w + spacing;
	var bio_t = (result_h - img_h) / 2;
	$("#viewbio").css({
		"width" : bio_w+"px",
		"height" : img_h+"px",
		"left" : bio_l+"px",
		"top" : bio_t+"px"
	});
};


