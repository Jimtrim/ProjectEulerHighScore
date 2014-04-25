<?php
	error_reporting(E_ALL);
	ini_set('display_errors', 1);

	require_once("./usernames.php");

	function createEulerScore($oldArr) {
		return array(
			"username" => $oldArr[0],
			"country" => $oldArr[1],
			"language" => $oldArr[2],
			"problems_solved" => intval( str_replace("Solved ", "", (string) $oldArr[3]) ),
			"level" => intval($oldArr[4])
		);
	}


	if ( isset($_GET["username"]) ) { // Single user
		$data = file_get_contents("http://projecteuler.net/profile/".$_GET["username"].".txt", 'r');
		$list = preg_split('/,/',$data, -1);
        if (sizeof($list) > 4)  {
				header('Content-Type: application/json');
				echo json_encode( createEulerScore($list) );
        } else {
			header('HTTP/1.1 404 Not Found', true, 404);
			echo ("Username dose not exist at ProjectEuler");
		}
	} else { // All known users
		$table = array();
		foreach (getUsernames() as $value) {
			$data = file_get_contents("http://projecteuler.net/profile/".$value.".txt", 'r');
			$arr = preg_split('/,/',$data, -1);
	        if (sizeof($arr) == 5)  {
        		$table[] = createEulerScore($arr);
	        }
		}
		header('Content-Type: application/json');
		echo json_encode($table);
	}

	
?>