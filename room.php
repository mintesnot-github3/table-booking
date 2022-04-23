<?php
require('includes/header.php');
require('db_connect.php');
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
    

<div class="container" style="margin-top:10px;">
    <div class="row">
        
    
    <?php
        $select = "select * from room_type";
        $run = mysqli_query($con, $select);
        while($fetch=mysqli_fetch_assoc($run)){
            $id = $fetch['id'];
            $room_type = $fetch['room_type'];
            $price = $fetch['price'];
            $no_of_bed = $fetch['no_of_beds'];
            $img = $fetch['img'];
            ?>
            <div class="col-md-4">
                <div   style="border-radius:20px;color:white;background-image:linear-gradient(to right, #00A4C6,#A0C1DA);"class="card" style="width: 18rem;">
                    <img style ="border-radius:20px;" src="images/<?php echo $img; ?>" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $room_type; ?></h5>
                        <p class="card-text">Price: <?php echo $price; ?>ETB<br />Number of beds: <?php echo $no_of_bed; ?></p>
                        <a style="border-radius:10px;background-image:linear-gradient(to right,#FEB500,#FB7000);color:white;" href="book/index.php?id=<?php echo $id; ?>" class="btn text-center">Book</a>
                    </div>
                </div>
            </div>
            <?php
        }
    ?>
    </div>
</div>

</body>
</html>