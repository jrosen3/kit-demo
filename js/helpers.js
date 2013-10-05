function c_or_e(){
	if(getCookie("sessionID")) {
		$("#c_or_e").html('<a data-toggle="modal" href="#editModal">Edit</a>');
	} else {
		// $(".editor").html('<script type="IN/Login"></script>');
	};
};