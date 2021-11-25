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
		if(empty($_POST['serie']) || empty($_POST['observacion']))
		{
			$alert= '<p class="msg_error">Todos los campos son obligatorios</p>';
		}else{
			
            
			$serie = $_POST['serie'];
            $observacion = $_POST['observacion'];
            $tipoe = $_POST['tipoe'];
            $marca = $_POST['marca'];
            $modelo = $_POST['modelo'];

			
			//echo $rut,$nombre,$email,$usuarioad,$passad;
			//echo $usuario,$passsgrt,$departamento,$idrole;
			//echo $idrole;
			//exit;
			$query = mysqli_query($conection,"SELECT * FROM equipos WHERE ser_equ = '$serie' ");
			$result = mysqli_fetch_array($query);
			if($result>0){
				$alert ='<p class="msg_error">El Equipo ya existe</p>';
			}else{

				$query_insert = mysqli_query($conection,"INSERT INTO equipos 
				(ser_equ, obs_equ, id_tipe, id_mar, id_mod) 
				VALUES 
				('$serie', '$observacion', '$tipoe', '$marca', '$modelo');");
				
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
	<title>Registro Equipos</title>
</head>
<body>
<?php include "includes/header.php";	?>
	<section id="container">
		<div class="form_register">
			<h1>Registro Equipos</h1>
			<hr>
			<div class="alert"><?php echo isset($alert) ? $alert : ''; ?> </div>
			<form action="" method="POST">
            <label for="tipoe">Tipo Equipo</label>
				<?php
					$query_tipe = mysqli_query($conection,"SELECT * FROM tipos_equipos ORDER by nom_tipe ASC");
					$result_tipe = mysqli_num_rows($query_tipe);
				?>
                <select name="tipoe" id="tipoe">
				<?php
						if($result_tipe >0){
							while($tipoe = mysqli_fetch_array($query_tipe)){
					?>	
						<option value="<?php echo $tipoe["id_tipe"]; ?>"><?php echo $tipoe["nom_tipe"]; ?></option>	
					<?php
							}
						}
					?>
				
				</select>
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
				<label for="observacion">Observación</label>
				<input type="text" name="observacion" id="observacion" placeholder="Observacion Equipo">
				<input type="submit" value="REGISTRAR EQUIPO" class="btn_grabar">
			</form>
		</div>
		

	</section>
<?php include "includes/footer.php";	?>
</body>
</html>