<?php
require('../includes/header.php');
require('../db_connect.php');

    $msg_error = '';
        if(!empty($_POST['email']) && !empty($_POST['password'])){
            $email = $_POST['email'];
            $pwd = md5($_POST['password']);
            
            $check_phone = "select * from user where email='$email'";
            $run_check_phone = mysqli_query($con, $check_phone);
            if(@mysqli_fetch_row($run_check_phone) > 0){
                $run_check_phone = mysqli_query($con, $check_phone);
                $fetch_check_phone = @mysqli_fetch_assoc($run_check_phone);
                $exact_pwd = $fetch_check_phone['password'];
                
                if($exact_pwd == $pwd){
                    
                    $_SESSION["userlog"] = $email;
                    header('location: ../index.php');
                }else{
                    $msg_error = "<div style='color:red'>Email and password doesn't match</div>";
                }
            }else{
                    $msg_error = "<div style='color:red'>Email and password doesn't match</div>";
            }
        }
        
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Book</title>
    <style>
    
    body{
        background-image:linear-gradient(to right, #00A4C6, #FEF1F6,#A0C1DA);
    }
    </style>
</head>
<br>

<div class="container">
<div class="row">
<div class="col-md-3"></div>
<div class="col-md-6">
 <form action="" method="post">
            <?php echo @$msg_error; ?>
  <div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control" id="email" name="email" aria-describedby="email" required placeholder="Email">
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" name="password" aria-describedby="password" required placeholder="Password">
  </div>
  <button type="submit" class="btn btn-primary" style="width:100%;" id="loginbtn">Login</button>
  <br>
  <a href="register.php" class="btn btn-success" style="width:100%">Create account</a>
</form>
</div>
<div class="col-md-3"></div>
</div>
</div>