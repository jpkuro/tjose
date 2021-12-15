<?php
include_once 'dbConnection.php';
session_start();
if ($_SESSION['rol']!="maestro"){
  header('Location:index.php');
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Area de Maestro </title>
<link  rel="stylesheet" href="css/bootstrap.min.css"/>
 <link  rel="stylesheet" href="css/bootstrap-theme.min.css"/>  
 <link  rel="stylesheet" href="css/jquery.dataTables.min.css"/>   
 <link rel="stylesheet" href="css/main.css">
 <link  rel="stylesheet" href="css/font.css">
 <link rel="stylesheet" href="css/jquery-ui.css">






 
 <script src="js/jquery.js" type="text/javascript"></script>
 <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/jquery2.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/jquery.min3.js"></script>
  <script language="javascript" src="js/jquery-3.1.1.min.js"></script>
<script src="js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="js/buscarc.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js"></script>



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
    $('#mitabla2').DataTable({
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
<style media="screen" type="text/css">
    .espacio_combo{
      position: absolute;
    }
    .select_busq2{
      position:  relative;
    }
    .espacio_combo{
      position: absolute;
    }
  </style>
</head>

<body  style="background:#eee;">
<div class="header">
<div class="row">
<div class="col-lg-6">
<span class="logo">MAESTRO</span></div>



<?php
$name = $_SESSION['nombre'];
$apellido = $_SESSION['apellido'];
$curso = $_SESSION['curso'];
$comp= $name . $apellido;


include_once 'dbConnection.php';
echo '<span class="pull-right top title1" ><span class="log1"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;&nbsp;Hola,</span> <a href="account.php" class="log log1">'.$comp.'</a>&nbsp;|&nbsp;<a href="logout.php?q=account.php" class="log"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;Cerrar Sesión</button></a></span>';
?>

</div></div>
<!-- admin start-->

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
      <a class="navbar-brand" href="maestro.php?q=0"><b>Panel de Control</b></a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li <?php if(@$_GET['q']==0) echo'class="active"'; ?>><a href="maestro.php?q=0">Inicio<span class="sr-only">(current)</span></a></li>
        <li <?php if(@$_GET['q']==1) echo'class="active"'; ?>><a href="maestro.php?q=1">Estudiantes</a></li>
		<li <?php if(@$_GET['q']==2) echo'class="active"'; ?>><a href="maestro.php?q=2">Calificaciones</a></li>
		<li class="dropdown <?php if(@$_GET['q']==3 || @$_GET['q']==9 || @$_GET['q']==10) echo'active"'; ?>">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Reporte/pocisiones<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="maestro.php?q=3">Reportes de Notas Generales</a></li>
           <li><a href="maestro.php?q=9">Reportes de Notas Por fecha</a></li>
           <li><a href="maestro.php?q=10">Posiciones</a></li>
      
          </ul>
        <li class="dropdown <?php if(@$_GET['q']==4 || @$_GET['q']==5) echo'active"'; ?>">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Examenes<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="maestro.php?q=4">Agregar Nuevo Examen</a></li>
            <li><a href="maestro.php?q=5">Eliminar Examen</a></li>
			
          </ul>
        </li><li class="pull-right"> <a href="logout.php?q=account.php"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;&nbsp;Cerrar Sesión</a></li>
		
      </ul>
          </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<!--navigation menu closed-->
<div class="container"><!--container start-->
<div class="row">
<div class="col-md-12">
<!--home start-->

<?php if(@$_GET['q']==0) {

  echo '
<center><h1 style="font-family: Roboto, sans-serif;";>Bienvenido al Area para Maestros</h1></center>
';
echo '<center><fieldset>
      <p><h2>En esta area puedes realizar la busqueda de los Estudiantes activos en el sistema, ademas de agregar examenes ver sus calificaciones y los examens que a realizado </h2></p>
      <br>
      <p><h2>cada pregunta de lso examenes sera realizada conforme el profesor prefiera e imparta la materia</h2></p>


</fieldset></center>';
}

//ranking start
if(@$_GET['q']== 2) 
{
//$where ="";
//if(!empty($_POST))
//{
 // $valor = $_POST['campo'];
  //if(!empty($valor)){
  // $where =" and name LIKE '%$valor%' or gender LIKE '%$valor%'";
 // }$where

//}
$sql ="select user.id, user.cedula, user.name, user.gender, curso.curso, user.email, user.mob  from user inner join curso  on user.id_curso=curso.id_curso  WHERE user.id_curso LIKE '%$curso%'";
$resultado = $con->query($sql);

//echo '<div><form action="';$_SERVER["PHP_SELF"];echo'"'; echo' method="POST">';
//echo'Nombre:
//<input type="text" id="campo" name="campo">
//<input type="submit"class="btn btn-info" id="enviar" name="enviar" //value="Buscar">
//</form>
//</div>';

echo'<div class="row table-responsive">
    <table class="display" id="mitabla">
      <thead >
        <tr>
          <th>ID</th>
          <th>CEDULA</th>
          <th>NOMBRE</th>
          <th>APELLIDO</th>
          <th>CURSO</th>
          <th>CORREO</th>
          <th>TELEFONO</th>
          <th>NOTAS</th>
          
        </tr>
      </thead>
      
          '; while($row =$resultado->fetch_array()){
      echo '<tdbody>';
          echo '<tr>';
           echo'<td>'; echo $row["id"];echo'</td>';
            echo'<td>';echo $row["cedula"];echo'</td>';
            echo'<td>';echo $row["name"];echo'</td>';
            echo'<td>';echo $row["gender"];echo'</td>';
            echo'<td>';echo $row["curso"];echo'</td>';
            echo'<td>';echo $row["email"];echo'</td>';
            echo'<td>'; echo $row["mob"];echo'</td>';
            echo'<td>';echo '<a href="calificaciones.php?email=';echo $row["email"];echo'">'; echo'<button><img src="phone_120693.png"></button></a>';echo'</td>';
            
          echo '</tr>';
       echo '</tdbody>';
           } 
           echo '
    </table>';

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



<!--home closed-->
<!--users start-->
<?php if(@$_GET['q']==1) {

//$where2 ="";
//if(!empty($_POST))
//{
 // $valor = $_POST['campo'];
 // if(!empty($valor)){

 //   $where2 =" and name LIKE '%$valor%' or gender LIKE '%$valor%'";
 // }$where2



$sql ="select user.id, user.cedula, user.name, user.gender, curso.curso, user.email, user.mob  from user inner join curso  on user.id_curso=curso.id_curso  WHERE user.id_curso LIKE '%$curso%'";
$resultado = $con->query($sql);

//echo '<div><form action="';$_SERVER["PHP_SELF"];echo'"'; echo' method="POST">';
//echo'Nombre:
//<input type="text" id="campo" name="campo">
//<input type="submit"class="btn btn-info" id="enviar" name="enviar" value="Buscar">
///</form>
//</div>';

echo'<div class="row table-responsive">
  <table class="display" id="mitabla2">
      <thead>
        <tr>
          <th>ID</th>
          <th>CEDULA</th>
          <th>NOMBRE</th>
          <th>APELLIDO</th>
          <th>CURSO</th>
          <th>CORREO</th>
          <th>TELEFONO</th>
          
        </tr>
      
      </thead>
          '; while($row =$resultado->fetch_array()){
      echo '<tdbody>';
          echo '<tr>';
           echo'<td>'; echo $row["id"];echo'</td>';
            echo'<td>';echo $row["cedula"];echo'</td>';
            echo'<td>';echo $row["name"];echo'</td>';
            echo'<td>';echo $row["gender"];echo'</td>';
            echo'<td>';echo $row["curso"];echo'</td>';
            echo'<td>';echo $row["email"];echo'</td>';
            echo'<td>'; echo $row["mob"];echo'</td>';
        
          echo '</tr>';
      echo '</tdbody>';
           } 
      echo '
  </table>';


}?>
<!--user end-->

<!--feedback start-->
<?php if(@$_GET['q']==3) {


$sql ="select user.id, user.cedula, user.name, user.gender, curso.curso, user.email, user.mob  from user inner join curso  on user.id_curso=curso.id_curso  WHERE user.id_curso LIKE '%$curso%'";
$resultado = $con->query($sql);

//echo '<div><form action="';$_SERVER["PHP_SELF"];echo'"'; echo' method="POST">';
//echo'Nombre:
//<input type="text" id="campo" name="campo">
//<input type="submit"class="btn btn-info" id="enviar" name="enviar" value="Buscar">
//</form>
//</div>';
echo "<center><h1>Reporte General</h1></center>";
echo'<div class="row table-responsive">
  <table class="display" id="mitabla2">
      <thead>
        <tr>
          <th>ID</th>
          <th>CEDULA</th>
          <th>NOMBRE</th>
          <th>APELLIDO</th>
          <th>CURSO</th>
          <th>CORREO</th>
          <th>TELEFONO</th>
          <th>REPORTE</th>
        </tr>
      </thead>
      
          '; while($row =$resultado->fetch_array()){
      echo '<tdbody>';
          echo '<tr>';
           echo'<td>'; echo $row["id"];echo'</td>';
            echo'<td>';echo $row["cedula"];echo'</td>';
            echo'<td>';echo $row["name"];echo'</td>';
            echo'<td>';echo $row["gender"];echo'</td>';
            echo'<td>';echo $row["curso"];echo'</td>';
            echo'<td>';echo $row["email"];echo'</td>';
            echo'<td>'; echo $row["mob"];echo'</td>';
            echo'<td>';echo '<a href="reporte.php?id=';echo $row["id"];echo'" target="_blank">'; echo'<button><img src="phone_120693.png"></button></a>';echo'</td>';
          echo '</tr>';
      echo '<tdbody>';
           } 
      echo '
  </table>';










}
?>

<?php if(@$_GET['q']==9) {


$sql ="select user.id, user.cedula, user.name, user.gender, curso.curso, user.email, user.mob  from user inner join curso  on user.id_curso=curso.id_curso  WHERE user.id_curso LIKE '%$curso%'";
$resultado = $con->query($sql);

echo' <center><form  method="post" action="reportefechas.php" target="_blank">
<center><h1>Reporte de Estudiantes por fechas</h1></center>
<div>
    Fecha Inicio<br>
    <input  type="date" name="inicio" id="fecha1" onchange="validar_fecha1(this.value);" style="color: #a2a2a2; font-weight: bold; padding: 10px;width:500px; border: 2px solid #d8d8d8; border-radius: 6px;">
</div> 
<div>
    Fecha Inicio<br>
    <input  type="date" name="fin" id="fecha2" onblur="validar_fecha2(this.value);" style="color: #a2a2a2; font-weight: bold; padding: 10px;width:500px; border: 2px solid #d8d8d8; border-radius: 6px;">
</div>
<div>
    Selecciona Estudiante:<br>
    <select name="combo" style="color: #a2a2a2; font-weight: bold; padding: 10px;width:500px; border: 2px solid #d8d8d8; border-radius: 6px;">
        <option value="0"> selecciona estudiante </option> 
        '; while($row = $resultado->fetch_array()){
            echo' <option value="'; echo $row['id'];echo'">'; echo $row['name'];echo'</option>';


        }
        echo'
    </select>
    <div ">
    <br></div>
              <input style="
  box-shadow: 3px 4px 0px 0px #54a3f7;
  background:linear-gradient(to bottom, #007dc1 5%, #0061a7 100%);
  background-color:#007dc1;
  border-radius:12px;
  border:1px solid #124d77;
  display:inline-block;
  cursor:pointer;
  color:#ffffff;
  font-family:Impact;
  font-size:25px;
  font-weight:bold;
  padding:7px 25px;
  text-decoration:none;
  text-shadow:0px 1px 0px #154682;
}
.myButton:hover {
  background:linear-gradient(to bottom, #0061a7 5%, #007dc1 100%);
  background-color:#0061a7;
}
.myButton:active {
  position:relative;
  top:1px;
}
" type="submit" value="Reporte">
            </div>
</div>
</form></center>
';






}
?>


  <script type="text/javascript">
    function validar_fecha1() {
      var fecha = new Date();
      var dd = fecha.getDate();
      var mm = fecha.getMonth()+1;
      var yyyy = fecha.getFullYear();
      if(dd<10){ dd='0'+dd; }
      if(mm<10){ mm='0'+mm; }
      fecha_actual=yyyy+'-'+mm+'-'+dd;
      var fecha_ini=document.getElementById('fecha1').value;

      if (fecha_ini>fecha_actual) {
        Swal.fire("Fecha Incorrecta");
        document.getElementById('fecha1').value="";

      }
    }

    function validar_fecha2() {

      var fecha_ini=document.getElementById('fecha1').value;
      var fecha_fin=document.getElementById('fecha2').value;

      if (fecha_fin<fecha_ini) {
        Swal.fire("Fecha Incorrecta");
        document.getElementById('fecha2').value="";

      }
    }
  </script>
<!--feedback closed-->

<!--feedback reading portion start-->
<?php if(@$_GET['fid']) {
echo '<br />';
$id=@$_GET['fid'];
$result = mysqli_query($con,"SELECT * FROM feedback WHERE id='$id' ") or die('Error');
while($row = mysqli_fetch_array($result)) {
	$name = $row['name'];
	$subject = $row['subject'];
	$date = $row['date'];
	$date= date("d-m-Y",strtotime($date));
	$time = $row['time'];
	$feedback = $row['feedback'];
	
echo '<div class="panel"<a title="Back to Archive" href="update.php?q1=2"><b><span class="glyphicon glyphicon-level-up" aria-hidden="true"></span></b></a><h2 style="text-align:center; margin-top:-15px;font-family: "Ubuntu", sans-serif;"><b>'.$subject.'</b></h1>';
 echo '<div class="mCustomScrollbar" data-mcs-theme="dark" style="margin-left:10px;margin-right:10px; max-height:450px; line-height:35px;padding:5px;"><span style="line-height:35px;padding:5px;">-&nbsp;<b>Fecha:</b>&nbsp;'.$date.'</span>
<span style="line-height:35px;padding:5px;">&nbsp;<b>Hora:</b>&nbsp;'.$time.'</span><span style="line-height:35px;padding:5px;">&nbsp;<b>Enviado por:</b>&nbsp;'.$name.'</span><br />'.$feedback.'</div></div>';}
}?>
<!--Feedback reading portion closed-->

<!--add quiz start-->
<?php
if(@$_GET['q']==4 && !(@$_GET['step']) ) {




$semestre ="select id_curso, curso from curso where id_curso LIKE '%$curso%'";
$resultado2 =$con->query($semestre);  

echo ' 
<div class="row">
<span class="title1" style="margin-left:40%;font-size:30px;"><b>Detalles de la Actividad</b></span><br /><br />
 <div class="col-md-3"></div><div class="col-md-6">   <form class="form-horizontal title1" name="form" action="update.php?q=addquiz"  method="POST">
<fieldset>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="name"></label>  
  <div class="col-md-12">
  <b>Titulo del examen<b>
  <input id="name" name="name" placeholder="Ingrese el título del Examen" class="form-control input-md" type="text" required>
    
  </div>
</div>



<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="total"></label>  
  <div class="col-md-12">
   <b>Numero Total de Preguntas<b>
  <input id="total" name="total" placeholder="Ingrese el número total de preguntas" class="form-control input-md" type="number" required>
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="right"></label>  
  <div class="col-md-12">
  <b>Nota de cada Pregunta<b>
  <input id="right" name="right" placeholder="Ingrese el valorde la respuesta correcta en entero (1.,2,3)" class="form-control input-md" min="0" type="number" required>
    
  </div>
</div>



<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="time"></label>  
  <div class="col-md-12">
  <b>Tiempo Limite (en minuto)<b>
  <input id="time" name="time" placeholder="Ingrese el límite de tiempo para la prueba en minutos" class="form-control input-md" min="1" type="number" required>
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="tag"></label>  
  <div class="col-md-12">
  <b>Curso<b>
  <select id="tag" name="tag" placeholder="Ingrese curso" class="form-control input-md" type="text" required>
       <option value="0"> selecciona curso </option> 
        '; while($row = $resultado2->fetch_array()){
            echo' <option value="'; echo $row['id_curso'];echo'">'; echo $row['curso'];echo'</option>';


        }
        echo'

  </select>
    
  </div>
</div>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="desc"></label>  
  <div class="col-md-12">
   <b>Descripcion del examen<b>
  <textarea rows="5" cols="8" name="desc" class="form-control" placeholder="Escribe una descripción acá..." required></textarea>  
  </div>
</div>


<div class="form-group">
  <label class="col-md-12 control-label" for=""></label>
  <div class="col-md-12"> 
    <input  type="submit" style="margin-left:40%" class="btn btn-primary" value="Enviar" class="btn btn-primary"/>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="wrong"></label>  
  <div class="col-md-12">
  <input id="wrong" name="wrong" placeholder="Ingrese el número de marcas en la respuesta incorrecta sin signo" value="0" class="form-control input-md" min="0" type="number" required readonly style="visibility:hidden;">
    
  </div>
</div>
</fieldset>
</form></div>';



}
?>
<!--add quiz end-->

<!--add quiz step2 start-->
<?php
if(@$_GET['q']==4 && (@$_GET['step'])==2 ) {
echo ' 
<div class="row">
<span class="title1" style="margin-left:40%;font-size:30px;"><b>Ingrese los detalles  de las pregunta</b></span><br /><br />
 <div class="col-md-3"></div><div class="col-md-6"><form class="form-horizontal title1" name="form" action="update.php?q=addqns&n='.@$_GET['n'].'&eid='.@$_GET['eid'].'&ch=4 "  method="POST">
<fieldset>
';
 
 for($i=1;$i<=@$_GET['n'];$i++)
 {
echo '<b>Pregunta número&nbsp;'.$i.'&nbsp;:</><br /><!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="qns'.$i.' "></label>  
  <div class="col-md-12">
  <textarea rows="3" cols="5" name="qns'.$i.'" class="form-control" placeholder="Escribe la pregunta número '.$i.' acá..."></textarea>  
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="'.$i.'1"></label>  
  <div class="col-md-12">
  <input id="'.$i.'1" name="'.$i.'1" placeholder="Ingresa la opción a" class="form-control input-md" type="text">
    
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="'.$i.'2"></label>  
  <div class="col-md-12">
  <input id="'.$i.'2" name="'.$i.'2" placeholder="Ingresa la opción b" class="form-control input-md" type="text">
    
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="'.$i.'3"></label>  
  <div class="col-md-12">
  <input id="'.$i.'3" name="'.$i.'3" placeholder="Ingresa la opción c" class="form-control input-md" type="text">
    
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="'.$i.'4"></label>  
  <div class="col-md-12">
  <input id="'.$i.'4" name="'.$i.'4" placeholder="Ingresa la opción d" class="form-control input-md" type="text">
    
  </div>
</div>
<br />
<b>Escoge la respuesta correcta</b>:<br/>
<select id="ans'.$i.'" name="ans'.$i.'" placeholder="Escoge la respuesta correcta " class="form-control input-md" >
   <option value="a">Seleccione la respuesta a la pregunta '.$i.'</option>
  <option value="a">option a</option>
  <option value="b">option b</option>
  <option value="c">option c</option>
  <option value="d">option d</option> </select><br /><br />'; 
 }
    
echo '<div class="form-group">
  <label class="col-md-12 control-label" for=""></label>
  <div class="col-md-12"> 
    <input  type="submit" style="margin-left:45%" class="btn btn-primary" value="Enviar" class="btn btn-primary"/>
  </div>
</div>

</fieldset>
</form></div>';



}
?><!--add quiz step 2 end-->

<!--remove quiz-->
<?php if(@$_GET['q']==5) {

$result = mysqli_query($con,"SELECT * FROM quiz ORDER BY date DESC") or die('Error');
echo  '<div class="panel"><div class="table-responsive"><table class="table table-striped title1">
<tr><td><b>S.N.</b></td><td><b>Temática</b></td><td><b>Total de Preguntas</b></td><td><b>Intentos</b></td><td><b>Tiempo límite</b></td><td></td></tr>';
$c=1;
while($row = mysqli_fetch_array($result)) {
	$title = $row['title'];
	$total = $row['total'];
	$sahi = $row['sahi'];
    $time = $row['time'];
	$eid = $row['eid'];
	echo '<tr><td>'.$c++.'</td><td>'.$title.'</td><td>'.$total.'</td><td>'.$sahi*$total.'</td><td>'.$time.'&nbsp;min</td>
	<td><b><a href="update.php?q=rmquiz&eid='.$eid.'" class="pull-right btn sub1" style="margin:0px;background:red"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>&nbsp;<span class="title1"><b>Remove</b></span></a></b></td></tr>';
}
$c=0;
echo '</table></div></div>';

}
?>


</div><!--container closed-->
</div></div>

</body>

</html>
