<?php
    session_start();
    include("dbconnect.php");
	$check=$_SESSION["password"];
			
		if(!empty($check)){
			$sql = "SELECT email FROM `admin` WHERE password='$check'";
			$sql1=mysqli_query($con,$sql);
			$row=mysqli_num_rows($sql1);
			$f_l=$row["password"];
			if($f_l==1){
				$con->close();
			}
		}else{
				header("location: home.php");
				$con->close();
			}
?>