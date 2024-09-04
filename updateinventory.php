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
  <title>INVENTORY</title>
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
          <h1>INVENTORY</h1>
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
        <div class="catch">
        <h1>UPDATE & MODIFY INVENTORY MANAGEMENT FORM</h1>
        <form  method="post" class="form-form">
          <div class="formation-1">
          <?php
          $my_id=$_GET['id'];
          $sqly = mysqli_query($con, "SELECT * FROM `inventory` WHERE id='$my_id'");
          while ($row = mysqli_fetch_array($sqly)):
        ?>
          <label for="">NAME</label>
          <input type="text" name="u_name" id="" required value="<?php echo $row['u_name'] ?>">
          <label for="">TYPE</label>
          <input type="text" name="u_type" id="" required value="<?php echo $row['u_type'] ?>">
          <label for="">STOCK</label>
          <input type="text" name="u_stock" id="" required value="<?php echo $row['u_stock'] ?>">
          <label for="">LEVEL</label>
          <select name="u_level" id="u_level">
            <option value=""></option>
            <option value="LEVEL ONE" <?php if ($row['u_level'] == 'LEVEL ONE') echo 'selected'; ?>>LEVEL ONE</option>
            <option value="LEVEL TWO" <?php if ($row['u_level'] == 'LEVEL TWO') echo 'selected'; ?>>LEVEL TWO</option>
            <option value="LEVEL THREE" <?php if ($row['u_level'] == 'LEVEL THREE') echo 'selected'; ?>>LEVEL THREE</option>
            <option value="LEVEL FOUR" <?php if ($row['u_level'] == 'LEVEL FOUR') echo 'selected'; ?>>LEVEL FOUR</option>
            <option value="LEVEL FIVE" <?php if ($row['u_level'] == 'LEVEL FIVE') echo 'selected'; ?>>LEVEL FIVE</option>
          </select>
          <label for="">SUPPLIER</label>
          <input type="text"  name="u_supplier" id="" required value="<?php echo $row['u_supplier'] ?>">
          <label for="">DATE</label>
          <input type="text" name="u_date" id="" value="<?php echo $row['u_date'] ?>" required>
        </div>
          <button name="submit" type="submit" class="btn-3" id="button-btn">SUBMIT</a>
          </button>
        </form>
        <?php
        endwhile;
        ?>
       </div>
    <div class="tablestotable">
      <div class="table-containment">
        <h1>DETAILS ON INVENTORY</h1>
        <table>
          <tr>
            <th>#</th>
            <th>PRODUCT NAME</th>
            <th>TYPE</th>
            <th>STOCK</th>
            <th>LEVEL</th>
            <th>SUPPLIER</th>
            <th>DATE</th>
            <th>MODIFY</th>
            <th>DELETE</th>
            <th>DOWNLOAD</th>
          </tr>
          <?php
          $sqly = mysqli_query($con, "SELECT * FROM `inventory`");
          $number = 0;
        while ($row = mysqli_fetch_array($sqly)):
        ?>
          <tr>
            <td><?php echo ++$number; ?></td>
            <td><?php echo $row['u_name']; ?></td>
            <td><?php echo $row['u_type']; ?></td>
            <td><?php echo $row['u_stock']; ?></td>
            <td><?php echo $row['u_level']; ?></td>
            <td><?php echo $row['u_supplier']; ?></td>
            <td><?php echo $row['u_date']; ?></td>
            <td>
            <button class="button-btn-2">
              <a href="updateinventory.php?id=<?php echo $row['id']?>">UPDATE</a>
            </button>
            </td>
            <td>
            <button class="button-btn-1" onclick="alert('ARE YOU SURE YOU WANT TO DELETE THIS USER')">
            <a href="deleteinventory.php?id=<?php echo $row['id']?>">REMOVE</a>
            </button>
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
</body>
</html>
<?php
if(isset($_POST['submit'])){
  $raw_material=$_POST['u_name'];
  $line_setup=$_POST['u_type'];
  $qc_check=$_POST['u_stock'];
  $Batchdate=$_POST['u_level'];
  $u_supplier=$_POST['u_supplier'];
  $inventory_update=$_POST['u_date'];
  $sql=mysqli_query($con,"UPDATE `inventory` SET u_name='$raw_material',u_type='$line_setup',u_stock='$qc_check',u_level='$Batchdate',u_supplier='$u_supplier',u_date='$inventory_update' WHERE id=$id");

  if($sql){
    echo "<script>alert('Documented Successfully')</script>";
  }
  else{
    echo "<script>alert('failed to document')</script>";
  }

}
?>
