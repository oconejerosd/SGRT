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
			$id = $_POST['id'];
			$modelo = $_POST['modelo'];
			$marca = $_POST['marca'];

			$query = mysqli_query($conection,"SELECT * FROM modelo WHERE id_mod = '$id' ");
			$result = mysqli_fetch_array($query);
			
			if($result<0){
				$alert ='<p class="msg_error">El Modelo ya existe</p>';
			}else{
                
				$sql_update = mysqli_query($conection,"UPDATE modelo 
				SET nom_mod = '$modelo', id_mar = '$marca' 
				WHERE id_mod ='$id'");

				if($sql_update){
					$alert ='<p class="msg_save">El Modelo ha sido Actualizado</p>';
					header('location:listado_modelos.php');
				}else{
					$alert ='<p class="msg_error">Error al actualizar el modelo.</p>';
				}
			}
		}
	
	}
	// Mostrar Datos

	if(empty($_GET['id']))
	{
		header('location:listado_modelos.php');
	}
	$idmod = $_GET['id'];

	$sql = mysqli_query($conection,"SELECT mo.id_mod, mo.nom_mod, mo.id_mar, ma.nom_mar 
                                    FROM modelo mo 
                                    INNER JOIN marcas ma 
                                    ON mo.id_mar = ma.id_mar 
                                    WHERE id_mod= $idmod");

	$result_sql = mysqli_num_rows($sql);
	if($result_sql == 0){
		header('Location: listado_modelos.php');
	}else{
		$option2 = '';
		while ($data = mysqli_fetch_array($sql)){
			$idmod = $data['id_mod'];
			$modelo = $data['nom_mod'];
            $marca_id = $data['id_mar'];
			$marca = $data['nom_mar'];

			if($marca == 'LENOVO'){
				$option2 = '<option value="'.$marca_id.'" select>'.$marca.'</option>';
			}else if($marca == 'HP'){
				$option2 = '<option value="'.$marca_id.'" select>'.$marca.'</option>';
			}else if($marca == 'ACER'){
				$option2 = '<option value="'.$marca_id.'" select>'.$marca.'</option>';
			}else if($marca == 'DELL'){
				$option2 = '<option value="'.$marca_id.'" select>'.$marca.'</option>';
			}else if($marca == 'APPLE'){
				$option2 = '<option value="'.$marca_id.'" select>'.$marca.'</option>';
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
	<title>Actualizar Modelo</title>
</head>
<body>
<?php include "includes/header.php";	?>
	<section id="container">
		<div class="form_register">
			<h1>Actualizar Modelo</h1>
			<hr>
			<div class="alert"><?php echo isset($alert) ? $alert : ''; ?> </div>
			<form action="" method="POST">
				
				<input type="hidden" name="id" id="id" placeholder="ID" value ="<?php echo $idmod ?>" readonly>
				<label for="modelo">Modelo</label>
				<input type="text" name="modelo" id="modelo" placeholder="Modelo" value ="<?php echo $modelo ?>">					
				</select>
				<label for="marca">Marca</label>
				<?php
					$query_marca = mysqli_query($conection,"SELECT * FROM marcas WHERE estatus_mar = 1 ORDER by nom_mar ASC");
					
					$result_marca = mysqli_num_rows($query_marca);
				?>
				<select name="marca" id="marca" class="notItemOne">
				<?php
						echo $option2;
						if($result_marca >0){
							while($marca = mysqli_fetch_array($query_marca)){
					?>	
						<option value="<?php echo $marca["id_mar"]; ?>"><?php echo $marca["nom_mar"]; ?></option>	
					<?php
							}
						}
					?>
				
				</select>
				<input type="submit" value="ACTUALIZAR MODELO" class="btn_grabar">
			</form>
		</div>
	</section>
<?php include "includes/footer.php";	?>
</body>
</html>