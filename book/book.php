<?php
session_start();
require('../db_connect.php');
$user = $_SESSION['userlog'];
if(!empty($_GET['id']) && !empty($_POST['no_of_room']) && !empty($_POST['banknum']) && !empty($_POST['bankname']) && !empty($_POST['start_date']) && !empty($_POST['end_date'])){
    $room_id = $_GET['id'];
    $no_of_room = $_POST['no_of_room'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $bankname = $_POST['bankname'];
    $banknum = $_POST['banknum'];

    $getroom = "select * from room_type where id='$room_id'";
    $rungetroom = mysqli_query($con, $getroom);
    $fetchgetroom = mysqli_fetch_assoc($rungetroom);
    $remain_room = $fetchgetroom['remain_rooms'];
    $remain_room -= $no_of_room;
    
    $selectuserid = "select * from user where email='$user'";
    $runselectuser = mysqli_query($con, $selectuserid);
    $fetch = mysqli_fetch_assoc($runselectuser);
    $userid = $fetch['id'];
    
    $insert = "insert into book (room_id, user_id, start_date, end_date, no_of_rooms, bankname, banknum) values ('$room_id', '$userid', '$start_date', '$end_date', '$no_of_room', '$bankname', '$banknum')";
    $run = mysqli_query($con, $insert);
    if($run){
        $update = "update room_type set remain_rooms='$remain_room' where id='$room_id'";
        $run = mysqli_query($con, $update);
        if($run){
            echo '<script>window.alert("Successfully reserved.");
            location.href="../index.php";</script>';
        }
    }
}
?>