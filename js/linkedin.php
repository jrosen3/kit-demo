<script type="text/javascript" src="http://platform.linkedin.com/in.js">
	api_key: jasefg48mzha
		onLoad: onLinkedInLoad
	// authorize: true
</script>

<script>
	// Runs when the JavaScript framework is loaded
	function onLinkedInLoad() {
		IN.Event.on(IN, "auth", onLinkedInAuth);
	}

	// Runs when the viewer has authenticated
	function onLinkedInAuth() {
		IN.API.Profile("me").result(displayProfiles);
	}

	// Runs when the Profile() API call returns successfully
	function displayProfiles(profiles) {
		member = profiles.values[0];
		var url = "https://kit-demo.firebaseio.com/person/" + member.id;
		var personRef = new Firebase(url);
		personRef.on('value', function(snapshot) {
			if(snapshot.val() === null) {
				personRef.set({first: member.firstName, last: member.lastName});
			} else {
				personRef.update({first: member.firstName, last: member.lastName});
			}
			// redirect to edit page
			setCookie("sessionID", member.id, 1);
			document.location.href = '../kit-demo/edit.php';
		});
	}
</script>
