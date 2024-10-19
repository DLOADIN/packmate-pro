<?php
require './connection.php';
$id = $_GET['id'];
$sql=mysqli_query($con, "DELETE FROM traceability WHERE id = $id");
header("location:usertraceability.php");
?>