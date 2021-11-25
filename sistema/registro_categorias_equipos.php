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
		if(empty($_POST['nombre']))
		{
			$alert= '<p class="msg_error">Todos los campos son obligatorios</p>';
		}else{
			
			
			$nombre = $_POST['nombre'];
			


			$query = mysqli_query($conection,"SELECT * FROM tipos_equipos WHERE nom_tipe = '$nombre' ");
			$result = mysqli_fetch_array($query);
			if($result>0){
				$alert ='<p class="msg_error">El Tipo de Categoria ya existe</p>';
			}else{
				$query_insert = mysqli_query($conection,"INSERT INTO tipos_equipos (nom_tipe) VALUES ('$nombre')");

				if($query_insert){
					$alert ='<p class="msg_save">El Tipo de Categoría ha sido creado</p>';
				}else{
					$alert ='<p class="msg_error">Error al crear al Tipo de Categoría.</p>';
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
	<title>Registro Categorías Equipos</title>
</head>
<body>
<?php include "includes/header.php";	?>
	<section id="container">
		<div class="form_register">
			<h1>Registro Categorías Equipos</h1>
			<hr>
			<div class="alert"><?php echo isset($alert) ? $alert : ''; ?> </div>
			<form action="" method="POST">
				<label for="nombre">Nombre Categoría</label>
				<input type="text" name="nombre" id="nombre" placeholder="Nombre Categoría">
				<input type="submit" value="CREAR CATEGORÍA" class="btn_grabar">
			</form>
		</div>
		

	</section>
<?php include "includes/footer.php";	?>
</body>
</html>