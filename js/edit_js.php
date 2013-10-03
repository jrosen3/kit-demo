<script>
	$(window).resize(function() {
		resize();
	})

	function resize(){
		var w = 0.3 * $(".editor").width();
		var h = (4/3) * w;
		var l = ($(".editor").width() - w) / 2;
		$("#pic").css({
			"width" : w+"px",
			"height" : h+"px",
			"left" : l+"px"
		});
	}
</script>