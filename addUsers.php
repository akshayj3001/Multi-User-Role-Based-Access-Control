<?php 
   session_start();
   include "db_conn.php";
   if (isset($_SESSION['username']) && isset($_SESSION['id']) && $_SESSION['role']=='admin') {   ?>

<!DOCTYPE html>
<html>
<head>
	<title>Add Users</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<link rel='stylesheet' href = 'style.css'>
</head>
	<nav>
		<div class='nav-links'>
			<h4> <a href='home.php'>Home</a> </h4>
		</div>
	</nav>

<div class="container d-flex justify-content-center align-items-center"
      style="min-height: 100vh">
      	<form class="border shadow p-3 rounded"
              action="php/addUser.php" 
      	      method="post" 
      	      style="width: 450px;">
      	      <h1 class="text-center p-3">ADD USER</h1>
      	      <?php if (isset($_GET['error'])) { ?>
      	      <div class="alert alert-danger" role="alert">
				  <?=$_GET['error']?>
			  </div>
			  <?php } ?>
          <div class="mb-3">
		    <label for="name" 
		           class="form-label">Name</label>
		    <input type="text" 
		           class="form-control" 
		           name="name" 
		           id="name">
		  </div>    
		  <div class="mb-3">
		    <label for="username" 
		           class="form-label">User name</label>
		    <input type="text" 
		           class="form-control" 
		           name="username" 
		           id="username">
		  </div>
		  <div class="mb-3">
		    <label for="password" 
		           class="form-label">Password</label>
		    <input type="password" 
		           name="password" 
		           class="form-control" 
		           id="password">
		  </div>
		  <div class="mb-1">
		    <label class="form-label">Select User Type:</label>
		  </div>
		  <select class="form-select mb-3"
		          name="role" 
		          aria-label="Default select example">
			  <option selected value="viewer">Viewer</option>
			  <option value="user">User</option>
			  <option value="admin">Admin</option>
		  </select>
		 
		  <button type="submit" 
		          class="btn btn-primary">CREATE USER</button>
		</form>
      </div>
</html>
<?php }else{
	header("Location: index.php");
} ?>