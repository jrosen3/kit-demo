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
		<script>
			$(document).ready(function(){
				

				$("#c_or_e").hide();
				resizeFooter();

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

				deleteCookie("result_id");

			});

				

			$(window).resize(function() {
				resizeFooter();
				resize();
				c_or_e();
			});

			function view(e){
			var i = e.id;
			var t = $(e).parent().parent().attr("id");
			alert(t);	
			setCookie("result_id", t, 1);
			window.location.href = "../kit-demo/view.php";
				
		};

		</script>

		<script src="js/resizeEdit.js"></script>






	<div id="tester">
		<!-- <div id="results">
			


		</div> -->
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

		<?php include 'modal.php'; ?>

		<?php include 'footer.php'; ?>		
	</body>
</html>




