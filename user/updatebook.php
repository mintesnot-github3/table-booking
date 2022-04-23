<?php
session_start();
require('../db_connect.php');
$user = $_SESSION['userlog'];
if(!empty($_POST['id']) && !empty($_POST['type']) && !empty($_POST['check_in']) && !empty($_POST['check_out']) && !empty($_POST['number_of_rooms'])){
    
    $selectuserid = "select * from user where email='$user'";
    $runselectuser = mysqli_query($con, $selectuserid);
    $fetch = mysqli_fetch_assoc($runselectuser);
    $userid = $fetch['id'];

    $bookid = $_POST['id'];
    $type = $_POST['type'];
    $check_in = $_POST['check_in'];
    $check_out = $_POST['check_out'];
    $rooms = $_POST['number_of_rooms'];

    $select = "select * from room_type where id='$type'";
    $run = mysqli_query($con, $select);
    $fetch = mysqli_fetch_assoc($run);
    $remain_rooms = $fetch['remain_rooms'];

    $selectbook = "select * from book where id='$bookid'";
    $runbook = mysqli_query($con, $selectbook);
    $fetchbook = mysqli_fetch_assoc($runbook);

    $currentroom = $fetchbook['no_of_rooms'];

    if($currentroom > $rooms){
        $remain_rooms = $remain_rooms + ($currentroom - $rooms);
        
    }else{
        $remain_rooms = $remain_rooms - ($rooms - $currentroom);
    }

    $update = "update room_type set remain_rooms='$remain_rooms' where id='$room_id'";
    $run = mysqli_query($con, $update);
    $update = "update book set room_id = '$type', user_id = '$userid', start_date = '$check_in', end_date = '$check_out', no_of_rooms = '$rooms' where id='$bookid'";
    $run = mysqli_query($con, $update);
    if($run){
        echo '<script>window.alert("Successfully edited reservation.");
                location.href="book.php";</script>';
    }
}
?>