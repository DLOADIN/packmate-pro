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
  <script src="./sidebar.js"></script>
  <script src="./dropdown.js"></script>
  <link rel="stylesheet" href="./CSS/alert.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <title>ERP SYSTEMS</title>
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
    .sidebar{
      padding: 0rem 1.7rem 0rem 1.7rem;
      width: 68px;
      height: 70vh;
    }
    
  </style>
  
  <div class="sidebar">
      <ul class="menu">
        <div class="logout">
        <li>
        <a href="dashboard.php">
            <i class="fa-solid fa-house-chimney"></i>
            <span>HOME</span>
          </a>
        </li>
        <li>
          <a href="usererpsystems.php">
          <i class="fa-brands fa-ubuntu"></i>
            <span>ERP SYSTEMS</span>
          </a>
        </li>
        
        <li>
          <a href="notifications.php">
          <i class="fa-solid fa-circle-exclamation"></i>
            <span>NOTIFICATIONS</span>
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
          <h1>ERP SYSTEMS</h1>
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
          <p>Admin</p></div> 
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
        
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
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