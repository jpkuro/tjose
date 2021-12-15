<?php
include_once 'dbConnection.php';
$salida="";

  $result = mysqli_query($con,"SELECT * FROM user");
  $array = array();
  if($result){
    while ($row = mysqli_fetch_array($result)) {
      $equipos = utf8_encode($row['id']."-     ".$row['name']." ".$row['gender']);
      $equipo = utf8_decode($equipos);
      array_push($array, $equipo); // equipos
      
    }
  }
  $salida=json_encode($array); 

echo $salida;

?>