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

	if (empty($username)) {
		header("Location: ../deleteUsers.php?error=User Name is Required");
	}else if (empty($password)) {
		header("Location: ../deleteUsers.php?error=Admin Password is Required");
	}else {

        $sql = "SELECT * FROM users WHERE username='$username'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) >= 1) {
            // Hashing the password
		    $password = md5($password);
            $sql = "SELECT * FROM users WHERE password='$password' && role='admin'";
            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result)>=1){
                if($username =='akshay.jayakumar'){
                    header("Location: ../deleteUsers.php?error=Master User cannot be removed");
                }
                else{
                    $sql = "DELETE FROM users WHERE username='$username'";
                    $result = mysqli_query($conn, $sql);
                    header("Location: ../home.php");
                }
            }
            else{
                header("Location: ../deleteUsers.php?error=Incorrect Admin Password");
            }
        }
        else{
            header("Location: ../deleteUsers.php?error=Username does not exist");
        }
	}