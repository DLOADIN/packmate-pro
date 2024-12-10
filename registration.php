<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./CSS/loginregistration.css">
  <link rel="shortcut icon" href="./image/thebutcher-removebg-preview.png" type="image/x-icon">
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script src="jsfile.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
  <title>REGISTRATION PAGE</title>
</head>
<style>
  .btn{
    color:#00BDD6;
    border:3px solid #00BDD6;
  }
  .btn a{
    color:#00BDD6;
  }
</style>
<body>
  <div class="grided">
    <div class="grid-2">
      <div class="text-1">
      <img src="./image/thebutcher-removebg-preview.png" alt="">
        <h1>Create An Account</h1>
        <form action="" method="post">
          
          <div class="inputbox">
          <ion-icon name="people-outline"></ion-icon>
          <input type="text" name="u_name" required>
          <label for="">USER NAME</label></div>

          <div class="inputbox">
            <ion-icon name="mail-outline"></ion-icon>
          <input type="email" name="u_email" required>
          <label for="">E-MAIL</label></div>

          <div class="inputbox">
          <ion-icon name="lock-closed-outline"></ion-icon>
          <input type="text" name="u_password" required>
          <label for="">PASSWORD</label></div>

            
          <div class="inputbox">
          <ion-icon name="briefcase-outline"></ion-icon>
          <select name="u_type" id="">
            <option value=""></option>
            <option value="Admin">Administrator</option>
            <option value="service manager">Service Manager</option>
            <option value="batch manager">Batch Manager</option>
            <option value="control & traceability manager">Control & Traceability Manager</option>
          </select>
          <label for="">JOB TITLE</label></div>

          <button name="submit" type="submit" class="btn-2">SIGN UP</button>
          <div class="buttton-bttn">
            <a href="login.php">
              <button class="btn-2">LOGIN</button>
            </a>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
<?php
  require 'connection.php';
  
  if(isset($_POST['submit'])){
    $name = $_POST['u_name'];
    $email = $_POST['u_email'];
    $password = $_POST['u_password'];
    $job = $_POST['u_type'];
    $sql = mysqli_query($con,"INSERT INTO `users`  VALUES ('$name', '$email', '$password', '$job')");
    if($sql){
      echo "<script>alert('Registered Successfully| Please Head to the Login ')</script>";
    }
    else{
      echo "<script>alert('failed to register')</script>";
    }
  }
?>
