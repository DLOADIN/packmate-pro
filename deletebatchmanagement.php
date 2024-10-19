<?php
require './connection.php';
$id = $_GET['id'];
$sql=mysqli_query($con, "DELETE FROM batchmanagement WHERE id = $id");
header("location:userbatchmanagement.php");
?>