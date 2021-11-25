<?php
	session_start();
	if($_SESSION['rol_Nom'] != "Administrador" and $_SESSION['rol_Nom'] != "Tecnico")
	{
		header("location:./");
	}
	include "../conexion.php";
	if(!empty($_POST))
	{
		$alert='';
		if(empty($_POST['serie']) || empty($_POST['fadquisicion']) || empty($_POST['garantia']))
		{
			$alert= '<p class="msg_error">Todos los campos son obligatorios</p>';
		}else{
			
            
			$serie = $_POST['serie'];
			$licwin = $_POST['licwin'];
			$licoffice = $_POST['licoffice'];
			$fadquisicion = $_POST['fadquisicion'];
			$garantia = $_POST['garantia'];
            $ip = $_POST['ip'];
			$departamento  = $_POST['departamento'];
            $marca = $_POST['marca'];
            $modelo = $_POST['modelo'];
			$idrole = $_SESSION['rol_Id'];

			$query = mysqli_query($conection,"SELECT * FROM equipos WHERE ser_equ = '$serie' ");
			$result = mysqli_fetch_array($query);
			if($result>0){
				$alert ='<p class="msg_error">El Equipo ya existe</p>';
			}else{

				$query_insert = mysqli_query($conection,"INSERT INTO equipos 
				(ser_equ, licwin_equ, licoffice_equ, fadq_equ, gtia_equ, ip_equ, id_tipe, id_mar, id_mod,id_depto,id_fun) 
				VALUES 
				('$serie', '$licwin','$licoffice','$fadquisicion','$garantia', '$ip', 1 , '$marca', '$modelo','$departamento','$idrole');");
				
				if($query_insert){
					$alert ='<p class="msg_save">El Equipo ha sido ingresado</p>';
				}else{
					$alert ='<p class="msg_error">Error al crear el equipo.</p>';
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
	<title>Registro Notebook</title>
</head>
<body>
<?php include "includes/header.php";	?>
	<section id="container">
		<div class="form_register">
         
			<h1><i class="fas fa-laptop"></i> Registro Notebook</h1>
			<hr>
			<div class="alert"><?php echo isset($alert) ? $alert : ''; ?> </div>
			<form action="" method="POST">
            
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
                <label for="modelo">Modelo</label>
				<?php
					$query_modelo = mysqli_query($conection,"SELECT * FROM modelo ORDER by nom_mod ASC");
					$result_modelo = mysqli_num_rows($query_modelo);
				?>
                <select name="modelo" id="modelo">
				<?php
						if($result_modelo >0){
							while($modelo = mysqli_fetch_array($query_modelo)){
					?>	
						<option value="<?php echo $modelo["id_mod"]; ?>"><?php echo $modelo["nom_mod"]; ?></option>	
					<?php
							}
						}
					?>
				</select>
				<label for="rut">Serie Equipo</label>
				<input type="text" name="serie" id="serie" placeholder="Numero de Serie">
				<label for="licwin">Licencia Windows</label>
				<input type="text" name="licwin" id="licwin" placeholder="Serie Windows">
				<label for="licoffice">Licencia Office</label>
				<input type="text" name="licoffice" id="licoffice" placeholder="Serie Office">
				<label for="fadquisicion">Fecha Adquisición</label>
				<input type="date" name="fadquisicion" id="fadquisicion">
				<label for="garantia">Garantía Computador</label>
				<input type="text" name="garantia" id="garantia" placeholder="Cantidad meses (12 / 24 / 36)">
                <label for="ip">IP Notebook</label>
				<input type="text" name="ip" id="ip" placeholder="IP Notebook">
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
				<input type="submit" value="REGISTRO NOTEBOOK" class="btn_grabar">
			</form>
		</div>
		

	</section>
<?php include "includes/footer.php";	?>
</body>
</html>