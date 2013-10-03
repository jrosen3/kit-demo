<script>
	$(window).resize(function() {
		resize();
	});

	function resize(){
		var e = $(".editor").width()
		var w = 0.2 * e;
		var h = (4/3) * w;
		var l = (e - w) / 2;
		$("#pic").css({
			"width" : w+"px",
			"height" : h+"px",
			// "left" : l+"px"
		});

		$("#pic").imgLiquid({
			fill : true,
			verticalAlign : 'center',
			horizontalAlign : 'center'
		});

		var o = w + (0.1 * e);
		var box = e - o - (0.05 * e);

		$("#name").css({
			"left" : o+"px"
		});

		$("#bio").css({
			"left" : o+"px",
			"width" : box+"px",
			"height" : (h - (0.12 * e) + (0.07 * e))+"px"
		});
	};
</script>