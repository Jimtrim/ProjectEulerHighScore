<?php
	function getUsernames() {
		return Array("Jimtrim", "ExuZ", "pvv.ntnu", "trololololol");
	}


	if ( $_SERVER['SCRIPT_FILENAME'] == __FILE__) { // IF NOT REQUIRED/INCLUDED
		$file = "./usernames.txt"; // TODO: make to database
		if(isset($_POST['username'])) {
			$file
		
		} else {
			header('Content-Type: application/json');
			echo json_encode(getUsernames());
		} 
	}
?>