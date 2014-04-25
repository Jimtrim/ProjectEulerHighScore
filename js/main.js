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

		beforeSend: function() {
			jQuery("#querySpinner").removeClass('hide');
		},
		success: function(data, status, XHR) {
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
		},
		complete: function() {
			jQuery("#querySpinner").addClass('hide');
		}, 
		error: function() {
			jQuery('#error').text("Could not load score table");
		}
	});
};

EulerList.addUser = function(uname) {
	var username = {username: uname};
	jQuery.ajax({
		url: "./usernames.php",
		method: "POST",
		data: username,
		accepts: "application/json;",
		beforeSend: function() {
			jQuery("#querySpinner").removeClass('hide');
		},
		success: function(data, status, XHR) {
			jQuery('#register-nickname-form input[name=username]').val('');
			EulerList.updateList();
		},
		error: function() {
			jQuery("#querySpinner").addClass('hide');
			jQuery('#error').text("Could not find that username");
		}
	});
};

EulerList.sendUsername = function() {
	jQuery('#error').text("");
	if (jQuery('#register-nickname-form input[name=username]').val().length > 0) {
		EulerList.addUser(jQuery('#register-nickname-form input[name=username]').val());
	}
}

jQuery(function() {
	jQuery('#register-nickname-form a[name=submit_username]').on('click', EulerList.sendUsername());
	jQuery('#register-nickname-form').on('submit', function(event) {
		event.preventDefault();
		EulerList.sendUsername();	
	});

	EulerList.updateList();
});