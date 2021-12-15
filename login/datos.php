<?php
require 'dbConnection.php';

$where ="";

if(!empty($_POST))
{
  $valor = $_POST['campo'];
  if(!empty($valor)){
    $where ="WHERE name LIKE '%$name%'";
  }

}
$sql ="select id, cedula, name, gender, college, email, mob from user $where";
$resultado = $con->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>


<form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
<b>Nombre:<b><input type="text" id="campo" name="campo"/>
<input type="submit"class="btn btn-info" id="enviar" name="enviar" value="Buscar"/>
</form>
<br>

<div class='row table-responsive'>
  <table class='table table-responsive'>
      <thead>
        <tr>
          <th>ID</th>
          <th>CEDULA</th>
          <th>NOMBRE</th>
          <th>APELLIDO</th>
          <th>CURSO</th>
          <th>CORREO</th>
          <th>TELEFONO</th>
          <th>MODIFICAR</th>
          <th>ESTADO</th>
        </tr>
      </thead>
      <tbody>
          <?php while($row =$resultado->fetch_array()){?>
          <tr>
            <td><?php echo $row['id'];?></td>
            <td><?php echo $row['cedula'];?></td>
            <td><?php echo $row['name'];?></td>
            <td><?php echo $row['gender'];?></td>
            <td><?php echo $row['college'];?></td>
            <td><?php echo $row['email'];?></td>
            <td><?php echo $row['mob'];?></td>
            <td><a href="modificar.php?id=<?php echo $row['id'];?>"><button><img src='phone_120693.png'></button></a></td>
            <td></td>
          </tr>
          <?php } ?>
      </tbody>
  </table>
</div>
</body>
</html>