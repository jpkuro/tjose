
<?php

include_once 'dbConnection.php';
$id = $_POST['id'];
$cedula = $_POST['cedula'];
$nombre = $_POST['namea'];
$apellido = $_POST['apellido'];
$curso = $_POST['curso'];
$semestre = $_POST['semestre'];
$parcial = $_POST['parcial'];
$correo = $_POST['email'];
$telefono = $_POST['mob'];
$rol = $_POST['rol'];
$lectivo = $_POST['lectivo'];
$estado = $_POST['estado'];
 

	
$insertar ="update user set cedula='$cedula', name='$nombre', gender='$apellido', id_curso='$curso', email='$correo', mob='$telefono' ,rol='$rol',estado='$estado',lectivo='$lectivo' ,id_semestre='$semestre',id_parcial='$parcial' where id='$id'";

if (mysqli_query($con, $insertar)){
     echo "<script> alert('modificado correctamente');
         location.href = 'dash.php?q=1';
</script>";
}
else{
       echo "<script> alert('no se pudo modificar');
     location.href = 'dash.php?q=1';
     </script>";
}
mysqli_close($con);

 
?>