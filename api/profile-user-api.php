<?php
session_start();
include 'config.php';
header('Content-Type: application/json');

	switch ($_POST['functionname']) {
		case 'getProfile':
			getProfile($conn);
			break;
		case 'updateProfile':
			updateProfile($conn);
			break;
		default:
			echo "error function not found";
			break;
	}


	function getProfile($conn) {
		$ic = $_POST['data'];
		$query = "SELECT * FROM patient WHERE ic = '$ic'";

		if($results = $conn->query($query)){
			if($results->num_rows){
				while ($row = $results->fetch_assoc()) {
					$res[] = $row;
				}

		    	echo json_encode($res);
			} else {
		    	echo json_encode("no user");
			}
		} else {
			die('error: ' . $conn->error);
		}

		mysqli_close($conn);
	}


	function updateProfile($conn) {
		$id = $_SESSION['pid'];

		$regNum = $_POST['data']['regNum'];
		$datePregnant = $_POST['data']['datePregnant'];
		$ic = $_POST['data']['ic'];
		$dueDate = $_POST['data']['dueDate'];
		$email = $_POST['data']['email'];

		$cAddress = $_POST['data']['cAddress'];
		$mName = $_POST['data']['mName'];
		$race = $_POST['data']['race'];
		$eduLevel = $_POST['data']['eduLevel'];
		$occupation = $_POST['data']['occupation'];
		$address = $_POST['data']['address'];
		$dob = $_POST['data']['dob'];
		$age = $_POST['data']['age'];
		$phoneHome = $_POST['data']['phoneHome'];
		$phoneMobile = $_POST['data']['phoneMobile'];
		$hName = $_POST['data']['hName'];
		$hic = $_POST['data']['hic'];
		$hWorkplace = $_POST['data']['hWorkplace'];
		$hPhone = $_POST['data']['hPhone'];
		
		if($_POST['data']['cpass'] == "need"){
			$password = md5($_POST['data']['password']);
			$oldPassword = md5($_POST['data']['oldPassword']);
			$query = "UPDATE patient SET regNum = '$regNum', datePregnant = '$datePregnant', ic = '$ic', dueDate = '$dueDate', email = '$email', cAddress = '$cAddress', mName = '$mName', race = '$race', eduLevel = '$eduLevel', occupation = '$occupation', address = '$address', dob = '$dob', age = '$age', phoneHome = '$phoneHome', phoneMobile = '$phoneMobile', hName = '$hName', hic = '$hic', hWorkplace = '$hWorkplace', hPhone = '$hPhone', password = '$password' WHERE id = $id AND password = '$oldPassword'";
		} else {
			$query = "UPDATE patient SET regNum = '$regNum', datePregnant = '$datePregnant', ic = '$ic', dueDate = '$dueDate', email = '$email', cAddress = '$cAddress', mName = '$mName', race = '$race', eduLevel = '$eduLevel', occupation = '$occupation', address = '$address', dob = '$dob', age = '$age', phoneHome = '$phoneHome', phoneMobile = '$phoneMobile', hName = '$hName', hic = '$hic', hWorkplace = '$hWorkplace', hPhone = '$hPhone' WHERE id = $id";
		}

		if($results = $conn->query($query)){
			$_SESSION[$ic] = $_SESSION[$_SESSION['pic']];
			$_SESSION[$_SESSION['pic']] = null;;
		    echo json_encode(mysqli_affected_rows($conn));
		} else {
			echo json_encode($conn->error);
			//die('error: ' . $conn->error);
		}


		mysqli_close($conn);
	}
?>