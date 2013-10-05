
function resize(){
	var e = $(".editor").width();
	var spacing = e * .05;

	var img_w = 0.3 * e;
	var img_h = (4/3) * img_w;
	var img_l = (e - img_w) / 2;
	$("#pic").css({
		"width" : img_w+"px",
		"height" : img_h+"px",
		"left" : img_l+"px",
		"top" : spacing+"px"
	});

	$("#pic").imgLiquid({
		fill : true,
		verticalAlign : 'center',
		horizontalAlign : 'center'
	});

	var name_t = $("#pic").position()['top'] + img_h;
	$("#name").css({
		"top" : name_t+"px"
	});

	var bio_l = (e - $("#bio").width()) / 2;
	var bio_h = $("#name").position()['top'] + $("#name").height() + spacing;
	$("#bio").css({
		"left" : bio_l+"px",
		"top" : bio_h+"px"
	});

	var button_t = $("#bio").position()['top'] + $("#bio").height() + spacing;
	var button_l = (e - $("#button").width()) / 2;
	$("#button").css({
		"top" : button_t+"px",
		"left" : button_l+"px"
	});

	var e_h = $("#button").position()['top'] + $("#button").height() + spacing;
	$(".editor").css({
		"height" : e_h+"px"
	});
};