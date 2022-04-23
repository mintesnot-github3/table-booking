<?php
require('../includes/header.php');
require('../db_connect.php');
if(isset($_SESSION['userlog'])){
if(!empty($_GET['id'])){
    $room_id = $_GET['id'];
    $select = "select * from room_type where id='$room_id'";
    $run = mysqli_query($con, $select);
    $fetch = mysqli_fetch_assoc($run);
    
    $room_type = $fetch['room_type'];
    $price = $fetch['price'];
    $no_of_bed = $fetch['no_of_beds'];
    $img = $fetch['img'];
    $remain_room = $fetch['remain_rooms'];
    if($remain_room == 0){
        $msg = "No free room for today";
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
    <h3><?php echo $room_type; ?></h3>
    
    <div class="row">
        <div class="col-md-4">
            <form action="book.php?id=<?php echo $room_id; ?>" method="post">
        <label for="rooms" class="form-label">Number of rooms</label>
        <input class="form-control" type="number" min="1" value="1" max="<?php echo $remain_room; ?>" name="no_of_room" placeholder="Number of rooms" required>
        <label for="check in" class="form-label">Check in</label>
        <input class="form-control" type="date" name="start_date" required>
        <label for="check out" class="form-label">Check out</label><input class="form-control" type="date" name="end_date" required>
        <label for="check in" class="form-label">Mode of payment</label>
        <input class="form-control" type="text" name="bankname" required placeholder="Bank name"><br>
        <input class="form-control" type="number" name="banknum" required placeholder="Bank account number"><br>
        <button type="submit" class="btn btn-success">Reserve room</button>
    </form>
        </div>
    </div>
    
</div>
<?php
}else{
    header('../room.php');
}
}else{
    echo '<script>window.alert("You must login to reserve room.");
    location.href="../user/login.php";</script>';
}
?>