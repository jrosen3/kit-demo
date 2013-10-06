<!DOCTYPE html>

<html>
	<head>
		<title>Kit-Demo | View</title>
		<?php	include"config.php"; ?>
		<script src="js/resizeIndex.js"></script>
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




