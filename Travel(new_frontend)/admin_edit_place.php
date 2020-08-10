<?php 
	session_start();
?>
<?php
	include ("dbconnect.php");
	$city_id=$_SESSION["city_id"];
	$query = "SELECT `city_id` FROM `city` WHERE city_name='$city_id'";
	$stmt = mysqli_query($con, $query);
	while($row=mysqli_fetch_array($stmt)){
		$city_id=$row["city_id"];
	}
	$_SESSION['city_id_for_delete']=$city_id;
?>
<?php
	$query1="SELECT * FROM `place` WHERE city_id='$city_id'";
	$result = mysqli_query($con, $query1);
	while($row=mysqli_fetch_array($result)){
		$place_id=$row["place_id"];
		$place_name=$row["place_name"];
		$place_details=$row["place_details"];
	}
	if (!empty($place_id)){
		$_SESSION["place_id"]=$place_id;

		if(isset($_POST['update'])) {

		 	  $place_name = $_POST["place_name"];
		      $path=$_FILES["place_details"]["name"];
		      $target_dir = "PDF/";
			  $target_file = $target_dir.basename($path);

		        $query = "UPDATE `place` SET `place_name`='$place_name',`place_details`='$path' WHERE city_id = '$city_id' ";
		        if(mysqli_query($con, $query)){
		          move_uploaded_file($_FILES["place_details"]["tmp_name"], $target_file);
				  echo "<script> alert('Save Succesfully')</script>";
				  header("location:admin_edit_place");
		        }else{

		          echo "Data Not Saved";
		        }
		 }elseif(isset($_POST['delete'])){
		 	$query="DELETE FROM `place_images` WHERE place_id='$place_id'";
		 	if(mysqli_query($con, $query)){
		 		header("location: delete_data.php");
		 	}
		 }elseif(isset($_POST['discard'])){
		 	session_destroy();
			header("location:admin_home.php");
		 }
	}else{
		session_destroy();
		header("location:error.php");
	}
?>
<<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Travel Guide</title>
  <link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="css/flexslider.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
</head>

<body id="top" data-spy="scroll">
  <!--top header-->

  <header id="home">
    <!--main-nav-->

    <div id="main-nav">

      <nav class="navbar">
        <div class="container">

          <div class="navbar-header">
            <a href="home.php" class="navbar-brand">Travel Guide</a>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#ftheme">
              <span class="sr-only">Toggle</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
          </div>

          <div class="navbar-collapse collapse" id="ftheme">

            <ul class="nav navbar-nav navbar-right">
              <li><a href="home.php">Home</a></li>
              <li><a href="home.php/#contact">Contact</a></li>
			  <li><a href="home.php/#about">About Us</a></li>
			  <li>
                <div class="dropdown">
                  <button class="btn btn-primary" style="border-radius:5px;font-size:15px;" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">PLACE</button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <ul class="nav navbar-nav navbar-right">
                      <li><a class="dropdown-item" href="admin_add_division_select.php">Add Place</a></li>
                      <li><a class="dropdown-item" href="admin_edit_area_select.php">Edit Place</a></li>
                    </ul>
                  </div>
                </div>
            </li>
            </ul>

          </div>

        </div>
      </nav>
    </div>
  </header>


<div id="about">
<div class="container">
  <div class="row">
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
      <div class="about-heading">
	  <form class="form" method="post" action="admin_edit_place.php" enctype="multipart/form-data" style="margin-left: 22%">
							  <div class="row" style="padding-right: 30%">
								<div class="col-md-6">
									<div class="form-group">
										<label for="Place Name" style="color: black"><strong>Place Name</strong></label>
										<br>
										<input type="text" name="place_name" class="form-control" value="<?php echo $place_name;?>">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="Place Details" style="color: black"><strong>New File for Place Details</strong></label>
										<br>
										<input type="file" name="place_details" accept="application/pdf">
									</div>
								</div>
							  </div>
							  </div>
      </div>
    </div>
  </div>
</div>
<div class="container">
    <div class="col-xs-12 col-md-12" style="padding-left:17%;">
        <embed  src="PDF/<?php echo $place_details;?>" type="application/pdf"   height="700px" width="800px">
    </div>
</div>
<br>
<div class="">
	<div class=form-group>
	<button type="submit" class="btn btn-primary" style="border-radius:5px;margin-left: 46%" name="update">Update</button>
	<button type="submit" class="btn btn-primary" style="border-radius:5px;margin-left: " name="delete">Delete</button>
	<button type="submit" class="btn btn-primary" style="border-radius:5px;margin-left: " name="discard">Discard</button>
	<a class="btn btn-primary" href="admin_add_new_images.php" style="border-radius:5px;">Update Images</a>
	</div>
</div>
</div>
</div>

	<div class="">
		<div class="form-group">

			<br>
			<br>

		</div>
		</form>
  </div>


  <!--footer-->
  <div id="footer">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="footer-heading">
            <h3><span>About</span><span> Us</span></h3>
            <p>To explore strange new worlds to seek out new life and new civilizations to boldly go where no man has
              gone before. It's time to play the music.</p>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
          </div>
        </div>

        <div class="col-md-6">
          <div class="footer-heading">
            <h3><span>Connect</span><span> with</span><span> Us</span></h3>
            <ul>
                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-vk" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
            </ul>
          </div>

      </div>
    </div>
  </div>
  </div>

  <!-- jQuery -->
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.flexslider.js"></script>
  <script src="js/jquery.inview.js"></script>
  <script src="js/script.js"></script>
  <script src="contactform/contactform.js"></script>

</body>
</html>