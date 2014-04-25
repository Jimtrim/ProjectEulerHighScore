/*globals: jQuery */

var EulerList = EulerList || {};

EulerList.updateList = function() {
	// TODO: make username resource dynamic
	jQuery.ajax({
		url: "./usernames.php",
		success: function(data, status, XHR) {
			console.log("LOLOLOL");
			data.forEach(function(item) {
				EulerList.getDataForUser(item);
			});
			console.log("LOLOLOL");
			console.log(data);
		}
	});
}

EulerList.getDataForUser = function(name) {
	console.log("LOL");
	jQuery.ajax({
		url: "./scores.php?username="+name,
		type: 'POST',
		dataType: 'text',
		success: function(data, status, XHR) {
			console.log(name+": "+data);
		},
	});
}

EulerList.addUser = function() {

}




jQuery(function() {
	EulerList.updateList();
});