

<?php

include_once 'dbConnection.php';
$ref=@$_GET['q'];
$nombre = $_POST['namea'];
$correo = $_POST['email'];
$contraseña = $_POST['password'];
$cedula = $_POST['cedula'];
$estado = $_POST['estado'];
$lectivo = $_POST['lectivo'];
$celular = $_POST['celular'];
 

	
$insertar ="INSERT INTO admin (admin_id,name,email,password,estado,cedula,celular,lectivo) VALUES ('','$nombre','$correo','$contraseña','$estado','$cedula','$celular','$lectivo')";

if (mysqli_query($con, $insertar)){
     echo "<script> alert('guardado correctamente');
         location.href = 'dash.php?q=7';
</script>";
}
else{
       echo "<script> alert('no se guarda');
     location.href = 'dash.php?q=7';
     </script>";
}
mysqli_close($con);

 
?>