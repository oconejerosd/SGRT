<?php
	session_start();
	if($_SESSION['rol_Nom'] != "Administrador")
	{
		header("location:./");
	}
	include "../conexion.php";

	$alert='';
		if(empty($_POST['nombre'])  || empty($_POST['email']) || empty($_POST['usuarioad']) 
		|| empty($_POST['passad']))
		{
			$alert= '<p class="msg_error">Todos los campos son obligatorios</p>';
		}else{
			$id = $_POST['id'];
			$rut = $_POST['rut'];
			$nombre = $_POST['nombre'];
			$email = $_POST['email'];
			$usuarioad = $_POST['usuarioad'];
			$passad = $_POST['passad'];
			$tipofun = $_POST['usuario'];
			$departamento = $_POST['departamento'];
			$idrole = $_SESSION['rol_Id'];

			$query = mysqli_query($conection,"SELECT * FROM funcionarios WHERE id_fun = '$id' ");
			$result = mysqli_fetch_array($query);
			
			if($result<0){
				$alert ='<p class="msg_error">El Rut ya existe</p>';
			}else{
				$sql_update = mysqli_query($conection,"UPDATE funcionarios 
				SET nom_fun = '$nombre', ema_Fun = '$email', usuad_Fun = '$usuarioad', passad_Fun ='$passad', 
				id_rol = '$tipofun',id_depto ='$departamento' 
				WHERE id_fun ='$id'");

				if($sql_update){
					$alert ='<p class="msg_save">El Funcionario ha sido Actualizado</p>';
					header('location:lista_funcionarios.php');
				}else{
					$alert ='<p class="msg_error">Error al actualizar al funcionario.</p>';
				}
			}
		}
	

	// Mostrar Datos

	if(empty($_GET['id']))
	{
		header('location:lista_funcionarios.php');
	}
	$iduser = $_GET['id'];

	$sql = mysqli_query($conection,"SELECT f.id_fun, f.rut_fun,f.nom_fun,f.ema_Fun, f.usuad_Fun, f.passad_fun, r.rol_Nom,d.nom_depto
									FROM funcionarios f INNER JOIN rol r 
									ON f.id_rol = r.rol_Id INNER JOIN departamentos d 
									ON f.id_depto = d.id_depto WHERE id_fun = $iduser and estatus_fun = 1");

	$result_sql = mysqli_num_rows($sql);
	if($result_sql == 0){
		header('Location: lista_funcionarios.php');
	}else{
		$option = '';
		$option2 = '';
		while ($data = mysqli_fetch_array($sql)){
			$iduser = $data['id_fun'];
			$rut = $data['rut_fun'];
			$nombre = $data['nom_fun'];
			$email = $data['ema_Fun'];
			$usuarioad = $data['usuad_Fun'];
			$passad = $data['passad_fun'];
			$usuario = $data['rol_Nom'];
		//	$passsgrt = $data['Fun_Pas'];
			$departamento = $data['nom_depto'];

			if($usuario == 'Administrador'){
				$option = '<option value="'.$usuario.'" select>'.$usuario.'</option>';
			}else if($usuario == 'Funcionario'){
				$option = '<option value="'.$usuario.'" select>'.$usuario.'</option>';
			}else if($usuario == 'Tecnico'){
				$option = '<option value="'.$usuario.'" select>'.$usuario.'</option>';
			}
			if($departamento == 'Oficina de Partes'){
				$option2 = '<option value="'.$departamento.'" select>'.$departamento.'</option>';
			}else if($departamento == 'RRHH'){
				$option2 = '<option value="'.$departamento.'" select>'.$departamento.'</option>';
			}else if($departamento == 'Contabilidad'){
				$option2 = '<option value="'.$departamento.'" select>'.$departamento.'</option>';
			}else if($departamento == 'Abastecimiento'){
				$option2 = '<option value="'.$departamento.'" select>'.$departamento.'</option>';
			}else if($departamento == 'Educacion'){
				$option2 = '<option value="'.$departamento.'" select>'.$departamento.'</option>';
			}else if($departamento == 'Servicios Generales'){
				$option2 = '<option value="'.$departamento.'" select>'.$departamento.'</option>';
			}else if($departamento == 'Estudio y Proyecto'){
				$option2 = '<option value="'.$departamento.'" select>'.$departamento.'</option>';
			}else if($departamento == 'Comunicaciones'){
				$option2 = '<option value="'.$departamento.'" select>'.$departamento.'</option>';
			}else if($departamento == 'Secretaria General'){
				$option2 = '<option value="'.$departamento.'" select>'.$departamento.'</option>';
			}else if($departamento == 'Informatica'){
				$option2 = '<option value="'.$departamento.'" select>'.$departamento.'</option>';
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
	<title>Actualizar Equipo</title>
</head>
<body>
<?php include "includes/header.php";	?>
	<section id="container">
		<div class="form_register">
			<h1>Actualizar Equipo</h1>
			<hr>
			<div class="alert"><?php echo isset($alert) ? $alert : ''; ?> </div>
			<form action="" method="POST">
				
				<input type="hidden" name="id" id="id" placeholder="ID" value ="<?php echo $iduser ?>" readonly>
				<label for="rut">Rut</label>
				<input type="text" name="rut" id="rut" placeholder="Rut con guión" value ="<?php echo $rut ?>" readonly>
				<label for="nombre">Nombres</label>
				<input type="text" name="nombre" id="nombre" placeholder="Nombres" value ="<?php echo $nombre ?>">
				<label for="email">Email</label>
				<input type="text" name="email" id="email" placeholder="Email Funcionario" value ="<?php echo $email ?>">
				<label for="usuarioad">Usuario AD</label>
				<input type="text" name="usuarioad" id="usuarioad" placeholder="Usuario AD" value ="<?php echo $usuarioad ?>">
				<label for="passad">Pass AD</label>
				<input type="text" name="passad" id="passad" placeholder="Password AD" value ="<?php echo $passad ?>">
				<label for="usuario">Tipo Usuario</label>
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
				<label for="departamento">Departamento</label>
				<?php
					$query_depto = mysqli_query($conection,"SELECT * FROM departamentos WHERE estatus_depto = 1 ORDER by nom_depto ASC");
					
					$result_depto = mysqli_num_rows($query_depto);
				?>
				<select name="departamento" id="departamento" class="notItemOne">
				<?php
						echo $option2;
						if($result_depto >0){
							while($depto = mysqli_fetch_array($query_depto)){
					?>	
						<option value="<?php echo $depto["id_depto"]; ?>"><?php echo $depto["nom_depto"]; ?></option>	
					<?php
							}
						}
					?>
				
				</select>
				<input type="submit" value="ACTUALIZAR FUNCIONARIO" class="btn_grabar">
			</form>
		</div>
	</section>
<?php include "includes/footer.php";	?>
</body>
</html>