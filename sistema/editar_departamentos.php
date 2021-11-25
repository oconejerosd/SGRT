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
			


			$query = mysqli_query($conection,"SELECT * FROM departamentos WHERE id_depto = '$id' ");
			$result = mysqli_fetch_array($query);
            
			if($result<0){
				$alert ='<p class="msg_error">El Departamento ya existe</p>';
			}else{
				$sql_update = mysqli_query($conection,"UPDATE departamentos
							SET nom_depto = '$nombre'WHERE id_depto = '$id'");
			}
			if($sql_update){
				$alert ='<p class="msg_save">El Departamento ha sido Actualizado</p>';
                header('location:listado_departamentos.php');
			}else{
				$alert ='<p class="msg_error">Error al actualizar el Departamento.</p>';
			}
			
		}
	}

	// Mostrar Datos

	if(empty($_GET['id']))
	{
		header('location:lista_funcionarios.php');
	}
	$iduser = $_GET['id'];

	$sql = mysqli_query($conection,"SELECT * FROM departamentos WHERE id_depto = '$iduser' and estatus_depto=1");

	$result_sql = mysqli_num_rows($sql);
	if($result_sql == 0){
		header('Location: listado_departamentos.php');
	}else{
		$option = '';
		$option2 = '';
		while ($data = mysqli_fetch_array($sql)){
			$iduser = $data['id_depto'];
			$nombre = $data['nom_depto'];
		
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
	<title>Actualizar Departamento</title>
</head>
<body>
<?php include "includes/header.php";	?>
	<section id="container">
		<div class="form_register">
			<h1><i class="fas fa-landmark"></i> Actualizar Departamento</h1>
			<hr>
			<div class="alert"><?php echo isset($alert) ? $alert : ''; ?> </div>
			<form action="" method="POST">
				
				<input type="hidden" name="id" id="id" placeholder="Rut con guión" value ="<?php echo $iduser ?>" readonly>
				<label for="nombre">Nombres</label>
				<input type="text" name="nombre" id="nombre" placeholder="Nombres" value ="<?php echo $nombre ?>">
				<input type="submit" value="ACTUALIZAR DEPARTAMENTO" class="btn_grabar">
			</form>
		</div>
		

	</section>
<?php include "includes/footer.php";	?>
</body>
</html>