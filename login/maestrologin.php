<?php
session_start();
if(isset($_SESSION["name"])){
session_destroy();
}
?>
<?php
include_once 'dbConnection.php';
$ref=@$_GET['q'];
$name = $_POST['name'];
$apellido = $_POST['apellido'];
$password = $_POST['password'];
$rol = $_POST['rol'];

$name = stripslashes($name);
$password = stripslashes($password); 
$password = addslashes($password);
$password=($password);

if ($password=='L1ce0221' and  $rol=='maestro')
    {
		echo "<script>alert('Primer Ingreso')</script> ";
			echo "<script>location.href='cambiocm.php'</script>";
    }elseif ($password!=='L1ce0221' and  $rol=='maestro') {
    $sql3=mysqli_query($con,"SELECT * FROM maestro WHERE nombre='$name' and apellido='$apellido' and estado='1' and rol='maestro'");
    	if($f3=mysqli_fetch_assoc($sql3)){
		    if($password==$f3['password'] and $rol=="maestro"){
			$_SESSION['id']=$f3['id'];
			$_SESSION['nombre']=$f3['nombre'];
			$_SESSION['apellido']=$f3['apellido'];
			$_SESSION['curso']=$f3['curso'];
			$_SESSION['rol']=$f3['rol'];
			$_SESSION['email']=$f3['email'];
			$_SESSION['estado']=$f3['estado'];
			$_SESSION["key"] ='sunny7785068889';

			echo "<script>alert('BIENVENIDO MAESTRO')
			location.href='maestro.php?q=1'
			</script> ";
			
		
	    	}if ($password!=$f3['password']) {
			session_destroy();
			echo '<script>alert("contrase単a no coincide")</script> ';
			echo "<script>location.href='index.php'</script>";
			
		}if ($name!=$f3['nombre']) {
			session_destroy();
			echo '<script>alert("nombre de usuario no coincide")</script> ';
			echo "<script>location.href='index.php'</script>";
			
		}if ($rol!=$f3['rol']) {
			session_destroy();
			echo '<script>alert("correo no coincide o no existe")</script> ';
			echo "<script>location.href='index.php'</script>";
			
		}
	}else{
		session_destroy();
		echo '<script>alert("no se encuentra")</script> ';
	    echo "<script>location.href='index.php'</script>";
	}
}

?>