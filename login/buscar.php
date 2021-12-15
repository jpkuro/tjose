<?php
    include_once 'dbConnection.php';

    $salida = "";

    $query = "SELECT * FROM user ";

    if (isset($_POST['consulta'])) {
        $q = $con->real_escape_string($_POST['consulta']);
        $query = "SELECT id, cedula, name, college, mob FROM user WHERE id LIKE '%$q%' OR cedula LIKE '%$q%' OR name LIKE '%$q%' OR college LIKE '%$q%' OR mob LIKE '%$q%'  ";
    }

    $resultado = $con->query($query);

    if ($resultado->num_rows>0) {
        $salida.="<table  class='table table-striped title1'>
                
                    <tr style='background-color:#8ED8EA; border-color: #ffff0f; color:red'>
                        <td><b>Id</b></td>
                        <td>Cedula</td>
                        <td>Name</td>
                        <td>Curso</td>
                        <td>Telefono</td>
                        <td>Eliminar</td>
                        
                    </tr>

                
                

        <tbody>";

        while ($fila = $resultado->fetch_assoc()) {
            $salida.="<tr>
                        <td>".$fila['id']."</td>
                        <td>".$fila['cedula']."</td>
                        <td>".$fila['name']."</td>
                        <td>".$fila['college']."</td>
                        <td>".$fila['mob']."</td>
                        <td><a title='Delete User' href='update.php'><b><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></b></a></td></tr>
                    </tr>";

        }
        $salida.="</tbody></table>";
    }else{
        $salida.="NO HAY DATOS :(";
    }


    echo $salida;

    $con->close();



?>