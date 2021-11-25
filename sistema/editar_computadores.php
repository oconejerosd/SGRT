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
		if(empty($_POST['id']))
		{
			$alert= '<p class="msg_error">Todos los campos son obligatorios</p>';
		}else{
			$id = $_POST['id'];
			$serie = $_POST['serie'];
			$licwin = $_POST['licwin'];
			$licoffice = $_POST['licoffice'];
            $ip = $_POST['ip'];
			$departamento = $_POST['departamento'];

			$query = mysqli_query($conection,"SELECT * FROM equipos WHERE id_equ = '$id' ");
			$result = mysqli_fetch_array($query);
			
			if($result<0){
				$alert ='<p class="msg_error">El Modelo ya existe</p>';
			}else{
                
				$sql_update = mysqli_query($conection,"UPDATE equipos 
				SET ser_equ = '$serie', licwin_equ = '$licwin', licoffice_equ = '$licoffice', ip_equ = '$ip',id_depto ='$departamento' 
				WHERE id_equ ='$id'");

				if($sql_update){
					$alert ='<p class="msg_save">El Equipo ha sido Actualizado</p>';
					header('location:listado_computadores.php');
				}else{
					$alert ='<p class="msg_error">Error al actualizar el Equipo.</p>';
				}
			}
		}
	}

	// Mostrar Datos

	if(empty($_GET['id']))
	{
		header('location:listado_computadores.php');
	}
	$idcom = $_GET['id'];

	$sql = mysqli_query($conection,"SELECT  e.id_equ,te.nom_tipe, mo.nom_mod, d.nom_depto, ma.nom_mar, e.ip_equ, e.ser_equ,e.licwin_equ,e.licoffice_equ,e.fadq_equ,e.gtia_equ
    FROM equipos e 
    INNER JOIN departamentos d
    ON d.id_depto = e.id_depto
    INNER JOIN marcas ma 
    ON e.id_mar = ma.id_mar
    INNER JOIN tipos_equipos te 
    ON e.id_tipe = te.id_tipe
    INNER JOIN modelo mo 
    ON e.id_mod = mo.id_mod
    WHERE te.id_tipe = 2 AND e.id_equ = $idcom");

	$result_sql = mysqli_num_rows($sql);
	if($result_sql == 0){
		header('Location: listado_computadores.php');
	}else{
		$option2 = '';
		while ($data = mysqli_fetch_array($sql)){
			$idequ = $data['id_equ'];
            $tipe = $data['nom_tipe'];
			$modelo = $data['nom_mod'];
            $serie = $data['ser_equ'];
			$licwin = $data['licwin_equ'];
			$licoffice = $data['licoffice_equ'];
			$fadquisicion = $data['fadq_equ'];
			$garantia = $data['gtia_equ'];
            $ip = $data['ip_equ'];
			$marca = $data['nom_mar'];
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
	<title>Actualizar Computador</title>
</head>
<body>
<?php include "includes/header.php";	?>
	<section id="container">
		<div class="form_register">
			<h1>Actualizar Computador</h1>
			<hr>
			<div class="alert"><?php echo isset($alert) ? $alert : ''; ?> </div>
			<form action="" method="POST">
				
				<input type="hidden" name="id" id="id" value ="<?php echo $idequ ?>" readonly>
                <label for="modelo">Marca</label>
				<input type="text" name="marca" id="marca" value ="<?php echo $marca ?>" readonly>
                <label for="modelo">Modelo</label>
				<input type="text" name="modelo" id="modelo" value ="<?php echo $modelo ?>" readonly>										
				<label for="rut">Serie Computador</label>
				<input type="text" name="serie" id="serie" value ="<?php echo $serie ?>">
                <label for="licwin">Licencia Windows</label>
				<input type="text" name="licwin" id="licwin"  value ="<?php echo $licwin ?>">
				<label for="licoffice">Licencia Office</label>
				<input type="text" name="licoffice" id="licoffice" value ="<?php echo $licoffice ?>">
				<label for="fadquisicion">Fecha Adquisición</label>
				<input type="text" name="fadquisicion" id="fadquisicion" value ="<?php echo $fadquisicion ?>"readonly>
				<label for="garantia">Garantía Compra (meses)</label>
				<input type="text" name="garantia" id="garantia" value ="<?php echo $garantia ?>"readonly>
				<label for="ip">IP Computador</label>
				<input type="text" name="ip" id="ip" placeholder="IP Computador" value ="<?php echo $ip ?>">
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
				<input type="submit" value="ACTUALIZAR COMPUTADOR" class="btn_grabar">
			</form>
		</div>
	</section>
<?php include "includes/footer.php";	?>
</body>
</html>