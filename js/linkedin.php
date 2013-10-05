<script type="text/javascript" src="http://platform.linkedin.com/in.js">
	api_key: jasefg48mzha
	onLoad: onLinkedInLoad
	authorize: false
</script>

<script>
	// Runs when the JavaScript framework is loaded
	function onLinkedInLoad() {
		IN.Event.on(IN, "auth", onLinkedInAuth);
		// Use a custom login icon. 
        // $('a[id*=li_ui_li_gen_]').css({marginBottom:'20px'}).html('<img src="test.png" height="31" width="200" border="0" />');    
	}

	// Runs when the viewer has authenticated
	function onLinkedInAuth() {
		IN.API.Profile("me").result(displayProfiles);
	}

	// Runs when the Profile() API call returns successfully
	function displayProfiles(profiles) {
		member = profiles.values[0];
		var personRef = new Firebase(url+"/person/"+member.id);
		personRef.on('value', function(snapshot) {
			if(snapshot.val() === null) {
				personRef.set({first: member.firstName, last: member.lastName});
			} else {
				personRef.update({first: member.firstName, last: member.lastName});
			}
			setCookie("sessionID", member.id, 1);
		});
		c_or_e();
		setModal();
	}
</script>
