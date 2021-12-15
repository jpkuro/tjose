<?php
 
session_start();
$email=$_SESSION['email'];
  if(!(isset($_SESSION['email']))){
header("location:index.php");

}
?>
<?php
 
include_once 'dbConnection.php';
?>
<?php
$name = $_SESSION['name'];

include_once 'dbConnection.php';
echo '<span class="pull-right top title1" ><span class="log1"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;&nbsp;Hola,</span> <a href="account.php" class="log log1">'.$name.'</a>&nbsp;|&nbsp;<a href="logout.php?q=account.php" class="log"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;Cerrar Sesión</button></a></span>';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Area Administrativa </title>
<link  rel="stylesheet" href="css/bootstrap.min.css"/>
 <link  rel="stylesheet" href="css/bootstrap-theme.min.css"/>    
 <link rel="stylesheet" href="css/main.css">
 <link  rel="stylesheet" href="css/font.css">
 <link rel="preconnect" href="https://fonts.gstatic.com">
  <link  rel="stylesheet" href="css/jquery.dataTables.min.css"/>   
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
 <script src="js/jquery.js" type="text/javascript"></script>
 <script type="text/javascript" src="js/buscar.js"></script>

  <script src="js/bootstrap.min.js"  type="text/javascript"></script>
  <script src="js/jquery.dataTables.min.js"></script>
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
    $('#mitabla3').DataTable({
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
    $('#mitabla4').DataTable({
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
    $('#mitabla8').DataTable({
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
    $('#mitabla5').DataTable({
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

<body  style="background:#eee;">

  <script type="text/javascript">
 
        validarDocumento  = function() {

            numero = document.getElementById('cedula').value;
            /* alert(numero); */
            var suma = 0;
            var residuo = 0;
            var pri = false;
            var pub = false;
            var nat = false;
            var numeroProvincias = 22;
            var modulo = 11;

            /* Verifico que el campo no contenga letras */
            var ok=1;
            for (i=0; i<numero.length && ok==1 ; i++){
                var n = parseInt(numero.charAt(i));
                if (isNaN(n)) ok=0;
            }
            if (ok==0){
                /*alert("No puede ingresar caracteres en el número");*/
                document.getElementById("salida").innerHTML = ("No puede ingresar caracteres en el número");
                return false;
            }

            if (numero.length < 10 ){
                 /*alert('El número ingresado no es válido');*/
                document.getElementById("salida").innerHTML = ("El número ingresado no es válido");
                return false;
            }

            /* Los primeros dos digitos corresponden al codigo de la provincia */
            provincia = numero.substr(0,2);
            if (provincia < 1 || provincia > numeroProvincias){
               /* alert('El código de la provincia (dos primeros dígitos) es inválido');*/
                document.getElementById("salida").innerHTML = ("El código de la provincia (dos primeros dígitos) es inválido");
                return false;
            }
            /* Aqui almacenamos los digitos de la cedula en variables. */
            d1  = numero.substr(0,1);
            d2  = numero.substr(1,1);
            d3  = numero.substr(2,1);
            d4  = numero.substr(3,1);
            d5  = numero.substr(4,1);
            d6  = numero.substr(5,1);
            d7  = numero.substr(6,1);
            d8  = numero.substr(7,1);
            d9  = numero.substr(8,1);
            d10 = numero.substr(9,1);

            /* El tercer digito es: */
            /* 9 para sociedades privadas y extranjeros   */
            /* 6 para sociedades publicas */
            /* menor que 6 (0,1,2,3,4,5) para personas naturales */
            if (d3==7 || d3==8){
                /*alert('El tercer dígito ingresado es inválido');*/
                 document.getElementById("salida").innerHTML = ("El tercer dígito ingresado es inválido");
                return false;
            }

            /* Solo para personas naturales (modulo 10) */
            if (d3 < 6){
                nat = true;
                p1 = d1 * 2;  if (p1 >= 10) p1 -= 9;
                p2 = d2 * 1;  if (p2 >= 10) p2 -= 9;
                p3 = d3 * 2;  if (p3 >= 10) p3 -= 9;
                p4 = d4 * 1;  if (p4 >= 10) p4 -= 9;
                p5 = d5 * 2;  if (p5 >= 10) p5 -= 9;
                p6 = d6 * 1;  if (p6 >= 10) p6 -= 9;
                p7 = d7 * 2;  if (p7 >= 10) p7 -= 9;
                p8 = d8 * 1;  if (p8 >= 10) p8 -= 9;
                p9 = d9 * 2;  if (p9 >= 10) p9 -= 9;
                modulo = 10;
            }
            /* Solo para sociedades publicas (modulo 11) */
            /* Aqui el digito verficador esta en la posicion 9, en las otras 2 en la pos. 10 */
            else if(d3 == 6){
                pub = true;
                p1 = d1 * 3;
                p2 = d2 * 2;
                p3 = d3 * 7;
                p4 = d4 * 6;
                p5 = d5 * 5;
                p6 = d6 * 4;
                p7 = d7 * 3;
                p8 = d8 * 2;
                p9 = 0;
            }

            /* Solo para entidades privadas (modulo 11) */
            else if(d3 == 9) {
                pri = true;
                p1 = d1 * 4;
                p2 = d2 * 3;
                p3 = d3 * 2;
                p4 = d4 * 7;
                p5 = d5 * 6;
                p6 = d6 * 5;
                p7 = d7 * 4;
                p8 = d8 * 3;
                p9 = d9 * 2;
            }

            suma = p1 + p2 + p3 + p4 + p5 + p6 + p7 + p8 + p9;
            residuo = suma % modulo;
            /* Si residuo=0, dig.ver.=0, caso contrario 10 - residuo*/
            digitoVerificador = residuo==0 ? 0: modulo - residuo;
            /* ahora comparamos el elemento de la posicion 10 con el dig. ver.*/

            if(numero == '2222222222'){
                /*alert('El numero de cedula no existe');*/
                document.getElementById("salida").style.color = "#FF0000"
                document.getElementById("salida").innerHTML = ("El numero de cedula no existe");
                return false;
            }


            if (pub==true){
                if (digitoVerificador != d9){
                     /*alert('El ruc de la empresa del sector público es incorrecto.');*/
                    document.getElementById("salida").innerHTML = ("El ruc de la empresa del sector público es incorrecto.");
                    return false;
                }
                /* El ruc de las empresas del sector publico terminan con 0001*/
                if ( numero.substr(9,4) != '0001' ){
                    /*alert('El ruc de la empresa del sector público debe terminar con 0001');*/
                    document.getElementById("salida").innerHTML = ("El ruc de la empresa del sector público debe terminar con 0001");
                    return false;
                }
            }
            else if(pri == true){
                if (digitoVerificador != d10){
                    /*alert('El ruc de la empresa del sector privado es incorrecto.');*/
                    document.getElementById("salida").innerHTML = ("El ruc de la empresa del sector privado es incorrecto.");
                    return false;
                }
                if ( numero.substr(10,3) != '001' ){
                    /*alert('El ruc de la empresa del sector privado debe terminar con 001');*/
                    document.getElementById("salida").innerHTML = ("El ruc de la empresa del sector privado debe terminar con 001");
                    return false;
                }
            }
            else if(nat == true){
                if (digitoVerificador != d10){
                    /* alert('El número de cédula de la persona natural es incorrecto.');*/
                    document.getElementById("salida").innerHTML = ("El número de cédula de la persona natural es incorrecto.");
                    return false;
                }
                if (numero.length >10 && numero.substr(10,3) != '001' ){
                    /* alert('El ruc de la persona natural debe terminar con 001');*/
                    document.getElementById("salida").innerHTML = ("El ruc de la persona natural debe terminar con 001");
                    return false;
                }
            }
            document.getElementById("salida").style.color = "#32F647"
            document.getElementById("salida").innerHTML = ("La cedula es valida");
            
            return true;
        }
    </script>

    <script>



 window.onload = function() {
  var myInput = document.getElementById('name');
  myInput.onpaste = function(e) {
    e.preventDefault(); 
 } 
    }

    function soloLetras(e){
       key = e.keyCode || e.which;
       tecla = String.fromCharCode(key).toLowerCase();
       letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
       especiales = "8-37-39-46";

       tecla_especial = false
       for(var i in especiales){
            if(key == especiales[i]){
                tecla_especial = true;
                break;           }       }
        if(letras.indexOf(tecla)==-1 && !tecla_especial){
            return false;} }
    </script>



    <script>
    function valida(e){
    tecla = (document.all) ? e.keyCode : e.which;

    //Tecla de retroceso para borrar, siempre la permite
    if (tecla==8){
        return true; }    
    // Patron de entrada, en este caso solo acepta numeros
    patron =/[0-9]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);}
   </script>
    
  <script type="text/javascript">

   function soloNumeros(e){
   var key = window.Event ? e.which : e.keyCode
   return (key >= 48 && key <= 57)}
 </script>


<div class="header">
<div class="row">
<div class="col-lg-6">
<span class="logo">ADMINISTRADOR</span></div>



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
      <a class="navbar-brand" href="dash.php?q=0"><b>Panel de Control</b></a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li <?php if(@$_GET['q']==0) echo'class="active"'; ?>><a href="dash.php?q=0">Inicio<span class="sr-only">(current)</span></a></li>
        <li class="dropdown <?php if(@$_GET['q']==1 || @$_GET['q']==4 || @$_GET['q']==8) echo'active"'; ?>">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Mostrar/editar<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="dash.php?q=1">Mostrar/editar Estudiantes</a></li>
            <li><a href="dash.php?q=8">Mostrar/editar Maestro</a></li>
            <li><a href="dash.php?q=4">Mostrar/editar Administrador</a></li>
      
          </ul>
        </li>
		<li class="dropdown <?php if(@$_GET['q']==2 || @$_GET['q']==7 || @$_GET['q']==9) echo'active"'; ?>">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Nuevos Registros<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="dash.php?q=2">Nuevos Estudiante</a></li>
            <li><a href="dash.php?q=7">Nuevo Administrador</a></li>
            <li><a href="dash.php?q=9">Nuevo Maestro</a></li>
      
          </ul>
        </li>



		<li <?php if(@$_GET['q']==3) echo'class="active"'; ?>><a href="dash.php?q=3">Observaciones Administrativas</a></li>
    <li <?php if(@$_GET['q']==6) echo'class="active"'; ?>><a href="dash.php?q=6">correo leidos</a></li>
     <li <?php if(@$_GET['q']==5) echo'class="active"'; ?>><a href="dash.php?q=5"><span class="glyphicon glyphicon-stats" aria-hidden="true"></span>&nbsp;Año Lectivo</a></li>
        
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
<center><h1 style="font-family: Roboto, sans-serif;";>Bienvenido al Area de administrador</h1></center>
';
echo '<center><fieldset>
      <p><h2>En esta area puedes realizar la busqueda de los usuarios activos en el sistema, ademas de agregar y modificar  sus datos,</h2></p>
      <br>
      <p><h2>Tambien puedes observar las preguntas y quejas de la gente este afiliada o no a la institucion</h2></p>


</fieldset></center>';
}

$query ="select id_curso, curso from curso";
$resultado =$con->query($query);

//ranking start
if(@$_GET['q']== 2) 
{

  echo '<center><h1 style="font-family: Roboto, sans-serif;";>Registar Nuevos Usuarios</h1></center>';
  echo '<center><h1 style="font-family: Roboto, sans-serif;";>ESTUDIANTE</h1></center>
  <br>
  <center>
  <form method="post" action="registro1.php">
  <fieldset><br>
  <b>INGRESE CEDULA </b>
  <br>
    <input type="text" style="color: #a2a2a2; font-weight: bold; padding: 10px;width:500px; border: 2px solid #d8d8d8; border-radius: 6px;"  name="cedula" id="cedula" value="" required  onKeyPress="return soloNumeros(event) " placeholder="Ingrese la cedula" maxlength="10" onchange="validarDocumento()"    autofocus required>
    <br>
     <div id="salida" style="color:black;"></div>
    <br>
  <b>INGRESE EL NOMBRE </b>
  
  <br>
    <input type="text" name="namea" placeholder="Ingrese el nombre"  onkeypress="return soloLetras(event)" style="color: #a2a2a2; font-weight: bold; padding: 10px;width:500px; border: 2px solid #d8d8d8; border-radius: 6px;" required>
    <br>
    <br>
    <b> INGRESE EL APELLIDO </b>
  
  <br>
    <input type="text" name="apellido" placeholder="Ingrese el apellido"  onkeypress="return soloLetras(event)" style="color: #a2a2a2; font-weight: bold; padding: 10px; width:500px; border: 2px solid #d8d8d8; border-radius: 6px;" required>
    <br>

  
    
    <br>
    <b> INGRESE EL CURSO </b>
  
  <br>
     <select name="curso" style="color: #a2a2a2; font-weight: bold; padding: 10px; width:500px; border: 2px solid #d8d8d8; border-radius: 6px;"required>


    <option value="" selected="selected"> - selecccionar curso - </option>
                ';WHILE ($row = $resultado->fetch_assoc()){
                echo '<option value="'; echo $row["id_curso"]; echo'">'; echo $row["curso"]; echo'</option>
                ';} echo'

    </select>
    <br>
    <br>
    <b> INGRESE EL CORREO ELECTRONICO</b>
  
  <br>
    <input type="email" name="email"  pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" placeholder="Ingrese el correo electronico"style="color: #a2a2a2; font-weight: bold; padding: 10px; width:500px; border: 2px solid #d8d8d8; border-radius: 6px;" required>
    <br>
    <br>
     <b>INGRESE EL TELEFONO </b>
  
  <br>
    <input type="text" name="mob" placeholder="Ingrese el TELEFONO" onKeyPress="return soloNumeros(event)" style="color: #a2a2a2; font-weight: bold; padding: 10px; width:500px; border: 2px solid #d8d8d8; border-radius: 6px;"required>
    <br>
    <br>
    <b> INGRESE LA CONTRASEÑA ASIGNADA</b>
  <br>
    <input type="password" name="password" value="L1ce0221"  readonly="readonly"placeholder="Ingrese la contraseña"style="color: #a2a2a2; font-weight: bold; padding: 10px; width:500px; border: 2px solid #d8d8d8; border-radius: 6px;" required>
   
    <input type="hidden" name="rol" value="estudiante"  readonly="readonly" style="color: #a2a2a2; font-weight: bold; padding: 10px; width:500px; border: 2px solid #d8d8d8; border-radius: 6px;" required>
    
    <br>
    <br>

';  $semestre ="select id_semestre, semestre from semestre";
$resultado2 =$con->query($semestre);  

$parcial ="select id_parcial, parcial from parcial";
$resultado3 =$con->query($parcial); 
$lectivo ="select id_lectivo, lectivo from lectivo where estado='activo'";
  $resultadol =$con->query($lectivo);  echo'


     <b> Semestre</b>
  <br>
     <select name="semestre" style="color: #a2a2a2; font-weight: bold; padding: 10px; width:500px; border: 2px solid #d8d8d8; border-radius: 6px;"required>


    <option value="" selected="selected"> - selecccionar semestre - </option>
                ';WHILE ($row = $resultado2->fetch_assoc()){
                echo '<option value="'; echo $row["id_semestre"]; echo'">'; echo $row["semestre"]; echo'</option>
                ';} echo'

    </select>
    <br>
    <br>

    <b> Parcial</b>
  <br>
     <select name="parcial" style="color: #a2a2a2; font-weight: bold; padding: 10px; width:500px; border: 2px solid #d8d8d8; border-radius: 6px;"required>


    <option value="" selected="selected"> - selecccionar semestre - </option>
                ';WHILE ($row = $resultado3->fetch_assoc()){
                echo '<option value="'; echo $row["id_parcial"]; echo'">'; echo $row["parcial"]; echo'</option>
                ';} echo'

    </select>

  <br>
  

  <br>

  <b> Año Lectivo</b>
<br>
   <select name="lectivo" style="color: #a2a2a2; font-weight: bold; padding: 10px; width:500px; border: 2px solid #d8d8d8; border-radius: 6px;"required>


  <option value="" selected="selected"> - selecccionar año lectivo - </option>
              ';WHILE ($row = $resultadol->fetch_assoc()){
              echo '<option value="'; echo $row["lectivo"]; echo'">'; echo $row["lectivo"]; echo'</option>
              ';} echo'

  </select>

<br>


    <input type="hidden" name="materia" value="--"  readonly="readonly"placeholder="Ingrese la contraseña"style="color: #a2a2a2; font-weight: bold; padding: 10px; width:500px; border: 2px solid #d8d8d8; border-radius: 6px;" required>
    <br>

   
    <br>
    <input type="hidden" value="1" name="estado" placeholder="Ingrese el estado  (1 Activo/ 0 Inactivo) "style="color: #a2a2a2; font-weight: bold; padding: 10px; width:500px; border: 2px solid #d8d8d8; border-radius: 6px;" required>
    
  
   <input type="submit" style="
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
" value="registrar" > 
<br>

</fieldset>
  </form></center>

  ';

  
}


if(@$_GET['q']== 9) 
{

  echo '<center><h1 style="font-family: Roboto, sans-serif;";>Registar Nuevos Usuario</h1></center>';
  echo '<center><h1 style="font-family: Roboto, sans-serif;";> Maestro</h1></center>
  <center>
  <form method="post" action="registro3.php">
  <fieldset>
  <b>INGRESE CEDULA </b>
  <br>
    <input type="text" name="cedula" id="cedula" placeholder="Ingrese la cedula" onKeyPress="return soloNumeros(event)" required  maxlength="10" onchange="validarDocumento()" style="color: #a2a2a2; font-weight: bold; padding: 10px;width:500px; border: 2px solid #d8d8d8; border-radius: 6px;"required>
    <br>
    <div id="salida" style="color:black;"></div>
    <br>
  <b>INGRESE EL NOMBRE </b>
  
  <br>
    <input type="text" name="namea" placeholder="Ingrese el nombre"  onkeypress="return soloLetras(event)"style="color: #a2a2a2; font-weight: bold; padding: 10px;width:500px; border: 2px solid #d8d8d8; border-radius: 6px;" required>
    <br>
    <br>
    <b> INGRESE EL APELLIDO </b>
  
  <br>
    <input type="text" name="apellido" placeholder="Ingrese el apellido"  onkeypress="return soloLetras(event)" style="color: #a2a2a2; font-weight: bold; padding: 10px; width:500px; border: 2px solid #d8d8d8; border-radius: 6px;" required>
    <br>
    <br>
    <b> INGRESE EL CURSO </b>
  
  <br>
     <select name="curso" style="color: #a2a2a2; font-weight: bold; padding: 10px; width:500px; border: 2px solid #d8d8d8; border-radius: 6px;"required>


    <option value="" selected="selected"> - selecccionar curso - </option>
                ';WHILE ($row = $resultado->fetch_assoc()){
                echo '<option value="'; echo $row["id_curso"]; echo'">'; echo $row["curso"]; echo'</option>
                ';} echo'

    </select>
    <br>
    <br>
    <b> INGRESE EL CORREO ELECTRONICO</b>
  
  <br>
    <input type="email" name="email" placeholder="Ingrese el correo electronico" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" style="color: #a2a2a2; font-weight: bold; padding: 10px; width:500px; border: 2px solid #d8d8d8; border-radius: 6px;" required>
    <br>
    <br>
     <b>INGRESE EL TELEFONO </b>
  
  <br>
    <input type="text" name="mob" placeholder="Ingrese el TELEFONO" onKeyPress="return soloNumeros(event)" style="color: #a2a2a2; font-weight: bold; padding: 10px; width:500px; border: 2px solid #d8d8d8; border-radius: 6px;"required>
    <br>
    <br>
    <b> INGRESE LA CONTRASEÑA ASIGNADA</b>
  <br>
    <input type="password" name="password" value="L1ce0221"  readonly="readonly" placeholder="Ingrese la contraseña"style="color: #a2a2a2; font-weight: bold; padding: 10px; width:500px; border: 2px solid #d8d8d8; border-radius: 6px;" required>
    
     <input type="hidden" name="rol" value="maestro"  readonly="readonly" style="color: #a2a2a2; font-weight: bold; padding: 10px; width:500px; border: 2px solid #d8d8d8; border-radius: 6px;" required>
    <br>
    <br>

';  $semestre ="select id_semestre, semestre from semestre";
$resultado2 =$con->query($semestre);  

$parcial ="select id_parcial, parcial from parcial";
$resultado3 =$con->query($parcial);

$materia ="select id_materia, materia from materia";
$resultado4 =$con->query($materia);

$lectivo ="select id_lectivo, lectivo from lectivo where estado='activo'";
  $resultadol =$con->query($lectivo);   echo'


     <b> Semestre</b>
  <br>
     <select name="semestre" style="color: #a2a2a2; font-weight: bold; padding: 10px; width:500px; border: 2px solid #d8d8d8; border-radius: 6px;"required>


    <option value="" selected="selected"> - selecccionar semestre - </option>
                ';WHILE ($row = $resultado2->fetch_assoc()){
                echo '<option value="'; echo $row["id_semestre"]; echo'">'; echo $row["semestre"]; echo'</option>
                ';} echo'

    </select>
    <br>
    <br>

    <b> Parcial</b>
  <br>
     <select name="parcial" style="color: #a2a2a2; font-weight: bold; padding: 10px; width:500px; border: 2px solid #d8d8d8; border-radius: 6px;"required>


    <option value="" selected="selected"> - selecccionar semestre - </option>
                ';WHILE ($row = $resultado3->fetch_assoc()){
                echo '<option value="'; echo $row["id_parcial"]; echo'">'; echo $row["parcial"]; echo'</option>
                ';} echo'

    </select>
    <br>

<br>
<b> Materia</b>
  <br>
     <select name="materia" style="color: #a2a2a2; font-weight: bold; padding: 10px; width:500px; border: 2px solid #d8d8d8; border-radius: 6px;"required>


    <option value="" selected="selected"> - selecccionar materia - </option>
                ';WHILE ($row = $resultado4->fetch_assoc()){
                echo '<option value="'; echo $row["id_materia"]; echo'">'; echo $row["materia"]; echo'</option>
                ';} echo'

    </select>
    <br>
   
  <b> Año Lectivo</b>
  <br>
     <select name="lectivo" style="color: #a2a2a2; font-weight: bold; padding: 10px; width:500px; border: 2px solid #d8d8d8; border-radius: 6px;"required>
  
  
    <option value="" selected="selected"> - selecccionar año lectivo - </option>
                ';WHILE ($row = $resultadol->fetch_assoc()){
                echo '<option value="'; echo $row["lectivo"]; echo'">'; echo $row["lectivo"]; echo'</option>
                ';} echo'
  
    </select>
  
  <br>
    <br>
    <input type="hidden" value="1" name="estado" placeholder="Ingrese el estado  (1 Activo/ 0 Inactivo) "style="color: #a2a2a2; font-weight: bold; padding: 10px; width:500px; border: 2px solid #d8d8d8; border-radius: 6px;" required>
    <br>
  
   <input type="submit" style="
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
" value="registrar" > 
<br>

</fieldset>
  </form></center>

  ';

  
}



if(@$_GET['q']== 5) 
{

  echo'<center><h1 style="font-family: Roboto, sans-serif;";>Registro de AÑO LECTIVO</h1></center>

    <center><form method="post" action="lectivo.php">
    <fieldset>
      <b> Ingrese nuevo Año lectivo </b>
          <select name="year" style="color: #a2a2a2; font-weight: bold; padding: 10px; width:500px; border: 2px solid #d8d8d8; border-radius: 6px;"required>
            <option value="0" selected>selecionar año lectivo</option>
               '; $year = date("Y");
               for ($i=2010; $i<=$year; $i++){
              echo '<option value="'.$i.'">'.$i.'</option>';
        }echo '
    </select>
    <input type="hidden" value="activo" name="estadol" required>
       <br>
       <br>
   <input type="submit" style="
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
" value="registrar" > 
<br></fieldset>
</form>

    

    ';
$sql5 ="select * from lectivo";
$resultado5 = $con->query($sql5);


echo'<div class="row table-responsive">
  <table class="display" id="mitabla5">
      <thead>
        <tr>
          <th>ID</th>
          <th>AÑO LECTIVO</th>
          <th>ESTADO</th>
          <th>MODIFICAR</th>
        </tr>
      
      </thead>
          '; while($row =$resultado5->fetch_array()){
      echo '<tdbody>';
          echo '<tr>';
           echo'<td>'; echo $row["id_lectivo"];echo'</td>';
            echo'<td>';echo $row["lectivo"];echo'</td>';
            echo'<td>';echo $row["estado"];echo'</td>';
            echo'<td>';echo '<a href="modificarlectivo.php?id_lectivo=';echo $row["id_lectivo"];echo'">'; echo'<button><img src="phone_120693.png"></button></a>';echo'</td>';
        
          echo '</tr>';
      echo '</tdbody>';
           } 
      echo '
  </table>';

  
}














if(@$_GET['q']== 7) {

 echo '<center><h1 style="font-family: Roboto, sans-serif;";>Registar Nuevos Usuarios ADMINISTRATIVO</h1></center>
  <center><form method="post" action="registro2.php">
  <fieldset>
  <b>INGRESE CEDULA</b>
  <br>
    <input type="text" name="cedula" id="cedula" placeholder="Ingrese la cedula" required onchange="validarDocumento()"  onKeyPress="return soloNumeros(event)"- style="color: #a2a2a2; font-weight: bold; padding: 10px; width:500px; border: 2px solid #d8d8d8; border-radius: 6px;" required >
    <br>
    <div id="salida" style="color:black;"></div>
  <b>INGRESE EL NOMBRE ADMINISTRATIVO</b>
  <br>
    <input type="text" name="namea" placeholder="Ingrese el nombre"  onkeypress="return soloLetras(event)" style="color: #a2a2a2; font-weight: bold; padding: 10px; width:500px; border: 2px solid #d8d8d8; border-radius: 6px;" required >
    <br>
    <b> INGRESE EL CORREO ELECTRONICO</b>
  <br> 
    <input type="email" name="email" placeholder="Ingrese el correo electronico" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" style="color: #a2a2a2; font-weight: bold; padding: 10px; width:500px; border: 2px solid #d8d8d8; border-radius: 6px;" required>
    <br>
     <b>INGRESE LA CONTRASEÑA ASIGNADA</b>
  <br>
    <input type="password" name="password" placeholder="Ingrese la contraseña" style="color: #a2a2a2; font-weight: bold; padding: 10px; width:500px; border: 2px solid #d8d8d8; border-radius: 6px;" required>
    <br>
  
    <input type="hidden" name="estado" value="1" placeholder="Ingrese la contraseña" style="color: #a2a2a2; font-weight: bold; padding: 10px; width:500px; border: 2px solid #d8d8d8; border-radius: 6px;" required>
    
    <b>INGRESE NUMERO CELULAR</b>
  <br>
    <input type="text" name="celular" placeholder="Ingrese el celular"  onKeyPress="return soloNumeros(event)" style="color: #a2a2a2; font-weight: bold; padding: 10px; width:500px; border: 2px solid #d8d8d8; border-radius: 6px;" required >
    <br>';
    
    $lectivo2 ="select id_lectivo, lectivo from lectivo where estado='activo'";
    $resultadol2 =$con->query($lectivo2);   echo'


     <b> Año Lectivo</b>
  <br>
     <select name="lectivo" style="color: #a2a2a2; font-weight: bold; padding: 10px; width:500px; border: 2px solid #d8d8d8; border-radius: 6px;"required>


    <option value="" selected="selected"> - selecccionar semestre - </option>
                ';WHILE ($row = $resultadol2->fetch_assoc()){
                echo '<option value="'; echo $row["lectivo"]; echo'">'; echo $row["lectivo"]; echo'</option>
                ';} echo'

    </select>
    <br>

  <br>
   <input type="submit" style="
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
" value="registrar" > 
<br>

  </fieldset>
  </form></center>

  ';
}
?>
<!--home closed-->
<!--users start-->

<?php if(@$_GET['q']==1) {

//$where ="";
//if(!empty($_POST))
//{
//  $valor = $_POST['campo'];
 // if(!empty($valor)){
 //   $where ="WHERE name LIKE '%$valor%' or gender LIKE '%$valor%'";
 // }$where

//}

  //$consulta="SELECT user.id,user.cedula,user.name,user.gender,user.email, quiz.title, history.level, history.sahi, history.wrong, history.score, history.date FROM user INNER JOIN history INNER JOIN quiz on user.email=history.email and history.eid=quiz.eid  where user.id='$id' ";

//$resultado = $con->query($consulta);

$sql ="select user.id, user.cedula, user.name, user.gender, user.lectivo, curso.curso, user.email, user.mob, semestre.semestre, parcial.parcial from user inner join curso inner join semestre inner join parcial on user.id_curso=curso.id_curso and user.id_semestre=semestre.id_semestre and user.id_parcial=parcial.id_parcial ";
$resultado = $con->query($sql);

//echo '<div><form action="';$_SERVER["PHP_SELF"];echo'"'; echo' method="POST">';
//echo'Nombre:
//<input type="text" id="campo" name="campo">
//<input type="submit"class="btn btn-info" id="enviar" name="enviar" value="Buscar">
///</form>
//</div>';

echo'<div class="row table-responsive">
  <table class="display" id="mitabla3">
      <thead>
        <tr>
          <th>ID</th>
          <th>CEDULA</th>
          <th>NOMBRE</th>
          <th>APELLIDO</th>
          <th>CURSO</th>
          <th>CORREO</th>
          <th>TELEFONO</th>
          <th>AÑO LECTIVO</th>
          <th>SEMESTRE</th>
          <th>PARCIAL</th>
          <th>MODIFICAR</th>
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
            echo'<td>'; echo $row["lectivo"];echo'</td>';
            echo'<td>'; echo $row["semestre"];echo'</td>';
            echo'<td>'; echo $row["parcial"];echo'</td>';
            echo'<td>';echo '<a href="modificar.php?id=';echo $row["id"];echo'">'; echo'<button><img src="phone_120693.png"></button></a>';echo'</td>';
        
          echo '</tr>';
      echo '</tdbody>';
           } 
      echo '
  </table>';

}
?>

<?php if(@$_GET['q']==4) {

//$where ="";
//if(!empty($_POST))
//{
//  $valor = $_POST['campo'];
 // if(!empty($valor)){
 //   $where ="WHERE name LIKE '%$valor%' or gender LIKE '%$valor%'";
 // }$where

//}

  //$consulta="SELECT user.id,user.cedula,user.name,user.gender,user.email, quiz.title, history.level, history.sahi, history.wrong, history.score, history.date FROM user INNER JOIN history INNER JOIN quiz on user.email=history.email and history.eid=quiz.eid  where user.id='$id' ";

//$resultado = $con->query($consulta);

$sql ="select admin_id, name, email, cedula, celular, lectivo from admin";
$resultado4 = $con->query($sql);

//echo '<div><form action="';$_SERVER["PHP_SELF"];echo'"'; echo' method="POST">';
//echo'Nombre:
//<input type="text" id="campo" name="campo">
//<input type="submit"class="btn btn-info" id="enviar" name="enviar" value="Buscar">
///</form>
//</div>';

echo'<div class="row table-responsive">
  <table class="display" id="mitabla3">
      <thead>
        <tr>
          <th>ID</th>
          <th>CEDULA</th>
          <th>NOMBRE</th>
          <th>CORREO</th>
          <th>TELEFONO</th>
          <th>AÑO LECTIVO</th>
          <th>MODIFICAR</th>
        </tr>
      
      </thead>
          '; while($row =$resultado4->fetch_array()){
      echo '<tdbody>';
          echo '<tr>';
           echo'<td>'; echo $row["admin_id"];echo'</td>';
            echo'<td>';echo $row["cedula"];echo'</td>';
            echo'<td>';echo $row["name"];echo'</td>';
            echo'<td>';echo $row["email"];echo'</td>';
            echo'<td>'; echo $row["celular"];echo'</td>';
            echo'<td>'; echo $row["lectivo"];echo'</td>';
             echo'<td>';echo '<a href="modificarad.php?admin_id=';echo $row["admin_id"];echo'">'; echo'<button><img src="phone_120693.png"></button></a>';echo'</td>';
      echo '</tdbody>';
           } 
      echo '
  </table>';

}
?>


<?php if(@$_GET['q']==8) {

//$where ="";
//if(!empty($_POST))
//{
//  $valor = $_POST['campo'];
 // if(!empty($valor)){
 //   $where ="WHERE name LIKE '%$valor%' or gender LIKE '%$valor%'";
 // }$where

//}

  //$consulta="SELECT user.id,user.cedula,user.name,user.gender,user.email, quiz.title, history.level, history.sahi, history.wrong, history.score, history.date FROM user INNER JOIN history INNER JOIN quiz on user.email=history.email and history.eid=quiz.eid  where user.id='$id' ";

//$resultado = $con->query($consulta);

$sql ="select maestro.id, maestro.cedula, maestro.nombre, maestro.apellido, curso.curso, maestro.email, maestro.celular, maestro.lectivo, materia.materia from maestro inner join curso inner join materia on maestro.curso=curso.id_curso and maestro.id_materia= materia.id_materia";
$resultado6 = $con->query($sql);

//echo '<div><form action="';$_SERVER["PHP_SELF"];echo'"'; echo' method="POST">';
//echo'Nombre:
//<input type="text" id="campo" name="campo">
//<input type="submit"class="btn btn-info" id="enviar" name="enviar" value="Buscar">
///</form>
//</div>';

echo'<div class="row table-responsive">
  <table class="display" id="mitabla8">
      <thead>
        <tr>
          <th>ID</th>
          <th>CEDULA</th>
          <th>NOMBRE</th>
          <th>APELLIDO</th>
          <th>CURSO</th>
          <th>CORREO</th>
          <th>TELEFONO</th>
          <th>MATERIA</th>
          <th>LECTIVO</th>
          <th>MODIFICAR</th>
        </tr>
      
      </thead>
          '; while($row =$resultado6->fetch_array()){
      echo '<tdbody>';
          echo '<tr>';
           echo'<td>'; echo $row["id"];echo'</td>';
            echo'<td>';echo $row["cedula"];echo'</td>';
            echo'<td>';echo $row["nombre"];echo'</td>';
            echo'<td>';echo $row["apellido"];echo'</td>';
            echo'<td>'; echo $row["curso"];echo'</td>';
            echo'<td>'; echo $row["email"];echo'</td>';
            echo'<td>'; echo $row["celular"];echo'</td>';
            echo'<td>'; echo $row["materia"];echo'</td>';
            echo'<td>'; echo $row["lectivo"];echo'</td>';
             echo'<td>';echo '<a href="modmaestro.php?id=';echo $row["id"];echo'">'; echo'<button><img src="phone_120693.png"></button></a>';echo'</td>';
      echo '</tdbody>';
           } 
      echo '
  </table>';

}
?>





<!--user end-->

<!--feedback start-->
<?php if(@$_GET['q']==3) {




$sql ="select * from feedback where estado='1'  ";
$resultado = $con->query($sql);
  $c=1;
echo'<div class="row table-responsive">
  <table class="display" id="mitabla4">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th>Correo</th>
          <th>Asunto</th>
          <th>Fecha</th>
          <th>Hora</th>
     
          <th></th>
          <th></th>
        </tr>
      
      </thead>

          '; while($row =$resultado->fetch_array()){
          $id = $row['id'];

      echo '<tdbody>';
          echo '<tr>';
           echo '<td>'.$c++.'</td>';
           echo'<td>'; echo $row["name"];echo'</td>';
            echo'<td>';echo $row["email"];echo'</td>';
            echo '<td><a title="Clic para ver la observación" href="dash.php?q=3&fid=';echo $row["id"];echo'">';echo $row["subject"];echo'</a></td>';
            echo'<td>';echo $row["date"];echo'</td>';
            echo'<td>';echo $row["time"];echo'</td>';
            echo'<td><a title="Abrir observación" href="dash.php?q=3&fid='.$id.'"><b><span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span></b></a></td>';
            echo '<td><a title="Eliminar observación" href="update.php?fdid='.$id.'"><b><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></b></a></td>';
          echo '</tr>';
      echo '</tdbody>';
           } 

      echo '
  </table>';
 }
?>

<?php if(@$_GET['q']==6) {





$sql ="select * from feedback where estado='0'  ";
$resultado = $con->query($sql);
  $c=1;
echo'<div class="row table-responsive">
  <table class="display" id="mitabla4">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th>Correo</th>
          <th>Asunto</th>
          <th>Fecha</th>
          <th>Hora</th>
     
          <th></th>
          <th></th>
        </tr>
      
      </thead>

          '; while($row =$resultado->fetch_array()){
          $id = $row['id'];

      echo '<tdbody>';
          echo '<tr>';
           echo '<td>'.$c++.'</td>';
           echo'<td>'; echo $row["name"];echo'</td>';
            echo'<td>';echo $row["email"];echo'</td>';
            echo '<td><a title="Clic para ver la observación" href="dash.php?q=3&fid=';echo $row["id"];echo'">';echo $row["subject"];echo'</a></td>';
            echo'<td>';echo $row["date"];echo'</td>';
            echo'<td>';echo $row["time"];echo'</td>';
            echo'<td><a title="Abrir observación" href="dash.php?q=3&fid2='.$id.'"><b><span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span></b></a></td>';
            echo '<td><a title="Eliminar observación" href="update.php?fdid='.$id.'"><b><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></b></a></td>';
          echo '</tr>';
      echo '</tdbody>';
           } 

      echo '
  </table>';
 }


