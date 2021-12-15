<?php
include_once 'dbConnection.php';

$correo = $_POST['email'];
$rol = $_POST['rol'];

if ($rol==estudiante){

$queryusuario 	= mysqli_query($con,"SELECT * FROM user WHERE email = '$correo' and rol='$rol'");
$nr 			= mysqli_num_rows($queryusuario); 
if ($nr == 1)
{
$mostrar		= mysqli_fetch_array($queryusuario);



$paracorreo 		= $correo;
$titulo				= "Cambio de contraseña";
$mensaje			= "SPuede cambiar su contraseña en el siguiente enlace : https://liceo-latinoamericano.com/login/cambioce.php
Este mensaje es automatico, porfavor no responder
Si desea mas informacion sobre el cambio de contraseña comunicarse al correo: administracion@liceo-latinoamericano.com";
$tucorreo			= "From: mail.liceo-latinoamericano.com";

if(mail($paracorreo,$titulo,$mensaje,$tucorreo))
{
	echo "<script> alert('Correo enviado');window.location= 'index.php' </script>";
}else
{
	echo "<script> alert('Error al mandar correo');window.location= 'index.php' </script>";
}
}
else
{
	echo "<script> alert('Este correo no existe');window.location= 'index.php' </script>";
}
}elseif($rol=='maestro'){

$queryusuario2 	= mysqli_query($con,"SELECT * FROM maestro WHERE email = '$correo' and rol='$rol'");
$nr 			= mysqli_num_rows($queryusuario2); 
if ($nr == 1)
{
$mostrar		= mysqli_fetch_array($queryusuario2);



$paracorreo 		= $correo;
$titulo				= "Cambio de contraseña";
$mensaje			= "SPuede cambiar su contraseña en el siguiente enlace : https://liceo-latinoamericano.com/login/cambiocm.php 
Este mensaje es automatico, porfavor no responder
Si desea mas informacion sobre el cambio de contraseña comunicarse al correo: administracion@liceo-latinoamericano.com";
$tucorreo			= "From: mail.liceo-latinoamericano.com";

if(mail($paracorreo,$titulo,$mensaje,$tucorreo))
{
	echo "<script> alert('Correo enviado');window.location= 'index.php' </script>";
}else
{
	echo "<script> alert('Error al mandar correo');window.location= 'index.php' </script>";
}
}
else
{
	echo "<script> alert('Este correo no existe');window.location= 'index.php' </script>";
}
}
/*VaidrollTeam*/
?>