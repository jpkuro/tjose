<?php
include_once 'dbConnection.php';

$correo = $_POST['email'];
$contrasena = $_POST['password'];

$queryusuario 	= mysqli_query($con,"SELECT * FROM user WHERE email = '$correo'");
$nr 			= mysqli_num_rows($queryusuario); 
if ($nr == 1)
{
$insertar ="update user set password='$contrasena' WHERE email='$correo'";

if (mysqli_query($con, $insertar)){
     echo "<script> alert('Contraseña modificada correctamente');
         location.href = 'index.php';
</script>";
}
else{
       echo "<script> alert('no se pudo modificar la contraseña');
     location.href = 'index.php';
     </script>";
}
}else{
	echo "<script> alert('no existe correo en el sistema');
     location.href = 'cambioce.php';
     </script>";
}
mysqli_close($con);

?>