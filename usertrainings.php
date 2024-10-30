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
  <link rel="stylesheet" href="./CSS/alert.css">
  
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link rel="shortcut icon" href="./image/thebutcher-removebg-preview.png" type="image/x-icon">
  <script src="https://kit.fontawesome.com/14ff3ea278.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="jsfile.js"></script>
  <script src="./sidebar.js"></script>
  <script src="./dropdown.js"></script>
  <title>TRAININGS</title>
</head>
<body>
  <style>
    #main-contents{
      height:200vh;
      overflow-y:auto;
      padding-bottom:3rem;
    }
    .make-new .catch h1{
            text-align:center;
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
          <h1>TRAININGS</h1>
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


        <section class="make-new">
        <div class="catch">
          <h1>TRAININGS</h1>
          <style>
            
            .le-container {
                display: flex;
                width: 70vh;
                justify-content: space-between;
                margin: 0 auto;
                box-shadow: 0px 3px 16px rgba(0, 0, 0, 0.1);
            }
            .tab-box {
                width: 100%;
                display: flex;
                justify-content: space-around;
                align-items: center;
                border-bottom: 2px solid rgba(229, 229, 229);
                font-size: 18px;
                font-weight: 700;
                position: relative;
            }
            .tab-box .tab-btn {
                font-size: 18px;
                font-weight: 600;
                color:black;
                border: none;
                background: #EC9124;
                padding: 18px;
                cursor: pointer;
            }
            .tab-box .tab-btn.active {
                color: #fff;
            }
            .content-box {
                padding: 20px;
            }
            .content-box .content.active {
                display: block;
            }
            .video{
              border-radius:15px;
            }
            .content-box .content {
                display: none;
            }
            .content-box .content h2 {
                margin-bottom: 20px;
                color:black;
            }
            .line {
                position: absolute;
                top: 60px;
                left: 17px;
                width: 260px;
                height: 5px;
                background: #EC9124;
                transition: width 0.3s ease, left 0.3s ease;
            }
            .content {
              text-align:center;
            }
            .content p{
              font-size:20px
            }
            .content .span-fire{
              text-align:center;
              display: block;
              margin: 10px;
              padding: 10px;
              color: #EC9124;
            }
            .span-spiritus{
              color: #EC9124;
              font-weight: 700;
              font-size: 20px;
            }
            .the-videos{
              display: inline-block;
              margin: 30px;
            }

            .the-videos{

            }
    </style>
    <div class="le-container">
        <div class="tab-box">
            <button class="tab-btn">INTRODUCTION</button>
            <button class="tab-btn">VIDEOS</button>
            <div class="line"></div>
        </div>
    </div>
    <div class="content-box">
        <div class="content">
            <p> 
            <span class="span-spiritus">PackMate Pro </span>is an advanced software designed to revolutionize packaging and bottling processes for beverage manufacturing companies. <br>
            It enhances efficiency, product quality, and traceability while automating key steps in the packaging process. By integrating with existing ERP systems<br> and offering real-time monitoring, PackMate Pro ensures seamless operations and data-driven decision-making.<br><br><br>

            This documentation covers how PackMate Pro functions and how it can be <br>used to optimize bottling and packaging operations.
            </p>
            <p>
            <span class="span-fire">1. Batch Management</span>
            PackMate Pro allows users to track and manage beverage batches from the start of the packaging process to the final<br> product. Each batch is assigned a unique identifier, ensuring full traceability and quality control <br>throughout the lifecycle.
            </p>
            <p>
            <span class="span-fire">2. Inventory Management</span>
            Efficient inventory management is crucial for uninterrupted production. PackMate Pro monitors stock levels of <br> essential packaging materials, such as bottles, cans, labels, and seals, and automatically triggers reorder points <br> to avoid shortages.
            </p>
            <p>
            <span class="span-fire">3. Packaging Line Optimization</span>
            This system offers tools for planning and optimizing packaging line layouts. By coordinating bottling,<br> labeling, and sealing equipment schedules, manufacturers can maximize efficiency and <br> throughput on the production floor.
            </p>
            <p>
            <span class="span-fire">4. Labeling and Sealing Automation</span>
            To eliminate human error, PackMate Pro integrates barcode scanners or RFID technology,<br> automating the labeling process for accuracy. Sealing machines are also automated to ensure proper<br> sealing of all bottles or cans.
            </p>
            <p>
            <span class="span-fire">5. Quality Control Checks</span>
            Quality control is a key element of PackMate Pro. Sensors and machine vision systems are employed<br> at various stages of the process to detect any defects, such as incorrect labels, missealed containers,<br> or damaged packaging materials. These checks ensure only high-quality products reach the distribution phase.
            </p>
            <p>
            <span class="span-fire">6. Monitoring Performance</span>
            Real-time data and analytics dashboards allow managers to keep an eye on the packaging line’s <br> performance. They can monitor throughput, machine efficiency, and detect any potential <br>bottlenecks.
            </p>
            <p>
            <span class="span-fire">7. Alert System</span>
            If there is a deviation from predefined quality standards or production targets, PackMate Pro <br>generates alerts to notify operators, ensuring timely intervention to resolve issues before they<br> escalate.
            </p>
        </div>
        <div class="content">
            <p>
           At Packmate-Pro we have videos on how to use PackMate Pro labelling and sealing. <br>
           A close look at our process from start to finish is shown below; Also not forgetting <br>
           that our labelling and sealing process is automated and monitored through our dashboard <br>
           on a 24/7 basis.
            </p>
            <div class="the-videos">
            <iframe width="900" class="video" height="445" border-radius="" src="https://www.youtube.com/embed/7f7EhjRai_Y?si=-xWmaPB7ogtvHhRd" title="drinking water plastic bottles mass production process" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>
        </div>
    </div>

    </div>
        </section>
        <script>
        const tabs = document.querySelectorAll('.tab-btn');
        const allContent = document.querySelectorAll('.content');
        const line = document.querySelector('.line');

        tabs.forEach((tab, index) => {
            tab.addEventListener('click', (e) => {
                tabs.forEach(t => t.classList.remove('active'));
                tab.classList.add('active');
                line.style.width = `${e.target.offsetWidth}px`;
                line.style.left = `${e.target.offsetLeft}px`;
                allContent.forEach(content => content.classList.remove('active'));
                allContent[index].classList.add('active');
            });
        });
    </script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>
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