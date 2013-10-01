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
			var sessionID = getCookie("sessionID");
			var url = "https://kit-demo.firebaseio.com/person/" + sessionID;
			var personRef = new Firebase(url);
			personRef.on('value', function(snapshot) {
				$('#name').html(snapshot.val().first + ' ' + snapshot.val().last);
				$('#bio').val(snapshot.val().bio);
				$('#pic').attr('src', snapshot.val().pic);
			});
		</script>
		<h1 id="name"></h1>
		<img id="pic" src="">
		<input type="text" name="bio" id="bio">
	</body>
</html>




