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
  <title>BATCH MANAGEMENT</title>
</head>
<body>
  <style>
    #main-contents{
      height:fit-content;
      overflow-y:auto;
      padding-bottom:3rem;
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
        <a href="userdashboard.php">
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
          <a href="userinventory.php">
            <i class="fa-solid fa-warehouse"></i>
            <span>INVENTORY</span>
          </a>
        </li>
        <li>
          <a href="userquality.php">
          <i class="fa-solid fa-toggle-on"></i>
            <span>QUALITY CONTROL</span>
          </a>
        </li>
        <li>
          <a href="usererpsystems.php">
          <i class="fa-brands fa-ubuntu"></i>
            <span>ERP SYSTEMS</span>
          </a>
        </li>
        <li>
          <a href="usertraceability.php">
          <i class="fa-solid fa-shuffle"></i>
            <span>TRACEABILITY</span>
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
              <li>
              <a href="usermaintenance.php">MANTENANCE</a></li>
              <li>
              <a href="usertrainings.php">TRAININGS</a></li>
          </ul>
      </div>
        <li>
          <a href="useremail.php">
          <i class="fa-solid fa-envelope"></i>
            <span>FEEDBACK</span>
          </a>
        </li>
        <li>
          <a href="userprofile.php">
          <i class="fa-solid fa-user"></i>
            <span>PROFILE</span>
          </a>
        </li>
    </ul>
  </div>


    <div class="main-content content-right" id="main-contents">
      <div class="header-wrapper">
        <div class="header-title">
          <h1>BATCH MANAGEMENT</h1>
        </div>
        <div class="user-info">
        <div class="gango">
          <?php
            $sql=mysqli_query($con, "SELECT u_name from `users` WHERE id='$id'");
            $row=mysqli_fetch_array($sql);
            $attorney=$row['u_name'];
            ?>
          <h2 class="my-account-header">
          <?php echo $attorney?>
            </h2>
          <p>User</p></div> 
          <button name="submit" type="submit" class="btn-3" >
            <a href="logout.php">LOGOUT</a>
          </button>
        </div>
        </div>

        <section class="make-new">
          <h2>SCANNER</h2>
          <div class="make-new-1">
            <i class="fa-solid fa-circle-exclamation"></i>
            <div class="make-new-2">
              <h2>Guide Of Use:</h2>
              <li class="li">
                <li>Take your Bottle</li>
                <li>Drag close to your device camera position</li>
              </li>
            </div>
          </div>
          <div class="catch">
        <h1>BATCH MANAGEMENT</h1>
        <form  method="post" class="form-form">
          <div class="formation-1">
          <label for="">NAME</label>
          <input type="text" name="u_name" id="" required placeholder="PRODUCT NAME">
          <label for="">TYPE</label>
          <input type="text" name="u_type" id="" required placeholder="TYPE">
          <label for="">SCANS</label>
          <input type="text" name="u_scans" id="" required placeholder="SCANS">
          <label for="">FAULTS</label>
          <input type="text"  name="faults" id="" required placeholder="FAULTS">
          <label for="">DATE</label>
          <input type="text" name="u_date" id="" value="<?php echo date('y-m-d')?>" required>
        </div>
          <button name="submit" type="submit" class="btn-3" id="button-btn">SUBMIT</a>
          </button>
        </form>
       </div>
    <div class="tablestotable">
      <div class="table-containment">
        <h1>DETAILS ON PACKAGING LISTS</h1>
        <table>
          <tr>
            <th>#</th>
            <th>PRODUCT NAME</th>
            <th>TYPE</th>
            <th>SCANS</th>
            <th>FAULTS</th>
            <th>DATE</th>
            <th>MODIFY</th>
            <th>DELETE</th>
            <th>DOWNLOAD</th>
          </tr>
          <?php
          $sqly = mysqli_query($con, "SELECT * FROM `batchmanagement`");
          $number = 0;
        while ($row = mysqli_fetch_array($sqly)):
        ?>
          <tr>
            <td><?php echo ++$number; ?></td>
            <td><?php echo $row['u_name']; ?></td>
            <td><?php echo $row['u_type']; ?></td>
            <td><?php echo $row['u_scans']; ?></td>
            <td><?php echo $row['faults']; ?></td>
            <td><?php echo $row['u_date']; ?></td>
            <td>
            <button class="button-btn-2">
              <a href="updatebatchmanagement.php?id=<?php echo $row['id']?>">UPDATE</a>
            </button>
            </td>
            <td>
            <button class="button-btn-1" onclick="alert('ARE YOU SURE YOU WANT TO DELETE THIS USER')">
            <a href="deletebatchmanagement.php?id=<?php echo $row['id']?>">REMOVE</a>
            </button>
            </td>
            <td>
              <a href="./pdf/batchmanagement.php"><i class="fa-solid fa-download"></i></a>
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
          td i{
            font-size:20px;

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
  $raw_material=$_POST['u_name'];
  $line_setup=$_POST['u_type'];
  $qc_check=$_POST['u_scans'];
  $Batchdate=$_POST['faults'];
  $inventory_update=$_POST['u_date'];
  $sql=mysqli_query($con,"INSERT INTO batchmanagement VALUES('','$raw_material','$line_setup','$qc_check','$Batchdate','$inventory_update')");

  if($sql){
    echo "<script>alert('Documented Successfully')</script>";
  }
  else{
    echo "<script>alert('failed to document')</script>";
  }

}
?>