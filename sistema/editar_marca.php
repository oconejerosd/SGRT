<?php
session_start();
if($_SESSION['rol_Nom'] != "Administrador")
{
	header("location:./");
}
	include "../conexion.php";
	if(!empty($_POST))
	{
		$alert='';
		if(empty($_POST['marca']))
		{
			$alert= '<p class="msg_error">Todos los campos son obligatorios</p>';
		}else{
			
			$id = $_POST['id'];
			$nombre = $_POST['marca'];
			
			
			
			$query = mysqli_query($conection,"SELECT * FROM marcas WHERE id_mar = '$id'");
			$result = mysqli_fetch_array($query);

			if($result<0){
				$alert ='<p class="msg_error">El Modelo ya existe</p>';
			}else{
				$sql_update = mysqli_query($conection,"UPDATE marcas
							SET nom_mar = '$nombre'
							WHERE id_mar = '$id'");
			}
			if($sql_update){
				$alert ='<p class="msg_save">El registro ha sido Actualizado</p>';
                header('location:listado_marcas.php');exit;

			}else{
				$alert ='<p class="msg_error">Error al actualizar al registro.</p>';
			}
			
		}
	}

	// Mostrar Datos

	if(empty($_GET['id']))
	{
		header('location:lista_marcas.php');
	}
	$iduser = $_GET['id'];

	$sql = mysqli_query($conection,"SELECT *
									FROM marcas
									WHERE id_mar = '$iduser' and estatus_mar = 1");

	$result_sql = mysqli_num_rows($sql);
	if($result_sql == 0){
		header('Location: listado_marcas.php');
	}else{
		$option = '';
		$option2 = '';
		while ($data = mysqli_fetch_array($sql)){
			$iduser = $data['id_mar'];
			$marca = $data['nom_mar'];
			
			
		}
	}
?>


<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<?php 
		include "includes/scripts.php";
	?>
	<title>Actualizar Marcas SGRT</title>
</head>
<body>
<?php include "includes/header.php";	?>
	<section id="container">
		<div class="form_register">
			<h1>Actualizar Marcas SGRT</h1>
			<hr>
			<div class="alert"><?php echo isset($alert) ? $alert : ''; ?> </div>
			<form action="" method="POST">
				
				<input type="hidden" name="id" id="id" placeholder="Ejemplo:" value ="<?php echo $iduser ?>" readonly>
				<label for="marca">Marca</label>
				<input type="text" name="marca" id="marca" placeholder="Nombres" value ="<?php echo $marca ?>" >
				
				<input type="submit" value="ACTUALIZAR MARCA" class="btn_grabar">
			</form>
		</div>
		

	</section>
<?php include "includes/footer.php";	?>
</body>
</html>