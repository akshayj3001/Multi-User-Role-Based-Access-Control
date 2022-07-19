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
	$password = test_input($_POST['password']);

	if (empty($regNum)) {
		header("Location: ../deleteGrades.php?error=Registration Number is Required");
	}else if (empty($password)) {
		header("Location: ../deleteGrades.php?error=Master Password is Required");
	}else {

        $sql = "SELECT * FROM marks WHERE Registration_Number='$regNum'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) >= 1) {
            // Hashing the password
		    $password = md5($password);
            $sql = "SELECT * FROM users WHERE password='$password' && role='admin'";
            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result)>=1){
                $sql = "DELETE FROM marks WHERE Registration_Number='$regNum'";
                $result = mysqli_query($conn, $sql);
                header("Location: ../home.php");

            }
            else{
                header("Location: ../deleteGrades.php?error=Incorrect Admin Password");

            }
        }
        else{
            header("Location: ../deleteGrades.php?error=Registration Number does not exist");
        }
	}