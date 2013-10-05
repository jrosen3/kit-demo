function c_or_e(){
	if(getCookie("sessionID")) {
		$("#c_or_e").show();
		$("#login").hide();
	} else {
		$("#c_or_e").hide();
		$("#login").show();
	};
};

function setModal(){
	var sessionID = getCookie("sessionID");
	var personRef = new Firebase(url+"/person/"+sessionID);
	personRef.on('value', function(snapshot) {
		$('#name').html(snapshot.val().first + ' ' + snapshot.val().last);
		$('#bio').html(snapshot.val().bio);
		$('#headshot').attr('src', snapshot.val().picture);
	});
}