<?php
require('includes/header.php');
require('../db_connect.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <style>
  body{
    background-image:linear-gradient(to right, #00A4C6, #FEF1F6,#A0C1DA);
  }
  

  </style>
  </head>
<body>
  

<div class="container row">
<div class="col-md-5"></div>
<div class="col-md-4">
<div id="upform" style="position:fixed; display:none; z-index: 99999; background:white; margin-top: 50px;">
    <button style="color:#FB7000; background:transparent; border:none" onclick="document.getElementById('blakc').style.display = 'none'; document.getElementById('upform').style.display = 'none';"> <i class ="fa fa-window-close fa-lg"></i> </button>
    <form action="updateroom.php" method="post" style="margin:20px">
            <?php echo @$msg_error; ?>
  <div class="mb-3">
    <label for="type" class="form-label">Room type</label>
    <input type="text" class="form-control" id="id" name="id" aria-describedby="id" hidden>
    <input type="text" class="form-control" id="type" name="type" aria-describedby="id">
  </div>
  <div class="mb-3">
    <label for="number_of_rooms" class="form-label">Number of beds</label>
    <input type="number" class="form-control" id="number_of_beds" name="number_of_beds" aria-describedby="number_of_beds" required placeholder="Number of beds">
  </div>
  <div class="mb-3">
    <label for="check_in" class="form-label">Remain rooms</label>
    <input type="number" class="form-control" id="remain_rooms" name="remain_rooms" aria-describedby="remain_rooms" required placeholder="Remain rooms">
  </div>
  <div class="mb-3">
    <label for="check_out" class="form-label">Price</label>
    <input type="text" class="form-control" id="price" name="price" aria-describedby="price" required placeholder="Price">
  </div>
  <button style="background-color:#FEB500; color:white;"type="submit" class="btn" style="width:100%;" id="loginbtn">Update</button>
</form>
</div>
<div class="col-md-3"></div>
</div>
</div>

<div id="blakc" style="position:fixed; display:none; z-index: 9999; width:100vw; height:100vh; background:rgba(0,0,0,.6);"></div>
<div class="container" style="z-index: 999;" id="body">

<div class="container">
    <a href="addroom.php" class="btn btn-success">Add new</a>
    <?php
        $select = "select * from room_type";
        $run = mysqli_query($con, $select);
        if(mysqli_fetch_row($run) > 0){
            $table = "<table class='table table-striped table-hover'><tr><th>Room type</th><th>Room price</th><th>Remain rooms</th><th>Number of beds</th><th>Action</th></tr>";
            $run = mysqli_query($con, $select);
            while($fetch=mysqli_fetch_assoc($run)){
                $id = $fetch['id'];
                $type = $fetch['room_type'];
                $price = $fetch['price'];
                $remain = $fetch['remain_rooms'];
                $beds = $fetch['no_of_beds'];
                
                $table .= "<tr><td>$type</td><td>$price ETB</td><td>$remain</td><td>$beds</td><td><a href=\"javascript:update('$id','$type','$price',$remain, $beds)\" style ='background-color:#FEB500; color:white;'class='btn'>Update book</a>&nbsp;<a href='deleteroom.php?id=$id' style ='background-color:#FB7000; color:white;' class='btn'>Delete</a></td></tr>";
            }
            $table .= "</table>";
            echo $table;
        }
    ?>
</div>
<script>
    function update(id,type,price,remain,beds){
        document.getElementById('blakc').style.display = "block";
        document.getElementById('upform').style.display = "block";  
        document.getElementById('type').value = type;
        document.getElementById('id').value = id;
        document.getElementById('number_of_beds').value = beds;
        document.getElementById('remain_rooms').value = remain;
        document.getElementById('price').value = price;
    }
</script>

</body>
</html>