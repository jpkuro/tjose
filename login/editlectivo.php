
<?php

include_once 'dbConnection.php';
$id = $_POST['id'];
$lectivo = $_POST['lectivo'];
$nombre = $_POST['estado'];

 

	
$insertar ="update lectivo set id_lectivo='$id', lectivo='$lectivo', estado='$nombre' where id_lectivo='$id'";

if (mysqli_query($con, $insertar)){
     echo "<script> alert('modificado correctamente');
         location.href = 'dash.php?q=5';
</script>";
}
else{
       echo "<script> alert('no se pudo modificar');
     location.href = 'dash.php?q=5';
     </script>";
}
mysqli_close($con);

 
?>