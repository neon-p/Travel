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
		$_SESSION["place_name"]=$place_name;

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
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="css/bootstrap.min.css">
  	<script src="js/modal.js"></script>
  	<link rel="stylesheet" type="text/css" href="style.css"/>
  	<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
  	<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  	<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
  	<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
  	<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
  	<link rel="stylesheet" type="text/css" href="styles/main_styles.css">
  	<link rel="stylesheet" type="text/css" href="styles/responsive.css">
	<title>Admin Division Select</title>
</head>
<body style="background-color:  #F0F8FF;">
    <header>
    <!-- heading website name in navbar-->
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color:white;">
        <a class="navbar-brand" style="font-weight: 600;" href="home.php">Travel Guide</a>
        
      <!-- 2nd part of navigation -->
        <div class="ml-auto order-0">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          
          <div class="collapse navbar-collapse" id="navbarContent">
                <ul class="navbar-nav mr-auto">
                  <li class="nav-item">
                      <a class="nav-link" style="font-weight: 600;" href="home.php">Home</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" style="font-weight: 600;" href="#">Contact</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" style="font-weight: 600;" href="#">Contact</a>
                  </li>
                </ul>
          </div> 
        </div> 
    </nav>
    </header>

    <div class="team" id="About">
	<div class="team_background parallax-window" data-parallax="scroll" data-image-src="image/background.jpg" data-speed="0.8"></div>
		<div class="container">
			<div class="row team_row" style="margin-left: 16%">
				<div class="col-md-10 col-sm-4 team_col">
					<div class="team_item">
						<div class="team_body">
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
							  <div class="">
							  	<div class="form-group">
							  		<embed src="PDF/<?php echo $place_details;?>" type="application/pdf"   height="700px" width="500">
							  	</div>
							  </div>
							  <div class="">
							  	<div class="form-group">
							  		<button type="submit" class="btn btn-primary" style="margin-left: 31%" name="update">Update</button>
							  		<br>
							  		<br>
							  		<button type="submit" class="btn btn-primary" style="margin-left: 31%" name="delete">Delete</button>
							  		<br>
							  		<br>
							  		<button type="submit" class="btn btn-primary" style="margin-left: 31%" name="discard">Discard</button>
							  		<br>
							  		<br>
							  		<a class="btn btn-primary" href="admin_add_new_images.php" style="margin-left: 31%">Update Images</a>
							  	</div>
							  </div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	

	<!-- Footer -->

	<footer class="footer">
		<div class="footer_background" style="background-image:url(image/footer_background.png)"></div>
		<div class="container">
			<div class="row footer_row">
				<div class="col">
					<div class="footer_content">
						<div class="row">

							<div class="col-lg-4 footer_col">
					
								<!-- Footer About -->
								<div class="footer_section footer_about">
									<div class="footer_logo_container">
										<a href="#">
											<div class="footer_logo_text"><span>Travel Guide</span></div>
										</a>
									</div>
									<div class="footer_about_text">
										<p>Lorem ipsum dolor sit ametium, consectetur adipiscing elit.</p>
									</div>
									<div class="footer_social">
										<ul>
											<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
											<li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
											<li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
											<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
										</ul>
									</div>
								</div>
								
							</div>

							<div class="col-lg-4 footer_col">
					
								<!-- Footer Contact -->
								<div class="footer_section footer_contact">
									<div class="footer_title" id="Contact">Contact Us</div>
									<div class="footer_contact_info">
										<ul>
											<li>Email: abcd@gmail.com</li>
											<li>Phone:  111111111111</li>
											<li>Ssssssssssssssssssssssss</li>
										</ul>
									</div>
								</div>
								
							</div>

							<div class="col-lg-4 footer_col">
					
								<!-- Footer links -->
								<div class="footer_section footer_links">
									<div class="footer_title">Contact Us</div>
									<div class="footer_links_container">
										<ul>
											<li><a href="index.html">Home</a></li>
											<li><a href="#About">About</a></li>
											<li><a href="#Contact">Contact</a></li>
											<li><a href="#">FAQs</a></li>
										</ul>
									</div>
								</div>
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>

  <script src="js/jquery-slim.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-3.2.1.min.js"></script>
  <script src="styles/bootstrap4/popper.js"></script>
  <script src="styles/bootstrap4/bootstrap.min.js"></script>
  <script src="plugins/greensock/TweenMax.min.js"></script>
  <script src="plugins/greensock/TimelineMax.min.js"></script>
  <script src="plugins/scrollmagic/ScrollMagic.min.js"></script>
  <script src="plugins/greensock/animation.gsap.min.js"></script>
  <script src="plugins/greensock/ScrollToPlugin.min.js"></script>
  <script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
  <script src="plugins/easing/easing.js"></script>
  <script src="plugins/parallax-js-master/parallax.min.js"></script>
  <script src="js/custom.js"></script>
</body>
</html>