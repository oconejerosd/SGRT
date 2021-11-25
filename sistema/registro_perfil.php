<?php
	include "../conexion.php";
	if(!empty($_POST))
	{
		$alert='';
		if(empty($_POST['tipo']) || empty($_POST['nombre']))
		{
			$alert= '<p class="msg_error">Todos los campos son obligatorios</p>';
		}else{
			
			$tipo = $_POST['tipo'];
			$nombre = $_POST['nombre'];
			
			$query = mysqli_query($conection,"SELECT * FROM tipos_usuario WHERE Tip_Cod = '$tipo'");
			$result = mysqli_fetch_array($query);
			if($result<0){
				$alert ='<p class="msg_error">El Tipo de Usuario ya existe</p>';
			}else{
				$query_insert = mysqli_query($conection,"INSERT INTO tipos_usuario (Tip_Cod,Tip_Nom,Tip_Est) 
                            VALUES ('$tipo','$nombre','Activo')");

				if($query_insert){
					$alert ='<p class="msg_save">El Tipo de Usuario ha sido creado</p>';
                    header('location:listado_perfiles.php');

				}else{
					$alert ='<p class="msg_error">Error al crear al Tipo de Usuario.</p>';
				}
			}
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
	<title>Registro Perfil</title>
</head>
<body>
<?php include "includes/header.php";	?>
	<section id="container">
		<div class="form_register">
			<h1>Registro Perfil</h1>
			<hr>
			<div class="alert"><?php echo isset($alert) ? $alert : ''; ?> </div>
			<form action="" method="POST">
				<label for="tipo">Tipo Perfil</label>
				<input type="text" name="tipo" id="tipo" placeholder="5 LETRAS">
				<label for="nombre">Nombre</label>
				<input type="text" name="nombre" id="nombre" placeholder="Nombre">
				<input type="submit" value="CREAR PERFIL" class="btn_grabar">
			</form>
		</div>
		

	</section>
<?php include "includes/footer.php";	?>
</body>
</html>