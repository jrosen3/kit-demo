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
				var w_w = $(window).width();
				var w_h = $(window).height();
				var button_width = (w_w - 3) / 4;
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


			function buildTable(kitBase) {
				var table;
				$.each(kitBase, function(index, value){
					var type = index;
					$.each(value, function(index, value){
						var id = type+"/"+index;
						var name = value['first'] + ' ' + value['last'];
						var bio = value['bio'].slice(0, 250) + '...';
						var pic = value['picture'];
						table = "<tr class='t_row' id='"+id+"'><td><div class='pix'><img src='"+pic+"'></div></td><td><div class='biox'><span class='namex'>"+name+"</span></br> "+bio+"</div></td></tr>";
						$("#display").append(table);
						resizeFooter();
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
						<!-- <th data-toggle="true">name</th> -->
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




