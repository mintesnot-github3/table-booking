<?php
require('../includes/header.php');
require('../db_connect.php');
if(isset($_SESSION['userlog'])){
    $user = $_SESSION['userlog'];
    $select = "select * from user where email='$user'";
    $run = mysqli_query($con, $select);
    $fetch = mysqli_fetch_assoc($run);
    $userid = $fetch['id'];
    
    //select books
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <style>
    
    body{
        background-image:linear-gradient(to right, #00A4C6, #FEF1F6,#A0C1DA);
    }
    </style>
</head>
<body>
    <br><br>
<div class="container row">
<div class="col-md-5"></div>
<div class="col-md-4">
<div id="upform" style="position:fixed; display:none; z-index: 99999; background:white; margin-top: 50px;">
    <button style="" onclick="document.getElementById('blakc').style.display = 'none'; document.getElementById('upform').style.display = 'none';">X</button>
    <form action="updatebook.php" method="post" style="margin:20px">
            <?php echo @$msg_error; ?>
  <div class="mb-3">
    <label for="type" class="form-label">Room type</label>
    <input type="text" class="form-control" id="id" name="id" aria-describedby="id" hidden>
    <select name="type" id="type" required>
        <?php
            $select = "select * from room_type";
            $run = mysqli_query($con, $select);
            while($fetch=mysqli_fetch_assoc($run)){
                $id = $fetch['id'];
                $name = $fetch['room_type'];
                echo "<option value='$id'>$name</option>";
            }
        ?>
    </select>
  </div>
  <div class="mb-3">
    <label for="number_of_rooms" class="form-label">Number of rooms</label>
    <input type="number" class="form-control" id="number_of_rooms" name="number_of_rooms" aria-describedby="number_of_rooms" required placeholder="Number of rooms">
  </div>
  <div class="mb-3">
    <label for="check_in" class="form-label">Check in</label>
    <input type="date" class="form-control" id="check_in" name="check_in" aria-describedby="check_in" required placeholder="Check in">
  </div>
  <div class="mb-3">
    <label for="check_out" class="form-label">Check out</label>
    <input type="date" class="form-control" id="check_out" name="check_out" aria-describedby="check_out" required placeholder="Check out">
  </div>
  <button type="submit" class="btn btn-primary" style="width:100%;" id="loginbtn">Update</button>
</form>
</div>
<div class="col-md-3"></div>
</div>
</div>

<div id="blakc" style="position:fixed; display:none; z-index: 9999; width:100vw; height:100vh; background:rgba(0,0,0,.6);"></div>
<div class="container" style="z-index: 999;" id="body">

    <div class="row">
<?php
    $select = "select * from book where user_id='$userid'";
    $run = mysqli_query($con, $select);
    if(mysqli_fetch_row($run) > 0){
        $run = mysqli_query($con, $select);
        while($fetch=mysqli_fetch_assoc($run)){
            
            $bookid = $fetch['id'];
            $room_id = $fetch['room_id'];
            $book_date = $fetch['book_date'];
            $start_date = $fetch['start_date'];
            $end_date = $fetch['end_date'];
            $no_of_rooms = $fetch['no_of_rooms'];
            
            $getroom = "select * from room_type where id='$room_id'";
            $runroom = mysqli_query($con, $getroom);
            $fetchroom = mysqli_fetch_assoc($runroom);
            $room_type = $fetchroom['room_type'];
            $no_of_beds = $fetchroom['no_of_beds'];
            $price = $fetchroom['price'];
            $img = $fetchroom['img'];




            ?>
            <div class="col-md-6 mb-3">
                <img src="../images/<?php echo $img; ?>">
            </div>
            <div class="col-md-6 mb-3">
                Room type: <?php echo $room_type; ?><br />
                Number of beds: <?php echo $no_of_beds; ?><br />
                Single price: <?php echo $price; ?>ETB<br />
                Total price: <?php echo $price * $no_of_rooms; ?>ETB<br />
                <a href="javascript:update('<?php echo $room_id; ?>','<?php echo $start_date; ?>','<?php echo $end_date; ?>',<?php echo $no_of_beds; ?>, <?php echo $bookid; ?>)" class="btn btn-success">Update book</a>&nbsp;<a href="cancelbook.php?id=<?php echo $bookid; ?>" class="btn btn-danger">Cancel book</a>
            </div>
            <?php
        }
    }else{
        echo 'no reserved room';
    }
?>

        
    </div>
</div>
<script>
    function update(room_id,start_date,end_date,no_of_rooms,bookid){
        document.getElementById('blakc').style.display = "block";
        document.getElementById('upform').style.display = "block";
        document.getElementById('type').value = room_id;
        document.getElementById('number_of_rooms').value = no_of_rooms;
        document.getElementById('check_in').value = start_date;
        document.getElementById('check_out').value = end_date;
        document.getElementById('id').value = bookid;
    }
</script>
<?php
}else{
    header('login.php');
}
?>