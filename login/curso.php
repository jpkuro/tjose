<?php
session_start();
	include_once 'dbConnection.php';

	$curso=$_POST['cursso'];
	$cedula=$_POST['cedula1'];
	$materia=$_POST['materia'];
	$nombre=$_POST['nombre1'];
	$apellido=$_POST['apellido1'];
	$semestre=$_POST['semestre1'];
	$parcial=$_POST['parcial1'];
	

// esto es importante, la información que devuelve tiene que ser siempre un json

$q=mysqli_query($con,"SELECT * FROM juegos WHERE cedula='$cedula' and materia='$materia'" )or die('Error161');
$rowcount=mysqli_num_rows($q);
if($rowcount == 0)
{
$q2=mysqli_query($con,"INSERT INTO juegos VALUES('','$cedula','$nombre','$apellido','1','$curso','$semestre','$parcial','$materia')")or die('Errorincremento');
if($curso==ter003 and $materia==matematica){
			echo "<script>location.href='../sesion/estudiante/matematicastercero/index.html'</script>";
		
		}elseif($curso==cu004 and $materia==matematica){
			echo "<script>location.href='../sesion/estudiante/matematicascuarto/index.html'</script>";
		
		}elseif($curso==qu005 and $materia==matematica){
			echo "<script>location.href='../sesion/estudiante/matematicassexto/index.html'</script>";
		}elseif($curso==sex006 and $materia==matematica){
				echo "<script>location.href='../sesion/estudiante/matematicasquinto/index.html'</script>";
		}else{
			echo '<script>alert("no se encuentra en algun curso")</script> ';
		}
}
else
{
while($row=mysqli_fetch_array($q) )
{
$sun=$row['puntaje'];
}

$query = $con->query("update juegos SET puntaje=$sun + 1 WHERE cedula = $cedula and materia='$materia'")or die('Errorincremento2');

}
if($curso==ter003 and $materia==matematica){
			echo "<script>location.href='../sesion/estudiante/matematicastercero/index.html'</script>";
		
		}elseif($curso==cu004 and $materia==matematica){
			echo "<script>location.href='../sesion/estudiante/matematicascuarto/index.html'</script>";
		
		}elseif($curso==qu005 and $materia==matematica){
			echo "<script>location.href='../sesion/estudiante/matematicassexto/index.html'</script>";
		}elseif($curso==sex006 and $materia==matematica){
				echo "<script>location.href='../sesion/estudiante/matematicasquinto/index.html'</script>";
		}else{
			echo '<script>alert("no se encuentra en algun curso")</script> ';
		}


// cierro la conexión




// cierro la conexión

	//la variable  $mysqli viene de connect_db que lo traigo con el require("connect_db.php");
	
		
$con->close();	
?>