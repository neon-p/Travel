<?php
  session_start();
  include("dbconnect.php");
?>
<?php
  if(isset($_POST["login"])){
      $email = $_POST["email"];
      $password = $_POST["password"];
      
      if(!empty($email) && !empty($password)){
        $sql = "SELECT * FROM `admin` WHERE email='$email' AND password='$password'";
        $sql1=mysqli_query($con,$sql);
        while($row=mysqli_fetch_array($sql1)){
          $email_R= $row['email'];
          $password_R=$row['password'];
        }
        $_SESSION["password"]=$password;
        header("Location: admin_home.php");
        }else{
          echo "wrongpass";
        }
      }else{
        echo "All field must be filled up";
      }
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Admin</title>
<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $("#adminModal").modal('show');
    });
</script>
</head>
<body>
<div id="adminModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header"> 
                <h4 class="modal-title">Admin Login</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
            </div>
            <div class="modal-body">
                <form role="form" method="post" action="admin.php" style="padding-left: 30%;">
                   <div class="form-row" >
                      <div class="form-group col-md-6">
                        <label for="inputEmail4">Email</label>
                        <input type="Email" class="form-control" name="email" placeholder="Email" required>
                      </div>
                   </div>
                   <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="inputEmail4">Password</label>
                        <input type="Password" class="form-control" name="password" placeholder="Password" required>
                      </div>
                   </div>
                     <button type="submit" class="btn btn-outline-primary" style="font-weight: 600;margin-left: 14%;" name="login">Login</button>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>