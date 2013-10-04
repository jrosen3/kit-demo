<!DOCTYPE html>

<html>
	<head>
		<title>Kit-Demo</title>

		<?php
			include"config.php";
			include"js/linkedin.php";
		?>
	</head>

	<body>
	<header>
		<input type="text" id="search" autocomplete="off">
	</header>
		<script>
			$(document).ready(function(){
				resizeFooter();

				var searchRef = new Firebase(url);
				var kitBase;
				searchRef.on('value', function(snapshot) {
					kitBase = snapshot.val();
				});
				$("#search").on('keyup', function(kitBase){
					// search array and put html in div
				});
			});

			$(window).resize(function() {
				resizeFooter();
			});

			function resizeFooter(){
				var button_width = ($(window).width() - 3) / 4;
				$(".footertext").css({
					"width" : button_width+"px"
				});
			};
		</script>
		<!-- <script type="IN/Login"></script> -->
		<div id="results">
			<table id ="display" data-filter="#search">
				<thead>
					<tr>
						<th data-toggle="true">picture</th>
						<th data-toggle="true">name</th>
						<th data-toggle="true">bio</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td class="thumbnail">this is a picture</td>
						<td class="name">this is a name</td>
						<td class="words"> this is a bio</td>
					</tr>
					<tr>
						<td class="thumbnail">this is a pix</td>
						<td class="name">this is a nombre</td>
						<td class="words"> this is a bio</td>
					</tr>
					<tr>
						<td class="thumbnail">this is a photo</td>
						<td class="name">this is a name</td>
						<td class="words"> this is a biography</td>
					</tr>
				</tbody>
			</table>
		</div>
		<?php include 'footer.php'; ?>
	</body>
	
</html>




