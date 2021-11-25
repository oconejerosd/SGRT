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
		if(empty($_POST['dobservacion']) || empty($_POST['fdevolucion']))
		{
			$alert= '<p class="msg_error">Todos los campos son obligatorios</p>';
		}else{

			$idAsig = $_POST['id'];
			$idEqu = $_POST['idequ'];
			$fdevolucion = $_POST['fdevolucion'];
			$dobservacion = $_POST['dobservacion'];

			//$docuasignacion = $_FILES['docuasignacion']['name'];
			$docudevolucion = "/sistema/dev_comodato/asig-".strtotime("now")."-".$_FILES['docudevolucion']['name'];
			$docudevolucion_temp = $_FILES['docudevolucion']['tmp_name'];
			$route = $_SERVER['DOCUMENT_ROOT'] ."/cormun/SGRT".$docudevolucion;

			move_uploaded_file($docudevolucion_temp,$route);

			$query_actualiza = mysqli_query($conection,"UPDATE asignacion SET fd_asignacion = '$fdevolucion', obsd_asignacion = '$dobservacion', cartad_asignacion= '$docudevolucion', estatus_asignacion = '0' WHERE id_asignacion ='$idAsig'");
			
			if($query_actualiza){
				$alert ='<p class="msg_save">El equipo ha sido devuelto</p>';
				$sql_est_asig = mysqli_query($conection,"UPDATE equipos 
														 SET asig_equ = '0' 
														 WHERE id_equ ='$idEqu'");
				header('location:notebook_asignados.php');
			}else{
				$alert ='<p class="msg_error">Error al asignar el equipo.</p>';
			}
		}
	}

	// Mostrar Datos Equipo

	if(empty($_GET['id']))
	{
		header('location:notebook_asignados.php');
	}
	$idcom = $_GET['id'];
	echo $idcom;
	$sql = mysqli_query($conection,"SELECT a.id_asignacion, a.id_equ, m.nom_mar, mo.nom_mod, e.ser_equ, f.nom_fun,a.fa_asignacion
	FROM asignacion a
	INNER JOIN equipos e
	ON a.id_equ = e.id_equ
	INNER JOIN marcas m 
	ON m.id_mar = e.id_mar
	INNER JOIN modelo mo 
	ON mo.id_mod = e.id_mod
	INNER JOIN funcionarios f 
	ON f.id_fun = a.id_fun
	WHERE a.id_asignacion = $idcom AND estatus_asignacion = 1");

	$result_sql = mysqli_num_rows($sql);
	if($result_sql == 0){
		header('Location:notebook_disponibles.php');
	}else{
		$option2 = '';
		while ($data = mysqli_fetch_array($sql)){
			$idasig = $data['id_asignacion'];
			$idequ = $data['id_equ'];
            $marca = $data['nom_mar'];
			$modelo = $data['nom_mod'];
            $serie = $data['ser_equ'];
			$funcionario = $data['nom_fun'];
			$fasignacion = $data['fa_asignacion'];
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
	<title>Devolver Notebook</title>
</head>
<body>
<?php include "includes/header.php";	?>
	<section id="container">
		<div class="form_register">
			<h1>Devolver Notebook</h1>
			<hr>
			<div class="alert"><?php echo isset($alert) ? $alert : ''; ?> </div>
			<form action="" method="POST" enctype="multipart/form-data">
			<input type="hidden" name="id" id="id" value ="<?php echo $idasig ?>">
			<input type="hidden" name="idequ" id="idequ" value ="<?php echo $idequ ?>">
                <label for="marca">Marca</label>
				<input type="text" name="marca" id="marca" value ="<?php echo $marca ?>" readonly>
                <label for="modelo">Modelo</label>
				<input type="text" name="modelo" id="modelo" value ="<?php echo $modelo ?>" readonly>										
				<label for="rut">Serie Computador</label>
				<input type="text" name="serie" id="serie" value ="<?php echo $serie ?>" readonly>
				<label for="rut">Funcionario</label>
				<input type="text" name="serie" id="serie" value ="<?php echo $funcionario ?>" readonly>
				<label for="fentrega">Fecha Entrega</label>
				<input type="date" name="fentrega" id="fentrega" value ="<?php echo $fasignacion ?>" readonly>
				<label for="fdevolucion">Fecha Devolución</label>
				<input type="date" name="fdevolucion" id="fdevolucion">
				<label for="dobservacion">Observación</label><br>
				<textarea name="dobservacion" id="dobservacion" cols="58" rows="5"></textarea>
				<label for="docudevolucion">Documento de Devolución</label>
				<input type="file" name="docudevolucion" id="docudevolucion">
				<input type="submit" value="DEVOLVER NOTEBOOK" class="btn_grabar">
			</form>
		</div>
	</section>
<?php include "includes/footer.php";	?>
</body>
</html>