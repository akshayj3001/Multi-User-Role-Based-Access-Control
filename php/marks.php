<?php  

if (isset($_SESSION['username']) && isset($_SESSION['id'])) {
    
    $sql = "SELECT * FROM marks ORDER BY CGPA DESC";
    $res = mysqli_query($conn, $sql);
}else{
	header("Location: index.php");
} 