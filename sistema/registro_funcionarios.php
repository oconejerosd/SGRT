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
		if(empty($_POST['rut']) || empty($_POST['nombre'])  || empty($_POST['email']) || empty($_POST['usuarioad']) 
		|| empty($_POST['passad']) || empty($_POST['passsgrt']) || empty($_POST['departamento']))
		{
			$alert= '<p class="msg_error">Todos los campos son obligatorios</p>';
		}else{
			
			$rut = $_POST['rut'];
			$nombre = $_POST['nombre'];
			$email = $_POST['email'];
			$usuarioad = $_POST['usuarioad'];
			$passad = $_POST['passad'];
			//$tipofun = $_POST['tipofun'];
			$passsgrt = md5($_POST['passsgrt']);
			$departamento = $_POST['departamento'];
			$idrole = $_SESSION['rol_Id'];
			//echo $rut,$nombre,$email,$usuarioad,$passad;
			//echo $usuario,$passsgrt,$departamento,$idrole;
			echo $idrole;
			//exit;
			$query = mysqli_query($conection,"SELECT * FROM funcionarios WHERE rut_fun = '$rut' ");
			$result = mysqli_fetch_array($query);
			if($result>0){
				$alert ='<p class="msg_error">El Rut ya existe</p>';
			}else{

				$query_insert = mysqli_query($conection,"INSERT INTO funcionarios 
				(rut_fun, nom_fun, ema_Fun, usuad_Fun, passad_Fun, id_rol, id_usu, passgrt_Fun, id_depto) 
				VALUES 
				('$rut', '$nombre', '$email', '$usuarioad', '$passad', 3, '$idrole','$passsgrt', '$departamento');");
				
				if($query_insert){
					$alert ='<p class="msg_save">El Funcionario ha sido creado</p>';
				}else{
					$alert ='<p class="msg_error">Error al crear al funcionario.</p>';
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
	<title>Registro Funcionarios</title>
</head>
<body>
<?php include "includes/header.php";	?>
	<section id="container">
		<div class="form_register">
			<h1><i class="fas fa-users"></i> Registro Funcionarios</h1>
			<hr>
			<div class="alert"><?php echo isset($alert) ? $alert : ''; ?> </div>
			<form action="" method="POST">
				<label for="rut">Rut</label>
				<input type="text" name="rut" id="rut" placeholder="Ejemplo: 12345678-9">
				<label for="nombre">Nombres</label>
				<input type="text" name="nombre" id="nombre" placeholder="Nombres">
				<label for="email">Email</label>
				<input type="email" name="email" id="email" placeholder="Email Funcionario">
				<label for="usuarioad">Usuario AD</label>
				<input type="text" name="usuarioad" id="usuarioad" placeholder="Usuario AD">
				<label for="passad">Pass AD</label>
				<input type="text" name="passad" id="passad" placeholder="Password AD">
				<label for="passsgrt">Pass SGRT</label>
				<input type="password" name="passsgrt" id="passsgrt" placeholder="Pass SGRT">
				<label for="departamento">Departamento</label>
				<?php
					$query_depto = mysqli_query($conection,"SELECT * FROM departamentos ORDER by nom_depto ASC");
					$result_depto = mysqli_num_rows($query_depto);
				?>
				<select name="departamento" id="departamento">
				<?php
						if($result_depto >0){
							while($depto = mysqli_fetch_array($query_depto)){
					?>	
						<option value="<?php echo $depto["id_depto"]; ?>"><?php echo $depto["nom_depto"]; ?></option>	
					<?php
							}
						}
					?>
				
				</select>
				<input type="submit" value="REGISTRAR FUNCIONARIO" class="btn_grabar">
				
			</form>
		</div>
		

	</section>
<?php include "includes/footer.php";	?>
</body>
</html>