<?php
session_start();
include 'config.php';
header('Content-Type: application/json');

	switch ($_POST['functionname']) {
		case 'insertAntenatal':
			insertAntenatal($conn);
			break;
		case 'readAntenatal':
			readAntenatal($conn);
			break;
		case 'updateAntenatal':
			updateAntenatal($conn);
			break;
		case 'deleteAntenatal':
			deleteAntenatal($conn);
			break;
		default:
			echo "error function not found";
			break;
	}

	function insertAntenatal($conn) {
		$ic = $_POST['data']['ic'];
		$test = $_POST['data']['test'];
		$dateTaken = $_POST['data']['dateTaken'];
		$result = $_POST['data']['result'];

		$query = "INSERT INTO antenatalscreening (patient_ic, test, dateTaken, result) VALUES ('$ic', '$test', '$dateTaken', '$result')";

		if ($conn->query($query)) {
			$last_id = $conn->insert_id;
			echo json_encode($last_id);
		} else {
		    echo json_encode("Error: " . $conn->error);
		}

		mysqli_close($conn);
	}


	function readAntenatal($conn) {
		$ic = $_POST['ic'];
		$query = "SELECT * FROM antenatalscreening WHERE patient_ic = '$ic'";

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

	function updateAntenatal($conn) {
		$id = $_POST['data']['id'];
		$test = $_POST['data']['test'];
		$dateTaken = $_POST['data']['dateTaken'];
		$result = $_POST['data']['result'];
		
		$query = "UPDATE antenatalscreening SET test = '$test', dateTaken = '$dateTaken', result = '$result' WHERE id = $id";

		if($results = $conn->query($query)){
		    echo json_encode(mysqli_affected_rows($conn));
		} else {
			echo json_encode($conn->error);
			//die('error: ' . $conn->error);
		}


		mysqli_close($conn);
	}

	function deleteAntenatal($conn) {
		$cid = $_POST['data'];
		$query = "DELETE FROM antenatalscreening WHERE id = $cid";
		if ($conn->query($query)) {
				echo json_encode("success");
		} else {
		    echo json_encode("Error user: " . $conn->error);
		}	
		mysqli_close($conn);
	}
?>