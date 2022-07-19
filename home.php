<?php 
   session_start();
   include "db_conn.php";
   if (isset($_SESSION['username']) && isset($_SESSION['id'])) {   ?>

<!DOCTYPE html>
<html>
<head>
	<title>HOME</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<style type="text/css">
.mylinks div{
    float:left;  
    margin:0 5px; 
}

</style>
</head>
<body>
      <div class="container d-flex justify-content-center align-items-center"
      style="min-height: 100vh">
      	<?php if ($_SESSION['role'] == 'admin') {?>
      		<!-- For Admin -->
      		<div class="card" style="width: 18rem;">
			  <img src="img/admin-default.png" 
			       class="card-img-top" 
			       alt="admin image">
			  <div class="card-body text-center">
			    <h5 class="card-title">
			    	<?=$_SESSION['name']?>
			    </h5>
			    <a href="logout.php" class="btn btn-dark">Logout</a>
				<br><b>Logged in as <?=$_SESSION['role']?></b>
			  </div>
			</div>
			<div class="p-3">
				<?php include 'php/members.php';
                 if (mysqli_num_rows($res) > 0) {?>
                  
				<h1 class="display-4 fs-1">Members</h1>
				<table class="table" 
				       style="width: 32rem;">
				  <thead>
				    <tr>
				      <th scope="col">#</th>
				      <th scope="col">Name</th>
				      <th scope="col">User name</th>
				      <th scope="col">Role</th>
				    </tr>
					<div class="mylinks">
     					<a href='addUsers.php' class='btn btn-dark'>Add Users</a>
     					<a href='editUsers.php' class='btn btn-dark'>Edit Users</a>
   					    <a href='deleteUsers.php' class='btn btn-dark'>Delete Users</a>
					</div>

				  </thead>
				  <tbody>
				  	<?php 
				  	$i =1;
				  	while ($rows = mysqli_fetch_assoc($res)) {?>
				    <tr>
				      <th scope="row"><?=$i?></th>
				      <td><?=$rows['name']?></td>
				      <td><?=$rows['username']?></td>
				      <td><?=$rows['role']?></td>
				    </tr>
				    <?php $i++; }?>
				  </tbody>
				</table>
				
				<?php }?>
			</div>
			<br>
			<div class="p-3">
			<?php include 'php/marks.php';
                 if (mysqli_num_rows($res) >= 0) {?>
                  
				<h1 class="display-4 fs-1">Student Grades</h1>
				<table class="table" 
				       style="width: 32rem;">
				  <thead>
				    <tr>
				      <th scope="col">#</th>
				      <th scope="col">Registration Number</th>
				      <th scope="col">Name</th>
				      <th scope="col">CGPA</th>
				    </tr>
					<div class="mylinks">
     					<a href='addGrades.php' class='btn btn-dark'>Add Grades</a>
     					<a href='editGrades.php' class='btn btn-dark'>Edit Grades</a>
						<a href='deleteGrades.php' class='btn btn-dark'>Delete Grades</a>
					</div>					
				  </thead>
				  <tbody>
				  	<?php 
				  	$i =1;
				  	while ($rows = mysqli_fetch_assoc($res)) {?>
				    <tr>
				      <th scope="row"><?=$i?></th>
				      <td><?=$rows['Registration_Number']?></td>
				      <td><?=$rows['Name']?></td>
				      <td><?=$rows['CGPA']?></td>
				    </tr>
				    <?php $i++; }?>
				  </tbody>
				</table>
				
				<?php }?>
			</div>
      	<?php }else if ($_SESSION['role'] == 'user'){ ?>
      		<!-- For Users -->
      		<div class="card" style="width: 18rem;">
			  <img src="img/user-default.png" 
			       class="card-img-top" 
			       alt="admin image">
			  <div class="card-body text-center">
			    <h5 class="card-title">
			    	<?=$_SESSION['name']?>
			    </h5>
			    <a href="logout.php" class="btn btn-dark">Logout</a>
				<br><b>Logged in as <?=$_SESSION['role']?></b>
			  </div>
			</div>
            <div class="p-3">
				<?php include 'php/marks.php';
                 if (mysqli_num_rows($res) >= 0) {?>
                  
				<h1 class="display-4 fs-1">Student Grades</h1>
				<table class="table" 
				       style="width: 32rem;">
				  <thead>
				    <tr>
				      <th scope="col">#</th>
				      <th scope="col">Registration Number</th>
				      <th scope="col">Name</th>
				      <th scope="col">CGPA</th>
				    </tr>
					<a href='addGrades.php' class='btn btn-dark'>Add Grades</a>
					
				  </thead>
				  <tbody>
				  	<?php 
				  	$i =1;
				  	while ($rows = mysqli_fetch_assoc($res)) {?>
				    <tr>
				      <th scope="row"><?=$i?></th>
				      <td><?=$rows['Registration_Number']?></td>
				      <td><?=$rows['Name']?></td>
				      <td><?=$rows['CGPA']?></td>
				    </tr>
				    <?php $i++; }?>
				  </tbody>
				</table>
				<?php }?>
			</div>
      	<?php }
		  else { ?>
			<!-- For Viewers -->
			<div class="card" style="width: 18rem;">
			<img src="img/user-default.png" 
				 class="card-img-top" 
				 alt="admin image">
			<div class="card-body text-center">
			  <h5 class="card-title">
				  <?=$_SESSION['name']?> 
			  </h5>
			  <a href="logout.php" class="btn btn-dark">Logout</a>
			  <br><b>Logged in as <?=$_SESSION['role']?></b>
			</div>
		  </div>
		  <div class="p-3">
			  <?php include 'php/marks.php';
			   if (mysqli_num_rows($res) >= 0) {?>
				
			  <h1 class="display-4 fs-1">Student Grades</h1>
			  <table class="table" 
					 style="width: 32rem;">
				<thead>
				  <tr>
					<th scope="col">#</th>
					<th scope="col">Registration Number</th>
					<th scope="col">Name</th>
					<th scope="col">CGPA</th>
				  </tr>			  
				</thead>
				<tbody>
					<?php 
					$i =1;
					while ($rows = mysqli_fetch_assoc($res)) {?>
				  <tr>
					<th scope="row"><?=$i?></th>
					<td><?=$rows['Registration_Number']?></td>
					<td><?=$rows['Name']?></td>
					<td><?=$rows['CGPA']?></td>
				  </tr>
				  <?php $i++; }?>
				</tbody>
			  </table>
			  <?php }?>
		  </div>
		<?php } ?>
      </div>
</body>
</html>
<?php }else{
	header("Location: index.php");
} ?>