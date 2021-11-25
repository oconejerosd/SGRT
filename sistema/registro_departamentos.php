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
			


			$query = mysqli_query($conection,"SELECT * FROM departamentos WHERE nom_depto = '$nombre' ");
			$result = mysqli_fetch_array($query);
			if($result>0){
				$alert ='<p class="msg_error">El Departamento ya existe</p>';
			}else{
				$query_insert = mysqli_query($conection,"INSERT INTO departamentos (nom_depto) VALUES ('$nombre')");

				if($query_insert){
					$alert ='<p class="msg_save">El Departamento ha sido creado</p>';
				}else{
					$alert ='<p class="msg_error">Error al crear al Departamento.</p>';
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
	<title>Registro Departamento</title>
</head>
<body>
<?php include "includes/header.php";	?>
	<section id="container">
		<div class="form_register">
			<h1><i class="fas fa-landmark"></i> Registro Departamento</h1>
			<hr>
			<div class="alert"><?php echo isset($alert) ? $alert : ''; ?> </div>
			<form action="" method="POST">
				<label for="nombre">Nombre Departamento</label>
				<input type="text" name="nombre" id="nombre" placeholder="Nombre Departamento">
				<button type="submit" class="btn_grabar"><i class="fas fa-landmark"></i> CREAR DEPARTAMENTO</button>
			</form>
		</div>
		

	</section>
<?php include "includes/footer.php";	?>
</body>
</html>