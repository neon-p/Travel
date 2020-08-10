<?/*php
session_start();
$c=$_SESSION['city'];
session_destroy();*/?>
<?php
    include("dbconnect.php");

    if(isset($_POST["login"])){
      $email = $_POST["email"];
      $password = $_POST["password"];
      
      if(!empty($email) && !empty($password)){
        $sql = "SELECT password, user_id FROM `user` WHERE email LIKE \"$email\"";
        $sql1=$con->query($sql);
        $row=$sql1->fetch_assoc();
        
        if($row["password"]== $password){
          // $_SESSION["email"]=$_POST["email"];
          //$_SESSION["user_id"]=$row["user_id"];
            header("location:signup.php");
        }else{
          echo $email;
          echo "wrongpass";
        }
      }else{
        echo "All field must be filled up";
      }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/modal.js"></script>
  <link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body style="background-color:  #F0F8FF;">
    <header>
    <!-- heading website name in navbar-->
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color:white;">
        <a class="navbar-brand" style="font-weight: 600;" href="home.php">The Book Train</a>
        
      <!-- 2nd part of navigation -->
        <div class="ml-auto order-0">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          
          <div class="collapse navbar-collapse" id="navbarContent">
                <ul class="navbar-nav mr-auto">
                  <li class="nav-item">
                  <button type="button" class="btn btn-primary" id="myBtn" data-toggle="modal" data-target="" style="margin-left:4.3%;margin-right:auto;display:block;margin-top:0.5%;margin-bottom:auto;">Sign Up</button>
                  </li>
                  <li class="nav-item">
                    <button type="button" class="btn btn-primary" id="myBtn1" data-toggle="modal" data-target="" style="margin-left:7.3%;margin-right:auto;display:block;margin-top:0.5%;margin-bottom:auto;">Sign In</button>
                  </li>
                  <li class="nav-item">
                  <li class="nav-item">
                    <button type="button" class="btn btn-primary" id="myBtn1" data-toggle="modal" data-target="#myModal" style="margin-left:10.3%;margin-right:auto;display:block;margin-top:0.5%;margin-bottom:auto;">About us</button>
                  </li>
                  </li>
                </ul>
          </div> 
        </div> 
    </nav>
    </header> 
<!-- carousel -->
<div id="demo" class="carousel slide" data-ride="carousel">

  <!-- Indicators -->
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>
  
  <!-- The slideshow -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="f2.jpg" alt="Cox's Bazar" width="1100" height="500">
    </div>
    <div class="carousel-item">
      <img src="f2.jpg" alt="Sitakundo" width="1100" height="500">
    </div>
    <div class="carousel-item">
      <img src="f2.jpg" alt="Saint Martin" width="1100" height="500">
    </div>
  </div>
  
  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>

  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-primary" id="myBtn" data-toggle="modal" data-target="#myModal" style="margin-left:46.3%;margin-right:auto;display:block;margin-top:0.5%;margin-bottom:auto;">Sign In</button>
</br>

<div class="container">

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
        <h2>About Us </h2>

        </div>
        <div class="modal-body" style="padding:40px 50px;">
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
        </div>
        <div class="modal-footer">

              
        </div>
      </div>
    </div>
      <!-- Modal -->
  <div class="modal fade" id="signupModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
          <button type="button" class="close" data-dismiss="modal">&times </button>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
          <form role="form" method="post" action="home.php">
            <div class="form-group">
              <label for="email"><span class="glyphicon glyphicon-user"></span>Email</label>
              <input type="text" class="form-control" name="email" placeholder="Enter email">
            </div>
            <div class="form-group">
              <label for="password"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
              <input type="password" class="form-control" name="password" placeholder="Enter password">
            </div>
              <button type="submit" class="btn btn-success btn-block" name="login"><span class="glyphicon glyphicon-off"></span> Login</button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal" style="margin-left:5%;margin-right:auto;display:block;margin-top:0.5%;margin-bottom:auto;"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
              <div class="text">
                   <p>Not a member? <a href="signup.php">Sign Up</a></p>
                   <p>Forgot <a href="forgetpass.php">Password?</a></p>
              </div>
        </div>
      </div>
    </div>
  </div> 
</div>  

  <script src="js/jquery-slim.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.min.js"></script>
</body>
</html>
