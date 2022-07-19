<?php  
session_start();
include "../db_conn.php";

	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}

	$regNum = test_input($_POST['Registration_Number']);
	$name = test_input($_POST['Name']);
	$cgpa = test_input($_POST['CGPA']);

	if (empty($regNum)) {
		header("Location: ../addUsers.php?error=Registration Number is Required");
	}else if (empty($name)) {
		header("Location: ../addUsers.php?error=Name is Required");
	}else if (empty($cgpa)) {
		header("Location: ../addUsers.php?error=CGPA is Required");
	}else {

        
        $sql = "INSERT into marks values ('$regNum','$name','$cgpa')";
        $result = mysqli_query($conn, $sql);
		header("Location: ../home.php");

	}
	
