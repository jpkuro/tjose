
<?php

include_once 'dbConnection.php';
$ref=@$_GET['q'];
$cedula = $_POST['cedula'];
$nombre = $_POST['namea'];
$apellido = $_POST['apellido'];
$curso = $_POST['curso'];
$correo = $_POST['email'];
$telefono = $_POST['mob'];
$contraseña = $_POST['password'];
$rol = $_POST['rol'];
$semestre = $_POST['semestre'];
$parcial = $_POST['parcial'];
$estado = $_POST['estado'];
$materia= $_POST['materia'];
$lectivo = $_POST['lectivo'];
$puntaje= $_POST['puntaje'];






$insertar ="INSERT INTO maestro (id,cedula,nombre,apellido,curso,email,celular,password,rol,lectivo,id_semestre,id_parcial,id_materia,estado) VALUES ('','$cedula','$nombre','$apellido','$curso','$correo','$telefono','$contraseña','$rol','$lectivo','$semestre','$parcial','$materia','$estado')";

if (mysqli_query($con, $insertar)){
     echo "<script> alert('guardado correctamente');
         location.href = 'dash.php?q=9';
</script>";
}
else{
       echo "<script> alert('no se guarda');
     location.href = 'dash.php?q=9';
     </script>";
}
mysqli_close($con);

 
?>