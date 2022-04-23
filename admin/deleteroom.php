<?php
require('../db_connect.php');
if(!empty($_GET['id'])){
    $id = $_GET['id'];
    
    $delete = "delete from room_type where id='$id'";
    $run = mysqli_query($con, $delete);
    if($run){
        echo '<script>window.alert("Successfully deleted.");
                location.href="room.php";</script>';
    }
}
?>