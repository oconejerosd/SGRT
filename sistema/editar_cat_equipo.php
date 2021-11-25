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
			
			$id = $_POST['id'];
			$nombre = $_POST['nombre'];
			


			$query = mysqli_query($conection,"SELECT * FROM tipos_equipos WHERE id_tipe = '$id'");
			$result = mysqli_fetch_array($query);
            
			if($result<0){
				$alert ='<p class="msg_error">El Tipo de Categoría ya existe</p>';
			}else{
				$sql_update = mysqli_query($conection,"UPDATE tipos_equipos
							SET nom_tipe = '$nombre' WHERE id_tipe = '$id'");
			}
			if($sql_update){
				$alert ='<p class="msg_save">El Tipo de Categoría ha sido Actualizado</p>';
                header('location:listado_categorias_equipos.php');
			}else{
				$alert ='<p class="msg_error">Error al actualizar el Tipo de Categoría.</p>';
			}
			
		}
	}

	// Mostrar Datos

	if(empty($_GET['id']))
	{
		header('location:lista_categorias_equipos.php');
	}
	$idtcat = $_GET['id'];

	$sql = mysqli_query($conection,"SELECT * FROM tipos_equipos WHERE id_tipe = '$idtcat' and estatus_tipe = 1 ");

	$result_sql = mysqli_num_rows($sql);
	if($result_sql == 0){
		header('Location: listado_categorias_equipos.php');
	}else{
		$option = '';
		$option2 = '';
		while ($data = mysqli_fetch_array($sql)){
			$itcat = $data['id_tipe'];
			$nombre = $data['nom_tipe'];
		
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
	<title>Actualizar Tipo Equipamiento</title>
</head>
<body>
<?php include "includes/header.php";	?>
	<section id="container">
		<div class="form_register">
			<h1>Actualizar Tipo Equipamiento</h1>
			<hr>
			<div class="alert"><?php echo isset($alert) ? $alert : ''; ?> </div>
			<form action="" method="POST">
				
				<input type="hidden" name="id" id="id" placeholder="Rut con guión" value ="<?php echo $idtcat ?>" readonly>
				<label for="nombre">Nombres</label>
				<input type="text" name="nombre" id="nombre" placeholder="Nombres" value ="<?php echo $nombre ?>">
				<input type="submit" value="ACTUALIZAR TIPO EQUIPO" class="btn_grabar">
			</form>
		</div>
		

	</section>
<?php include "includes/footer.php";	?>
</body>
</html>