<?php
session_start();
include 'config.php';
header('Content-Type: application/json');

	switch ($_POST['functionname']) {
		case 'insertHistory':
			insertHistory($conn);
			break;
		case 'readHistory':
			readHistory($conn);
			break;
		case 'updateHistory':
			updateHistory($conn);
			break;
		case 'deleteHistory':
			deleteHistory($conn);
			break;
		default:
			echo "error function not found";
			break;
	}

	function insertHistory($conn) {
		$ic = $_POST['data']['ic'];
		$dateDelivery = $_POST['data']['dateDelivery'];
		$sex = $_POST['data']['sex'];
		$pob = $_POST['data']['pob'];
		$weight = $_POST['data']['weight'];
		$conductBy = $_POST['data']['conductBy'];
		$placenta = $_POST['data']['placenta'];
		$spontaneus = $_POST['data']['spontaneus'];
		$assistedDelivery = $_POST['data']['assistedDelivery'];
		$caesaran = $_POST['data']['caesaran'];
		$complication = $_POST['data']['complication'];
		$bbyCondition = $_POST['data']['bbyCondition'];
		$apgar = $_POST['data']['apgar'];
		$abnormallyCongenital = $_POST['data']['abnormallyCongenital'];

		$query = "INSERT INTO deliveryhistory (patient_ic, dateDelivery, sex, pob, weight, conductBy, placenta, spontaneus, assistedDelivery, caesarean, complication, bbyCondition, apgar, abnormallyCongenital) VALUES ('$ic', '$dateDelivery', '$sex', '$pob', '$weight', '$conductBy', '$placenta', '$spontaneus', '$assistedDelivery', '$caesaran', '$complication', '$bbyCondition', '$apgar', '$abnormallyCongenital')";

		if ($conn->query($query)) {
			$last_id = $conn->insert_id;
			echo json_encode($last_id);
		} else {
		    echo json_encode("Error: " . $conn->error);
		}

		mysqli_close($conn);
	}


	function readHistory($conn) {
		$ic = $_POST['ic'];
		$query = "SELECT * FROM deliveryhistory WHERE patient_ic = '$ic'";

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

	function updateHistory($conn) {
		$id = $_POST['data']['id'];
		$dateDelivery = $_POST['data']['dateDelivery'];
		$sex = $_POST['data']['sex'];
		$pob = $_POST['data']['pob'];
		$weight = $_POST['data']['weight'];
		$conductBy = $_POST['data']['conductBy'];
		$placenta = $_POST['data']['placenta'];
		$spontaneus = $_POST['data']['spontaneus'];
		$assistedDelivery = $_POST['data']['assistedDelivery'];
		$caesaran = $_POST['data']['caesaran'];
		$complication = $_POST['data']['complication'];
		$bbyCondition = $_POST['data']['bbyCondition'];
		$apgar = $_POST['data']['apgar'];
		$abnormallyCongenital = $_POST['data']['abnormallyCongenital'];
		
		$query = "UPDATE deliveryhistory SET dateDelivery = '$dateDelivery', sex = '$sex', pob = '$pob', weight = '$weight', conductBy = '$conductBy', placenta = '$placenta', spontaneus = '$spontaneus', assistedDelivery = '$assistedDelivery', 	caesarean = '$caesaran', complication = '$complication', bbyCondition = '$bbyCondition', apgar = '$apgar', abnormallyCongenital = '$abnormallyCongenital' WHERE id = $id";

		if($results = $conn->query($query)){
		    echo json_encode(mysqli_affected_rows($conn));
		} else {
			echo json_encode($conn->error);
			//die('error: ' . $conn->error);
		}


		mysqli_close($conn);
	}

	function deleteHistory($conn) {
		$cid = $_POST['data'];
		$query = "DELETE FROM deliveryhistory WHERE id = $cid";
		if ($conn->query($query)) {
				echo json_encode("success");
		} else {
		    echo json_encode("Error user: " . $conn->error);
		}	
		mysqli_close($conn);
	}
?>