$(function () {
		$('#display').footable();
});

function buildTable(kitBase) {
	var table;
	$.each(kitBase, function(index, value){
		var type = index;
		$.each(value, function(index, value){
			var id = type+"/"+index;
			var name = value['first'] + ' ' + value['last'];
			var bio = value['bio'].slice(0, 150) + '...';
			var pic = value['picture'];
			table += "<tr class='t_row' id='"+id+"'><td><div class='pix'><img src='"+pic+"'></div></td><td><div class='biox'><span class='namex'><a href='#'>"+name+"</a></span></br> "+bio+"</div></td><td><input type='button' value='test' onclick='view(this)'></td></tr></a>";
		});
	});
	$("#display").html(table);
	resizeFooter();
	
};