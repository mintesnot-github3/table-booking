<?php
session_start();
    unset($_SESSION['userlog']);
    
    if(!isset($_SESSION['userlog'])){
        header('location: ../index.php');
    }
?>