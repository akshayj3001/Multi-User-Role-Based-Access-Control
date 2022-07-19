<?php  
session_start();
include "../db_conn.php";

	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}

	$username = test_input($_POST['username']);
	$password = test_input($_POST['password']);
	$role = test_input($_POST['role']);

	if (empty($username)) {
		header("Location: ../editUsers.php?error=User Name is Required");
	}else if (empty($password)) {
		header("Location: ../editUsers.php?error=Password is Required");
	}else {

        $sql = "SELECT * FROM users WHERE username='$username'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) >= 1) {
            // Hashing the password
		    $password = md5($password);
        
            $sql = "UPDATE users SET password='$password',role='$role' where username='$username'";   
            $result = mysqli_query($conn, $sql);
		    header("Location: ../home.php");
        }
        else{
            header("Location: ../editUsers.php?error=Username does not exist");
        }

	}
	
