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
  <script src="./extension_remover.js"></script>
  <title>SUPPLY CHAIN</title>
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
    option{
              border-radius:20px
            }
            select{
              border-radius:15px;
              border-top: 1px solid black;
            }
  </style>
<div class="sidebar">
      <ul class="menu">
        <div class="logout">
        <li>
        <a href="userdashboard.php">
            <i class="fa-solid fa-house-chimney"></i>
            <span>DASHBOARD</span>
          </a>
        </li>
        <div class="ropdown">
          <div class="select">
          <i class="fa-brands fa-product-hunt"></i>
              <span class="selectee">PRODUCTION</span>
              <div class="caret"></div>
          </div>
          <ul class="fireef">
              <li>
              <a href="userproduction.php">PRODUCT PLANNING & SCHEDULING </a></li>
              <li>
              <a href="userresources.php">RESOURCES & DEMAND</a></li>
          </ul>
      </div>
        <li>
          <a href="userinventory.php">
            <i class="fa-solid fa-warehouse"></i>
            <span>INVENTORY</span>
          </a>
        </li>
        <li>
          <a href="userquality-assurance.php">
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
              <a href="useradd-items.php">ADD ITEMS </a></li>
              <li>
              <a href="userasset-management.php">ASSET MANAGEMENT</a></li>
              <li>
              <a href="usernotifications.php">NOTIFICATIONS</a></li>
          </ul>
      </div>
        <li>
          <a href="usersupply-chain.php">
          <i class="fa-solid fa-boxes-packing"></i>
            <span>SUPPLY CHAIN</span>
          </a>
        </li>
        <li>
          <a href="userregulations.php">
          <i class="fa-solid fa-scale-balanced"></i>
            <span>REGULATORY COMPLIANCE</span>
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
          <h1>SUPPLY CHAIN</h1>
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
          <label for="">PRODUCTS</label>
          <input type="text" name="u_productname" id="" placeholder="PRODUCT NAME" required>
          <label for="">QUANTITY (TONS)</label>
          <input type="text" name="u_quantity" id="" required placeholder="NUMBER OF TONS">
          <label for="">AMOUNT</label>
          <input type="text" name="u_amount" id="" required placeholder="$$$">
          <label for="">SUPPLIER</label>
          <input type="text" name="u_supplier" id="" required>
          <label for="">DISTRIBUTOR</label>
          <input type="text" name="u_distributor" id="" required>
          <label for="">FIRST MAINTENANCE DATE</label>
          <input type="date" name="date" required>
          <label for="">STATUS</label>
          <select name="status" id="">
            <option value="N/A"></option>
            <option value="in-transit">In-transit</option>
            <option value="Delivered">Delivered</option>
            <option value="Pending">Pending</option>
          </select>
          <label for="">COLLABORATION TOOLS</label>
          <input type="text" name="u_tools" required>
        </div>
          <button name="submit" type="submit" class="btn-3" id="button-btn">SUBMIT</a>
          </button>
        </form>
       </div>

       

       <div class="tablestotable">
    <div class="table-containment">
    <?php
        $sql=mysqli_query($con,"SELECT * FROM `supply-chain` ");
        $number=0;
        ?>
        <h1>DETAILS ON THE PRODUCTION RATE OF OUR PRODUCTS</h1>
        <table>
        <tr>
          <th>#</th>
          <th></th>
          <th>PRODUCT NAME</th>
          <th>QUANTITY</th>
          <th>AMOUNT</th>
          <th>SUPPLIER</th>
          <th>DISTRIBUTOR</th>
          <th>DATE</th>
          <th>STATUS</th>
          <th>UPDATE</th>
          <th>DELETE</th>
        </tr>
        <?php 
        while($row=mysqli_fetch_array($sql)):
        ?>
        <tr>
          <td><?php echo ++$number ?></td>
          <td><?php echo $row['u_productname']?></td>
          <td><?php echo $row['u_quantity']?></td>
          <td><?php echo $row['u_amount']?></td>
          <td><?php echo $row['u_supplier']?></td>
          <td><?php echo $row['u_distributor']?></td>
          <td><?php echo $row['date']?></td>
          <td><?php echo $row['status']?></td>
          <td><?php echo $row['u_tools']?></td>
          <td>
            <button class="update-btn"><a href="update-supplychain.php?id=<?php echo $row['id'];?>">MODIFY</button>
          </td>
          <td>
            <button class="delete-btn"><a href="delete-supplychain.php?id=<?php echo $row['id'];?>">DELETE</button>
          </td>
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
  $raw_material=$_POST['u_productname'];
  $line_setup=$_POST['u_quantity'];
  $qc_check=$_POST['u_amount'];
  $Batchdate=$_POST['u_supplier'];
  $u_distributor=$_POST['u_distributor'];
  $date=$_POST['date'];
  $demand=$_POST['status'];
  $u_tools=$_POST['u_tools'];
  $sql=mysqli_query($con,"INSERT INTO `supply-chain` VALUES('','$raw_material','$line_setup','$qc_check','$Batchdate','$u_distributor','$date','$demand','$u_tools')");

  if($sql){
    echo "<script>alert('Documented Successfully')</script>";
  }
  else{
    echo "<script>alert('failed to document')</script>";
  }

}
?>