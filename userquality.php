<?php
require "connection.php";

if (!empty($_SESSION["id"])) {
    $id = $_SESSION["id"];
    $check = mysqli_query($con, "SELECT * FROM `users` WHERE id=$id");
    $row = mysqli_fetch_array($check);
} else {
    header('location:login.php');
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $u_name = $con->real_escape_string($_POST['u_name']);
    $u_score = $con->real_escape_string($_POST['u_score']);
    $u_bottlenecks = $con->real_escape_string($_POST['u_bottlenecks']);
    $u_diagram = '';

    if (isset($_FILES['u_diagram']) && $_FILES['u_diagram']['error'] == UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['u_diagram']['tmp_name'];
        $fileName = $_FILES['u_diagram']['name'];
        $fileSize = $_FILES['u_diagram']['size'];
        $fileType = $_FILES['u_diagram']['type'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));
        $allowedExts = array('jpg', 'jpeg', 'png', 'pdf');

        if (in_array($fileExtension, $allowedExts)) {
            $uploadFileDir = './uploads/';
            $dest_path = $uploadFileDir . $fileName;

            if (move_uploaded_file($fileTmpPath, $dest_path)) {
                $u_diagram = $fileName;
            } else {
                echo "<script>alert('Error moving the file.')</script>";
                exit;
            }
        } else {
            echo "<script>alert('Unsupported file type.')</script>";
            exit;
        }
    }

    $sql = "INSERT INTO `user_quality` VALUES ('','$u_name', '$u_score', '$u_bottlenecks', '$u_diagram')";
    if (mysqli_query($con, $sql)) {
        echo "<script>alert('Documented Successfully');</script>";
    } else {
        echo "<script>alert('Documented Failed: " . mysqli_error($con) . "');</script>";
    }
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
  <script src="./sidebar.js"></script>
  <script src="jsfile.js"></script>
  <script src="./dropdown.js"></script>
  <link rel="stylesheet" href="./CSS/alert.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <title>QUALITY ASSURANCE</title>
</head>
<body>
  <style>
    #main-contents{
      height:400vh;
      
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

  <div class="sidebar">
    <ul class="menu">
      <div class="logout">
        <li><a href="userdashboard.php"><i class="fa-solid fa-house-chimney"></i><span>HOME</span></a></li>
        <li><a href="userbatchmanagement.php"><i class="fa-solid fa-bars-progress"></i><span>BATCH MANAGEMENT</span></a></li>
        <li><a href="userinventory.php"><i class="fa-solid fa-warehouse"></i><span>INVENTORY</span></a></li>
        <li><a href="userquality.php"><i class="fa-solid fa-toggle-on"></i><span>QUALITY CONTROL</span></a></li>
        <!-- <li><a href="usererpsystems.php"><i class="fa-brands fa-ubuntu"></i><span>ERP SYSTEMS</span></a></li> -->
        <li><a href="usertraceability.php"><i class="fa-solid fa-shuffle"></i><span>TRACEABILITY</span></a></li>
        <div class="ropdown">
          <div class="select"><i class="fa-solid fa-box"></i><span class="selectee">SERVICES</span><div class="caret"></div></div>
          <ul class="fireef">
            <li><a href="usersupply.php">SUPPLY</a></li>
            <li><a href="usermaintenance.php">MAINTENANCE</a></li>
            <li><a href="usertrainings.php">TRAININGS</a></li>
          </ul>
        </div>
        <li><a href="useremail.php"><i class="fa-solid fa-envelope"></i><span>FEEDBACK</span></a></li>
        <li><a href="userprofile.php"><i class="fa-solid fa-user"></i><span>PROFILE</span></a></li>
      </div>
    </ul>
  </div>

  <div class="main-content content-right" id="main-contents">
    <div class="header-wrapper">
      <div class="header-title"><h1>QUALITY ASSURANCE & QUALITY CONTROL</h1></div>
      <div class="user-info">
        <div class="gango">
          <?php
            $sql = mysqli_query($con, "SELECT u_name FROM `users` WHERE id='$id'");
            $row = mysqli_fetch_array($sql);
            $attorney = $row['u_name'];
          ?>
          <h2 class="my-account-header"><?php echo $attorney; ?></h2>
          <p>User</p>
        </div> 
        <button class="btn-3">
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

    <div class="catch">
      <form method="post" class="form-form" enctype="multipart/form-data">
        <div class="formation-1">
          <label for="">LINE NAME</label>
          <input type="text" name="u_name" required placeholder="PRODUCT NAME">
          <label for="">LAYOUT DIAGRAM</label>
          <input type="file" name="u_diagram">
          <label for="">EFFICIENT SCORE</label>
          <input type="number" name="u_score" required placeholder="1 - 100">
          <label for="">BOTTLENECKS IDENTIFIED</label>
          <input type="text" name="u_bottlenecks" required placeholder="BOTTLENECKS">
        </div>
        <button type="submit" class="btn-3" id="button-btn">SUBMIT</button>
      </form>
    </div>

    <div class="tablestotable">
      <div class="table-containment">
        <h1>DETAILS ON PACKAGING LISTS</h1>
        <table>
          <tr>
            <th>#</th>
            <th>PRODUCT NAME</th>
            <th>DIAGRAM</th>
            <th>SCORE</th>
            <th>BOTTLENECKS</th>
            <th>ACTION</th>
          </tr>
          <?php
          $sqly = mysqli_query($con, "SELECT * FROM `user_quality`");
          $number = 0;
          while ($row = mysqli_fetch_array($sqly)):
          ?>
          <tr>
            <td><?php echo ++$number; ?></td>
            <td><?php echo $row['u_name']; ?></td>
            <td><?php echo $row['u_diagram']; ?></td>
            <td><?php echo $row['u_score']; ?></td>
            <td><?php echo $row['u_bottlenecks']; ?></td>
            <td>
              <button class="button-btn-1" onclick="return confirm('ARE YOU SURE YOU WANT TO DELETE THIS RECORD?')">
                <a href="deletequality.php?id=<?php echo $row['id']; ?>">REMOVE</a>
              </button>
            </td>
          </tr>
          <?php endwhile; ?>
        </table>
      </div>
    </div>

    <style>
      .button-btn-1 a, .button-btn-2 a {
        color: white;
        text-decoration: none;
      }
      .button-btn-1 {
        background: red;
      }
      .catch {
        margin-top: 2rem;
      }
      td i {
        font-size: 20px;
      }
      .make-new {
        text-align: center;
      }
      .make-new-1 {
        display: flex;
        place-items: right;
        margin-top: 3rem;
        justify-items: center;
        justify-content: center;
        gap: 2rem;
      }
      .make-new-1 i {
        color: #EC9124;
        font-size: 50px;
      }
      .make-new-2 {
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
  </div>
</body>
</html>
