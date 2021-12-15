<?php
session_start();
	require("../conexion.php");

	$usuario=$_POST['nombre'];
	$curso=$_POST['curso'];
	


	//la variable  $mysqli viene de connect_db que lo traigo con el require("connect_db.php");
	
		if($curso==tercer){
			echo "<script>location.href='Juego_Memoria/index.php'</script>";
		
		}elseif($curso==cuarto){
			echo "<script>location.href='Juego_Memoria2/index.php'</script>";
		
		}elseif($curso==sexto){
			echo "<script>location.href='Juego_Memoria3/index.php'</script>";
		}elseif($curso==quinto){
				echo "<script>location.href='Juego_Memoria3/index.php'</script>";
		}else{
			echo '<script>alert("no se encuentra en algun curso")</script> ';
		}
	
?>
