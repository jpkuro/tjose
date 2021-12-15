<?php
session_start();
if(isset($_SESSION["name"])){
session_destroy();
}
?>
<?php

include_once 'dbConnection.php';
$ref=@$_GET['q'];
$name = $_POST['rname'];
$email = $_POST['uname'];
$password = $_POST['password'];


$name = stripslashes($name);
$name = addslashes($name);
$email = stripslashes($email);
$email = addslashes($email);
$password = stripslashes($password); 
$password = addslashes($password);

$sql3=mysqli_query($con,"SELECT * FROM admin WHERE name='$name' and estado='1'");
	if($f3=mysqli_fetch_assoc($sql3)){
		if($password==$f3['password']){
			$_SESSION['admin_id']=$f3['admin_id'];
			$_SESSION['name']=$f3['name'];
			$_SESSION['email']=$f3['email'];
			$_SESSION["key"] ='sunny7785068889';

			
			echo "<script>location.href='dash.php?q=0'</script>";
			
		}if ($password!=$f3['password']) {
			session_destroy();
			echo '<script>alert("contraseña no coincide")</script> ';
			echo "<script>location.href='index.php'</script>";
			
		}if ($name!=$f3['name']) {
			session_destroy();
			echo '<script>alert("nombre de usuario no coincide")</script> ';
			echo "<script>location.href='index.php'</script>";
			
		}if ($email!=$f3['email']) {
			session_destroy();
			echo '<script>alert("correo no coincide o no existe")</script> ';
			echo "<script>location.href='index.php'</script>";
			
		}
	}else{
		session_destroy();
		echo '<script>alert("no se encuentra")</script> ';
	    echo "<script>location.href='index.php'</script>";
	}
		
?>