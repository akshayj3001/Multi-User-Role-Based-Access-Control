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
    $name = test_input($_POST['name']);

	if (empty($username)) {
		header("Location: ../addUsers.php?error=User Name is Required");
	}else if (empty($password)) {
		header("Location: ../addUsers.php?error=Password is Required");
	}else if (empty($name)) {
		header("Location: ../addUsers.php?error=Name is Required");
	}else {

		// Hashing the password
		$password = md5($password);
        $sql = "SELECT * FROM users WHERE username='$username'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) == 0) {
			$sql = "INSERT into users (role, username, password, name) values ('$role','$username','$password','$name')";
        	$result = mysqli_query($conn, $sql);
			header("Location: ../home.php");

		}
		else{
			header("Location: ../addUsers.php?error=Username already exists");
		}
	}
	
