
<?php

include_once 'dbConnection.php';
$id = $_POST['id'];
$cedula = $_POST['cedula'];
$nombre = $_POST['name'];
$correo = $_POST['email'];
$telefono = $_POST['mob'];
$estado = $_POST['estado'];
 

	
$insertar ="update admin set cedula='$cedula', name='$nombre', email='$correo', celular='$telefono' ,estado='$estado' where admin_id='$id'";

if (mysqli_query($con, $insertar)){
     echo "<script> alert('modificado correctamente');
         location.href = 'dash.php?q=4';
</script>";
}
else{
       echo "<script> alert('no se pudo modificar');
     location.href = 'dash.php?q=4';
     </script>";
}
mysqli_close($con);

 
?>