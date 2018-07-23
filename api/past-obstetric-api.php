<?php
session_start();
include 'config.php';
header('Content-Type: application/json');

	switch ($_POST['functionname']) {
		case 'insertObstetric':
			insertObstetric($conn);
			break;
		case 'readObstetric':
			readObstetric($conn);
			break;
		case 'updateObstetric':
			updateObstetric($conn);
			break;
		case 'deleteObstetric':
			deleteObstetric($conn);
			break;
		default:
			echo "error function not found";
			break;
	}

	function insertObstetric($conn) {
		$ic = $_POST['data']['ic'];
		$year = $_POST['data']['year'];
		$bType = $_POST['data']['bType'];
		$placeNby = $_POST['data']['placeNby'];
		$sex = $_POST['data']['sex'];
		$weight = $_POST['data']['weight'];
		$cMother = $_POST['data']['cMother'];
		$cBaby = $_POST['data']['cBaby'];
		$bDuration = $_POST['data']['bDuration'];
		$bbyCondition = $_POST['data']['bbyCondition'];

		$query = "INSERT INTO pastobstetric (patient_ic, year, bType, placeNby, sex, weight, cMother, cBaby, bDuration, bbyCondition) VALUES ('$ic', '$year', '$bType', '$placeNby', '$sex', '$weight', '$cMother', '$cBaby', '$bDuration', '$bbyCondition')";

		if ($conn->query($query)) {
			$last_id = $conn->insert_id;
			echo json_encode($last_id);
		} else {
		    echo json_encode("Error: " . $conn->error);
		}

		mysqli_close($conn);
	}


	function readObstetric($conn) {
		$ic = $_POST['ic'];
		$query = "SELECT * FROM pastobstetric WHERE patient_ic = '$ic'";

		if($results = $conn->query($query)){
			if($results->num_rows){
				while ($row = $results->fetch_assoc()) {
					$res[] = $row;
				}
		    		echo json_encode($res);
			} else {
		    	echo json_encode("no announcement");
			}
		} else {
			die('error: ' . $conn->error);
		}

		mysqli_close($conn);
	}

	function updateObstetric($conn) {
		$id = $_POST['data']['id'];
		$ic = $_POST['data']['ic'];
		$year = $_POST['data']['year'];
		$bType = $_POST['data']['bType'];
		$placeNby = $_POST['data']['placeNby'];
		$sex = $_POST['data']['sex'];
		$weight = $_POST['data']['weight'];
		$cMother = $_POST['data']['cMother'];
		$cBaby = $_POST['data']['cBaby'];
		$bDuration = $_POST['data']['bDuration'];
		$bbyCondition = $_POST['data']['bbyCondition'];
		
		$query = "UPDATE pastobstetric SET year = '$year', bType = '$bType', placeNby = '$placeNby', sex = '$sex', weight = '$weight', cMother = '$cMother', cBaby = '$cBaby', bDuration = '$bDuration', bbyCondition = '$bbyCondition' WHERE id = $id";

		if($results = $conn->query($query)){
		    echo json_encode(mysqli_affected_rows($conn));
		} else {
			echo json_encode($conn->error);
			//die('error: ' . $conn->error);
		}


		mysqli_close($conn);
	}

	function deleteObstetric($conn) {
		$cid = $_POST['data'];
		$query = "DELETE FROM pastobstetric WHERE id = $cid";
		if ($conn->query($query)) {
				echo json_encode("success");
		} else {
		    echo json_encode("Error user: " . $conn->error);
		}	
		mysqli_close($conn);
	}
?>