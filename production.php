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
  <title>PRODUCTION</title>
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
          <h1>PRODUCTION</h1>
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
      <?php
$sql = mysqli_query($con, "SELECT * FROM `production`");

$count_above_100 = 0;
$count_between_50_and_90 = 0;
$count_below_50 = 0;
while ($row = mysqli_fetch_array($sql)) {
    $qc = $row['qc_check'];
    $inventory = $row['inventory_update'];
    $demanding = $row['demand'];
    $total = $qc + $inventory + $demanding / 3;
    if ($total >= 90) {
        $count_above_100++;
    } elseif ($total >= 50 && $total < 90) {
        $count_between_50_and_90++;
    } else {
        $count_below_50++;
    }
        ?>
      <div class="bigm">
        <div class="tol">

          <div class="tyy">
          <div class="lel">
            <div class="first">COMPLETED</div>
            <div class="first"><i class="fa-solid fa-check"></i></div>
          </div>
            <div class="div-le"><?php echo $count_above_100?></div>
          </div>

          <div class="yyt">
          <div class="lel">
            <div class="first">IN-PROGRESS</div>
            <i class="fa-solid fa-list-check"></i>
          </div>
            <div class="div-le"><?php echo  $count_below_50?></div>
          </div>

          <div class="boo">
          <div class="lel">
            <div class="first">PENDING</div>
            <div class="first"><i class="fa-solid fa-stop"></i></div>
          </div>
            <div class="div-le"><?php echo $count_below_50?></div>
          </div>

          
        </div>
      </div><?php
      }
      ?>
      
      <style>
        .tyy{
          color: #12f570;
          background-color: #d6f0e1;
        }
        .boo{
          color: #f78484;
          background-color:  #f82a2a;
        }
        .yyt{
          color:#8ad2f3;
          background-color:#22b1f3;
        }
        .lel{
          margin:1rem;
          font-size:27px;
          display:grid;
          justify-content: space-between; 
          gap: 28vh; 
          grid-template-columns: repeat(2, 1fr); /
        }
        
        .div-le{
          display:grid;
          text-align:center;
          align-items:center;
          justify-content:center;
          font-size:50px;
        }
      </style>
      <div class="catch">
        <h1>PRODUCTION FORM </h1>
        <form  method="post" class="form-form">
          <div class="formation-1">
          <label for="">RAW MATERIAL</label>
          <input type="text" name="raw_material" id="" required>
          <label for="">PRODUCTION LINE SETUP</label>
          <input type="text" name="line_setup" id="" required>
          <label for="">QC CHECK</label>
          <input type="number" name="qc_check" id="" required maxlength="2" placeholder="1% - 99%">
          <label for="">BATCH PRODUCTION</label>
          <input type="date" name="Batchdate" id="" value="<?php echo date('y-m-d')?>" required>
          <label for="">INVENTORY UPDATE</label>
          <input type="number"  name="inventory_update" id="" required maxlength="2" placeholder="1% - 99%">
          <label for="">DEMAND FORECASTING UPDATE</label>
          <input type="number"  name="demand" id="" required maxlength="2" placeholder="1% - 99%">
        </div>
          <button name="submit" type="submit" class="btn-3" id="button-btn">SUBMIT</a>
          </button>
        </form>
       </div>

       

       <div class="tablestotable">
    <div class="table-containment">
    <?php
        $sql=mysqli_query($con,"SELECT * FROM `production`");
        $number=0;
        ?>
        <h1>DETAILS ON THE PRODUCTION RATE OF OUR PRODUCTS</h1>
        <table>
        <tr>
          <th>#</th>
          <th>RAW MATERIAL</th>
          <th>QC CHECK</th>
          <th>INVENTORY UPDATE</th>
          <th>PRODUCTION LINE SETUP</th>
          <th>BATCH PRODUCTION</th>
          <th>DEMAND FORECASTING UPDATE</th>
          <th>UPDATE</th>
          <th>DOWNLOAD</th>
        </tr>
        <?php 
        while($row=mysqli_fetch_array($sql)):
        ?>
        <tr>
          <td><?php echo ++$number ?></td>
          <td><?php echo $row['raw_material']?></td>
          <td><?php echo $row['line_setup']?></td>
          <td><?php echo $row['qc_check']?>%</td>
          <td><?php echo $row['Batchdate']?></td>
          <td><?php echo $row['inventory_update']?>%</td>
          <td><?php echo $row['demand']?>%</td>
          <td>
            <button class="update-btn"><a href="update-production.php?id=<?php echo $row['id'];?>">MODIFY</button>
          </td>
          <td><button class="view-btn">
            <a href="./pdf/production.php"><i class="fa-solid fa-circle-down"></i></a>
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
  $raw_material=$_POST['raw_material'];
  $line_setup=$_POST['line_setup'];
  $qc_check=$_POST['qc_check'];
  $Batchdate=$_POST['Batchdate'];
  $inventory_update=$_POST['inventory_update'];
  $demand=$_POST['demand'];
  $sql=mysqli_query($con,"INSERT INTO production VALUES('','$raw_material','$line_setup','$qc_check','$Batchdate','$inventory_update','$demand')");

  if($sql){
    echo "<script>alert('Documented Successfully')</script>";
  }
  else{
    echo "<script>alert('failed to document')</script>";
  }

}
?>