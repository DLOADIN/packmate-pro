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
  <link rel="stylesheet" href="./CSS/dropdown.css">
  <link rel="stylesheet" href="./CSS/another-one.css">
  <link rel="shortcut icon" href="./image/thebutcher-removebg-preview.png" type="image/x-icon">
  <script src="https://kit.fontawesome.com/14ff3ea278.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="jsfile.js"></script>
  <script src="./dropdown.js"></script>
  <link rel="stylesheet" href="./CSS/alert.css">
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
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <title>SUPPLY & DEMAND</title>
</head>
<body>
  <style>
    #main-contents{
      height:fit-content;
      overflow-y:auto;
      padding-bottom:3rem;
    }
    .make-new .catch h1{
            text-align:center;
          }
    .caradan-products{
      text-decoration: none;
    }
    .ropdown{
      padding:1rem 0rem;
    }
    
  </style>
  <script>
    
  </script>

<div class="sidebar">
      <ul class="menu">
        <div class="logout">
        <li>
        <a href="userdashboardservicemanager.php">
            <i class="fa-solid fa-house-chimney"></i>
            <span>HOME</span>
          </a>
        </li>
        <div class="ropdown">
          <div class="select">
          <i class="fa-solid fa-box"></i>
              <span class="selectee">SERVICES</span>
              <div class="caret"></div>
          </div>
          <ul class="fireef">
              <li>
              <a href="usersupply.php">SUPPLY</a></li>
              <!-- <li>
              <a href="usermaintenance.php">MANTENANCE</a></li> -->
              <li>
              <a href="usertrainings.php">TRAININGS</a></li>
          </ul>
      </div>
        <li><a href="useremail.php"><i class="fa-solid fa-envelope"></i><span>FEEDBACK</span></a></li>
        <li>
          <a href="userprofileservicemanager.php">
          <i class="fa-solid fa-user"></i>
            <span>PROFILE</span>
          </a>
        </li>
    </ul>
  </div>



    <div class="main-content content-right" id="main-contents">
      <div class="header-wrapper">
        <div class="header-title">
          <h1>SUPPLY</h1>
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

        <?php
         $sql = mysqli_query($con, "SELECT * FROM `notifications` WHERE `u_date` >= DATE_SUB(CURDATE(), INTERVAL 90 DAY)");
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
        <section class="make-new">
        <div class="catch">
          <h1>SUPPLY FORM</h1>
          <?php
          $my_id=$_GET['id'];
          $sqly = mysqli_query($con, "SELECT * FROM `supply` WHERE id='$my_id'");
          while ($row = mysqli_fetch_array($sqly)):
        ?>
        <form  method="post" class="form-form">
          <div class="formation-1">
          <label for="">EQUIPMENT NAME</label>
          <input type="text" name="u_equipment" id="" required placeholder="EQUIPMENT NAME" value="<?php echo $row['u_equipment']?>">
          <label for="">TASK TYPE</label>
          <input type="text" name="u_type" id="" required placeholder="TASK TYPE" value="<?php echo $row['u_type']?> ">
          <label for="">SCHEDULED DATE</label>
          <input type="date" name="s_date" id="" required placeholder="PRODUCT NAME" value="<?php echo $row['s_date']?>">
          <label for="">END DATE</label>
          <input type="date" name="e_date" id="" required placeholder="PRODUCT NAME" value="<?php echo $row['e_date']?>">
          <!-- <label for="">STATUS</label> -->
          <input style="color:grey"type="text" name="status" id="" required readonly placeholder="STATUS" value="<?php echo $row['status']?>" hidden >
          <label for="">ASSIGNED TECHNICIAN</label>
          <input type="text" name="u_technician" id="" required placeholder="ASSIGNED TECHNICIAN" value="<?php echo $row['u_technician']?> ">
          <label for="">NOTES</label>
          <input type="text" name="u_notes" id="" required placeholder="NOTES ON THE TASK" value="<?php echo $row['u_notes']?> ">
          <?php 
        endwhile
        ?>
          <button name="submit" type="submit" class="btn-3">SUBMIT</a>
          </button>
          <style>
            .cruel-btn{
              width:100px;
              margin:0 auto;
            }
          </style>
        </div>
        </form>
       </div>
    <div class="tablestotable">
      <div class="table-containment">
        <h1>DETAILS ON SUPPLY DATA</h1>
        <table>
          <tr>
          <th>#</th>
            <th>EQUIPMENT NAME</th>
            <th>TASK TYPE</th>
            <th>SCHEDULED DATE</th>
            <th>END DATE</th>
            <th>STATUS</th>
            <th>TECHNICIAN</th>
            <th>NOTES</th>
            <th>MODIFY</th>
            <th>DELETE</th>
            <th>DOWNLOAD</th>
          </tr>
          <?php
          $sqly = mysqli_query($con, "SELECT * FROM `supply`");
          $number = 0;
        while ($row = mysqli_fetch_array($sqly)):
        ?>
          <tr>
            <td><?php echo ++$number; ?></td>
            <td><?php echo $row['u_equipment']; ?></td>
            <td><?php echo $row['u_type']; ?></td>
            <td><?php echo $row['s_date']; ?></td>
            <td><?php echo $row['e_date']; ?></td>
            <td><?php echo $row['status']; ?></td>
            <td><?php echo $row['u_technician']; ?></td>
            <td><?php echo $row['u_notes']; ?></td>
            <td>
            <button class="button-btn-2">
              <a href="updatesupply.php?id=<?php echo $row['id']?>">UPDATE</a>
            </button>
            </td>
            <td>
            <button class="button-btn-1" onclick="alert('ARE YOU SURE YOU WANT TO DELETE THIS USER')">
            <a href="deletesupply.php?id=<?php echo $row['id']?>">REMOVE</a>
            </button>
            </td>
            <td>
              <a href="./pdf/supply.php"><i class="fa-solid fa-download"></i></a>
            </td>
          </tr>
          <?php
          endwhile;
          ?>
        </table>
      </div>
    </div>
        </section>
        <style>
          .button-btn-1 a, .button-btn-2 a{
            color:white;
            text-decoration:none;
          }
          .button-btn-1{
            background:red
          }
          
          .make-new .catch h1{
            text-align:center;
          }
          .catch{
            margin-top:2rem;
          }
          .li{
            list-style:none;
            margin-top:1rem;
          }
          .make-new{
            text-align:center
          }
          .make-new-1 {
           display: flex;
           place-items: right;
           margin-top: 3rem;
           justify-items:center;
           justify-content:center;
           gap:2rem
          }
          .make-new-1 i{
            color:#EC9124;
            font-size:50px;
          }
          td i{
            font-size:20px;
            
          }
          .make-new-2{
            width: 40vh;
            height: 35vh;
            background-color: white;
            border: 0.1rem solid rgba(0, 0, 0, 0.1);
            border-radius: 1rem;
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
          }
        </style>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>
<?php
if(isset($_POST['submit'])){
  $u_equipment=$_POST['u_equipment'];
  $u_type=$_POST['u_type'];
  $s_date=$_POST['s_date'];
  $e_date=$_POST['e_date'];
  $status=$_POST['status'];
  $u_technician=$_POST['u_technician'];
  $u_notes=$_POST['u_notes'];
  $sql=mysqli_query($con,"UPDATE `supply` SET u_equipment='$u_equipment', u_type='$u_type', s_date='$s_date', e_date='$e_date', status='$status',u_technician='$u_technician', u_notes='$u_notes' WHERE id='$my_id'");  

  if($sql){
    echo "<script>alert('Documented Successfully')</script>";
  }
  else{
    echo "<script>alert('failed to document')</script>";
  }

}
?>
