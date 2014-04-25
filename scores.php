<?php
	error_reporting(E_ALL);
	ini_set('display_errors', 1);


	function respond404() {
		http_status_code(404);
		echo ("Unknown user");
	}

	if ( isset($_GET["username"]) ) {
		$data = file_get_contents("http://projecteuler.net/profile/".$_GET["username"].".txt", 'r');
		$list = preg_split('/,/',$data, -1);
        if (sizeof($list) > 4)  {
                $list[3] = intval( str_replace("Solved ", "", (string) $list[3]) );
				header('Content-Type: application/json');
				echo json_encode($list);
        } else {
			respond404();
		}
	} else {
		respond404();
	}

	
?>