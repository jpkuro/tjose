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
if ($password=='L1ce0221' and  $rol=='estudiante') 
    {
			echo "<script>alert('Primer Ingreso')</script> ";
			echo "<script>location.href='cambioce.php'</script>";
    }elseif($password!=='L1ce0221' and $rol=='estudiante'){

    $sql2=mysqli_query($con,"SELECT * FROM user WHERE name='$name' and gender='$apellido' and estado='1' and rol='estudiante'");
	    if($f2=mysqli_fetch_assoc($sql2)){
		    if($password==$f2['password'] and $rol=="estudiante"){
			$_SESSION['id']=$f2['id'];
			$_SESSION['name']=$f2['name'];
			$_SESSION['gender']=$f2['gender'];
			$_SESSION['rol']=$f2['rol'];
			$_SESSION['email']=$f2['email'];
			$_SESSION['id_curso']=$f2['id_curso'];
			$_SESSION['estado']=$f2['estado'];

			echo '<script>alert("BIENVENIDO ESTUDIANTE")</script> ';
			echo "<script>location.href='account.php?q=1'</script>";
		
		    }if ($password!=$f2['password']) {
			session_destroy();
			echo '<script>alert("contrase単a no coincide")</script> ';
			echo "<script>location.href='index.php'</script>";
			
		}if ($name!=$f2['name']) {
			session_destroy();
			echo '<script>alert("nombre de usuario no coincide")</script> ';
			echo "<script>location.href='index.php'</script>";
			
		}if ($rol!=$f2['rol']) {
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