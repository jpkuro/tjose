<?php

include_once 'dbConnection.php';
$ref=@$_GET['q'];
$lectivo = $_POST['year'];
$estado = $_POST['estadol'];







$insertar ="INSERT INTO lectivo (id_lectivo,lectivo,estado) VALUES ('','$lectivo','$estado')";

if (mysqli_query($con, $insertar)){
     echo "<script> alert('guardado correctamente');
         location.href = 'dash.php?q=5';
</script>";
}
else{
       echo "<script> alert('no se guarda');
     location.href = 'dash.php?q=5';
     </script>";
}
mysqli_close($con);

 
?>