?>
<!--feedback closed-->

<!--feedback reading portion start-->
<?php if(@$_GET['fid']) {
echo '<br />';
$id=@$_GET['fid'];
$result = mysqli_query($con,"SELECT * FROM feedback WHERE id='$id' and estado= '1' ") or die('Error');
while($row = mysqli_fetch_array($result)) {
  $id = $row['id'];
  $email = $row['email'];
	$name = $row['name'];
	$subject = $row['subject'];
	$date = $row['date'];
	$date= date("d-m-Y",strtotime($date));
	$time = $row['time'];
  $estado = $row['estado'];
	$feedback = $row['feedback'];
	
echo '<div class="panel"<a title="Back to Archive" href="update.php?q1=2">
        <b><span class="glyphicon glyphicon-level-up" aria-hidden="true">
      </span>
        </b></a>
        <h2 style="text-align:center; margin-top:-15px;font-family: "Ubuntu", sans-serif;">
        <b>'.$subject.'</b></h1>';
 echo '<div class="mCustomScrollbar" data-mcs-theme="dark" style="margin-left:10px;margin-right:10px; max-height:450px; line-height:35px;padding:5px;">
 <span style="line-height:35px;padding:5px;">-&nbsp;<b>Fecha:</b>&nbsp;'.$date.'</span>

<span style="line-height:35px;padding:5px;">
&nbsp;<b>Hora:</b>&nbsp;'.$time.'</span><span style="line-height:35px;padding:5px;">&nbsp;
<b>Enviado por:</b>&nbsp;'.$name.'</span><br />'.$feedback.'</div> 
 <a href="mailto:'.$email.'">Responder</a>

 <br><br>
 <span><form method="post" action="leidos.php">
    <input type="hidden" name="id"   value="';echo $row['id']; echo'">
     <input type="hidden" name="estado"   value="0">
      <div><button  class="btn btn-danger">Marcar como leido</button></div> 
    </form></span>
    
    </div>';}

echo'';
}?>

<?php if(@$_GET['fid2']) {
echo '<br />';
$id=@$_GET['fid2'];
$result = mysqli_query($con,"SELECT * FROM feedback WHERE id='$id' and estado= '0' ") or die('Error');
while($row = mysqli_fetch_array($result)) {
  $id = $row['id'];
  $email = $row['email'];
	$name = $row['name'];
	$subject = $row['subject'];
	$date = $row['date'];
	$date= date("d-m-Y",strtotime($date));
	$time = $row['time'];
  $estado = $row['estado'];
	$feedback = $row['feedback'];
	
echo '<div class="panel"<a title="Back to Archive" href="update.php?q1=2">
        <b><span class="glyphicon glyphicon-level-up" aria-hidden="true">
      </span>
        </b></a>
        <h2 style="text-align:center; margin-top:-15px;font-family: "Ubuntu", sans-serif;">
        <b>'.$subject.'</b></h1>';
 echo '<div class="mCustomScrollbar" data-mcs-theme="dark" style="margin-left:10px;margin-right:10px; max-height:450px; line-height:35px;padding:5px;">
 <span style="line-height:35px;padding:5px;">-&nbsp;<b>Fecha:</b>&nbsp;'.$date.'</span>

<span style="line-height:35px;padding:5px;">
&nbsp;<b>Hora:</b>&nbsp;'.$time.'</span><span style="line-height:35px;padding:5px;">&nbsp;
<b>Enviado por:</b>&nbsp;'.$name.'</span><br />'.$feedback.'</div> 
 <a href="mailto:'.$email.'">Responder</a>

 <br><br>
    
    </div>';}

echo'';
}?>
<!--Feedback reading portion closed-->


</div></div>
</body>
</html>
