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
					$('#headshot').attr('src', snapshot.val().picture);
					resize();
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
			});
		</script>
		<?php
			include"js/edit_js.php";
		?>
		<div class = "editor">
			<h1 id="name"></h1>
			<div id="pic">
				<img id="headshot" src="">
			</div>
			<input type="file" accept="image/*" id="file-upload">
			<input type="text" name="bio" id="bio">
			<input type="button" name="submit" id="submit">Save and Close</input>
		</div>
	</body>
</html>




