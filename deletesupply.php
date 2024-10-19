<?php
require './connection.php';
$id = $_GET['id'];
$sql=mysqli_query($con, "DELETE FROM `supply` WHERE id = $id");
header("location:usersupply.php");
?>