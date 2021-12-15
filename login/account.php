<?php

session_start();
if ($_SESSION['rol']!="estudiante"){
  header('Location:index.php');
}

?>
<?php
include_once 'dbConnection.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Panel Estudiantil</title>
<link  rel="stylesheet" href="css/bootstrap.min.css"/>
 <link  rel="stylesheet" href="css/bootstrap-theme.min.css"/>    
 <link rel="stylesheet" href="css/main.css">
  <link  rel="stylesheet" href="css/jquery.dataTables.min.css"/> 
 <link  rel="stylesheet" href="css/font.css">
 <script src="js/jquery.js" type="text/javascript"></script>
 <script src="js/jquery.dataTables.min.js"></script>

 
  <script src="js/bootstrap.min.js"  type="text/javascript"></script>
  <script>
  $(document).ready(function(){
    $('#mitabla').DataTable({
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
<script>
  $(document).ready(function(){
    $('#mitabla9').DataTable({
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
<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
 <!--alert message-->
<?php if(@$_GET['w'])
{echo'<script>alert("'.@$_GET['w'].'");</script>';}
?>
<!--alert message end-->

</head>
<?php
include_once 'dbConnection.php';
?>
<body>
<div class="header">
<div class="row">
<div class="col-lg-6">
<span class="logo">Bienvenido al Panel de estudiantes</span></div>
<div class="col-md-4 col-md-offset-2">
 <?php
$name = $_SESSION['name'];
$apellido = $_SESSION['gender'];
$email=$_SESSION['email'];
$curso=$_SESSION['id_curso'];
$comp= $name . $apellido;

include_once 'dbConnection.php';
echo '<span class="pull-right top title1" ><span class="log1"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;&nbsp;Hola,</span> <a href="account.php?q=1" class="log log1">'.$comp.'</a>&nbsp;|&nbsp;<a href="logout.php?q=account.php" class="log"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;Cerrar Sesión</button></a></span>';
?>
</div>
</div></div>
<div class="bg">

<!--navigation menu-->
<nav class="navbar navbar-default title1">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"><b>Estudiante</b></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li <?php if(@$_GET['q']==1) echo'class="active"'; ?> ><a href="account.php?q=1"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>&nbsp;Inicio/Examenes<span class="sr-only">(current)</span></a></li>
        

          <li class="dropdown <?php if(@$_GET['q']==2 || @$_GET['q']==10 ) echo'active"'; ?>">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Calificacion/pocisiones<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="account.php?q=2">Calificacion</a></li>
           <li><a href="account.php?q=10">Posiciones</a></li>
      
          </ul>
		

      <li <?php if(@$_GET['q']==4) echo'class="active"'; ?>><a href="account.php?q=4"><span class="glyphicon glyphicon-stats" aria-hidden="true"></span>&nbsp;Juegos</a></li>

		<li class="pull-right"> <a href="logout.php?q=account.php"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;&nbsp;Cerrar Sesión</a></li>
		</ul>
         
      </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav><!--navigation menu closed-->
<div class="container"><!--container start-->
<div class="row">
<div class="col-md-12">

<!--home start-->
<?php if(@$_GET['q']==1) {
 // $sql=mysqli_query($con,"SELECT tag FROM quiz  " )or die('Error197');
//while($row=mysqli_fetch_array($sql) )
//{
//$tag=$row['tag']; 
//}

$sql4=mysqli_query($con,"SELECT name, id_curso FROM user WHERE email='$email'" )or die('Error5000');
while($row=mysqli_fetch_array($sql4) )
{
$nombre=$row['name']; 
$curso2=$row['id_curso'];  
}



if ($curso2==$curso) {
  // code...


$result = mysqli_query($con,"SELECT * FROM quiz Where tag='$curso' ORDER BY date DESC") or die('Error');
echo  '<div class="panel"><div class="row table-responsive"><table class="display" id="mitabla">
<thead ><tr><td><b>S.N.</b></td><td><b>Temática</b></td><td><b>Total de Preguntas</b></td><td><b>Marcas</b></td><td><b>Tiempo Límite</b></td><td></td></tr></thead >';
$c=1;
while($row = mysqli_fetch_array($result)) {
  $title = $row['title'];
  $total = $row['total'];
  $sahi = $row['sahi'];
    $time = $row['time'];
  $eid = $row['eid'];
$q12=mysqli_query($con,"SELECT score FROM history WHERE eid='$eid' AND email='$email'" )or die('Error98');
$rowcount=mysqli_num_rows($q12);  
if($rowcount == 0){
  echo '<tdbody><tr><td>'.$c++.'</td><td>'.$title.'</td><td>'.$total.'</td><td>'.$sahi*$total.'</td><td>'.$time.'&nbsp;min</td>
  <td><b><a href="account.php?q=quiz&step=2&eid='.$eid.'&n=1&t='.$total.'" class="pull-right btn sub1" style="margin:0px;background:#99cc32"><span class="glyphicon glyphicon-new-window" aria-hidden="true"></span>&nbsp;<span class="title1"><b>Examen</b></span></a></b></td></tr></tdbody>';
}
else
{
echo '</tdbody><tr style="color:#99cc32"><td>'.$c++.'</td><td>'.$title.'&nbsp;<span title="This quiz is already solve by you" class="glyphicon glyphicon-ok" aria-hidden="true"></span></td><td>'.$total.'</td><td>'.$sahi*$total.'</td><td>'.$time.'&nbsp;min</td>
  <td><b><span class="glyphicon glyphicon-repeat" aria-hidden="true"></span>&nbsp;<span class="title1"><b>Finalizado</b></span></a></b></td></tr></tdbody>';
}
}
$c=0;
echo '</table></div></div>';
}
}?>
<!--<span id="countdown" class="timer"></span>
<script>
var seconds = 40;
    function secondPassed() {
    var minutes = Math.round((seconds - 30)/60);
    var remainingSeconds = seconds % 60;
    if (remainingSeconds < 10) {
        remainingSeconds = "0" + remainingSeconds; 
    }
    document.getElementById('countdown').innerHTML = minutes + ":" +    remainingSeconds;
    if (seconds == 0) {
        clearInterval(countdownTimer);
        document.getElementById('countdown').innerHTML = "Buzz Buzz";
    } else {    
        seconds--;
    }
    }
var countdownTimer = setInterval('secondPassed()', 1000);
</script>-->

<!--home closed-->

<!--quiz start-->
<?php
if(@$_GET['q']== 'quiz' && @$_GET['step']== 2) {
$eid=@$_GET['eid'];
$sn=@$_GET['n'];
$total=@$_GET['t'];
$q=mysqli_query($con,"SELECT * FROM questions WHERE eid='$eid' AND sn='$sn' " );
echo '<div class="panel" style="margin:5%">';
while($row=mysqli_fetch_array($q) )
{
$qns=$row['qns'];
$qid=$row['qid'];
echo '<b>Pregunta &nbsp;'.$sn.'&nbsp;::<br />'.$qns.'</b><br /><br />';
}
$q=mysqli_query($con,"SELECT * FROM options WHERE qid='$qid' " );
echo '<form action="update.php?q=quiz&step=2&eid='.$eid.'&n='.$sn.'&t='.$total.'&qid='.$qid.'" method="POST"  class="form-horizontal">
<br />';

while($row=mysqli_fetch_array($q) )
{
$option=$row['option'];
$optionid=$row['optionid'];
echo'<input type="radio" name="ans" value="'.$optionid.'">'.$option.'<br /><br />';
}
echo'<br /><button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span>&nbsp;Enviar</button></form></div>';
//header("location:dash.php?q=4&step=2&eid=$id&n=$total");
}
//result display
if(@$_GET['q']== 'result' && @$_GET['eid']) 
{
$eid=@$_GET['eid'];
$q=mysqli_query($con,"SELECT * FROM history WHERE eid='$eid' AND email='$email' " )or die('Error157');
echo  '<div class="panel">
<center><h1 class="title" style="color:#660033">Resultados</h1><center><br /><table class="table table-striped title1" style="font-size:20px;font-weight:1000;">';

while($row=mysqli_fetch_array($q) )
{
$s=$row['score'];
$w=$row['wrong'];
$r=$row['sahi'];
$qa=$row['level'];
echo '<tr style="color:#66CCFF"><td>Total de Preguntas</td><td>'.$qa.'</td></tr>
      <tr style="color:#99cc32"><td>Respuestas Correctas&nbsp;<span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span></td><td>'.$r.'</td></tr> 
	  <tr style="color:red"><td>Respuestas Equivocadas&nbsp;<span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></td><td>'.$w.'</td></tr>
	  <tr style="color:#66CCFF"><td>Calificación&nbsp;<span class="glyphicon glyphicon-star" aria-hidden="true"></span></td><td>'.$s.'</td></tr>';
}
$q=mysqli_query($con,"SELECT * FROM rank WHERE  email='$email' " )or die('Error157');
while($row=mysqli_fetch_array($q) )
{
$s=$row['score'];

}
echo '</table></div>';

}
?>
<!--quiz end--><script>
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
<?php

//history start
if(@$_GET['q']== 2) 
{


$sql=mysqli_query($con,"SELECT name, id_curso FROM user WHERE email='$email'" )or die('Error197');
while($row=mysqli_fetch_array($sql) )
{
$nombre=$row['name']; 
$curso=$row['id_curso'];  
}

echo '<center><h2>Historial de calificaciones</h2></center>';





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
          <th>Curso</th>
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

            $q23=mysqli_query($con,"SELECT quiz.title,quiz.tag ,curso.curso  FROM quiz inner join curso on quiz.tag=curso.id_curso WHERE  eid='$eid'" )or die('Error208');
            while($row=mysqli_fetch_array($q23) ){
              $title=$row['title'];
              $tag=$row['curso'];
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
            echo'<td>'.$tag.'</td>';
          echo '</tr>';
      echo '</tdbody>';
           } 

      echo '
  </table>';
    

    
}

//prueba de cuarta fila
if(@$_GET['q']== 4) 
{
  
$sql8=mysqli_query($con,"SELECT cedula,name,gender,id_curso,id_semestre,id_parcial,id_materia FROM user WHERE email='$email'" )or die('Error5000');
while($row=mysqli_fetch_array($sql8) )
{
$cedula1=$row['cedula'];
$nombre1=$row['name']; 
$apellido1=$row['gender'];  
$semestre1=$row['id_semestre'];
$parcial1=$row['id_parcial'];
}

  echo'<form action="curso.php" method="post">
            <input type="hidden" name="cursso"  value="'.$curso.'" readonly="readonly">
            <input type="hidden" name="cedula1"  value="';echo $cedula1;echo'" readonly="readonly">
            <input type="hidden" name="nombre1"  value="';echo $nombre1;echo'" readonly="readonly">
            <input type="hidden" name="apellido1"  value="';echo $apellido1;echo'" readonly="readonly">
            <input type="hidden" name="semestre1"  value="';echo $semestre1;echo'" readonly="readonly">
            <input type="hidden" name="parcial1"  value="';echo $parcial1;echo'" readonly="readonly">
            <input type="hidden" name="materia"  value="matematica" readonly="readonly">
            <center>  <button id="juego"><img src="matematica.png" alt="vjugar"> </center></button>
             </form>';
             
             echo'<form action="lenguaje.php" method="post">
            <input type="hidden" name="cursso"  value="'.$curso.'" readonly="readonly">
            <input type="hidden" name="cedula1"  value="';echo $cedula1;echo'" readonly="readonly">
            <input type="hidden" name="nombre1"  value="';echo $nombre1;echo'" readonly="readonly">
            <input type="hidden" name="apellido1"  value="';echo $apellido1;echo'" readonly="readonly">
            <input type="hidden" name="semestre1"  value="';echo $semestre1;echo'" readonly="readonly">
            <input type="hidden" name="parcial1"  value="';echo $parcial1;echo'" readonly="readonly">
            <input type="hidden" name="lenguaje"  value="lenguaje" readonly="readonly">
            <center>  <button id="juego"><img src="lenguaje.png" alt="vjugar"> </center></button>
             </form>';
             
             echo'<form action="sociales.php" method="post">
            <input type="hidden" name="cursso"  value="'.$curso.'" readonly="readonly">
            <input type="hidden" name="cedula1"  value="';echo $cedula1;echo'" readonly="readonly">
            <input type="hidden" name="nombre1"  value="';echo $nombre1;echo'" readonly="readonly">
            <input type="hidden" name="apellido1"  value="';echo $apellido1;echo'" readonly="readonly">
            <input type="hidden" name="semestre1"  value="';echo $semestre1;echo'" readonly="readonly">
            <input type="hidden" name="parcial1"  value="';echo $parcial1;echo'" readonly="readonly">
            <input type="hidden" name="sociales"  value="sociales" readonly="readonly">
            <center>  <button id="juego"><img src="sociales.png" alt="vjugar"> </center></button>
             </form>';
}
?>


<?php if(@$_GET['q']==10) {
//$where ="";
//if(!empty($_POST))
//{
 // $valor = $_POST['campo'];
  //if(!empty($valor)){
  // $where =" and name LIKE '%$valor%' or gender LIKE '%$valor%'";
 // }$where

//}
$sql ="select juegos.id, juegos.cedula, juegos.nombre, juegos.apellido, juegos.puntaje, juegos.semestre, juegos.parcial, juegos.materia, curso.curso, semestre.semestre, parcial.parcial  from juegos inner join curso inner join semestre inner join parcial   on juegos.curso=curso.id_curso and juegos.semestre=semestre.id_semestre and juegos.parcial=parcial.id_parcial WHERE juegos.curso LIKE '%$curso%' order by puntaje DESC";
$resultado = $con->query($sql);

//echo '<div><form action="';$_SERVER["PHP_SELF"];echo'"'; echo' method="POST">';
//echo'Nombre:
//<input type="text" id="campo" name="campo">
//<input type="submit"class="btn btn-info" id="enviar" name="enviar" //value="Buscar">
//</form>
//</div>';

echo'<div class="row table-responsive">
    <table class="display" id="mitabla9">
      <thead >
        <tr>
          <th>ID</th>
          <th>CEDULA</th>
          <th>NOMBRE</th>
          <th>APELLIDO</th>
          <th>PUNTAJE</th>
          <th>CURSO</th>
          <th>SEMESTRE</th>
          <th>PARCIAL</th>
          <th>MATERIA</th>
          
        </tr>
      </thead>
      
          '; while($row =$resultado->fetch_array()){
      echo '<tdbody>';
          echo '<tr>';
           echo'<td>'; echo $row["id"];echo'</td>';
            echo'<td>';echo $row["cedula"];echo'</td>';
            echo'<td>';echo $row["nombre"];echo'</td>';
            echo'<td>';echo $row["apellido"];echo'</td>';
            echo'<td>';echo $row["puntaje"];echo'</td>';
            echo'<td>';echo $row["curso"];echo'</td>';
            echo'<td>'; echo $row["semestre"];echo'</td>';
            echo'<td>'; echo $row["parcial"];echo'</td>';
            echo'<td>'; echo $row["materia"];echo'</td>';
            
          echo '</tr>';
       echo '</tdbody>';
           } 
           echo '
    </table>';

}?>


</div></div></div></div>
<!--Footer start-->


</body>
</html>
