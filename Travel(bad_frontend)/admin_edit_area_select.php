<?php
session_start();
include("dbconnect.php");
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
  <script>
    function division()
    {
       var division_id= document.getElementById("division_id").value;
      $.ajax({
        type: 'post',
        url: 'city_data_fetch.php',
        data: {
          division_id:division_id },
          success: function (html) {
            $('#city_id').html(html);
          }
        });
    }
  </script>
  <script>
    function city()
    {
       var city_id= document.getElementById("city_id").value;
      $.ajax({
        type: 'post',
        url: 'city_id_fetch.php',
        data: {
          city_id:city_id },
          success: function (html) {
            $('#test').html(html);
          }
        });
    }
  </script>
  <title>Admin Division Select</title>
</head>
<body style="background-color:  #F0F8FF;">
    <header>
      <div id="test">
        
      </div>
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
                      <a class="nav-link" style="font-weight: 600;" href="logout.php">Logout</a>
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
                <h2 class="section_title">Admin Area Add</h2>
              </div>
                <form class="form" method="post" action="admin_edit_area_select.php" style="margin-left: 22%">
                  <div class="row" style="padding-right: 30%">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="Division">Division</label> 
                        <select  class="btn btn-primary" name="division_id" id="division_id" onchange="division();">
                          <option>Select Division</option>
                          <?php
                          $query = "SELECT * FROM `division`";
                          $stmt = mysqli_query($con, $query);
                          while ($row = mysqli_fetch_array($stmt))
                          {
                            echo '<option value="'.$row['division_id'].'">'.$row['division_name'].'</option>';
                          }
                          ?>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group ">
                        <label for="City">City</label>
                        <br>
                        <select  class="btn btn-primary" name="city_id" id="city_id" onchange="city();">
                          <option>Select City</option>

                        </select>
                      </div>
                    </div>
                    <a class="btn btn-primary" href="admin_edit_place.php" style="margin-left: 75.8%">Next</a>
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