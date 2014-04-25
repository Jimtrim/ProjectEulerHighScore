<?php

	if(isset($_POST['username'])) {
		//TODO: add user to dynamic resource
	
	} else {
		// TODO: get this from dynamic resource
		$names = Array("Jimtrim", "ExuZ", "trololololol");

		header('Content-Type: application/json');
		echo json_encode($names);

	} 
?>