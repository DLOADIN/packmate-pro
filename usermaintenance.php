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
  <script src="./sidebar.js"></script>
  <script src="jsfile.js"></script>
  <script src="./dropdown.js"></script>
  <link rel="stylesheet" href="./CSS/alert.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <title>MAINTENANCE</title>
</head>
<body>
  <style>
    #main-contents{
      height:fit-content;
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

    .container {
    width: 100%;
    max-width: 80vh;
    background: white;
    padding: 20px;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    margin: 0 auto;
    gap:4rem;
}

.calendar-container {
  display:grid;
  place-items:center;
  margin: 0 auto;
}

.calendar-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 10px;
    width:50vh;
}

.calendar-header h3 {
    margin: 0;
    color: #FF9900; 
}

.calendar-header button {
    background: none;
    border: none;
    font-size: 20px;
    cursor: pointer;
    padding: 8px 12px;
    border-radius: 5px;
}

.calendar {
  display: flex;
    justify-content: center; /* Center items horizontally */
    align-items: center;   
}

.days div {
    font-weight: bold;
    padding: 10px;
    background-color: #f9f9f9;
    border-bottom: 1px solid #e5e5e5;
}

.dates {
    display: grid;
    grid-template-columns: repeat(7, 1fr);
    gap: 2px;
}

.dates div {
    background: #fff;
    border: 1px solid #ddd;
    padding: 10px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.div-la{
  display:grid;
  place-items:center;
}

.dates div.selected {
    background-color: #FF9900;
    color: white;
}

.dates div:hover {
    background-color: #ffe0b3;
}


.form-container {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.form-container label {
    font-size: 14px;
    margin-bottom: 5px;
    margin-left:5px
}

form input, form select {
  border-radius: 6px;
  height: 7vh;
  padding: 15px;
  width: 40%;
  font-style: italic;
  border-top: .5px solid #EC9124;
}


@media (max-width: 600px) {
    .container {
        width: 95%;
    }

    .calendar-header button {
        font-size: 18px;
        padding: 6px 10px;
    }

    .calendar-header h3 {
        font-size: 16px;
    }
}  </style>

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
          <a href="userprofileservicemanager.php">
          <i class="fa-solid fa-user"></i>
            <span>PROFILE</span>
          </a>
        </li>
    </ul>
  </div>

  <div class="main-content content-right" id="main-contents">
      <div class="header-wrapper">
        <div class="header-title">
          <h1>MAINTENANCE</h1>
        </div>
        <div class="user-info">
        <div class="gango">
          <?php
            $sql=mysqli_query($con, "SELECT u_name,u_type from `users` WHERE id='$id'");
            $row=mysqli_fetch_array($sql);
            $attorney=$row['u_name'];
            $name=$row['u_type'];
            ?>
          <h2 class="my-account-header">
          <?php echo $attorney?>
            </h2>
          <p><?php echo $name?></p></div> 
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
          <h1>MAINTENANCE FORM</h1>
          <div class="container">
        <div class="calendar-container">
            <div class="calendar-header">
                <button id="prev-month">&lt;</button>
                <h3 id="current-month-year"></h3>
                <button id="next-month">&gt;</button>
            </div>
            <div class="calendar">
                <div class="days">
                    <div>Su</div>
                    <div>Mo</div>
                    <div>Tu</div>
                    <div>We</div>
                    <div>Th</div>
                    <div>Fr</div>
                    <div>Sa</div>
                </div>
                <div class="dates" id="dates"></div>
            </div>
          </div>

          <form action="" method="POST" class="form-container" >
            <input type="hidden" id="selectedDate" name="date" required>

            <div class="div-la">
            <label for="machine">CHOOSE MACHINE</label>
            <input type="text" name=u_machine id="machine" id="" required placeholder="ANY MACHINERY OF YOUR CHOICE">
            </div>

            <div class="div-la">
            <label for="amount">AMOUNT</label>
            <input type="text" id="amount" name="u_amount" required placeholder="ANY MACHINERY OF YOUR CHOICE">
            </div>
            <button type="submit" name="submit">SUBMIT</button>
            <style>
              .form-container button{
                border-radius: 10px;
                margin: 1rem;
                height: 60px;
                border:10px solid #fff;
                background-color:  #EC9124;;
                border: 3px solid #fff;
                color: aliceblue;
                cursor: pointer;
                font-size: 1em;
                font-weight: 800;
                width:50%;
                margin:0 auto;
                padding:10px 15px
              }
            </style>
        </form>
       </div>


    <div class="tablestotable">
      <div class="table-containment">
        <h1>DETAILS ON SUPPLY DATA</h1>
        <table>
          <tr>
          <th>#</th>
            <th>DATE OF SCHEDULE</th>
            <th>MACHINE NAME</th>
            <th>AMOUNT OF PRODUCTS</th>
            <th>DELETE</th>
          </tr>
          <?php
          $sqly = mysqli_query($con, "SELECT * FROM `maintenance`");
          $number = 0;
        while ($row = mysqli_fetch_array($sqly)):
        ?>
          <tr>
            <td><?php echo ++$number; ?></td>
            <td><?php echo $row['date']; ?></td>
            <td><?php echo $row['u_machine']; ?></td>
            <td><?php echo $row['u_amount']; ?></td>
            <td>
            <button class="button-btn-1" onclick="alert('ARE YOU SURE YOU WANT TO DELETE THIS USER')">
            <a href="deletemaintenance.php?id=<?php echo $row['id']?>">REMOVE</a>
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
          
          .make-new .catch h1{
            text-align:center;
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
  $raw_material=$_POST['date'];
  $line_setup=$_POST['u_machine'];
  $qc_check=$_POST['u_amount'];
  $sql=mysqli_query($con,"INSERT INTO `maintenance` VALUES('','$raw_material','$line_setup','$qc_check')");

  if($sql){
    echo "<script>alert('Documented Successfully')</script>";
  }
  else{
    echo "<script>alert('failed to document')</script>";
  }

}
?>
<script src="./calendar.js"></script>

