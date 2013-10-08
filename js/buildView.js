//this will fill in the search bar with the name
function buildView(result_view){
	$("#search").val(result_view['first'] + " " + result_view['last']);
	$("#viewpic").html("<img src='"+result_view['picture']+"'>");
	$("#viewbio").html("<p>" + result_view['bio']+"</p>");
	icon();
};


