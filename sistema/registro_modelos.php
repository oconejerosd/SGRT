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
		if(empty($_POST['modelo']))
		{
			$alert= '<p class="msg_error">Todos los campos son obligatorios</p>';
		}else{
			
			$modelo = $_POST['modelo'];
			$marca = $_POST['marca'];

			$query = mysqli_query($conection,"SELECT * FROM modelo WHERE id_mod = '$modelo' ");
			$result = mysqli_fetch_array($query);
			if($result>0){
				$alert ='<p class="msg_error">El Modelo ya existe</p>';
			}else{

				$query_insert = mysqli_query($conection,"INSERT INTO modelo 
				(nom_mod, id_mar) 
				VALUES 
				('$modelo', '$marca');");
				
				if($query_insert){
					$alert ='<p class="msg_save">El Modelo ha sido creado</p>';
					header('location:listado_modelos.php');exit;
				}else{
					$alert ='<p class="msg_error">Error al crear al modelo.</p>';
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
	<title>Registro Modelos</title>
</head>
<body>
<?php include "includes/header.php";	?>
	<section id="container">
		<div class="form_register">
			<h1>Registro Modelos</h1>
			<hr>
			<div class="alert"><?php echo isset($alert) ? $alert : ''; ?> </div>
			<form action="" method="POST">
				<label for="modelo">Modelo</label>
				<input type="text" name="modelo" id="modelo" placeholder="Ingresar Modelo">
				<label for="marca">Marca</label>
				<?php
					$query_marca = mysqli_query($conection,"SELECT * FROM marcas ORDER by nom_mar ASC");
					$result_marca = mysqli_num_rows($query_marca);
				?>
				<select name="marca" id="marca">
				<?php
						if($result_marca >0){
							while($marca = mysqli_fetch_array($query_marca)){
					?>	
						<option value="<?php echo $marca["id_mar"]; ?>"><?php echo $marca["nom_mar"]; ?></option>	
					<?php
							}
						}
					?>
				
				</select>
				<input type="submit" value="CREAR MODELO" class="btn_grabar">
			</form>
		</div>
		

	</section>
<?php include "includes/footer.php";	?>
</body>
</html>