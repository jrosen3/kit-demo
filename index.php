<!DOCTYPE html>

<html>
	<head>
		<title>Kit-Demo</title>
			<?php include"config.php"; ?>
			<?php include"js/linkedin.php"; ?>
	</head>

	<body>
		<?php include"header.php"; ?>
		<script src="js/buildTable.js"></script>
		<script src="js/resizeIndex.js"></script>
		<script src="js/helpers.js"></script>
		<script src="js/buildView.js"></script>
		<script>
			$(document).ready(function(){
				

				$("#c_or_e").hide();
				resizeFooter();
				icon();

				var searchRef = new Firebase(url);
				searchRef.on('value', function(snapshot) {
					kitBase = snapshot.val();
					buildTable(kitBase);
					
				});


				$("#editModal").on('shown.bs.modal', function(){
					resize();
				});

				$("#editModal").on('show.bs.modal', function(){
					setModal();
				});

				$('#file-upload').on('change', function(e){
					var file = e.target.files[0];
					var reader = new FileReader();
					var sessionID = getCookie("sessionID");
					var picRef = new Firebase(url+"/person/"+sessionID);
					reader.onload = function(e) {
						var filePayload = e.target.result;
						picRef.update({picture: filePayload});
						$('#headshot').attr('src', filePayload);
						resize();
					};
					reader.readAsDataURL(file);


				});

				$("#button").click(function() {
					var bio = $("#bio").val();
					var sessionID = getCookie("sessionID");
					var bioRef = new Firebase(url+"/person/"+sessionID);
					bioRef.update({bio: bio})
				});

				$("#pic").click(function() {
					$("#file-upload").trigger('click');
				});

				$("#display").hide();
				$("#view_result").hide();
				$("#search").on('keyup', function(){
					$("#display").show();
					$("#welcome").hide();
					$("#view_result").hide();
					icon();
				});
			});

			function icon(){
				var content = $("#search").val();
				// alert(content);
				if (content === '') {
					$("#search").css({
						"background-image": "url('img/icon.png')"
					});
				} else {
					$("#search").css({
						"background-image": "none"
					});
				}
			};
				

			$(window).resize(function() {
				resizeFooter();
				resize();
				c_or_e();
			});

			function view(e){
			var result = e.id;
			var resultRef = new Firebase(url+"/"+result);
				resultRef.on('value', function(snapshot) {
					result_view = snapshot.val();
					$("#view_result").show();
					buildView(result_view);
					icon();
				});
	
			// this is for the button
			// var t = $(e).parent().parent().parent().attr("id");
			// setCookie("result_id",i, 1);
			// window.location.href = "../kit-demo/view.php";
				
		};

		</script>

		<script src="js/resizeEdit.js"></script>






	<!-- <div id="tester"> -->
		<div id="results">
			<div id="welcome">
				<p>welcome to the site, learn more </p>
			</div>
		<div id = "view_result">
			<div id = "viewpic"></div>
			<div id = "viewbio"></div>
		</div>
			<table id ="display" data-filter="#search">
				<thead>
					<tr>
						<th data-toggle="true">picture</th>
						<th data-toggle="true">bio</th>
					</tr>
				</thead>
				<tbody>
					<!-- dynamic -->	
				</tbody>
			</table>
	</div>

	


		<!-- </div> 
		 -->

		<?php include 'modal.php'; ?>

		<?php include 'footer.php'; ?>		
	</body>
</html>




