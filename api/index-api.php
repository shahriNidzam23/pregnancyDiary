<?php
session_start();
include 'config.php';
header('Content-Type: application/json');

	switch ($_POST['functionname']) {
		case 'login':
			login($conn);
			break;
		case 'logout':
			logout($conn);
			break;
		default:
			echo "error function not found";
			break;
	}


	function login($conn) {
		$username = $_POST['data']['username'];
		$password = md5($_POST['data']['password']);
		$type = $_POST['data']['type'];
		switch($type){
			case "patient":
				$query = "SELECT * FROM patient WHERE ic = '$username' AND password = '$password'";
				break;
			case "admin":
				$query = "SELECT * FROM centre WHERE name = '$type' AND password = '$password'";
				break;
			default:
			if($type)
				$query = "SELECT * FROM centre WHERE username = '$username' AND password = '$password'";
				break;
		}

		if($results = $conn->query($query)){
			if($results->num_rows){
				while ($row = $results->fetch_assoc()) {
					if($type == "patient"){
						$_SESSION["a" . $row["ic"]] = $row["mName"];
						$_SESSION['pid'] = $row["id"];
						$_SESSION['pic'] = $row["ic"];
					} else {
						$_SESSION['name'] = $row["name"];
						$_SESSION['id'] = $row["id"];
					}

				}
					$_SESSION['type'] = $type;
		    		echo json_encode("OK");
			} else {
		    	echo json_encode("no user");
			}
		} else {
		    	echo json_encode("error");
			die('error: ' . $conn->error);
		}

		
		mysqli_close($conn);
	}

function logout($conn) {
	$_SESSION['id'] = null;
	$_SESSION['pid'] = null;
	$_SESSION['name'] = null;
	$_SESSION['pname'] = null;
	$_SESSION['type'] = null;
	echo json_encode("OK");
}
?>