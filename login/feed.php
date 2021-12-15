<?php
include_once 'dbConnection.php';
$ref=@$_GET['q'];
$name = $_POST['name'];
$email = $_POST['email'];
$estado = $_POST['estado'];
$subject = $_POST['subject'];
$id=uniqid();
$date=date("Y-m-d");
$time=date("h:i:sa");
$feedback = $_POST['feedback'];
$q=mysqli_query($con,"INSERT INTO feedback VALUES  ('', '$name', '$email' , '$subject', '$feedback' , '$date' , '$time','$estado')")or die ("Error");
header("location:$ref?q=Gracias por tu valiosa información");
?>