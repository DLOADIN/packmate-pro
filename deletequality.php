<?php
require './connection.php';
$id = $_GET['id'];
$sql=mysqli_query($con, "DELETE FROM user_quality WHERE id = $id");
header("location:userdashboard.php");
?>