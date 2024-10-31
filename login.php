<?php
  require 'connection.php'; 

  if(isset($_POST['submit'])){
    $name = $_POST['u_name'];
    $password = $_POST['u_password'];
    $job = $_POST['u_type'];

    if(empty($name) || empty($password) || empty($job)){
      echo "<script>alert('Please fill in all the fields: Username, Password, and Job Type.')</script>";
    }
    else {
      // Query to check if username, password, and job type match
      $sql = mysqli_query($con, "SELECT * FROM `users` WHERE u_name = '$name' AND u_password = '$password' AND u_type = '$job'");
      
      if(mysqli_num_rows($sql) > 0){
        $query = mysqli_fetch_array($sql);
        
        // Check job type after validating username and password
        if($job === $query['u_type']) {
          $_SESSION["login"] = true;
          $_SESSION["id"] = $query["id"]; // Store user ID in session

          // Redirect based on job role
          if($name == 'admin' && $password == 'admin' && $job == 'administrator'){
            header('Location: dashboard.php');
          }
          else if($job == 'service manager'){ 
            header('Location: userdashboardservicemanager.php');
          }
          else if($job == 'batch manager'){
            header('Location: userdashboardbatchmanagement.php');
          }
          else if($job == 'control & traceability manager'){
            header('Location: userdashboardtraceabilitymanager.php');
          }
          else{
            header('Location: userdashboard.php');
          }
        } else {
          echo "<script>alert('INVALID JOB ROLE FOR THIS USER')</script>";
        }
      }
      else{
        echo "<script>alert('WRONG USERNAME OR PASSWORD')</script>";
      }
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./CSS/loginregistration.css">
  <link rel="shortcut icon" href="./image/thebutcher-removebg-preview.png" type="image/x-icon">
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
  <script src="jsfile.js"></script>
  <title>LOGIN PAGE</title>
</head>
<body>
  <div id="grided">
    <div class="grid-2">
      <div class="text-1">
        <img src="./image/thebutcher-removebg-preview.png" alt="Logo">
        <h1>LOGIN</h1>
        <form action="" method="post">
          <div class="inputbox">
            <ion-icon name="people-outline"></ion-icon>
            <input type="text" name="u_name" required>
            <label for="u_name">USER NAME</label>
          </div>

          <div class="inputbox">
            <ion-icon name="lock-closed-outline"></ion-icon>
            <input type="password" name="u_password" required>
            <label for="u_password">PASSWORD</label>
          </div>
          
          <div class="inputbox">
            <ion-icon name="briefcase-outline"></ion-icon>
            <select name="u_type" required>
              <option value="">Select Job Title</option>
              <option value="administrator">Administrator</option>
              <option value="service manager">Service Manager</option>
              <option value="batch manager">Batch Manager</option>
              <option value="control & traceability manager">Control & Traceability Manager</option>
            </select>
            <label for="u_type">JOB TITLE</label>
          </div>

          <button name="submit" type="submit" class="btn-2">SIGN IN</button>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
