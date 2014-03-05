function populateTable() {
	$.ajax({
		url: "php/Test.php?mode="+MODE_GET_SCOREBOARD
	}).done(function(data) {
		data = JSON.parse(data);
		for(var i=0; i<data.length; i++) {
			var no = i+1;
			var matricNo = hideSome(data[i].username);
			var stName = data[i].name;
			var score = data[i].grade;
			var min = Math.floor(data[i].timeTaken/60);
			var sec = data[i].timeTaken%60;
			$('table tr:last').after('<tr><td>'+no+'</td><td>'+matricNo+'</td><td>'+stName+'</td><td>'+score+'</td><td>'+min+'m '+sec+'s</td></tr>');
		}
	});
}

function hideSome(str) {
	var length = Math.min(str.length, 2);
	while(length > 0) {
		var index = Math.floor(Math.random()*str.length);
		if(str.charAt(index) != '*') {
			str = str.replaceAt(index, '*');
			length--;
		}
	}
	return str;
}

String.prototype.replaceAt=function(index, character) {
    return this.substr(0, index) + character + this.substr(index+character.length);
}

$(document).ready(function() {
	populateTable();
});