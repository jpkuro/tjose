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

<title>Modificacion de año lectivo</title>
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
<span class="logo">Editar Año Lectivo</span></div>



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
      
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    
</nav>
<!--navigation menu closed-->
<div class="container"><!--container start-->
<div class="row">
<div class="col-md-12">
<!--home start-->

<?php if(@$_GET['q']==0) {
$id =$_GET['id_lectivo'];
$sql= "select * from lectivo where $id=id_lectivo";
$resultado = $con->query($sql);
$row = $resultado->fetch_array();

echo '
<center><h1 style="font-family: Roboto, sans-serif;";>Edicion de Año lectivo</h1></center>
';
echo '<center>
      <p><h4>En esta seccion Poderemos editar el estado (activo/inactivo) de los años lectivos Registrados</h4></p>
      <br>
      


<center><fieldset>
	<form method="post" action="editlectivo.php"><fieldset>
		<input type="hidden" name="id" value="'; echo $row['id_lectivo']; echo'">
		<b> Año Lectivo</b>
  
  <br>
    <input type="text" name="lectivo" readonly="readonly" value="';  echo $row['lectivo']; echo'" style="color: #a2a2a2; font-weight: bold; padding: 10px; width:500px; border: 2px solid #d8d8d8; border-radius: 6px;" required>
    <br>
<br>
<b> Estado</b>
  
   
  <br>
    <select name="estado"  style="color: #a2a2a2; font-weight: bold; padding: 10px; width:500px; border: 2px solid #d8d8d8; border-radius: 6px;"required>
                <option value="activo" '; if($row['estado']== "activo") echo 'selected';  echo'>activo</option>
                <option value="inactivo" '; if($row['estado']== "inactivo") echo 'selected'; echo'>inactivo</option>

    </select>
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
<br>
</fieldset>
  </form></center>


  ';




}?>
<center><a style="
  box-shadow: 3px 4px 0px 0px #54a3f7;
  background:linear-gradient(to bottom, #FA2232 5%, #FA2232 100%);
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
} class="btn btn-primary" href="dash.php?q=5"><i class="fa fa-download"></i> Regresar</a></center>
<!--Feedback reading portion closed-->


</div></div>
</body>
</html>
