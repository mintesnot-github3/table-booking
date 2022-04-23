<?php
require('../db_connect.php');
if(!empty($_POST['id']) && !empty($_POST['number_of_beds']) && !empty($_POST['type']) && !empty($_POST['remain_rooms']) && !empty($_POST['price'])){
    
    $id = $_POST['id'];
    $type = $_POST['type'];
    $beds = $_POST['number_of_beds'];
    $room = $_POST['remain_rooms'];
    $price = $_POST['price'];


    $update = "update room_type set room_type='$type', no_of_beds='$beds', remain_rooms='$room', price='$price' where id='$id'";
    $run = mysqli_query($con, $update);
    if($run){
        echo '<script>window.alert("Successfully updated.");
                location.href="room.php";</script>';
    }
}
?>