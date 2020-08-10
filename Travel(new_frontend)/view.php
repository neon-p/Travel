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
              <li><a href="home.php/#portfolio">Viewplace</a></li>
              <li><a href="home.php/#contact">Contact</a></li>
              <li><a href="home.php/#about">About Us</a></li>
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
        <h1><?php echo $place_name;?></h1>
        <p>In below we are showing about this place.</p>
      </div>
    </div>
  </div>
</div>
<div class="container">
    <div class="col-xs-12 col-md-12" style="padding-left:17%;">
        <embed  src="PDF/<?php echo $place_details;?>" type="application/pdf"   height="700px" width="800px">
    </div>
</div>
</div>
</div>

<div id="portfolio">
    <div class="portfolio-thumbnail">
      <div class="container-fluid">
        <div class="row">
          <?php
            for($i=0;$i<count($images);$i++){
              echo'<div class="col-md-8" style="padding-left:30px;padding-top:10px;">
                    <div class="item">
                      <img src="' .$images[$i]. '">
                    </div>
                  </div>';
            }
          ?> 
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
