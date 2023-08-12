<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>search</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
  <?php
  include 'navbar.php';
  include 'connect.php';

if(isset($_POST['search'])){
// echo 'Search btn clicked';
  $bike_name = $_POST['bike_name'];
  $brand = $_POST['brand'];
  $cubiccapacity = $_POST['cc'];
  if(empty($bike_name) && empty($brand) && empty($cubiccapacity)){
    $sqlY = "SELECT * FROM dashboard";
    $info = mysqli_query($conn, $sqlY);
    $text = mysqli_fetch_all($info, MYSQLI_ASSOC);
    // echo 'All values selected';
  }
  if(!empty($bike_name) && empty($brand) && empty($cubiccapacity)){
    $sqlY ="SELECT * FROM dashboard where bike_name = '$bike_name'";
    $info = mysqli_query($conn, $sqlY);
    $text = mysqli_fetch_all($info, MYSQLI_ASSOC);
    echo $bike_name;
  }
  if(empty($bike_name) && !empty($brand) && empty($cubiccapacity)){
    $sqlY ="SELECT * FROM dashboard where brand = '$brand'";
    $info = mysqli_query($conn, $sqlY);
    $text = mysqli_fetch_all($info, MYSQLI_ASSOC);
  }
  if(empty($bike_name) && empty($brand) && !empty($cubiccapacity)){
    $sqlY ="SELECT * FROM dashboard where cc = '$cubiccapacity'";
    $info = mysqli_query($conn, $sqlY);
    $text = mysqli_fetch_all($info, MYSQLI_ASSOC);
  }
  if(!empty($bike_name) && !empty($brand) && empty($cubiccapacity)){
    $sqlY ="SELECT * FROM dashboard where bike_name = '$bike_name' AND brand='$brand'";
    $info = mysqli_query($conn, $sqlY);
    $text = mysqli_fetch_all($info, MYSQLI_ASSOC);
    echo $bike_name , $brand;
  }
  if(empty($bike_name) && !empty($brand) && !empty($cubiccapacity)){
    $sqlY ="SELECT * FROM dashboard where brand = '$bike_name' OR cc='$cubiccapacity'";
    $info = mysqli_query($conn, $sqlY);
    $text = mysqli_fetch_all($info, MYSQLI_ASSOC);
  }
  if(!empty($bike_name) && empty($brand) && !empty($cubiccapacity)){
    $sqlY ="SELECT * FROM dashboard where bike_name = '$bike_name' AND cc='$cubiccapacity'";
    $info = mysqli_query($conn, $sqlY);
    $text = mysqli_fetch_all($info, MYSQLI_ASSOC);
  }
  if(!empty($bike_name) && !empty($brand) && !empty($cubiccapacity)){
    $sqlY ="SELECT * FROM dashboard where bike_name = '$bike_name' AND brand='$brand' AND cc='$cubiccapacity'";
    $info = mysqli_query($conn, $sqlY);
   $text= mysqli_fetch_all($info, MYSQLI_ASSOC);
   echo $bike_name.' ' .$brand.' '.$cubiccapacity;
  }
}    else {
$sqlY = "SELECT * FROM dashboard";
$info = mysqli_query($conn, $sqlY);
$text = mysqli_fetch_all($info, MYSQLI_ASSOC);
}   
?>

  <!-- <div class="container"> -->
    <div class="container ">
  <h2>Search With their Bike Name, Brand and CC</h2>
  <hr>
  <form method="POST">
    <div class="container-fluid d-flex align-item-center">
  <p>
  <label for="name">Bike-Name:</label>
  <select class="form-select-sm py-2 " name="bike_name">
    <option value="">Select</option>
    <option value="apache">APACHE</option>
    <option value="pulsar">PULSAR</option>
    <option value="gixer">GIXER</option>
    <option value="honda shibe">HONDA SHINE</option>
    <option value="hondact">HondaCT</option>
    <option value="super spelender">SUPER SPELENDER</option>
    <option value="bullet">BULLET</option>
    <option value="fzs">FZS</option>
    <option value="mt15">MT15</option>

  </select>
  <label for="brand">Brand:</label>
  <select class="form-select-sm py-2" name="brand">
    <option value="">Select</option>
    <option value="tvs">TVS</option>
    <option value="bajaj">BAJAJ</option>
    <option value="suzuki">SUZUKI</option>
    <option value="royal enfield">ROYAL ENFIELD</option>
    <option value="honda">HONDA</option>
    <option value="yamaha">YAMAHA</option>
  </select>
  <label for="cc">CC:</label>

  <select class=" form-select-sm py-2" name="cc">
    <option value="">Select</option>
    <option value="100">100</option>
    <option value="125">125</option>
    <option value="150">150</option>
    <option value="200">200</option>
    <option value="250">250</option>
    <option value="350">350</option>
    <option value="500">500</option>
  </select>
<button type="submit" class="btn btn-primary py-2 " name ="search">search</button></p>
</form>
</div>
<!-- </div> -->
<?php

?>
<div class="album py-5 bg-body-tertiary">
    <div class="container">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
      <?php foreach($text as $value):?>
        <div class="col">
          <div class="card shadow-sm">
          <!-- <img src="<?php// echo ($value['image_file']) ? "image/".$value['image_file']: '' ?>" alt="<?php// echo $value['image_file'] ?>"> -->
          <img  style="width:350px; height:200px;" src="<?php echo ($value['image_file']) ? $value['image_file']: '' ?>" alt="<?php echo $value['image_file'] ?>">
            <div class="card-body">
              <p class="card-text"><?php  echo $value['bike_name']; ?></p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <a href="http://localhost/bike-store/single.php?id=<?php echo $value['id'] ?>" class="btn btn-sm btn-outline-secondary">view</a>
                </div>
                <small class="text-body-secondary"><?php  echo $value['brand']; ?></small>
                <small class="text-body-secondary"><?php  echo $value['cc']; ?></small>
              </div>
            </div>
          </div>
        </div>
           <?php endforeach; ?>
      </div>
    </div>
  </div>
  
</body>
</html>