
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
$materia = $_POST['materia'];
 

	
$insertar ="update maestro set cedula='$cedula', nombre='$nombre', apellido='$apellido', curso='$curso', email='$correo', celular='$telefono' , rol='$rol', lectivo='$lectivo' , id_semestre='$semestre', id_parcial='$parcial', id_materia='$materia', estado='$estado' where id='$id'";

if (mysqli_query($con, $insertar)){
     echo "<script> alert('modificado correctamente');
         location.href = 'dash.php?q=8';
</script>";
}
else{
       echo "<script> alert('no se pudo modificar');
     location.href = 'dash.php?q=8';
     </script>";
}
mysqli_close($con);

 
?>