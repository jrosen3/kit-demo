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
					$('#bio').html(snapshot.val().bio);
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

				$("#pic").click(function() {
					$("#file-upload").trigger('click');
				});

				$("#button").click(function() {
					var bio = $("#bio").val()
					personRef.update({bio: bio})
					document.location.href = '../kit-demo/index.php';
				});
			});
		</script>
		<?php
			include"js/edit_js.php";
		?>
		<div class="editor">
			<div id="pic">
				<img id="headshot" src="">
			</div>
			<input type="file" accept="image/*" id="file-upload"></input>
			<h1 id="name"></h1>
			<textarea maxlength="1250" id="bio"></textarea>
			<div id="button">Save and Close</div>
		</div>
	</body>
</html>




