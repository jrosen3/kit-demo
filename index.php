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
				searchRef.on('value', function(snapshot) {
					kitBase = snapshot.val();
					buildTable(kitBase);
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

			function buildTable(kitBase) {
				var table;
				$.each(kitBase, function(index, value){
					var type = index;
					$.each(value, function(index, value){
						var id = type+"/"+index;
						var name = value['first'] + ' ' + value['last'];
						var bio = value['bio'].slice(0, 250) + '...';
						var pic = value['picture'];
						table = "<tr id='"+id+"'><td><img src='"+pic+"''></td><td>"+name+"</td><td>"+bio+"</td>";
						$("#display").append(table);
					});
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
					
				</tbody>
			</table>
		</div>
		<?php include 'footer.php'; ?>
	</body>
	
</html>




