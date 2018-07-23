<?php
session_start();
include 'config.php';
header('Content-Type: application/json');

	switch ($_POST['functionname']) {
		case 'readDoctorAppoinment':
			readDoctorAppoinment($conn);
			break;
		case 'readPatientAppoinment':
			readPatientAppoinment($conn);
			break;
		case 'getDoctor':
			getDoctor($conn);
			break;
		case 'addAppointment':
			addAppointment($conn);
			break;
		case 'updateAppointment':
			updateAppointment($conn);
			break;
		case 'deleteAppointment':
			deleteAppointment($conn);
			break;
		case'sendEmail':
			sendEmail($conn);
			break;
		default:
			echo "error function not found";
			break;
	}

	function readDoctorAppoinment($conn) {
		$id = $_SESSION['id'];
		$query = "SELECT appoinment.time, appoinment.week, appoinment.location, centre.name, patient.mName FROM appoinment LEFT JOIN centre ON appoinment.doctorid = centre.id LEFT JOIN patient ON appoinment.patient_ic = patient.ic WHERE appoinment.doctorid = '$id'";

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

	function readPatientAppoinment($conn) {
		if(!empty($_SESSION['pic'])){
			$ic = $_SESSION['pic'];
		} else {
			$ic = $_POST['data']['ic'];
		}

		if($userDetail = userExist($conn, $ic)){
			$query = "SELECT appoinment.time, appoinment.week, appoinment.location, centre.name, patient.mName, centre.id, patient.datePregnant FROM appoinment LEFT JOIN centre ON appoinment.doctorid = centre.id LEFT JOIN patient ON appoinment.patient_ic = patient.ic WHERE appoinment.patient_ic = '$ic'";

			if($results = $conn->query($query)){
				if($results->num_rows){
					while ($row = $results->fetch_assoc()) {
						$res[] = $row;
					}
			    		echo json_encode($res);
				} else {
			    	echo json_encode($userDetail);
				}
			} else {
				die('error: ' . $conn->error);
			}

			mysqli_close($conn);
		} else {
			echo json_encode("no user");
		}
	}

	function userExist($conn, $ic){
		$query = "SELECT * FROM patient WHERE ic = '$ic'";

		if($results = $conn->query($query)){
			if($results->num_rows){
				while ($row = $results->fetch_assoc()) {
					$res[] = $row;
				}
		    	return $res;
			} else {
		    	return false;
			}
		} else {
			die('error: ' . $conn->error);
		}

		mysqli_close($conn);
	}

	function getDoctor($conn){
		$query = "SELECT id, name FROM centre WHERE id <> 1";

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

	function updateAppointment($conn){
		$ic = $_POST['data']['ic'];
		$doctorid = $_POST['data']['doctor'];
		$week = $_POST['data']['week'];
		$time = $_POST['data']['time'];
		$location = $_POST['data']['location'];
		$prevTimeStamp = $_POST['data']['prevTimeStamp'];
		
		$query = "UPDATE appoinment SET doctorid = '$doctorid', time = '$time', location = '$location' WHERE patient_ic = '$ic' AND doctorid = '$doctorid' AND time = '$prevTimeStamp'";

		if($results = $conn->query($query)){
		    echo json_encode(mysqli_affected_rows($conn));
		} else {
			echo json_encode($conn->error);
			//die('error: ' . $conn->error);
		}


		mysqli_close($conn);
	}

	function addAppointment($conn){
		$patient_ic = $_POST['data']['ic'];
		$doctorid = $_POST['data']['doctor'];
		$week = $_POST['data']['week'];
		$time = $_POST['data']['time'];
		$location = $_POST['data']['location'];

		$query = "INSERT INTO appoinment (patient_ic, doctorid, week, time, location) VALUES ('$patient_ic', '$doctorid', '$week', '$time', '$location')";

		if ($conn->query($query)) {
			$last_id = $conn->insert_id;
			//sendemail($conn);
			echo json_encode($last_id);
		} else {
		    echo json_encode("Error: " . $conn->error);
		}

		mysqli_close($conn);
	}

	function sendEmail($conn){
		$userData = userExist($conn, $_POST['data']['ic']);
		//echo json_encode($userData[0]);
		$name = strip_tags(htmlspecialchars($userData[0]['mName']));
		$location = strip_tags(htmlspecialchars("Klinik Jamal"));
		$doctorName = strip_tags(htmlspecialchars("Dr. Shahrin Nidzam"));
		$date = strip_tags(htmlspecialchars("10/10/2010"));
		$timeStamp = strip_tags(htmlspecialchars("000000"));
		$email_address = strip_tags(htmlspecialchars($userData[0]['email']));

		//Create the email and send the message
		$to = $email_address; 
		$email_subject = "$location Appointment:  $name";
		$email_body = "You have received new appointment\n\n"."Appointment details:\n\nName: $name\n\nDoctor: $doctorName\n\nDate: $date\n\nTime:\n$timeStamp\n\nLocation: $location";
		$headers = "From: noreply@pregnancy-diary.000webhost.com\n"; 

		try {
		  mail($to,$email_subject,$email_body,$headers);
		  echo json_encode(true);
		}
		//catch exception
		catch(Exception $e) {
			echo json_encode(false);
		}
	}

	function deleteAppointment($conn){
		$ic = $_POST['data']['ic'];
		$doctorid = $_POST['data']['doctor'];
		$time = $_POST['data']['time'];
		$query = "DELETE FROM appoinment WHERE patient_ic = '$ic' AND doctorid = '$doctorid' AND time = '$time'";
		if ($conn->query($query)) {
				echo json_encode("success");
		} else {
		    echo json_encode("Error user: " . $conn->error);
		}	
		mysqli_close($conn);
	}
?>