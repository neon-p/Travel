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

  <!--slider-->
  <div id="slider" class="flexslider">
    <ul class="slides">
      <li>
        <img src="images/1.jpg">
        <div class="caption" style="padding-left:30%;padding-top:21%;">
          <h3 style="color: #f7f5f5;text-shadow: 1px 1px 1px">Bichnakandi</h3>
        </div>
      </li>
      <li>
        <img src="images/2.jpg">
        <div class="caption" style="padding-left:31%;padding-top:21%;">
        <h3 style="color: #f7f5f5;text-shadow: 1px 1px 1px">Kuakata</h3>
        </div>
      </li>
      <li>
        <img src="images/3.jpg">
        <div class="caption" style="padding-left:30%;padding-top:21%;">
        <h3 style="color: #f7f5f5;text-shadow: 1px 1px 1px">Madobkundo</h3>
        </div>
      </li>
    </ul>
  </div>

  <!--about-->
  <div id="about">
  <div id="about-bg">
    <div class="container">
      <div class="row">
        <div class="about-bg-heading">
          <h3 style="text-transform:none;"><a href="admin_add_division_select.php">Add</a> or <a href="admin_edit_area_select.php">Edit</a> Place</h3>
        </div>
      </div>
    </div>
  <div class="cover"></div>
</div>
</div>

  <!--about-->
  <div id="about">

    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
          <div class="about-heading">
            <h1>About</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent metus magna,malesuada porta elementum
              vitae.</p>
          </div>
        </div>
      </div>
    </div>
</div>

  <!--contact-->
  <div id="contact">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
          <div class="contact-heading">
            <h1>Contact</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent metus magna,malesuada porta elementum
              vitae.</p>
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
