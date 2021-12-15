-<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Area de Maestro </title>
<link  rel="stylesheet" href="css/bootstrap.min.css"/>
 <link  rel="stylesheet" href="css/bootstrap-theme.min.css"/>    
 <link rel="stylesheet" href="css/main.css">
 <link  rel="stylesheet" href="css/font.css">
  <link  rel="stylesheet" href="css/jquery.dataTables.min.css"/>  
 <script src="js/jquery.js" type="text/javascript"></script>
 <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/jquery2.js"></script>

<script type="text/javascript" src="js/buscarc.js"></script>
<script src="js/jquery.dataTables.min.js"></script>

  <script src="js/bootstrap.min.js"  type="text/javascript"></script>
 	<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>

<script>
$(function () {
    $(document).on( 'scroll', function(){
        console.log('scroll top : ' + $(window).scrollTop());
        if($(window).scrollTop()>=$(".logo").height())
        {
             $(".navbar").addClass("navbar-fixed-top");
        }

        if($(window).scrollTop()<$(".logo").height())
        {
             $(".navbar").removeClass("navbar-fixed-top");
        }
    });
});</script>
<script language="JavaScript">
function mueveReloj(){
    momentoActual = new Date()
    hora = momentoActual.getHours()
    minuto = momentoActual.getMinutes()
    segundo = momentoActual.getSeconds()

    str_segundo = new String (segundo)
    if (str_segundo.length == 1)
       segundo = "0" + segundo

    str_minuto = new String (minuto)
    if (str_minuto.length == 1)
       minuto = "0" + minuto

    str_hora = new String (hora)
    if (str_hora.length == 1)
       hora = "0" + hora

    horaImprimible = hora + " : " + minuto + " : " + segundo

    document.form_reloj.reloj.value = horaImprimible

    setTimeout("mueveReloj()",1000)
}
</script>
<script>
  $(document).ready(function(){
    $('#mitabla6').DataTable({
      "order":[[2, "asc"]],
      "language":{
      "lengthMenu": "Mostrar _MENU_ Registros por pagina",
      "info": "Mostrando Pagina _PAGE_ de _PAGE_",
      "infoEmpty": "NO hay Registros Disponibles",
      "infoFiltered":"(Filtrada de _MAX_ Registros)",
      "loadingRecords": "Cargando...",
      "processing":     "Procesando...",
      "search": "Buscar:",
      "zeroRecords": "No se encontraron Registros Coincidentes",
      "paginate": {
        "next": "Siguiente",
        "previous": "Anterior"
      },
      }

    });
  });
</script>

</head>
<body  onload="mueveReloj()">
  <div>



	<center><H1>Visualizacion de calificaciones</H1></center>
</div>
<div class="container">
  <form name="form_reloj" method="post" action="registrobodega.php" >
<center><input type="datetime"  name="fecha"  value="<?php echo date("Y-m-d");?>" required="" readonly="readonly" class="col-md-6" style="border: 0;" ></center>
<center><input type="text" name="reloj"  onfocus="window.document.form_reloj.reloj.blur()" required="" class="col-md-6" style="border: 0;" ></center>
</form>
<?php 
//$sql=mysqli_query($con,"SELECT email FROM" )or die('Error197');
include_once 'dbConnection.php';

$email =$_GET['email'];

//$sql= "select name, email from user where email='$email'";
//$resultado = $con->query($sql);
//$row = $resultado->fetch_array();



$sql=mysqli_query($con,"SELECT name, id_curso FROM user WHERE email='$email'" )or die('Error197');
while($row=mysqli_fetch_array($sql) )
{
$nombre=$row['name'];	
$curso=$row['id_curso'];  
}

echo '<center><h2>Perteneciente al estudiante:'.$nombre;echo'</h2></center>';


echo '<center><h2>Correo electronico:'.$email;echo'</h2></center>';


$sql ="select * from history WHERE email='$email' ";
$resultado = $con->query($sql);

  $c=0;
echo'<div class="row table-responsive">
  <table class="display" id="mitabla6">
      <thead>
        <tr>
          <th>ID</th>
          <th>Examen</th>
          <th>Preguntas Resueltas</th>
          <th>Buenas</th>
          <th>Equivocadas</th>
          <th>puntaje</th>
          <th>Tiempo/Hora</th>
        </tr>
      
      </thead>

          '; while($row =$resultado->fetch_array()){
          $eid=$row['eid'];
          $qa=$row['level'];
          $s=$row['score'];
          $s=$row['score'];
          $w=$row['wrong'];
          $r=$row['sahi'];
          $dd=$row['date'];

            $q23=mysqli_query($con,"SELECT title,tag FROM quiz WHERE  eid='$eid' and tag LIKE '%$curso%'" )or die('Error208');
            while($row=mysqli_fetch_array($q23) ){
              $title=$row['title'];
            }
            $c++;
      echo '<tdbody>';
          echo '<tr>';
           echo '<td>'.$c.'</td>';
           echo'<td>' .$title.'</td>';
            echo'<td>'.$qa.'</td>';
            echo'<td>'.$r.'</td>';
            echo'<td>'.$w.'</td>';
            echo'<td>'.$s.'</td>';
            echo'<td>'.$dd.'</td>';
          echo '</tr>';
      echo '</tdbody>';
           } 

      echo '
  </table>';

 ?>


<center><a class="btn btn-primary" href="maestro.php?q=2"><i class="fa fa-download"></i> Regresar</a></center>


</div>

</body>
</html>

