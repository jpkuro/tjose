<?php 
session_start();
if(isset($_SESSION['name'])){
session_destroy();}
$ref= @$_GET['q'];
header("location:$ref");
?>

