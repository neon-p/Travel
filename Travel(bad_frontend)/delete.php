<?php
	include('dbconnect.php');
?>

<?php
	if(isset($_GET['images_id'])){
    $images_id= $_GET['images_id'];
    $query1 = "DELETE FROM `place_images` WHERE images_id='$images_id'";
    $stmtt=mysqli_query($con, $query1);
    if($stmtt){
        header("location: delete_images.php");
    }
}
?>