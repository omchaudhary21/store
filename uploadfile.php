<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>signupvalidation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body class="text-center">
    <?php
    session_start();
    include 'navbar.php';
    include 'connect.php';
    if(!isset($_SESSION['username'])){
        header('Location: login.php');
    }
    // define variable
    $bikename = $brand = $cc= $bikedetails ="" ;
    $bikenameErr= $brandErr = $ccErr= $bikedetailsErr= "";
    // check the given variable is set or not null
    if(isset($_POST['submit'])){
        if(empty($_POST['bike_name'])){
           $bikenameErr= "*Bike name shouldn't be empty <br>";
        }else{
            $bikename=$_POST['bike_name'];
            // echo $bikename; 
        }  
        if(empty($_POST['brand'])){
            $brandErr ="*Brand shouldn't be empty<br>";
        }else{
            $brand =$_POST['brand'];
            // echo "<br>".$brand;
        }
        if(empty($_POST['cc'])){
            $ccErr ="*Cubic Capacity shouldn't be empty<br>";
        }else{
            $cc =$_POST['cc'];
            // echo "<br>".$cc;
        }
        if(empty($_POST['bike_details'])){
            $bikedetailsErr ="*Bike Details shouldn't be empty<br>";
        }else{
            $bikedetails =$_POST['bike_details'];
            // echo "<br>".$brand;
        }
        $folder = "/image";
       $filename = $_FILES["uploadfile"]["name"];
        //echo $filename;
       $tempname = $_FILES["uploadfile"]["tmp_name"];
       $folder = "image/" .$filename ;
        //echo "<img src='$folder' height='100px' width='100px'>";
        //echo $folder;
        //take file from source and move to the destination folder
        move_uploaded_file($tempname,$folder);
        if($bikenameErr == "" && $brandErr == "" && $ccErr == "" ) {  
         $sql = "INSERT INTO dashboard (bike_name, brand, cc, bike_details, image_file) VALUES ('$bikename','$brand', '$cc', '$bikedetails', '$folder')";
            if(mysqli_query ($conn,$sql)){
                // header("location:signupdashboard.php");
               echo " Data stored in database successfully";
               
            }else{
               echo"cannot insert into database";
               
            }
        }
    }
    ?>
    <div class="container w-25">
    <form class="form-signin" method="post" enctype="multipart/form-data">
      <h1 class="h3 mb-3 font-weight-normal text-danger">Please Upload file</h1>
      <hr>
      <label for="username" class="sr-only">Bike Name</label>
      <input type="text" name="bike_name" class="form-control" placeholder="Bike-Name" >
      <span style="color:red;"><?php echo $bikenameErr; ?></span>
      <label for="email" class="sr-only">Brand</label>
      <input type="text" name="brand" class="form-control" placeholder="Brand">
      <span style="color:red;"><?php echo $brandErr; ?></span>
      <label for="cc" class="sr-only">CC</label>
      <input type="text" name="cc" class="form-control" placeholder="Cubic Capacity" >
      <span style="color:red;"><?php echo $ccErr; ?></span>
      <label class="form-label" for="textAreaExample">Bike Details</label>
        <textarea class="form-control" name="bike_details" id="textAreaExample1" rows="4" placeholder="Bike details..."></textarea>
        <span style="color:red;"><?php echo $bikedetailsErr; ?></span>
      <!-- <label for="email" class="sr-only">Bike Details</label>
      <input type="textarea" name="bike_details" class="form-control" placeholder="Bike-Details"> -->
      <!-- <span style="color:red;"><?php echo $bikedetailsErr; ?></span> -->
      <label for="Uploadfile" class="sr-only">Upload file</label>
      <p><input type="file" name="uploadfile" class="form-control"  ></p>
      
      <button class="btn btn-lg btn-primary btn-block w-25" name= "submit" type="submit">Upload</button>
     
      <p class="mt-5 mb-3 text-center">&copy;2023</p>
    </form>
    </div>
    <!-- table shows data -->
    <?php
    $sql= "SELECT * FROM feedback";
    $result = mysqli_query($conn, $sql);
    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
    ?>
    <div class="container">
        <table border = "3" class="table">
        <thead>
                <tr>
                    <td>Customer Name</td>
                    <td>Contact No:</td>
                    <td>Email Address</td>
                    <td>Message</td>
                </tr>
            </thead>
            <tbody>
            <?php foreach($data as $value):?>
                <tr>
                <td><?php  echo $value['customer_name']?></td>
                <td><?php  echo $value['contact']?></td>
                <td><?php  echo $value['email']?></td>
                <td><?php  echo $value['message']?></td>
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>
    </div>
  </body>
</html>
  