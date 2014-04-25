/*globals: jQuery */

var EulerList = EulerList || {};

EulerList["scores"] = [];

EulerList.compare = function(a, b) {
	if (a.problems_solved < b.problems_solved)
		return 1;
	if (a.problems_solved > b.problems_solved)
		return -1;
	return 0;
}

EulerList.updateList = function() {
	jQuery.ajax({
		url: "./scores.php",
		accepts: "application/json;",
		success: function(data, status, XHR) {
			console.log(data);
			data.sort(EulerList.compare);


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

EulerList.addUser = function(uname) {
	var username = {username: uname};

	console.log(username);
	jQuery.ajax({
		url: "./usernames.php",
		method: "POST",
		data: username,
		accepts: "application/json;",
		success: function(data, status, XHR) {
			EulerList.updateList();
		}
	});
};


EulerList.submitUsername = function(event) {
	event.preventDefault();	
};


jQuery(function() {
	jQuery('#register-nickname-form').on('submit', function(event) {
		event.preventDefault();
		EulerList.addUser(jQuery('#register-nickname-form input[name=username]').val());
	});
	jQuery('#register-nickname-form a[name=submit_username]').on('click', function(event) {
		event.preventDefault();
		EulerList.addUser( jQuery('#register-nickname-form input[name=username]').val() );
	});
	EulerList.updateList();
});