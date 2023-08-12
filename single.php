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

    // function url(){
    //   return sprintf(
    //     "%s://%s%s",
    //     isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
    //     $_SERVER['SERVER_NAME'],
    //     $_SERVER['REQUEST_URI']
    //   );
    // }
    

?>

  <!-- <div class="container"> -->
    <div class="container">
  <h2>Search With their Bike Name, Brand and CC</h2>
  <hr>
  <form method="POST">
  <p>
  <label for="name">Bike-Name:</label>
  <select class="form-select-sm py-2 " name="bike_name">
    <option value="">Select</option>
    <option value="apache">APACHE</option>
    <option value="pulsar">PULSAR</option>
    <option value="gixer">GIXER</option>
    <option value="phoenix">PHOENIX</option>
    <option value="honda shibe">HONDA SHINE</option>
    <option value="hondact">HondaCT</option>
    <option value="super spelender">SUPER SPELENDER</option>
    <option value="saluto">SALUTO</option>
    <option value="cb unicorn">CB UNICORN</option>
    <option value="bullet">BULLET</option>
    <option value="hornet">HORNET</option>
    <option value="dominar">DOMINAR</option>
    <option value="fzs">FZS</option>
    <option value="dio">DIO</option>
    <option value="mt15">MT15</option>

  </select>
  <label for="brand">Brand:</label>
  <select class="form-select-sm py-2 " name="brand">
    <option value="">Select</option>
    <option value="tvs">TVS</option>
    <option value="bajaj">BAJAJ</option>
    <option value="suzuki">SUZUKI</option>
    <option value="royal enfield">ROYAL ENFIELD</option>
    <option value="honda">HONDA</option>
    <option value="honda">YAMAHA</option>
  </select>
  <label for="cc">CC:</label>

  <select class="form-select-sm py-2 " name="cc">
    <option value="">Select</option>
    <option value="100">100</option>
    <option value="125">125</option>
    <option value="150">150</option>
    <option value="200">200</option>
    <option value="250">250</option>
    <option value="350">350</option>
    <option value="500">500</option>
  </select>
  <button type="submit" class="btn btn-primary" name ="search">search</button>
  </p>
  </form>
  </div>
  <!-- </div> -->
<?php
$sid = isset($_GET['id']) ? $_GET['id']:"";
if($sid){
  $sql = "SELECT * FROM dashboard where id=$sid";
}else{
  $sql = "SELECT * FROM dashboard";
}
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>
<div class="album py-5 bg-body-tertiary">
    <div class="container">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
      <?php foreach($data as $value):?>
        <div class="col">
        <!-- <img src="<?php// echo ($value['image_file']) ? "image/".$value['image_file']: '' ?>" alt="<?php //echo $value['image_file'] ?>"> -->
          <img src="<?php echo ($value['image_file']) ? $value['image_file']: '' ?>" alt="<?php echo $value['image_file'] ?>">
              <p class="card-text"><?php  echo $value['bike_name']; ?></p>
              <div class="d-flex justify-content-between align-items-center">
                <small class="text-body-secondary"><?php  echo $value['brand']; ?></small>
                <small class="text-body-secondary"><?php  echo $value['cc']; ?></small>
              </div>
              <?php echo $value["bike_details"] ?>
            </div>
          </div>
        </div>
           <?php endforeach; ?>
      </div>
    </div>
  </div>
  
</body>
</html>