<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Login  | | 
 Liceo</title>
<link  rel="stylesheet" href="css/bootstrap.min.css"/>
 <link  rel="stylesheet" href="css/bootstrap-theme.min.css"/>    
 <link rel="stylesheet" href="css/main.css">
 <link  rel="stylesheet" href="css/font.css">
 <script src="js/jquery.js" type="text/javascript"></script>

  <script src="js/bootstrap.min.js"  type="text/javascript"></script>
 	<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
<?php if(@$_GET['w'])
{echo'<script>alert("'.@$_GET['w'].'");</script>';}
?>
<script>
function validateForm() {var y = document.forms["form"]["name"].value;	var letters = /^[A-Za-z]+$/;if (y == null || y == "") {alert("El campo de nombre debe ser diligenciado");return false;}var z =document.forms["form"]["college"].value;if (z == null || z == "") {alert("Debe ser llenada la institución educativa");return false;}var x = document.forms["form"]["email"].value;var atpos = x.indexOf("@");
var dotpos = x.lastIndexOf(".");if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {alert("Dirección de correo inválido");return false;}var a = document.forms["form"]["password"].value;if(a == null || a == ""){alert("La contraseña debe ser diligenciada");return false;}if(a.length<5 || a.length>25){alert("La contraseña debe tener una extensión entre 5 y 25 caracteres");return false;}
var b = document.forms["form"]["cpassword"].value;if (a!=b){alert("Las contraseñas no coinciden");return false;}}
</script>


</head>

<body>
<div class="header">
<div class="row">
<div class="col-lg-6">
<span class="logo">Liceo Latino Americano</span></div>
<div class="col-md-2 col-md-offset-4">
<a href="#" class="pull-right btn sub1" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-log-in" aria-hidden="true"></span>&nbsp;<span class="title1"><b>Ingresar</b></span></a></div>
</div>

<!--sign in modal start-->
<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content title1">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title title1"><span style="color:orange">Ingresar</span></h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" action="login.php?q=index.php" method="POST">
<fieldset>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-3 control-label" for="name"></label>  
  <div class="col-md-6">
  <input id="name" name="name" placeholder="Ingresa su nombre" class="form-control input-md" type="text" required>
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-3 control-label" for="gender"></label>  
  <div class="col-md-6">
  <input id="name" name="apellido" placeholder="Ingresa su Apellido" class="form-control input-md" type="text" required>
    
  </div>
</div>

<!-- Password input-->
<div class="form-group">
  <label class="col-md-3 control-label" for="password"></label>
  <div class="col-md-6">
    <input id="password" name="password" placeholder="Ingresa tu contraseña" class="form-control input-md" type="password" required>
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-3 control-label" for="password"></label>
  <div class="col-md-6">
   <input id="rol" name="rol" value="estudiante" class="form-control input-md" type="hidden" required>
  </div>
</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Ingresar</button>
		</fieldset>
</form>

<a  href="recupera.php"><b>olvidaste tu contraseña?</b></a>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!--sign in modal closed-->

</div><!--header row closed-->
</div>

<div class="bg1">
</div>
</div><!--container end-->

<!--Footer start-->
<div class="row footer">
<div class="col-md-3 box">
<a href="../index.php" target="_blank">Regresar</a>
</div>
<div class="col-md-2 box">
<a href="#" data-toggle="modal" data-target="#login">Administrador</a></div>
<div class="col-md-2 box">
<a href="#" data-toggle="modal" data-target="#maestro">Maestro</a>
</div>
<div class="col-md-2 box">
<a href="#" data-toggle="modal" data-target="#developers">Desarrolladores</a>
</div>
<div class="col-md-2 box">
<a href="feedback.php">Observaciones</a></div></div>

<!-- Modal For Developers-->
<div class="modal fade title1" id="developers">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" style="font-family:'typo' "><span style="color:orange">Desarrolladores</span></h4>
      </div>
	  
      <div class="modal-body">
        <p>
		<div class="row">
		<div class="col-md-4">
		 <img src="image/avatar.jpg
     " width=100 height=100 alt="Sunny Prakash Tiwari" class="img-rounded">
		 </div>
		 <div class="col-md-5">
     <h4 style="color:#202020; font-family:'typo' ;font-size:16px" class="title1">Jose Palma Piguave</h4>
		<h4 style="font-family:'typo' ">joseluispalmapiguave@gmail.com</h4>
		<h4 style="font-family:'typo' ">Universidad Ugraria del Ecuador</h4></div></div>
		</p>
      </div>
    
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!--Modal for admin login-->
	 <div class="modal fade" id="login">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title"><span style="color:orange;font-family:'typo' ">Ingresar</span></h4>
      </div>
      <div class="modal-body title1">
<div class="row">
<div class="col-md-3"></div>
<div class="col-md-6">
<form role="form" method="post" action="admin.php?q=index.php">
  <div class="form-group">
<input type="text" name="rname" maxlength="21" required  placeholder="Usuario Admin" class="form-control"/> 
</div>
<div class="form-group">
<input type="text" name="uname" maxlength="21"   required placeholder="correo Admin" class="form-control"/> 
</div>
<div class="form-group">
<input type="password" name="password" maxlength="15" required placeholder="Contraseña Admin" class="form-control"/>
</div>
<div class="form-group" align="center">
<input type="submit" name="login" value="Ingresar" class="btn btn-primary" />
</div>
</form>
<center><a  href="recuperaadmin.php"><b>olvidaste tu contraseña?</b></a></center>
</div><div class="col-md-3"></div></div>
      </div>
      <!--<div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>-->
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!--footer end-->
<!--Modal for admin maestro-->
	 <div class="modal fade" id="maestro">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title"><span style="color:orange;font-family:'typo' ">Ingresar</span></h4>
      </div>
      <div class="modal-body title1">
<div class="row">
<div class="col-md-3"></div>
<div class="col-md-6">
<form role="form" method="post" action="maestrologin.php?q=index.php">
  <div class="form-group">
<input type="text" name="name" maxlength="21" required  placeholder="Usuario maestro" class="form-control"/> 
</div>
<div class="form-group">
<input type="text" name="apellido" maxlength="21"   required placeholder="Ápellido maestro" class="form-control"/> 
</div>
<div class="form-group">
<input type="password" name="password" maxlength="15" required placeholder="Contraseña " class="form-control"/>
</div>
<div class="form-group">
<input id="rol" name="rol" value="maestro" class="form-control input-md" type="hidden" required>
</div>
<div class="form-group" align="center">
<input type="submit" name="login" value="Ingresar" class="btn btn-primary" />
</div>
</form>
<center><a  href="recupera.php"><b>olvidaste tu contraseña?</b></a></center>
</div>
<div class="col-md-3"></div></div>
      </div>
      <!--<div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>-->
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!--footer end-->


</body>
</html>
