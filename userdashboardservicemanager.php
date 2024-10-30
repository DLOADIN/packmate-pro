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

$sqlinventory = "SELECT count(*) AS inventory FROM 
`inventory`";
$sqlmaintenance = "SELECT count(*) AS maintenance FROM 
`maintenance`";
$sqlquality = "SELECT count(*) AS quality FROM `user_quality`";
$sqltraceability = "SELECT COUNT(*) AS traceability FROM `traceability`";
$sqlsupply = "SELECT COUNT(*) AS supply FROM `supply`";

$totalinventory = mysqli_query($con, $sqlinventory);
$totalmaintenance = mysqli_query($con, $sqlmaintenance);
$totalquality = mysqli_query($con, $sqlquality);
$totaltraceability = mysqli_query($con, $sqltraceability);
$totalsupply = mysqli_query($con, $sqlsupply);

if ($totalinventory && $totalmaintenance && $totalquality && $totaltraceability && $totalsupply) {
  $inventory_row = mysqli_fetch_assoc($totalinventory);
  $maintenance_row = mysqli_fetch_assoc($totalmaintenance);
  $quality_row = mysqli_fetch_assoc($totalquality);
  $traceability_row = mysqli_fetch_assoc($totaltraceability);
  $supply_row = mysqli_fetch_assoc($totalsupply);

  // Access the counts
  $inventory_count = $inventory_row['inventory'];
  $maintenance_count = $maintenance_row['maintenance'];
  $quality_count = $quality_row['quality'];
  $traceability_count = $traceability_row['traceability'];
  $supply_count = $supply_row['supply'];

  $total_count = $inventory_count + $maintenance_count + $quality_count + $traceability_count + $supply_count;
} else {
  // Handle query errors
  echo "Error executing queries: " . mysqli_error($con);
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
  <link rel="shortcut icon" href="./image/thebutcher-removebg-preview.png" type="image/x-icon">
  <script src="https://kit.fontawesome.com/14ff3ea278.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="jsfile.js"></script>
  <script src="./dropdown.js"></script>
  <link rel="stylesheet" href="./CSS/alert.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <title>DASHBOARD</title>
</head>
<body>
  <style>
    #main-contents{
      height:fit-content;
      overflow-y:auto;
      padding-bottom:30rem;
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
              <li>
              <a href="usermaintenance.php">MANTENANCE</a></li>
              <li>
              <a href="usertrainings.php">TRAININGS</a></li>
          </ul>
      </div>
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
        <style>
          .major-data{
            display:flex;
            gap:3rem;
            justify-content:center;
            align-items:center;
            margin:1rem;
          }
          .dattaa1,.dattaa2,.dattaa3,.dattaa4,.dattaa5{
            border:solid 1px black;
            background-color:white;
            border-radius:20px;
            width:40vh;
            height:20vh;
          }
          .major-data h6{
            text-align:left;
            margin:7px 0px 0px 20px;
            color:grey;
            font-size:12px;
          }
          canvas{
            height:60px;
            width:20px;
          }
          .major-data i{
            display:flex;
            margin:7px 20px 0px 0px;
            color:#EC9124;
          }
          .inventi{
            display:flex;
            justify-content:space-between;
          }
          .dattaa1,.dattaa2,.dattaa3,.dattaa4,.dattaa5 h2{
            font-size:25px;
          }
          .givee{
            display:flex;
            padding-top:2.1rem;
            justify-content:space-between;
          }
        </style>
        <div class="major-data">
            <div class="dattaa1">
              <div class="inventi">
                <h6>TOTAL INVENTORY </h6>
                <h5><i class="fa-solid fa-warehouse"></i></h5>
              </div>
                <h2 style="padding-left:40px"><?php echo $inventory_count?></h2>
                <div class="givee">
                  <h6 class="greets">In the last 30 days</h6>
                  <?php 
                  if($inventory_count > 5){
                    echo "<i class='fa-solid fa-arrow-trend-up'></i>";
                  }
                  else{
                    echo "<i class='fa-solid fa-arrow-trend-down'></i>";
                  }
                  ?>
                </div>
            </div>
            <div class="dattaa2">
              <div class="inventi">
                <h6>TOTAL MAINTENANCE DATA</h6>
                <h5><i class="fa-solid fa-hand-sparkles"></i></h5>
              </div>
              <h2 style="padding-left:40px"><?php echo $maintenance_count?></h2>
              <div class="givee">
              <h6 class="greets">In the last 30 days</h6>
                  <?php 
                  if($maintenance_count > 5){
                    echo "<i class='fa-solid fa-arrow-trend-up'></i>";
                  }
                  else{
                    echo "<i class='fa-solid fa-arrow-trend-down'></i>";
                  }
                  ?>
                </div>
            </div>
            <div class="dattaa3">
              <div class="inventi">
                <h6>TOTAL QUALITY DATA</h6>
                <h5><i class="fa-solid fa-toggle-on"></i></h5>
              </div>
              <h2 style="padding-left:40px"><?php echo $quality_count?></h2>
              <div class="givee">
                  <h6 class="greets">In the last 30 days</h6>
                  <?php 
                  if($quality_count > 5){
                    echo "<i class='fa-solid fa-arrow-trend-up'></i>";
                  }
                  else{
                    echo "<i class='fa-solid fa-arrow-trend-down'></i>";
                  }
                  ?>
                </div>
            </div>
            <div class="dattaa4">
              <div class="inventi">
                <h6>TOTAL TRACEABILITY DATA</h6>
                <h5><i class="fa-solid fa-shuffle"></i></h5>
              </div>
              <h2 style="padding-left:40px"><?php echo $traceability_count?></h2>
                <div class="givee">
                  <h6 class="greets">In the last 30 days</h6>
                  <?php 
                  if($traceability_count > 5){
                    echo "<i class='fa-solid fa-arrow-trend-up'></i>";
                  }
                  else{
                    echo "<i class='fa-solid fa-arrow-trend-down'></i>";
                  }
                  ?>
                </div>
            </div>
            <div class="dattaa4">
              <div class="inventi">
                <h6>TOTAL SUPPLY DATA</h6>
                <h5><i class="fa-solid fa-parachute-box"></i></h5>
              </div>
              <h2 style="padding-left:40px">1</h2>
              <div class="givee">
                  <h6 class="greets">In the last 30 days</h6>
                  <?php 
                  if($supply_count > 5){
                    echo "<i class='fa-solid fa-arrow-trend-up'></i>";
                  }
                  else{
                    echo "<i class='fa-solid fa-arrow-trend-down'></i>";
                  }
                  ?>
                </div>
            </div>
        </div>
        <div class="fallene">
              <div class="failll">
                <canvas id="myBarChart" width="400" height="200"></canvas>
              </div>
              <div class="gayin">
                <h2 class="fitt-h2">Top Countries With Most Packmate Usage</h2>
                  <div class="fitt">
                    <div class="fattttw">
                      <img src="./image/Flag_of_the_United_States.png" alt="">
                      <img src="./image/Flag_of_Canada_(Pantone).svg.png" alt="">
                      <img src="./image/images (2).png" alt="">
                      <img src="./image/images.png" alt="">
                      <img src="./image/images (1).png" alt="">
                    </div>
                    <div class="pullc-l">
                      <h2>United States</h2>
                      <h2>Canada</h2>
                      <h2>United Kingdom</h2>
                      <h2>Australia</h2>
                      <h2>India</h2>
                      
                    </div>
                    <div class="pullc-1">
                      <h2>46%</h2>
                      <h2>25%</h2>  
                      <h2>11%</h2>
                      <h2>10%</h2>
                      <h2>8%</h2>
                    </div>
                    
                    </div>
                  </div>
              </div>
              
            </div>
            <style>
              .fitt{
                display:flex;
                align-items:center;
                justify-content:center;
                gap:5rem;
                padding-top:2rem;
              }
              .pullc-l{
                display:flex;
                align-items:center;
                justify-content:center;
                gap:4.5rem;
                flex-direction:column
              }
              .pullc-1{
                display:flex;
                align-items:center;
                justify-content:center;
                gap:4.5rem;
                flex-direction:column
              }
              .fattttw{
                display:flex;
                align-items:center;
                justify-content:center;
                gap:1rem;
                flex-direction:column;
                padding-top:
              }
              .fattttw img{
                width:5rem;
                height:5rem;
                border-radius:50%;
                border:1px solid #fff
              }
              .gayin .fitt-h2{
                text-align:center;
              }
              .fallene{
                display:grid;
                gap:4rem;
                grid-template-columns:repeat(2,1fr);
                padding:2rem
              }
              .failll canvas{
                width:120vh;
                height:60vh;
              }
              .gayin{
                width:70vh;
                height:fit-content;
                padding-bottom:1rem;
                padding-top:1rem;
                background:white;
                border: none;
                border-radius:20px
              }
            </style>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script src="./sidebar.js"></script>
</body>
</html>
<script>
const ctx = document.getElementById('myBarChart').getContext('2d');
const myBarChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Inventory', 'Maintenance', 'Quality', 'Traceability', 'Supply'],
        datasets: [{
            label: 'Total Counts',
            data: [<?php echo $inventory_count; ?>, <?php echo $maintenance_count; ?>, <?php echo $quality_count; ?>, <?php echo $traceability_count; ?>, <?php echo $supply_count; ?>], 
            backgroundColor: '#EC9124',
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 0
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>