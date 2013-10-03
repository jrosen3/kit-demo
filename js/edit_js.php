<script>
	$(window).resize(function() {
		resize();
	})

	function resize(){
		var e = $(".editor").width()
		var w = 0.3 * e;
		var h = (4/3) * w;
		var l = (e - w) / 2;
		$("#pic").css({
			"width" : w+"px",
			"height" : h+"px",
			"left" : l+"px"
		});
	}
</script>