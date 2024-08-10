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
  <link rel="shortcut icon" href="./image/images.jpeg" type="image/x-icon">
  <script src="https://kit.fontawesome.com/14ff3ea278.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="jsfile.js"></script>
  <script src="./extension_remover.js"></script>
  <script scr="./dropdown.js"></script>
  <title>DASHBOARD</title>
</head>
<body>
  <style>
    #main-contents{
      height:200vh;
    }
    .caradan-products{
      text-decoration: none;
    }
    .ropdown{
      padding:1rem 0rem;
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
          <h1>DASHBOARD</h1>
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
          <button name="submit" type="submit" class="btn-4" >
            <a href="registration.php">
            <i class="fa-solid fa-plus"></i>  
            </a>
          </button>
        </div> 
      </div>
 <!-- <div class="tye-wrapper">
                <h2>Hi <?php echo $row['u_name']; ?>, Here's what is recorded overall <br> from the information you provided</h2>
                <div class="tye">
                    <div class="urk-urk">
                        <div class="acanvas" id="first-one">
                          <h4><?php echo $totalData['Total']?> ORDERS</h4>
                            <canvas id="children">
                            </canvas>
                        </div>
                        <div class="acanvas" id="first-two">
                        <h4><?php echo $overallWeightData['overall_weight']?> KGS</h4>
                            <canvas id="stongone"></canvas>
                        </div>
                        <div class="acanvas" id="first-three">
                        <h4><?php echo $orderNumbersData['OrderNumbers']?>%</h4>
                            <canvas id="acquisitions"></canvas>
                        </div>
                        <div class="acanvas" id="first-four">
                        <h4><?php echo $totalCountData['TotalCount']?>%</h4>
                            <canvas id="beatit"></canvas>
                        </div>
                    </div>
                </div>      
  </div> -->
  <div class="tablestotable">
    <div class="table-containment">
    <?php
        $sql=mysqli_query($con,"SELECT * FROM `users`");
        $number=0;
        ?>
        <h1>AVAILABLE USERS OF THE USERS</h1>
        <table>
        <tr>
          <th>#</th>
          <th>NAME</th>
          <th>EMAIL</th>
          <th>DELETE</th>
        </tr>
        <?php 
        while($row=mysqli_fetch_array($sql)):
        ?>
        <tr>
          <td><?php echo ++$number ?></td>
          <td><?php echo $row['u_name']?></td>
          <td><?php echo $row['u_email']?></td>
          <td>
            <button class="delete-btn"><a href="delete-user.php?id=<?php echo $row['id'];?>">DELETE</button>
          </td>
        </tr>
        <?php 
        endwhile
        ?>
      </table>
    </div>
</div> 
  
 
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script src="./charts/linechart.js"></script>
<script src="./charts/app.js"></script>
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
<?php
require "./charts/app.php";
?>
</body>
</html>
