<?php
require('includes/header.php');
require('db_connect.php');
if(!empty($_GET['key'])){
    $key = $_GET['key'];

    $show = false;
    $select = "select * from room_type where room_type LIKE '$key %'";
    $run = mysqli_query($con, $select);
    if(mysqli_fetch_row($run) > 0){
        $run = mysqli_query($con, $select);
        $fetch = mysqli_fetch_assoc($run);

        $id = $fetch['id'];
        $type = $fetch['room_type'];
        $beds = $fetch['no_of_beds'];
        $price = $fetch['price'];
        $img = $fetch['img'];

        $show = true;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Search</title>
    <style>
    
    body{
        background-image:linear-gradient(to right, #00A4C6, #FEF1F6,#A0C1DA);
    }
    </style>
</head>
<div class="container" style="margin-top:10px;">
<?php
if($show == true){
?>
    <div class="row">
        <div class="col-md-6">
            <img src="images/<?php echo $img; ?>" width="400px" height="275px">
        </div>
        <div class="col-md-6">
            Room type: <?php echo $type; ?><br>
            Number of beds: <?php echo $beds; ?><br>
            Price: <?php echo $price; ?>ETB<br>
            <a href="book/index.php?id=<?php echo $id; ?>" class="btn btn-primary">Book</a>
        </div>
    </div>
<?php } ?>
</div>
<?php
}
?>
