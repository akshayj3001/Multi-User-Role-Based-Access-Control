<?php 
   session_start();
   include "db_conn.php";
   if (isset($_SESSION['username']) && isset($_SESSION['id']) && $_SESSION['role']=='admin') {   ?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit Grades</title>
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
              action="php/editGrade.php" 
      	      method="post" 
      	      style="width: 450px;">
      	      <h1 class="text-center p-3">EDIT GRADE</h1>
      	      <?php if (isset($_GET['error'])) { ?>
      	      <div class="alert alert-danger" role="alert">
				  <?=$_GET['error']?>
			  </div>
			  <?php } ?>
          <div class="mb-3">
		    <label for="Registration_Number" 
		           class="form-label">Registration Number</label>
		    <input type="text" 
		           class="form-control" 
		           name="Registration_Number" 
		           id="Registration_Number">
		  </div>    
		  <div class="mb-3">
		    <label for="CGPA" 
		           class="form-label">CGPA</label>
		    <input type="text" 
		           name="CGPA" 
		           class="form-control" 
		           id="CGPA">
		  </div>
		  		 
		  <button type="submit" 
		          class="btn btn-primary">EDIT GRADE</button>
		</form>
      </div>
</html>
<?php }else{
	header("Location: index.php");
} ?>