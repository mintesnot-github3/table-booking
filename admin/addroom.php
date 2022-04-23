<?php
   require('includes/header.php');
  require('../db_connect.php');
    $msg_error = '';
        if(!empty($_POST['type']) && !empty($_POST['beds']) && !empty($_POST['rooms']) && !empty($_POST['price'])){
            
            $image = $_FILES['picture']['name'];
            $type = $_POST['type'];
            $beds = $_POST['beds'];
            $rooms = $_POST['rooms'];
            $price = $_POST['price'];
            $target_dir = "../images/";
            
            
            $target_file = $target_dir . basename($_FILES["picture"]["name"]);
            move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file);
            
            $insert = "insert into room_type (room_type, no_of_beds, price, remain_rooms, img) values ('$type', '$beds', '$price', '$rooms', '$image')";
            $run = mysqli_query($con, $insert);
            if($run){
                echo '<script>location.href="room.php"</script>';
              //  header('location: advertisement.php');
            }else{
                echo mysqli_error($con);
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
<body>
<div class="container">
<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
        <form action="" method="post" enctype="multipart/form-data">
            <?php echo $msg_error; ?>
            <div class="mb-3">
    <label for="fname" class="form-label">Room type</label>
    <input type="text" class="form-control" id="type" name="type" aria-describedby="name" required placeholder="Room type">
  </div>
  <div class="mb-3">
    <label for="fname" class="form-label">Number of beds</label>
    <input type="number" min="1" class="form-control" id="beds" name="beds" aria-describedby="name" required placeholder="Number of beds">
  </div>
  <div class="mb-3">
    <label for="fname" class="form-label">Total rooms</label>
    <input type="number" min="1" class="form-control" id="rooms" name="rooms" aria-describedby="name" required placeholder="Total rooms">
  </div>
  <div class="mb-3">
    <label for="fname" class="form-label">Price</label>
    <input type="text" class="form-control" id="price" name="price" aria-describedby="name" required placeholder="Price">
  </div>
      <div class="mb-3">
    <input type="file" class="form-control" id="picture" name="picture" placeholder="picture">
<!-- our custom upload button -->
  </div>
  <button type="submit" class="btn btn-primary" style="width:100%" id="addbtn">Register room</button>
</form>
    </div>
    <div class="col-md-4"></div>
</div>
</div>