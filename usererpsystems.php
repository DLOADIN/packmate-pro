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
  <script src="https://cdn.jsdelivr.net/npm/progressbar.js"></script>
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
      height:160vh;
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
</div>

<div class="circle-chart" id="circle"></div>
<h2 class="real-time">Real Time Performance Detector</h2>

<div class="performance-stats">
    <div class="stats-item">
        <h3>Labeled & Sealed Bottles</h3>
        <p>2000 <span class="task-progress">Tasks Not Finished - 30%</span></p>
        <hr class="divider-hr">
    </div>
    <div 
    class="stats-item">
        <h3>Quality Checked Bottles</h3>
        <p>515 <span class="task-progress">Tasks Not Finished - 30%</span></p>
        <hr class="divider-hr">
    </div>
</div>
<style>
  .user-forgetting{
    display:flex;
  }
  .user-margin,.laey{
    padding:20px;
    display:flex;
    gap:2rem
  }
  .laey{
    padding:20px 0px 0px 20px;
    display:flex;
    flex:3rem;
  }

  .fieldss-make{
    width:50vh;
    
    height:fit-content;
    border-radius:20px;
    box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
    text-align:center;
  }
  canvas{
    width:fit-content;
    height:40vh;
    border-radius:20px;
    padding:0px 10px;
    box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
  }
  .gahu{
    display:flex;
    gap:.6rem;
    justify-content:center;
    font-size:30px;
    padding:2rem;
  }
  .gahu i,.gahu-heading{
    color:#EC9124
  }
</style>
<div class="user-forgetting">
    <div class="laey">
      <canvas id="bar-chart" width="600" height="300">

      </canvas>
    </div>
    <div class="user-margin">
      <div class="fieldss-make">
        <h2>Beverage Categories</h2>
        <div class="gahu">
          <i class="fa-solid fa-bottle-water"></i>
          <h4>Non - Alcoholic Beverages</h4>
          <h4 class="gahu-heading">96.42%</h4>
        </div>
        <div class="gahu">
          <i class="fa-solid fa-wine-bottle"></i>
          <h4> Alcoholic Beverages</h4>
          <h4 class="gahu-heading">3.58%</h4>
        </div>
      </div>
      <div class="fieldss-make">
      <h2>Top Beverages</h2>
        <div class="gahu">
          <h4>Radisson Blu Hotels</h4>
          <h4 class="gahu-heading">48%</h4>
        </div>
        <div class="gahu">
          <h4>Marriot Hotels</h4>
          <h4 class="gahu-heading">12%</h4>
        </div>
        <div class="gahu">
          <h4>Blue Star Hotel</h4>
          <h4 class="gahu-heading">9%</h4>
        </div>
      </div>
    </div>
</div>

<style>
   .process-flow {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            max-width: 1000vh;
            padding: 20px;
        }

        .circle-container {
            display: flex;
            align-items: center;
            position: relative;
        }
        .circle:hover {
            transform:scale(1.1);
            transition:.6s all ease-in-out;
        }
        .circle {
            max-width: 200px;
            width: 200px;
            height: 180px;
            border-radius: 50%;
            background-color: white;
            border: 6px solid #EC9124;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            position: relative;
            margin: 20px 30px;
            : 0px 4px 6px rgba(0, 0, 0, 0.1);
        }

        .circle-container:not(:last-child):after {
            content: '';
            width: 100px;
            height: 2px;
            background-color: #EC9124;
            position: absolute;
            right: -110px; 
            top: 50%;
            transform: translateY(-50%);
        }

        .circle-container:not(:last-child):before {
            content: '';
            width: 0;
            height: 0;
            border-top: 6px solid transparent;
            border-bottom: 6px solid transparent;
            border-left: 10px solid #EC9124; /* Arrow head */
            position: absolute;
            right: -120px; /* Adjust based on spacing */
            top: 50%;
            transform: translateY(-50%);
        }

        .circle-number {
            font-size: 30px;
            font-weight: bold;
            color: #EC9124;
        }

        .circle-text {
            text-align: center;
            font-size: 16px;
            color: #333;
        }

        @media (max-width: 768px) {
            .process-flow {
                flex-direction: column;
            }

            .circle-container:after, .circle-container:before {
                display: none; /* Hide arrows on mobile */
            }
        }
