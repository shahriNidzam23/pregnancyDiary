<?php
session_start();
include 'config.php';
header('Content-Type: application/json');

	switch ($_POST['functionname']) {
		case 'searchPatient':
			searchPatient($conn);
			break;
		default:
			echo "error function not found";
			break;
	}


	function searchPatient($conn) {
		$username = $_POST['data']['ic'];
		$query = "SELECT mName, ic FROM patient WHERE ic = '$username'";

		if($results = $conn->query($query)){
			if($results->num_rows){
				while ($row = $results->fetch_assoc()) {
					$_SESSION["a" . $row["ic"]] = $row["mName"];
				}

		    	echo json_encode("OK");
			} else {
		    	echo json_encode("no user");
			}
		} else {
			die('error: ' . $conn->error);
		}

		
		mysqli_close($conn);
	}
?>