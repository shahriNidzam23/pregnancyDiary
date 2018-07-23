<?php
session_start();
include 'config.php';
header('Content-Type: application/json');

	switch ($_POST['functionname']) {
		case 'insertPregnancy':
			insertPregnancy($conn);
			break;
		case 'readPregnancy':
			readPregnancy($conn);
			break;
		case 'updatePregnancy':
			updatePregnancy($conn);
			break;
		case 'deletePregnancy':
			deletePregnancy($conn);
			break;
		default:
			echo "error function not found";
			break;
	}

	function insertPregnancy($conn) {
		$ic = $_POST['data']['ic'];
		$dateTaken = $_POST['data']['dateTaken'];
		$albuminTest = $_POST['data']['albuminTest'];
		$sugarTest = $_POST['data']['sugarTest'];
		$hemoglobinTest = $_POST['data']['hemoglobinTest'];
		$weight = $_POST['data']['weight'];
		$bloodPressure = $_POST['data']['bloodPressure'];
		$vein = $_POST['data']['vein'];
		$week = $_POST['data']['week'];
		$uterusHeight = $_POST['data']['uterusHeight'];
		$bbyConditionNow = $_POST['data']['bbyConditionNow'];
		$posFetus = $_POST['data']['posFetus'];
		$fetusHeart = $_POST['data']['fetusHeart'];
		$moveFetus = $_POST['data']['moveFetus'];
		$doctor = $_POST['data']['doctor'];

		$query = "INSERT INTO currentpregnancy (patient_ic, dateTaken, albuminTest, sugarTest, hemoglobinTest, weight, bloodPressure, vein, week, uterusHeight, bbyConditionNow, posFetus, fetusHeart, moveFetus, doctor) VALUES ('$ic', '$dateTaken', '$albuminTest', '$sugarTest', '$hemoglobinTest', '$weight', '$bloodPressure', '$vein', '$week', '$uterusHeight', '$bbyConditionNow', '$posFetus', '$fetusHeart', '$moveFetus', '$doctor')";

		if ($conn->query($query)) {
			$last_id = $conn->insert_id;
			echo json_encode($last_id);
		} else {
		    echo json_encode("Error: " . $conn->error);
		}

		mysqli_close($conn);
	}


	function readPregnancy($conn) {
		$ic = $_POST['ic'];
		$query = "SELECT * FROM currentpregnancy WHERE patient_ic = '$ic'";

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

	function updatePregnancy($conn) {
		$id = $_POST['data']['id'];
		$dateTaken = $_POST['data']['dateTaken'];
		$albuminTest = $_POST['data']['albuminTest'];
		$sugarTest = $_POST['data']['sugarTest'];
		$hemoglobinTest = $_POST['data']['hemoglobinTest'];
		$weight = $_POST['data']['weight'];
		$bloodPressure = $_POST['data']['bloodPressure'];
		$vein = $_POST['data']['vein'];
		$week = $_POST['data']['week'];
		$uterusHeight = $_POST['data']['uterusHeight'];
		$bbyConditionNow = $_POST['data']['bbyConditionNow'];
		$posFetus = $_POST['data']['posFetus'];
		$fetusHeart = $_POST['data']['fetusHeart'];
		$moveFetus = $_POST['data']['moveFetus'];
		$doctor = $_POST['data']['doctor'];
		
		$query = "UPDATE currentpregnancy SET dateTaken = '$dateTaken', albuminTest = '$albuminTest', sugarTest = '$sugarTest', hemoglobinTest = '$hemoglobinTest', weight = '$weight', bloodPressure = '$bloodPressure', vein = '$vein', week = '$week', uterusHeight = '$uterusHeight', bbyConditionNow = '$bbyConditionNow', posFetus = '$posFetus', fetusHeart = '$fetusHeart', moveFetus = '$moveFetus', doctor = '$doctor' WHERE id = $id";

		if($results = $conn->query($query)){
		    echo json_encode(mysqli_affected_rows($conn));
		} else {
			echo json_encode($conn->error);
			//die('error: ' . $conn->error);
		}


		mysqli_close($conn);
	}

	function deletePregnancy($conn) {
		$cid = $_POST['data'];
		$query = "DELETE FROM currentpregnancy WHERE id = $cid";
		if ($conn->query($query)) {
				echo json_encode("success");
		} else {
		    echo json_encode("Error user: " . $conn->error);
		}	
		mysqli_close($conn);
	}
?>