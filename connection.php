<?php
session_start();
$con=mysqli_connect('localhost','root','','packmate');

if(!$con){
  die(mysqli_error($con));
}
?>
