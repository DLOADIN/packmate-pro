<?php
require './connection.php';
$id=$_GET['id'];
$sql=mysqli_query($con,"DELETE FROM `equipments` WHERE id = $id");
header("location:user-dashboard.php");
?>