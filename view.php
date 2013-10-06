<!DOCTYPE html>

<html>
	<head>
		<title>Kit-Demo | View</title>
		<?php	include"config.php"; ?>
		<script src="js/resizeIndex.js"></script>
		<script src="js/buildView.js"></script>
	</head>

	<body>
	<?php include"header.php";?>


	<script>
			$(document).ready(function(){
				resizeFooter();
				$("#search").css(
					{"background-image": "none"}
					);
				// var result = <?php echo json_encode($_POST); ?>;
				// result = result['ben'];

				// 
				var result = getCookie("result_id");
				var resultRef = new Firebase(url+"/"+result);
				resultRef.on('value', function(snapshot) {
					result_view = snapshot.val();
					buildView(result_view);
				});

				
			});

			$(window).resize(function (){
				resizeFooter();
			});


	</script>

	<div id = "viewpic"></div>
	<div id = "viewbio"></div>



	<?php include"footer.php";?>	
	</body>
</html>




