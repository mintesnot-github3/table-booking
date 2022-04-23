<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title><?php echo @$title; ?></title>
    <link href="http://localhost/book/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="http://localhost/book/font-awesome/css/font-awesome.min.css">
    <script src="http://localhost/book/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
<style>


</style>

</head>
<body>
  <nav style="background-image:linear-gradient(to right,#FB7000,#FEB500)"class="navbar navbar-expand-lg navbar-light ">
  <div class="container-fluid">
    <a   style="color:white;"class="navbar-brand" href="http://localhost/book/">Book</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a style="color:white;" class="nav-link active" aria-current="page" href="http://localhost/book/">Home</a>
        </li>
        <?php
     if(isset($_SESSION['userlog'])){
?>
        <!--<li class="nav-item">-->
        <!--  <a style="color:white;" class="nav-link" href="room.php">Room</a>-->
        <!--</li>-->
     <?php } ?>
        <!--<li class="nav-item dropdown">-->
        <!--  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">-->
        <!--    Dropdown-->
        <!--  </a>-->
        <!--  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">-->
        <!--    <li><a class="dropdown-item" href="#">Action</a></li>-->
        <!--    <li><a class="dropdown-item" href="#">Another action</a></li>-->
        <!--    <li><hr class="dropdown-divider"></li>-->
        <!--    <li><a class="dropdown-item" href="#">Something else here</a></li>-->
        <!--  </ul>-->
        <!--</li>-->
        <?php
            if(isset($_SESSION['userlog'])){
        ?>
            <?php } ?>
      </ul>
      <?php
            if(isset($_SESSION['userlog'])){
        ?>
      <form class="d-flex" action="http://localhost/book/search.php" method="get">
        <input style="width: 350px;" class="form-control me-2" type="search" placeholder="Room type" aria-label="Search" name="key" required>
        <button style="background-color:#00A4C6; color:white;"class="btn" type="submit">Search</button>
      </form>
      <?php } ?>
     &nbsp;&nbsp;
       <?php
     if(isset($_SESSION['userlog'])){
?>
    <a href="http://localhost/book/user/profile.php" class="btn btn-outline-primary">Profile</a>&nbsp;
      <a style="background-color:#A0C1DA; color:white;"href="http://localhost/book/user/logout.php" class="btn">Logout</a>

<?php
     }else{
         
?>
      <a href="http://localhost/book/user/login.php" class="btn btn-outline-primary">Login</a>

<?php
     }
     ?>
    </div>
  </div>
</nav>
    
</html>