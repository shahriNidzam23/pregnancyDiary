<?php
session_start();
include 'config.php';
header('Content-Type: application/json');

	switch ($_POST['functionname']) {
		case 'Register_Patient':
			Register_Patient($conn);
			break;
		default:
			echo "error function not found";
			break;
	}

  function Register_Patient($conn) {
  	$regNum = $_POST['data']['Register_Number'];
  	$Pregnant_Date = $_POST['data']['Pregnant_Date'];
  	$ic = $_POST['data']['ic'];
  	$dueDate = $_POST['data']['Due_Date'];
    $email = $_POST['data']['email'];
  	$cAddress = $_POST['data']['Clinic_Address'];

    $mName = $_POST['data']['Mother_Name'];
  	$race = $_POST['data']['Race'];
  	$eduLevel = $_POST['data']['Education_level'];
  	$occupation = $_POST['data']['Occupation'];
  	$address = $_POST['data']['Address'];

    $dob = $_POST['data']['Date_Of_Birth'];
  	$age = $_POST['data']['Age'];
  	$phoneHome= $_POST['data']['PhoneNumber_Home'];
  	$phoneMobile = $_POST['data']['PhoneNumber_HP'];
  	$hName= $_POST['data']['Husband_Name'];

    $hic = $_POST['data']['Husband_IC'];
  	$hWorkplace = $_POST['data']['Husband_Workplace'];
  	$hPhone = $_POST['data']['Husband_Phone'];
  	$password = md5($_POST['data']['Password']);

  	$query = "INSERT INTO patient (regNum, datePregnant, ic, dueDate, email, cAddress, mName, race, eduLevel, occupation, address, dob, age, phoneHome, phoneMobile, hName, hic, hWorkplace, hPhone, password)
    VALUES ('$regNum', '$Pregnant_Date', '$ic', '$dueDate', '$email', '$cAddress', '$mName', '$race', '$eduLevel', '$occupation', '$address', '$dob', '$age', '$phoneHome', '$phoneMobile', '$hName', '$hic', '$hWorkplace', '$hPhone', '$password')";

  	if ($conn->query($query)) {
			$res[0] = "OK";
  		echo json_encode($res);
  	} else {
  	    echo json_encode("Error: " . $conn->error);
  	}

  	mysqli_close($conn);
  }
  ?>
