<!DOCTYPE html>

<html>
	<head>
		<title>Kit-Demo | Edit</title>
		<?php
			include"config.php";
		?>
	</head>

	<body>
		<script>
			$(document).ready(function(){
				var sessionID = getCookie("sessionID");
				var url = "https://kit-demo.firebaseio.com/person/" + sessionID;
				var personRef = new Firebase(url);
				personRef.on('value', function(snapshot) {
					$('#name').html(snapshot.val().first + ' ' + snapshot.val().last);
					$('#bio').val(snapshot.val().bio);
					$('#pic').attr('src', snapshot.val().picture);
				});

				$('#file-upload').on('change', function(e){
					var file = e.target.files[0];
					var reader = new FileReader();
					reader.onload = function(e) {
						var filePayload = e.target.result;
						personRef.update({picture: filePayload});
					};
					reader.readAsDataURL(file);
					$('#pic').attr('src', snapshot.val().picture);
				});
			});
		</script>
		<div class = "editor">
		<h1 id="name"></h1>
		<div class = "wrapper">
		<img id="pic" src="">
		</div>
		<input type="file" accept="image/*" id="file-upload">
		<input type="text" name="bio" id="bio">
	</div>
	</body>
</html>




