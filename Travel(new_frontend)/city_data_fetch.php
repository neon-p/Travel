<?php
include("dbconnect.php");
if(isset($_POST['division_id']))
{

	echo '<option value="">City</option>';
	$division_id=$_POST['division_id'];
	$query = "SELECT * FROM `city` WHERE division_id='$division_id'";
	$stmt = mysqli_query($con, $query);
	while ($row = mysqli_fetch_array($stmt))
	{
		echo '<option value="'.$row['city_id'].'">'.$row['city_name'].'</option>';
	}
}
?>