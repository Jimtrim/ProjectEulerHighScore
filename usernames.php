<?php
	error_reporting(E_ALL);
	ini_set('display_errors', 1);
	
	function getUsernames($file) {
		$list = file($file);
		for ($i=0; $i < sizeof($list); $i++) { 
			$list[$i] = trim($list[$i]);
		}

		return $list;
	}

	if ( $_SERVER['SCRIPT_FILENAME'] == __FILE__) { // IF NOT REQUIRED/INCLUDED
		$file = "./usernames.txt";
		if(isset($_POST['username'])) {
			$unique = 1;
			$newName = strtolower( $_POST['username'] );

			$temp = getUsernames($file);
			foreach ($temp as $line) {
				if (strtolower( trim($line) ) == $newName ){
					$unique = 0;
					break;
				}
			}
			if($unique) {
				file_put_contents($file, $newName."\n", FILE_APPEND | LOCK_EX);
			}
		
		} else {
			header('Content-Type: application/json');
			echo json_encode(getUsernames($file));
		} 
	}
?>