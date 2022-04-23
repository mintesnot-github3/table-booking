<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<style>
#label-upload {
  background-color: indigo;
  color: white;
  padding: 0.5rem;
  font-family: sans-serif;
  border-radius: 0.3rem;
  cursor: pointer;
  margin-top: 1rem;
}

#file-chosen{
  margin-left: 0.3rem;
  font-family: sans-serif;
}
</style>
<title><?php echo @$title; ?></title>
    <link href="http://localhost/book/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="http://localhost/book/font-awesome/css/font-awesome.min.css">
    <script src="http://localhost/book/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</head>
<body>
   <nav style="background-image:linear-gradient(to right,#FB7000,#FEB500)"class="navbar navbar-expand-lg navbar-light ">
  <div class="container-fluid">
    <a   style="color:white;"class="navbar-brand" href="http://localhost/book/admin">Book</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a style="color:white;" class="nav-link active" aria-current="page" href="http://localhost/book/admin">Home</a>
        </li>
       <?php
       if(isset($_SESSION['adminlog'])){
           ?>
           <li class="nav-item dropdown">
          <a style="color:white;" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Manage
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="http://localhost/book/admin/manage.php">User</a></li>
            <li><a class="dropdown-item" href="http://localhost/book/admin/room.php">Room</a></li>
          </ul>
          
        </li>
           <?php
       }
       ?>
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
       
      </ul>
      
     &nbsp;&nbsp;
       <?php
     if(isset($_SESSION['adminlog'])){
?>
   
      <a style="background-color:#A0C1DA; color:white;"href="http://localhost/book/admin/logout.php" class="btn">Logout</a>

<?php
     }else{
         
?>
      <a href="http://localhost/book/admin/login.php" class="btn btn-outline-primary">Login</a>

<?php
     }
     ?>
    </div>
  </div>
</nav>
    
    
</html>