<?php
  session_start();
?>
<?php
include ("dbconnect.php");
$city_id=$_SESSION["city_id"];
if (!empty($city_id)){
  $query = "SELECT `city_id` FROM `city` WHERE city_name='$city_id'";
  $stmt = mysqli_query($con, $query);
  while($row=mysqli_fetch_array($stmt)){
    $city_id=$row["city_id"];
  }

  $query1="SELECT * FROM `place` WHERE city_id='$city_id'";
  $result = mysqli_query($con, $query1);
  while($row=mysqli_fetch_array($result)){
    $place_id=$row["place_id"];
    $place_name=$row["place_name"];
    $place_details=$row["place_details"];
  }
  $query2="SELECT * FROM `place_images` WHERE place_id='$place_id'";
  $result2 = mysqli_query($con, $query2);
  while($row=mysqli_fetch_array($result2)){
      $image_path = "uploads/";
      $images[]=$image_path.$row['place_image'];
  }
    $_SESSION["place_id"]=$place_id;

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
  <title>Admin</title>
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
              <div class="section_title_container text-center">
              <div style="padding-right: 5%; padding-left: 5%;">
              <div class="row">
                <div class="col-md-4">
                      <div class="form-group">
                          <label for="Place Name" style="color: black"><strong>Place Name</strong></label>
                          <br>
                          <h5><?php echo $place_name;?></h5>
                      </div>
                  </div>
              </div>
              <br>
              <div class="row">
                <div class=col-md-4>
                  <div class="form-group">
                          <label for="Place Details" style="color: black"><strong>Place Details</strong></label>
                          <br>
                          <embed src="PDF/<?php echo $place_details;?>" type="application/pdf"   height="700px" width="500">
                  </div>
                </div>
              </div>
              <br>
                <div class="row">
                <div class=col-md-4>
                  <div class="form-group">
                          <a href="details_view.php" style="color: black"><strong>View all Images</strong></a>
                          <br>
                  </div>
                </div>
              </div>               
              </div>
            </div>
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