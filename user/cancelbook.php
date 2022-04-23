<?php
session_start();
require('../db_connect.php');
if(!empty($_GET['id'])){
    $id = $_GET['id'];
    
    $delete = "delete from book where id='$id'";
    $run = mysqli_query($con, $delete);
    if($run){
        echo '<script>window.alert("Successfully canceled reservation.");
                location.href="book.php";</script>';
    }
}
?>