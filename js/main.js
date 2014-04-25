/*globals: jQuery */

var EulerList = EulerList || {};

EulerList["scores"] = [];

EulerList.updateList = function() {
	jQuery.ajax({
		url: "./scores	.php",
		accepts: "application/json;",
		success: function(data, status, XHR) {
			console.log(data);

			var rows = "";
			for (var i = 0; i < data.length; i++) {
				rows += "<tr>" + 
					"<td>" + data[i]["username"] + "</td>" + 
					"<td>" + data[i]["problems_solved"] + "</td>"	+
					"<td>" + data[i]["level"] +"</td>"	+
					"<td>" + data[i]["language"] +"</td>" +
					"<td>" + data[i]["country"] +"</td>" +
				"</tr>"	;			
			}

			$("#high-score-table tbody").html(rows);
		}

	});
};

EulerList.addUser = function() {

};




jQuery(function() {
	EulerList.updateList();
});