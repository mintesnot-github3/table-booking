<?php
session_start();
    unset($_SESSION['adminlog']);
    
    if(!isset($_SESSION['adminlog'])){
        header('location: login.php');
    }
?>