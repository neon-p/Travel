<?php 
	session_start();
?>
<?php
	include ("dbconnect.php");
	$city_id=$_SESSION["city_id_for_delete"];
	$query = "DELETE FROM `place` WHERE city_id='$city_id'";
	$stmt = mysqli_query($con, $query);
	if($stmt){
		$query1 = "DELETE FROM `city` WHERE city_id='$city_id'";
		$stmtt=mysqli_query($con, $query1);
		if($stmtt){
			header("location: admin_home.php");
		}
	}
	session_destroy();
?>