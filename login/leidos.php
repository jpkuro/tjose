
<?php
include_once 'dbConnection.php';
$id = $_POST['id'];
$estado = $_POST['estado'];
 

	
$insertar ="update feedback set estado='$estado' where id='$id'";

if (mysqli_query($con, $insertar)){
     echo "<script> 
         location.href = 'dash.php?q=3';
</script>";
}
else{
       echo "<script> alert('no se pudo actualizar el mensaje');
     location.href = 'dash.php?q=3';
     </script>";
}
mysqli_close($con);

 
?>