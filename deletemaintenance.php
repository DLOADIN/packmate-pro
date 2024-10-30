<?php
require './connection.php';
$id = $_GET['id'];
$sql=mysqli_query($con, "DELETE FROM maintenance WHERE id = $id");
header("location:usermaintenance.php");
?>