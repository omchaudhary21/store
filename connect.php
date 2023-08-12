<?php
$servername ="localhost";
$username="root";
$password="";
$database="bike-store";
$conn=mysqli_connect($servername,$username,$password,$database);
if($conn == false){
    die("connection failed".mysqli_connect_error());
}else{
    // echo "connection successfully";
}