<?php 
	session_start();
?>
<?php
	include ("dbconnect.php");
	if(isset($_POST["city_id"])){
		$city=$_POST["city_id"];
		$query = "SELECT `city_id` FROM `city` WHERE city_name='$city'";
		$stmt = mysqli_query($con, $query);
		while($row=mysqli_fetch_array($stmt)){
			$city=$row["city_id"];
		}
		$_SESSION["city_id"]=$city;
	}
?>