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
	$cgpa = test_input($_POST['CGPA']);

	if (empty($regNum)) {
		header("Location: ../editGrades.php?error=User Name is Required");
	}else if (empty($cgpa)) {
		header("Location: ../editGrades.php?error=CGPA is Required");
	}else {

        $sql = "SELECT * FROM marks WHERE Registration_Number='$regNum'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) == 1) {
        
            $sql = "UPDATE marks SET CGPA='$cgpa' where Registration_Number='$regNum'";   
            $result = mysqli_query($conn, $sql);
		    header("Location: ../home.php");
        }
        else{
            header("Location: ../editGrades.php?error=Registration number does not exist");
        }

	}
	
