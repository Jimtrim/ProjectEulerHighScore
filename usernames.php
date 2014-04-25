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
			
			$newName = strtolower( $_POST['username'] );
			if (strlen(file_get_contents("http://projecteuler.net/profile/".$newName.".txt", 'r')) > 1) {
				$unique = 1;
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
				header('HTTP/1.1 404 Not Found', true, 404);
				echo ("Username dose not exist at ProjectEuler");
			}

			
		
		} else {
			header('Content-Type: application/json');
			echo json_encode(getUsernames($file));
		} 
	}
?>