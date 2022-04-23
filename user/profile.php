<?php
require('../includes/header.php');
require('../db_connect.php');
if(isset($_SESSION['userlog'])){
    $email = $_SESSION['userlog'];
    $select = "select * from user where email='$email'";
    $run = mysqli_query($con, $select);
    $fetch = mysqli_fetch_assoc($run);
    $id = $fetch['id'];
    $name = $fetch['fname'].' '.$fetch['lname'];
    $phone = $fetch['phone_no'];
    
    $select = "select * from book where user_id='$id'";
    $runn = mysqli_query($con, $select);
    $count = 0; 
    while(@mysqli_fetch_assoc($runn)){
        $count++;
    }
        
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <style>
    
    body{
        background-image:linear-gradient(to right, #00A4C6, #FEF1F6,#A0C1DA);
    }
    </style>
</head>
<body>
    <div class="container">
        <ul style="list-style: none">
        <li><b>Name:</b> <?php echo $name; ?></li>
        <li><b>Email:</b> <?php echo $email; ?></li>
        <li><b>Phone number:</b> <?php echo $phone; ?></li>
        <li><b>Number of books:</b> <?php echo $count; ?></li>
        <li><a class="btn btn-primary" href="book.php">Show books</a></li>
    </ul>
    </div>
</body>
</html>
<?php
}
?>