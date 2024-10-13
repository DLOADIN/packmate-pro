<?php
require './connection.php';
$id = $_GET['id'];
$sql=mysqli_query($con, "DELETE FROM labels WHERE id = $id");
header("location:userdashboard.php");
?>