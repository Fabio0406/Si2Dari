verificar  
<?php
//1er paso
//session_start();


include('../config/conexion.php');

$nombre_usu=$_POST['nombre_usu'];
$contrasena_usu=($_POST['contrasena_usu']);

$sql_usu="select * from usurario
         where Nombre='$nombre_usu'
         and contraseña='$contrasena_usu' ";
         
$resultado_usu=$mysqli->query($sql_usu);


if($resultado_usu->num_rows>0) // si es correcto
{	



	while($fila_usu=$resultado_usu->fetch_assoc())
	{
		$nombre_persona=$fila_usu['Nombre'];

	}	


	session_start();
	//2 paso
	$_SESSION['nombre_usu_lg']=$nombre_persona;
	
	header("location:../vista/indexusuario.php");
	
}
else // si no encontro nada
{
	header("location:../vista/loginusuario.php?estado=error");
}	

	


?>