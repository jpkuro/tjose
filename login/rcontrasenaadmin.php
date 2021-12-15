<?php
include_once 'dbConnection.php';

$correo = $_POST['email'];

$queryusuario 	= mysqli_query($con,"SELECT * FROM admin WHERE email = '$correo'");
$nr 			= mysqli_num_rows($queryusuario); 
if ($nr == 1)
{
$mostrar		= mysqli_fetch_array($queryusuario);

$enviarpass 	= $mostrar['password'];

$paracorreo 		= $correo;
$titulo				= "Recuperar contraseña";
$mensaje			= "Su contraseña es la siguiente:$enviarpass 
Este mensaje es automatico, porfavor no responder
Si desea cambiar de contraseña comunicarse al correo:
    administracion@liceo-latinoamericano.com";
$tucorreo			= "From: mail.liceo-latinoamericano.com";

if(mail($paracorreo,$titulo,$mensaje,$tucorreo))
{
	echo "<script> alert('Contraseña enviado');window.location= 'index.php' </script>";
}else
{
	echo "<script> alert('Error');window.location= 'index.php' </script>";
}
}
else
{
	echo "<script> alert('Este correo no existe');window.location= 'index.php' </script>";
}
/*VaidrollTeam*/
?>