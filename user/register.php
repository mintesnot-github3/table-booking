<?php
   require('../includes/header.php');
  require('../db_connect.php');
    $msg_error = '';
        if(!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['fname']) && !empty($_POST['lname']) && !empty($_POST['phone_no'])){
            
            $email = $_POST['email'];
            $pwd = md5($_POST['password']);
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $phone_no = $_POST['phone_no'];
            
            $check_phone_exist = "select * from user where email='$email'";
            $run_check_phone = mysqli_query($con, $check_phone_exist);
            if(@mysqli_fetch_row($run_check_phone) > 0){
                $msg_error = "<div style='color:red'>Email already exist</div>";
            }else{
                $check_phone_exist = "select * from user where phone_no='$phone_no'";
                $run_check_phone = mysqli_query($con, $check_phone_exist);
                if(@mysqli_fetch_row($run_check_phone) > 0){
                    $msg_error = "<div style='color:red'>Phone number already exist</div>";
                }else{
                $insert = "insert into user (fname, lname, email, phone_no, password) values ('$fname', '$lname', '$email', '$phone_no', '$pwd')";
                $run = mysqli_query($con, $insert);
                if($run){
                    header('location:login.php');
                }else{
                    $msg_error = "<div style='color:red'>Something went wrong. Try again.</div>";
                }
                }
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
<div class="container">
<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
        <form action="" method="post">
            <?php echo $msg_error; ?>
            <div class="mb-3">
    <label for="fname" class="form-label">First name</label>
    <input type="text" class="form-control" id="fname" name="fname" aria-describedby="fname" required placeholder="First name">
  </div>
  <div class="mb-3">
    <label for="fname" class="form-label">Last name</label>
    <input type="text" class="form-control" id="lname" name="lname" aria-describedby="lname" required placeholder="Last name">
  </div>
  <div class="mb-3">
    <label for="phone" class="form-label">Email</label>
    <input type="email" class="form-control" id="email" name="email" aria-describedby="email" required placeholder="Email">
  </div>
  <div class="mb-3">
    <label for="fname" class="form-label">Phone number</label>
    <input type="text" class="form-control" id="phone_no" name="phone_no" aria-describedby="phone_no" required placeholder="Phone number">
  </div>
  <div class="mb-3">
    <label for="phone" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" name="password" aria-describedby="password" required placeholder="Password">
    <div id="pwderror" style="color:red"></div>
  </div>
  <button type="submit" class="btn btn-primary" style="width:100%" id="loginbtn">Register</button>
  <div class="mb-3">
    <a href="login.php">Already have an account?</a>
  </div>
</form>
    </div>
    <div class="col-md-4"></div>
</div>
</div>
<?php
  //  require('../includes/footer.php');
    
?>