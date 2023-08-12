<body class="text-center">
<?php
 session_start();
include 'navbar.php';
include 'connect.php';
// echo "data base connected";
// Intitalize username and password
//echo  $_SESSION['username'];
 $usernameErr = $passwordErr="";
// $username = $password = "";
    if(isset($_POST['submit'])){
        if(empty($_POST['username'])){
           $usernameErr= "*enter your username<br>";
        }else{
            $username=$_POST['username'];
             echo $username;
        }
        if(empty($_POST['password'])){
            $passwordErr="*enter password<br>";
        }else{
            $password = $_POST["password"];
            // echo $password;
        }
        $sql = "SELECT username FROM login WHERE username='$username'
                     AND password='$password'";
        // echo "sql ".$sql;
        $result = mysqli_query($conn, $sql);
        // var_dump($result);
        $rows = mysqli_num_rows($result);
        // echo "number of rows ".$rows;
        // var_dump($rows);exit;
        if ($rows==1) {
            $_SESSION['username'] = $username;
            echo  $_SESSION['username'];
            header("location:uploadfile.php");
            echo "<br>Dashboard";
            
        }else {
                // echo "you have don't have an account signup for new account !";
                echo "session not created";
            }
        }
    ?>
    <div class="container w-25">
        <form class="form-signin" method="post">
            <h1 class="h3 mb-3 font-weight-normal">Please Login</h1>
            <hr>
            <label for="username" class="sr-only">Username</label>
            <input type="text" name="username"  class="form-control" placeholder="Username">
            <span style="color:red;"><?php echo $usernameErr; ?></span>
            <label for="Password" class="sr-only">Password</label>
            <input type="password" name="password" class="form-control" placeholder="Password">
            <span style="color:red;"><?php echo $passwordErr; ?></span><br>
            <button class=" btn btn-lg btn-primary btn-block w-100" type="submit" name ="submit"> Login</button>
            <p class="mt-5 mb-3 text-muted">&copy; 2023</p>
        </form>
    </div>
</body>
</html>