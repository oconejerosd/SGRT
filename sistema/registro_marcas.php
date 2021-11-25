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
			
			$marca = $_POST['marca'];
			
			$query = mysqli_query($conection,"SELECT * FROM marcas WHERE nom_mar = '$marca'");
			$result = mysqli_fetch_array($query);
			if($result<0){
				$alert ='<p class="msg_error">La Marca ya existe</p>';
			}else{
				$query_insert = mysqli_query($conection,"INSERT INTO marcas (nom_mar) 
                            VALUES ('$marca')");

				if($query_insert){
					$alert ='<p class="msg_save">La Marca y Modelo han sido creados</p>';
                    header('location:listado_marcas.php');

				}else{
					$alert ='<p class="msg_error">Error al crear la Marca y el Modelo.</p>';
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
	<title>Registro Marcas</title>
</head>
<body>
<?php include "includes/header.php";	?>
	<section id="container">
		<div class="form_register">
			<h1>Registro Marcas</h1>
			<hr>
			<div class="alert"><?php echo isset($alert) ? $alert : ''; ?> </div>
			<form action="" method="POST">
				<label for="marca">Marca</label>
				<input type="text" name="marca" id="marca" placeholder="Marca Equipo">
				<input type="submit" value="CREAR MARCA" class="btn_grabar">
			</form>
		</div>
		

	</section>
<?php include "includes/footer.php";	?>
</body>
</html>