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
  <link rel="stylesheet" href="./CSS/tables.css">
  <link rel="stylesheet" href="./CSS/charts.css">
  <link rel="shortcut icon" href="./image/images.jpeg" type="image/x-icon">
  <script src="https://kit.fontawesome.com/14ff3ea278.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="jsfile.js"></script>
  <script scr="dropdown.js"></script>
  <title>EQUIPMENTS</title>
</head>
<body>
  <style>
    #main-contents{
      height:200vh;
    }
    .caradan-products{
      text-decoration: none;
    }
    #clear{
      margin-right:3rem;
    }
    .catch h1{
      text-align:center
    }
    .logout i{
      color:black;
    }
    
    .form-form{
      width:fit-content;
      padding-right: 1rem;
    }
    option{
              border-radius:20px
            }
            select{
              border-radius:15px;
              border-top: 1px solid black;
            }
            input[name="asset_id"]{
              /* display:none; */
            }
  </style>
<div class="sidebar">
      <ul class="menu">
        <div class="logout">
        <li>
          <a href="dashboard.php">
            <i class="fa-solid fa-house-chimney"></i>
            <span>DASHBOARD</span>
          </a>
        </li>
        <li>
          <a href="production.php">
            <i class="fa-brands fa-product-hunt"></i>
            <span>PRODUCTION</span>
          </a>
        </li>
        <li>
          <a href="inventory.php">
            <i class="fa-solid fa-warehouse"></i>
            <span>INVENTORY</span>
          </a>
        </li>
        <li>
          <a href="quality-assurance.php">
            <i class="fa-solid fa-medal"></i>
            <span>QA ASSURANCE</span>
          </a>
        </li>
        <div class="ropdown">
          <div class="select">
              <i class="fa-solid fa-wrench"></i>
              <span class="selectee">EQUIPMENT MANTENANCE</span>
              <div class="caret"></div>
          </div>
          <ul class="fireef">
              <li>
              <a href="add-items.php">ADD ITEMS </a></li>
              <li>
              <a href="asset-management.php">ASSET MANAGEMENT</a></li>
              <li>
              <a href="notifications.php">NOTIFICATIONS</a></li>
          </ul>
      </div>
        <li>
          <a href="supply-chain.php">
          <i class="fa-solid fa-boxes-packing"></i>
            <span>SUPPLY CHAIN</span>
          </a>
        </li>
        <li>
          <a href="regulations.php">
          <i class="fa-solid fa-scale-balanced"></i>
            <span>REGULATORY COMPLIANCE</span>
          </a>
        </li>
        <li>
          <a href="profile.php">
          <i class="fa-solid fa-user"></i>
            <span>PROFILE</span>
          </a>
        </li>
    </ul>
  </div>


    <div class="main-content content-right" id="main-contents">
      <div class="header-wrapper">
        <div class="header-title">
          <h1>ADD EQUIPMENTS</h1>
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
      
      <div class="catch">
        <form  method="post" class="form-form">
          <div class="formation-1">
          <label for="">EQUIPMENT</label>
          <input type="text" name="equipment" id="" placeholder="NAME" required>
          <label for="">MAINTENANCE TASK</label>
          <input type="text" name="maintenance_task" id="" required placeholder="TASK NAME">
          <label for="">FREQUENCY</label>
          <input type="text" name="frequency" id="" required placeholder="MONTHLY">
          <label for="">FIRST MAINTENANCE DATE</label>
          <input type="text" name="first_maintenance" required value="<?php echo date('Y-m-d');?>">
          <label for="">LAST MAINTENANCE DATE</label>
          <input type="date"  name="last_maintenance" required >
          <label for="">STATUS</label>
          <select name="status" id="">
            <option value="N/A"></option>
            <option value="scheduled">SCHEDULED</option>
            <option value="In-progress">IN-PROGRESS</option>
            <option value="completed">COMPLETED</option>
          </select>
          <?php
          $ty=mysqli_query($con,"SELECT id from `assets`");
          $robin=mysqli_fetch_array($ty);
          ?>
          <input type="number"  name="asset_id" value="<?php echo $robin['id']?>" required>
        </div>
          <button name="submit" type="submit" class="btn-3" id="button-btn">SUBMIT</a>
          </button>
        </form>
       </div>

       

       <div class="tablestotable">
    <div class="table-containment">
    <?php
        $sql=mysqli_query($con,"SELECT * FROM `equipments`");
        $number=0;
        ?>
        <h1>DETAILS ON THE PRODUCTION RATE OF OUR PRODUCTS</h1>
        <table>
        <tr>
          <th>#</th>
          <th>EQUIPMENTS</th>
          <th>MANTENANCE TASK</th>
          <th>FREQUENCY</th>
          <th>FIRST MANTENANCE</th>
          <th>LAST MANTENANCE</th>
          <th>STATUS</th>
          <th>DELETE</th>
          <th>DOWNLOAD</th>
        </tr>
        <?php 
        while($row=mysqli_fetch_array($sql)):
        ?>
        <tr>
          <td><?php echo ++$number ?></td>
          <td><?php echo $row['equipment']?></td>
          <td><?php echo $row['maintenance_task']?></td>
          <td><?php echo $row['frequency']?></td>
          <td><?php echo $row['first_maintenance']?></td>
          <td><?php echo $row['last_maintenance']?></td>
          <td><?php echo $row['status']?></td>
          <td>
            <button class="delete-btn"><a href="delete-items.php?id=<?php echo $row['id'];?>">DELETE</button>
          </td>
          <td><button class="view-btn">
            <a href="./pdf/items.php"><i class="fa-solid fa-circle-down"></i></a>
          </button></td>
        </tr>
        <?php 
        endwhile
        ?>
      </table>
    </div>
</div> 
</div> 

  
 <script>
    document.addEventListener('DOMContentLoaded', () => {
const dropdowns = document.querySelectorAll('.ropdown');

dropdowns.forEach(dropdown => {
const select = dropdown.querySelector('.select');
const caret = dropdown.querySelector('.caret');
const menu = dropdown.querySelector('.fireef');
const options = dropdown.querySelectorAll('.fireef li');
const selected = dropdown.querySelector('.selectee');

select.addEventListener('click', () => {
select.classList.toggle('select-clicked');
caret.classList.toggle('caret-rotate');
menu.classList.toggle('menu-open');
});

options.forEach(option => {
option.addEventListener('click', () => {
selected.innerText = option.innerText;
select.classList.remove('select-clicked');
caret.classList.remove('caret-rotate');
menu.classList.remove('menu-open');
});
});
});
});

 </script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</script>
</body>
</html>
<?php
if(isset($_POST['submit'])){
  $raw_material=$_POST['equipment'];
  $line_setup=$_POST['maintenance_task'];
  $qc_check=$_POST['frequency'];
  $Batchdate=$_POST['first_maintenance'];
  $inventory_update=$_POST['last_maintenance'];
  $demand=$_POST['status'];
  $asset_id=$_POST['asset_id'];
  $sql=mysqli_query($con,"INSERT INTO `equipments` VALUES('','$raw_material','$line_setup','$qc_check','$Batchdate','$inventory_update','$demand','$asset_id')");

  if($sql){
    echo "<script>alert('Documented Successfully')</script>";
  }
  else{
    echo "<script>alert('failed to document')</script>";
  }

}
?>