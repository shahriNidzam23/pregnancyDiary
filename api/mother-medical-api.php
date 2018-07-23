<?php
session_start();
include 'config.php';
header('Content-Type: application/json');

	switch ($_POST['functionname']) {
		case 'insertMother':
			insertMother($conn);
			break;
		case 'readMother':
			readMother($conn);
			break;
		case 'updateMother':
			updateMother($conn);
			break;
		case 'deleteMother':
			deleteMother($conn);
			break;
		default:
			echo "error function not found";
			break;
	}

	function insertMother($conn) {
		$ic = $_POST['data']['ic'];
		$periodCycle = $_POST['data']['periodCycle'];
		$bloodType = $_POST['data']['bloodType'];
		$rh = $_POST['data']['rh'];
		$height = $_POST['data']['height'];
		$familyPlanning = $_POST['data']['familyPlanning'];
		$type = $_POST['data']['type'];
		$duration = $_POST['data']['duration'];
		$disease = $_POST['data']['disease'];
		$familyDisease = $_POST['data']['familyDisease'];

		$query = "INSERT INTO mothermedical (patient_ic, periodCycle, bloodType, rh, height, familyPlanning, type, duration, disease, familyDisease) VALUES ('$ic', '$periodCycle', '$bloodType', '$rh', '$height', '$familyPlanning', '$type', '$duration', '$disease', '$familyDisease')";

		if ($conn->query($query)) {
			$last_id = $conn->insert_id;
			echo json_encode($last_id);
		} else {
		    echo json_encode("Error: " . $conn->error);
		}

		mysqli_close($conn);
	}


	function readMother($conn) {
		$ic = $_POST['ic'];
		$query = "SELECT * FROM mothermedical WHERE patient_ic = '$ic'";

		if($results = $conn->query($query)){
			if($results->num_rows){
				while ($row = $results->fetch_assoc()) {
					$res[] = $row;
				}
		    		echo json_encode($res);
			} else {
		    	echo json_encode("no data");
			}
		} else {
			die('error: ' . $conn->error);
		}

		mysqli_close($conn);
	}

	function updateMother($conn) {
		$id = $_POST['data']['id'];
		$periodCycle = $_POST['data']['periodCycle'];
		$bloodType = $_POST['data']['bloodType'];
		$rh = $_POST['data']['rh'];
		$height = $_POST['data']['height'];
		$familyPlanning = $_POST['data']['familyPlanning'];
		$type = $_POST['data']['type'];
		$duration = $_POST['data']['duration'];
		$disease = $_POST['data']['disease'];
		$familyDisease = $_POST['data']['familyDisease'];
		
		$query = "UPDATE mothermedical SET periodCycle = '$periodCycle', bloodType = '$bloodType', rh = '$rh', height = '$height', familyPlanning = '$familyPlanning', type = '$type', duration = '$duration', disease = '$disease', familyDisease = '$familyDisease' WHERE id = $id";

		if($results = $conn->query($query)){
		    echo json_encode(mysqli_affected_rows($conn));
		} else {
			echo json_encode($conn->error);
			//die('error: ' . $conn->error);
		}


		mysqli_close($conn);
	}

	function deleteMother($conn) {
		$cid = $_POST['data'];
		$query = "DELETE FROM mothermedical WHERE id = $cid";
		if ($conn->query($query)) {
				echo json_encode("success");
		} else {
		    echo json_encode("Error user: " . $conn->error);
		}	
		mysqli_close($conn);
	}
?>