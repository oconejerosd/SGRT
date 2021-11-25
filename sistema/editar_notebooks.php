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
        

			$query = mysqli_query($conection,"SELECT * FROM equipos WHERE id_equ = '$id' ");
			$result = mysqli_fetch_array($query);
			
			if($result<0){
				$alert ='<p class="msg_error">El Modelo ya existe</p>';
			}else{
                
				$sql_update = mysqli_query($conection,"UPDATE equipos 
				SET ser_equ = '$serie', licwin_equ = '$licwin', licoffice_equ = '$licoffice', ip_equ = '$ip' 
				WHERE id_equ ='$id'");

				if($sql_update){
					$alert ='<p class="msg_save">El Equipo ha sido Actualizado</p>';
					header('location:listado_notebooks.php');
				}else{
					$alert ='<p class="msg_error">Error al actualizar el Equipo.</p>';
				}
			}
		}
	}

	// Mostrar Datos

	if(empty($_GET['id']))
	{
		header('location:listado_notebooks.php');
	}
	$idcom = $_GET['id'];

	$sql = mysqli_query($conection,"SELECT  e.id_equ,te.nom_tipe, mo.nom_mod, ma.nom_mar, e.ip_equ, e.ser_equ,e.licwin_equ,e.licoffice_equ,e.fadq_equ,e.gtia_equ, e.ip_equ, d.nom_depto
    FROM equipos e 
    INNER JOIN marcas ma 
    ON e.id_mar = ma.id_mar
    INNER JOIN tipos_equipos te 
    ON e.id_tipe = te.id_tipe
    INNER JOIN modelo mo 
    ON e.id_mod = mo.id_mod
    INNER JOIN departamentos d 
    ON e.id_depto = d.id_depto
    WHERE te.id_tipe = 1 AND e.id_equ = $idcom");

	$result_sql = mysqli_num_rows($sql);
	if($result_sql == 0){
		header('Location: listado_notebooks.php');
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
	<title>Actualizar Notebook</title>
</head>
<body>
<?php include "includes/header.php";	?>
	<section id="container">
		<div class="form_register">
			<h1>Actualizar Notebook</h1>
			<hr>
			<div class="alert"><?php echo isset($alert) ? $alert : ''; ?> </div>
			<form action="" method="POST">
				
				<input type="hidden" name="id" id="id" placeholder="ID" value ="<?php echo $idequ ?>" readonly>
                <label for="modelo">Marca</label>
				<input type="text" name="marca" id="marca" value ="<?php echo $marca ?>" readonly>
                <label for="modelo">Modelo</label>
				<input type="text" name="modelo" id="modelo" value ="<?php echo $modelo ?>" readonly>										
				<label for="rut">Serie Computador</label>
				<input type="text" name="serie" id="serie" placeholder="Numero de Serie" value ="<?php echo $serie ?>">
				<label for="licwin">Licencia Windows</label>
				<input type="text" name="licwin" id="licwin"  value ="<?php echo $licwin ?>">
				<label for="licoffice">Licencia Office</label>
				<input type="text" name="licoffice" id="licoffice" value ="<?php echo $licoffice ?>">
				<label for="fadquisicion">Fecha Adquisición</label>
				<input type="text" name="fadquisicion" id="fadquisicion" value ="<?php echo $fadquisicion ?>"readonly>
				<label for="garantia">Garantía Compra (meses)</label>
				<input type="text" name="garantia" id="garantia" value ="<?php echo $garantia ?>"readonly>
				<label for="ip">IP Notebook</label>
				<input type="text" name="ip" id="ip" value ="<?php echo $ip ?>">
				<input type="submit" value="ACTUALIZAR NOTEBOOK" class="btn_grabar">
			</form>
		</div>
	</section>
<?php include "includes/footer.php";	?>
</body>
</html>