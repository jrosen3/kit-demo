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
				resizeFooter();
				c_or_e();

				var searchRef = new Firebase(url);
				searchRef.on('value', function(snapshot) {
					kitBase = snapshot.val();
					buildTable(kitBase);
				});


				$("#editModal").on('shown.bs.modal', function(){
					resize();
				});

				var sessionID = getCookie("sessionID");
				var personRef = new Firebase(url+"/person/"+sessionID);
				personRef.on('value', function(snapshot) {
					$('#name').html(snapshot.val().first + ' ' + snapshot.val().last);
					$('#bio').html(snapshot.val().bio);
					$('#headshot').attr('src', snapshot.val().picture);
				});

				$('#file-upload').on('change', function(e){
					var file = e.target.files[0];
					var reader = new FileReader();
					reader.onload = function(e) {
						var filePayload = e.target.result;
						personRef.update({picture: filePayload});
					};
					reader.readAsDataURL(file);
					$('#headshot').attr('src', filePayload);
					resize();
				});

				$("#pic").click(function() {
					$("#file-upload").trigger('click');
				});

				$("#button").click(function() {
					var bio = $("#bio").val()
					personRef.update({bio: bio})
					// document.location.href = '../kit-demo/index.php';
				});
			});

			$(window).resize(function() {
				resizeFooter();
				resize();
			});
		</script>

		<script src="js/resizeEdit.js"></script>






		
		<div id="results">
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

		<!-- modal -->
		<?php include 'modal.php'; ?>
		
		<?php include 'footer.php'; ?>		
	</body>
</html>




