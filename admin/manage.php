<?php
require('includes/header.php');
require('../db_connect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <style>
  body{
    background-image:linear-gradient(to right, #00A4C6, #FEF1F6,#A0C1DA);
  }
  

  </style>
  </head>
<body>
<div class="container">
<?php
$select = "select * from user";
$run = mysqli_query($con, $select);
if(mysqli_fetch_row($run) > 0){
    $table = "<table class='table'><tr><th>Name</th><th>Email</th><th>Phone number</th><th>Number of books</th></tr>";
    $run = mysqli_query($con, $select);
    while($fetch=mysqli_fetch_assoc($run)){
        $id = $fetch['id'];
        $name = $fetch['fname'].' '.$fetch['lname'];
        $email = $fetch['email'];
        $phone = $fetch['phone_no'];
        
        $select = "select * from book where user_id='$id'";
        $runn = mysqli_query($con, $select);
        $count = 0; 
        while(@mysqli_fetch_assoc($runn)){
            $count++;
        }
        
        $table .= "<tr><td>$name</td><td>$email</td><td>$phone</td><td>$count</td></tr>";
    }
    $table .= "</table>";
    echo $table;
}
?>
</div>
<?php
?>