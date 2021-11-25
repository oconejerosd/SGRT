<?php
	include "../conexion.php";
	if(!empty($_POST))
	{
		$alert='';
		if(empty($_POST['nombre']))
		{
			$alert= '<p class="msg_error">Todos los campos son obligatorios</p>';
		}else{
			
			$id = $_POST['id'];
			$nombre = $_POST['nombre'];
			


			$query = mysqli_query($conection,"SELECT * FROM tipos_usuarios WHERE Tip_Cod = '$id' and Tip_Status=1 ");
			$result = mysqli_fetch_array($query);
            
			if($result<0){
				$alert ='<p class="msg_error">El Departamento ya existe</p>';
			}else{
				$sql_update = mysqli_query($conection,"UPDATE tipos_usuarios
							SET Tip_Nom = '$nombre' WHERE Tip_Cod = '$id'");
			}
			if($sql_update){
				$alert ='<p class="msg_save">El Perfil SGRT ha sido Actualizado</p>';
                header('location:listado_perfiles_sgrt.php');
			}else{
				$alert ='<p class="msg_error">Error al actualizar el Perfil SGRT.</p>';
			}
			
		}
	}

	// Mostrar Datos

	if(empty($_GET['id']))
	{
		header('location:lista_perfiles_sgrt.php');
	}
	$iduser = $_GET['id'];

	$sql = mysqli_query($conection,"SELECT * FROM tipos_usuarios WHERE Tip_Cod = '$iduser'");

	$result_sql = mysqli_num_rows($sql);
	if($result_sql == 0){
		header('Location: listado_perfiles_sgrt.php');
	}else{
		$option = '';
		$option2 = '';
		while ($data = mysqli_fetch_array($sql)){
			$iduser = $data['Tip_Cod'];
			$nombre = $data['Tip_Nom'];
		
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
	<title>Actualizar Perfil SGRT</title>
</head>
<body>
<?php include "includes/header.php";	?>
	<section id="container">
		<div class="form_register">
			<h1>Actualizar Perfil SGRT</h1>
			<hr>
			<div class="alert"><?php echo isset($alert) ? $alert : ''; ?> </div>
			<form action="" method="POST">
                <label for="id">Código</label>
				<input type="text" name="id" id="id" placeholder="Rut con guión" value ="<?php echo $iduser ?>" readonly>
				<label for="nombre">Nombre Perfil</label>
				<input type="text" name="nombre" id="nombre" placeholder="Nombres" value ="<?php echo $nombre ?>">
				<input type="submit" value="ACTUALIZAR PERFIL SGRT" class="btn_grabar">
			</form>
		</div>
		

	</section>
<?php include "includes/footer.php";	?>
</body>
</html>