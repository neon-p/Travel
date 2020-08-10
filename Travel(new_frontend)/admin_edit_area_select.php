<?php
session_start();
include("dbconnect.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <title>Travel Guide</title>
  <link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="css/flexslider.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
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
              <li><a href="#home">Home</a></li>
              <li><a href="#about">About Us</a></li>
              <li><a href="#contact">Contact</a></li>
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

  <div id="contact">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
          <div class="contact-heading">
          </div>
        </div>
      </div>
    </div>
  </div>


  <!--about-->
  <div id="about">

    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
          <div class="about-heading">
			<h1>Area Select</h1>
			<br>
      <form class="form" method="post" action="admin_edit_area_select.php" style="margin-left: 22%">
                  <div class="row" style="padding-right: 30%">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="Division">Select Division</label> 
                        <select  class="btn btn-primary" style="border-radius:5px;" name="division_id" id="division_id" onchange="division();">
                          <option>Division</option>
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
                        <label for="City">Select City</label>
                        <br>
                        <select  class="btn btn-primary" style="border-radius:5px;" name="city_id" id="city_id" onchange="city();">
                          <option>City</option>

                        </select>
                      </div>
                    </div>
                    <a class="btn btn-primary" href="admin_edit_place.php" style="border-radius:5px;margin-left: 50%">Next</a>
                  </div>
                </form>
          </div>
        </div>
      </div>
    </div>
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