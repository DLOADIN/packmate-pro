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
  <link rel="stylesheet" href="./CSS/charts.css">
  <link rel="stylesheet" href="./CSS/tables.css">
  <link rel="stylesheet" href="./CSS/another-one.css">
  <link rel="shortcut icon" href="./image/thebutcher-removebg-preview.png" type="image/x-icon">
  <script src="https://kit.fontawesome.com/14ff3ea278.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="jsfile.js"></script>
  <script src="./dropdown.js"></script>
  <link rel="stylesheet" href="./CSS/alert.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <title>UPDATE LABELLING & SEALING</title>
</head>
<body>
  <style>
    #main-contents{
      height:fit-content;
      overflow-y:auto;
      padding-bottom:40rem;
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
        <a href="userdashboardbatchmanagement.php">
            <i class="fa-solid fa-house-chimney"></i>
            <span>HOME</span>
          </a>
        </li>
        <li>
          <a href="userbatchmanagement.php">
          <i class="fa-solid fa-bars-progress"></i>
            <span>BATCH MANAGEMENT</span>
          </a>
        </li>
        <li>
          <a href="userlabelling.php">
          <i class="fa-solid fa-bottle-water"></i>
            <span>LABELLING & SEALING</span>
          </a>
        </li>
        <!-- <li>
          <a href="userinventory.php">
            <i class="fa-solid fa-warehouse"></i>
            <span>INVENTORY</span>
          </a>
        </li> -->
        <li><a href="useremail.php"><i class="fa-solid fa-envelope"></i><span>FEEDBACK</span></a></li>
        <li>
          <a href="userprofilebatchmanagement.php">
          <i class="fa-solid fa-user"></i>
            <span>PROFILE</span>
          </a>
        </li>
    </ul>
  </div>

    <div class="main-content content-right" id="main-contents">
      <div class="header-wrapper">
        <div class="header-title">
          <h1>UPDATE LABELLING & SEALING</h1>
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
        <h1>UPDATING THE LABELLING & SEALING FORM</h1>
        <?php
          $my_id=$_GET['id'];
          $sqly = mysqli_query($con, "SELECT * FROM `labels` WHERE id='$my_id'");
          while ($row = mysqli_fetch_array($sqly)):
        ?>
        <form  method="post" class="form-form">
          <div class="formation-1">
          <label for="">NAME</label>
          <input type="text" name="u_name" id="" required placeholder="BEVERAGE NAME" value="<?php echo $row['u_name']?>">
          <label for="">TYPE</label>
          <select name="u_type" id=""  value=<?php echo $row['u_type']?>>
            <option value=""></option>
            <option value="Non-alcoholic">NON-ALCOHOLIC</option>
            <option value="Alcoholic">ALCOHOLIC</option>
          </select>
          <label for="">LABELS</label>
          <input type="number" name="u_label" id="" required  value=<?php echo $row['u_label']?>>
          <label for="">FAULT QR</label>
          <input type="text"  name="u_fault" id="" required  value=<?php echo $row['u_fault']?>>
          <label for="">CORRECT QR</label>
          <input type="text"  name="u_correct" id="" required  value=<?php echo $row['u_correct']?>>
          <label for="">DATE</label>
          <input type="text" name="u_date" id=""  value=<?php echo $row['u_date']?> required>
        </div>
        <?php 
        endwhile
        ?>
          <button name="submit" type="submit" class="btn-3" id="button-btn">SUBMIT</a>
          </button>
        </form>
       </div>
    <div class="tablestotable">
      <div class="table-containment">
        <h1>DETAILS ON LABELS & SEALS</h1>
        <table>
          <tr>
            <th>#</th>
            <th>PRODUCT NAME</th>
            <th>TYPE</th>
            <th>LABELS</th>
            <th>FAULT QR</th>
            <th>CORRECT QR</th>
            <th>DATE</th>
            <th>MODIFY</th>
            <th>DELETE</th>
            <th>DOWNLOAD</th>
          </tr>
          <?php
          $sqly = mysqli_query($con, "SELECT * FROM `labels`");
          $number = 0;
        while ($row = mysqli_fetch_array($sqly)):
        ?>
          <tr>
            <td><?php echo ++$number; ?></td>
            <td><?php echo $row['u_name']; ?></td>
            <td><?php echo $row['u_type']; ?></td>
            <td><?php echo $row['u_label']; ?></td>
            <td><?php echo $row['u_fault']; ?></td>
            <td><?php echo $row['u_correct']; ?></td>
            <td><?php echo $row['u_date']; ?></td>
            <td>
            <button class="button-btn-2">
              <a href="updatelabels.php?id=<?php echo $row['id']?>">UPDATE</a>
            </button>
            </td>
            <td>
            <button class="button-btn-1" onclick="alert('ARE YOU SURE YOU WANT TO DELETE THIS USER')">
            <a href="deletelabels.php?id=<?php echo $row['id']?>">REMOVE</a>
            </button>
            </td>
            <td>
              <a href="./pdf/labels.php"><i class="fa-solid fa-download"></i></a>
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
<script src="./sidebar.js"></script>
</body>
</html>
<?php 
if(isset($_POST['submit'])){
  $name=$_POST['u_name'];
  $type=$_POST['u_type'];
  $label=$_POST['u_label'];
  $fault=$_POST['u_fault'];
  $correct=$_POST['u_correct'];
  $date=$_POST['u_date'];
  $sql="UPDATE `labels` SET u_name='$name', u_type='$type',u_label='$label', u_fault='$fault',u_correct='$correct',u_date='$date' WHERE `labels`.`id` = '$my_id'";
  $integrated=mysqli_query($con,$sql);
  if (!$sql) {
    echo 'The error is: ' . mysqli_error($integrated);
}
}
?>