</style>

<h2 class="real-time">Workflows</h2>
<div class="process-flow">
        <div class="circle-container">
            <div class="circle">
                <div class="circle-number">01</div>
                <div class="circle-text">Gathering Materials</div>
            </div>
        </div>

        <div class="circle-container">
            <div class="circle">
                <div class="circle-number">02</div>
                <div class="circle-text">Bottle Branding</div>
            </div>
        </div>

        <div class="circle-container">
            <div class="circle">
                <div class="circle-number">03</div>
                <div class="circle-text">Product QR Scanning</div>
            </div>
        </div>

        <div class="circle-container">
            <div class="circle">
                <div class="circle-number">04</div>
                <div class="circle-text">Quality Checking</div>
            </div>
        </div>

        <div class="circle-container">
            <div class="circle">
                <div class="circle-number">05</div>
                <div class="circle-text">Delivering Products</div>
            </div>
        </div>
    </div>


        </div>

        
<script>
    var bar = new ProgressBar.Circle(circle, {
        color: '#EC9124',
        strokeWidth: 10,
        trailWidth: 4,
        easing: 'easeInOut',
        duration: 1400,
        text: {
            autoStyleContainer: false
        },
        from: { color: '#EC9124', width: 10 },
        to: { color: '#EC9124', width: 10 },
        step: function(state, circle) {
            circle.path.setAttribute('stroke', state.color);
            circle.path.setAttribute('stroke-width', state.width);

            var value = Math.round(circle.value() * 6000); 
            if (value === 0) {
                circle.setText('');
            } else {
                circle.setText('<span class="progressbar-text-number">' + value + '</span> <span class="beerbongs-bentley">Bottles');
            }
        }
    });

    bar.text.style.fontFamily = '"Raleway", Helvetica, sans-serif';
    bar.text.style.fontSize = '24px';
    bar.animate(1.0); 

    const ctx = document.getElementById('bar-chart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September'],
                datasets: [{
                    label: 'Sales Data',
                    data: [2060, 1893, 3000, 1925, 18372, 2303, 2810, 1315, 8], 
                    borderColor: '#EC9124', 
                    backgroundColor: 'rgba(236, 145, 36, 0.2)', 
                    fill: true 
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            color: 'black' 
                        }
                    },
                    x: {
                        ticks: {
                            color: 'black' 
                        }
                    }
                },
                plugins: {
                    legend: {
                        labels: {
                            color: 'black' 
                        }
                    },
                    tooltip: {
                        titleColor: 'black', 
                        bodyColor: 'black' 
                    }
                }
            }
        });
</script>
<style>
          .circle-chart {
        width: 150px;
        height: 150px;
        margin: 0 auto 20px;
        position: relative;
    }

    .progressbar-text-number {
        font-size: 50px;
        font-weight: bold;
        color: #EC9124;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
    }

    .beerbongs-bentley{
      font-size:20px;
      top:30px;
      bottom:0px;
      position:relative;
    }
    .real-time {
        text-align: center;
        margin: 20px 0;
    }

    .performance-stats {
        margin-top: 30px;
        background-color: white;
        padding: 20px;
        border-radius: 8px;
        width: 80%;
        max-width: 700px;
        margin-left: auto;
        margin-right: auto;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    }

    .stats-item {
        display: inline-block;
        width: 45%;
        text-align: left;
        font-size: 16px;
        vertical-align: top;
    }

    .stats-item h3 {
        margin: 0;
        font-size: 18px;
        color: #333;
    }

    .task-progress {
        margin-top: 5px;
        color: #EC9124;
        font-size: 14px;
    }

    .divider-hr {
        border: 0;
        border-top: 1px solid #ddd;
        margin: 10px 0;
        background-color: #EC9124;
        color: #EC9124;
    }
</style>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>