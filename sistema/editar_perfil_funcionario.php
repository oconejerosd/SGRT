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
		if(empty($_POST['usuario']) || empty($_POST['passsgrt']))
		{
			$alert= '<p class="msg_error">Todos los campos son obligatorios</p>';
		}else{
			
			$id = $_POST['id'];
			$nombre = $_POST['nombre'];
			$usuario = $_POST['usuario'];
			$passsgrt = md5($_POST['passsgrt']);
			
			$query = mysqli_query($conection,"SELECT * FROM funcionarios WHERE id_fun = '$id' AND estatus_fun = 1 ");
			$result = mysqli_fetch_array($query);

			if($result<0){
				$alert ='<p class="msg_error">El Rut ya existe</p>';
			}else{
				$sql_update = mysqli_query($conection,"UPDATE funcionarios
							SET passgrt_Fun = '$passsgrt', id_rol = '$usuario'
							WHERE id_fun = '$id'");
			}
			if($sql_update){
				$alert ='<p class="msg_save">El Funcionario ha sido Actualizado</p>';
			}else{
				$alert ='<p class="msg_error">Error al actualizar al funcionario.</p>';
			}
			
		}
	}

	// Mostrar Datos

	if(empty($_GET['id']) || $_GET['id']== '13567959-3')
	{
		header('location:lista_perfil_funcionarios.php');
	}
	$iduser = $_GET['id'];

	$sql = mysqli_query($conection,"SELECT f.id_fun,f.rut_fun,f.nom_fun,r.rol_Nom
									FROM funcionarios f INNER JOIN rol r 
									ON f.id_rol = r.rol_Id
									WHERE id_fun = '$iduser'");

	$result_sql = mysqli_num_rows($sql);
	if($result_sql == 0){
		header('Location: lista_perfil_funcionarios.php');
	}else{
		$option = '';
		$option2 = '';
		while ($data = mysqli_fetch_array($sql)){
			$iduser = $data['id_fun'];
			$rut = $data['rut_fun'];
			$nombre = $data['nom_fun'];
			$usuario = $data['rol_Nom'];
			

			if($usuario == 'Administrador'){
				$option = '<option value="'.$usuario.'" select>'.$usuario.'</option>';
			}else if($usuario == 'Funcionario'){
				$option = '<option value="'.$usuario.'" select>'.$usuario.'</option>';
			}else if($usuario == 'Tecnico'){
				$option = '<option value="'.$usuario.'" select>'.$usuario.'</option>';
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
			<label for="rut">ID</label>
				<input type="text" name="id" id="id" placeholder="Ejemplo: 12345678-9" value ="<?php echo $iduser ?>" readonly>
				<label for="rut">Rut</label>
				<input type="text" name="rut" id="rut" placeholder="Ejemplo: 12345678-9" value ="<?php echo $rut ?>" readonly>
				<label for="nombre">Nombres</label>
				<input type="text" name="nombre" id="nombre" placeholder="Nombres" value ="<?php echo $nombre ?>" readonly>
				<label for="usuario">Tipo Usuario SGRT</label>
				<?php
					$query_rol = mysqli_query($conection,"SELECT * FROM rol WHERE estatus_rol = 1 ORDER by rol_Nom ASC");
					$result_rol = mysqli_num_rows($query_rol);
				?>
				<select name="usuario" id="usuario" class="notItemOne">
					<?php
						echo $option;
						if($result_rol >0){
							while($rol = mysqli_fetch_array($query_rol)){
					?>	
						<option value="<?php echo $rol["rol_Id"]; ?>"><?php echo $rol["rol_Nom"]; ?></option>	
					<?php
							}
						}
					?>
					
				</select>
				<label for="passsgrt">Nueva Pass SGRT</label>
				<input type="password" name="passsgrt" id="passsgrt" placeholder="Pass SGRT">
				<input type="submit" value="ACTUALIZAR SGRT" class="btn_grabar">
			</form>
		</div>
		

	</section>
<?php include "includes/footer.php";	?>
</body>
</html>