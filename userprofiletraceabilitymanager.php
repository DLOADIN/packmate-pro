<?php
  require "connection.php";
  if(!empty($_SESSION["id"])){
  $id = $_SESSION["id"];
  $check = mysqli_query($con,"SELECT * FROM `users` WHERE id=$id ");
  $row = mysqli_fetch_array($check);
  }
  else{
  header('location:login.php');
  } 
?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./CSS/newfriend.css">
  <link rel="stylesheet" href="./CSS/another-one.css">
  <link rel="stylesheet" href="./CSS/form.css">
  <link rel="stylesheet" href="./CSS/gravity.css">
  <link rel="stylesheet" href="./CSS/dropdown.css">
  <link rel="shortcut icon" href="./image/thebutcher-removebg-preview.png" type="image/x-icon">
  <script src="https://kit.fontawesome.com/14ff3ea278.js" crossorigin="anonymous"></script>
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script src="jsfile.js"></script>
  <script src="./extension_remover.js"></script>
  <script src="./sidebar.js"></script>
  <script src="./dropdown.js"></script>
  <link rel="stylesheet" href="./CSS/alert.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <title>YOUR PERSONAL DETAILS</title>
</head>
<body>
  <style>
    
    #main-contents{
      height: 250vh;
    }
    .formation-1{
      display: grid;
      grid-template-columns: 130px 700px 150px 300px;
      row-gap: 30px;
      column-gap: 30px;
      padding-top: 10vh;
      }
      .btn-3{
        background-color:#EC9124;
      }
      .sidebar i{
        color: black;
      }
  </style>
 <div class="sidebar">
    <ul class="menu">
      <div class="logout">
        <li><a href="userdashboardtraceabilitymanager.php"><i class="fa-solid fa-house-chimney"></i><span>HOME</span></a></li>
        <li><a href="userquality.php"><i class="fa-solid fa-toggle-on"></i><span>QUALITY CONTROL</span></a></li>
        <!-- <li><a href="usererpsystems.php"><i class="fa-brands fa-ubuntu"></i><span>ERP SYSTEMS</span></a></li> -->
        <li><a href="usertraceability.php"><i class="fa-solid fa-shuffle"></i><span>TRACEABILITY</span></a></li>
        <li><a href="useremail.php"><i class="fa-solid fa-envelope"></i><span>FEEDBACK</span></a></li>
        <li><a href="userprofiletraceabilitymanager.php"><i class="fa-solid fa-user"></i><span>PROFILE</span></a></li>
      </div>
    </ul>
  </div>

  <div class="main-content" id="main-contents">
    <div class="header-wrapper">
      <div class="header-title">
      <h2 class="h2">SETTINGS</h2>
      </div>
      <div class="user-info">
      <div class="gango">
          <?php
            $sql=mysqli_query($con, "SELECT u_name,u_type from `users` WHERE id='$id'");
            $row=mysqli_fetch_array($sql);
            $attorney=$row['u_name'];
            $name=$row['u_type'];
            ?>
          <h2 class="my-account-header">
          <?php echo $attorney?>
            </h2>
          <p><?php echo $name?></p></div> 
        <button name="submit" type="submit" class="btn-3" >
            <a href="logout.php">LOGOUT</a>
          </button>
          <button class="mybutton">
        <i class="fa-solid fa-bell" id="fa-bell"></i>
    </button>
    <div class="alert hide">
        <span class="msg"><i class="fa-solid fa-circle-exclamation"></i>NOTIFICATIONS</span>
        <span class="close-btn">
            <span class="fas"><i class="fa-solid fa-xmark"></i></span>
        </span>
        <script>
            $(document).ready(function() {
            $('.mybutton').click(function() {
                $('.alert').removeClass("hide").addClass("show");
            });

            $('.close-btn').click(function() {
                $('.alert').removeClass("show").addClass("hide");
            });
        });
        </script>
        <?php
          $sql = mysqli_query($con, "SELECT * FROM `notifications` WHERE `u_date` >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)");
          while($row = mysqli_fetch_array($sql)):
              $msg = $row['u_message'];
              $date = $row['u_date'];
              $msg1 = nl2br(htmlspecialchars($msg, ENT_QUOTES, 'UTF-8'));
              $date = htmlspecialchars($date, ENT_QUOTES, 'UTF-8');
          ?>
          <div class="para-paragrraph">
          <h3>DATE: <?php echo $date?></h3>
          <p><?php echo $msg1?></p></div>
          <?php
          endwhile;
        ?>
    </div>
      </div>       
       </div>
       <div class="duke">

          <div class="hastings">
            <img src="./image/vector-users-icon.jpg" alt="">
            <?php $sql=mysqli_query($con,"SELECT * FROM `users` WHERE id='$id' ");
            $row = mysqli_num_rows($sql);
            if($row){
              while($row=mysqli_fetch_array($sql))
              { ?>
            <h2><?php echo $row['u_name']?></h2>
            <hr>
            <h3><i class="fa-solid fa-person"></i>SYSTEM USER</h3>
            <hr>
            <h3><i class="fa-solid fa-phone"></i>+91 7048119291</h3>
            <h3><i class="fa-regular fa-envelope"></i><?php echo $row['u_email'];?></h3>
            <?php 
              }
            }
            ?>
          </div>

          <div class="hastings-1">
            <H1>YOUR OVERALL INFORMATION</H1>
            <?php
          if(isset($_GET['id'])){
          $id=$_GET['id'];
        }
          $sql=mysqli_query($con,"SELECT * FROM `users` WHERE id='$id' ");
          $row = mysqli_fetch_array($sql);
          ?>
            <form action="" method="post" class="formation">
              <div class="real-form">
                <label for="">YOUR NAMES</label>
                <input type="text" name="u_name" value="<?php echo $row['u_name']?>" required >
                <label for="">E-MAIL</label>
                <input type="email" name="u_email" value="<?php echo $row['u_email']?>" required>
              </div>
              <div class="real-form">
                <label for="">PASSWORD</label>
                <input type="password" name="u_password" required value="<?php echo $row['u_password']?>" readonly>
                <button name="submit" type="submit" class="btn-2" id="btns">SAVE</button></div>
                
            </form>

         </div>
        </div>

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<style>
.btn-2{
  margin:0 auto;
  background-color:#EC9124;;
}

.modd{
  margin:0 auto;
}
.hastings-1{
  margin: 0 auto;
  padding:1rem;
  height:65vh;
  background-color: #ecebf3;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
}
.another-hastings{
  margin: 0 auto;
  margin-top: 5vh;
  padding:1rem;
}
h3 i{
  color:black
}
</style>
</body>
</html>

<?php
  if(isset($_POST['submit'])){
    $name = $_POST['u_name'];
    $email = $_POST['u_email'];
    $address = $_POST['u_address'];
    $password = $_POST['u_password'];
    $sql=mysqli_query($con,"UPDATE `admin` SET u_name='$name', u_email ='$email', u_password='$password' WHERE id='$id' ");
    
    if($sql){
      echo "<script>alert('Updated Successfully')</script>";
    }
    else{
      echo "<script>alert('failed to update')</script>";
    }
  }
?>

