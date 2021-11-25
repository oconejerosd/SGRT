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
		if(empty($_POST['idNote']))
		{
			$alert= '<p class="msg_error">Todos los campos son obligatorios</p>';
		}else{

			$idNote = $_POST['idNote'];
			$funcionario = $_POST['funcionario'];
			$fasignacion = $_POST['fasignacion'];
			$observacion = $_POST['observacion'];
			//------------------ SUBIR ARCHIVO COMODATO ---------//
			$docuasignacion = "/sistema/comodatos/asig-".strtotime("now")."-".$_FILES['docuasignacion']['name'];
			$docuasignacion_temp = $_FILES['docuasignacion']['tmp_name'];
			$route = $_SERVER['DOCUMENT_ROOT'] ."/cormun/SGRT".$docuasignacion;
			move_uploaded_file($docuasignacion_temp,$route);
			//------------------ FIN SUBIR ARCHIVO COMODATO -------//
			
			$query_insert = mysqli_query($conection,
								"INSERT INTO asignacion(id_equ,id_fun,fa_asignacion,obs_asignacion,carta_asignacion) 
								 VALUES ('$idNote','$funcionario','$fasignacion','$observacion','$docuasignacion')");
			
			if($query_insert){
				$alert ='<p class="msg_save">El equipo ha sido asignado</p>';
				$sql_est_asig = mysqli_query($conection,"UPDATE equipos 
														 SET asig_equ = '1' 
														 WHERE id_equ ='$idNote'");
				header('location:notebook_asignados.php');
			}else{
				$alert ='<p class="msg_error">Error al asignar el equipo.</p>';
			}
		}
	}

	// Mostrar Datos Equipo

	if(empty($_GET['id']))
	{
		header('location:listado_notebooks.php');
	}
	$idcom = $_GET['id'];

	$sql = mysqli_query($conection,"SELECT  e.id_equ,te.nom_tipe, mo.nom_mod, ma.nom_mar, e.ip_equ, e.ser_equ,e.fadq_equ,e.gtia_equ
    FROM equipos e 
    INNER JOIN marcas ma 
    ON e.id_mar = ma.id_mar
    INNER JOIN tipos_equipos te 
    ON e.id_tipe = te.id_tipe
    INNER JOIN modelo mo 
    ON e.id_mod = mo.id_mod
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
			$fadquisicion = $data['fadq_equ'];
			$garantia = $data['gtia_equ'];
           // $ip = $data['ip_equ'];
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
	<title>Asignar Notebook</title>
</head>
<body>
<?php include "includes/header.php";	?>
	<section id="container">
		<div class="form_register">
			<h1>Asignar Notebook</h1>
			<hr>
			<div class="alert"><?php echo isset($alert) ? $alert : ''; ?> </div>
			<form action="" method="POST" enctype="multipart/form-data">
				<input type="hidden" name="idNote" id="idNote" value ="<?php echo $idequ ?>" readonly>
                <label for="marca">Marca</label>
				<input type="text" name="marca" id="marca" value ="<?php echo $marca ?>" readonly>
                <label for="modelo">Modelo</label>
				<input type="text" name="modelo" id="modelo" value ="<?php echo $modelo ?>" readonly>										
				<label for="rut">Serie Computador</label>
				<input type="text" name="serie" id="serie" placeholder="Numero de Serie" value ="<?php echo $serie ?>" readonly>
				<label for="funcionario">Funcionario</label>
				<?php
					$query_func = mysqli_query($conection,"SELECT f.id_fun, f.nom_fun from funcionarios f left join asignacion a on f.id_fun = a.id_fun and a.estatus_asignacion = 1
					where a.id_asignacion is null");
					$result_func = mysqli_num_rows($query_func);
				?>
				<select name="funcionario" id="funcionario">
				<?php
						if($result_func >0){
							while($func = mysqli_fetch_array($query_func)){
					?>	
						<option value="<?php echo $func["id_fun"]; ?>"><?php echo $func["nom_fun"]; ?></option>	
					<?php
							}
						}
					?>
				
				</select>
				<label for="fasignacion">Fecha Asignación</label>
				<input type="date" name="fasignacion" id="fasignacion">
				<label for="observacion">Observación</label><br>
				<textarea name="observacion" id="observacion" cols="58" rows="5"></textarea>
				<label for="docuasignacion">Documento de Asignación</label>
				<input type="file" name="docuasignacion" id="fasignacion">
				<input type="submit" value="ASIGNAR NOTEBOOK" class="btn_grabar">
				
			</form>
		</div>
	</section>
<?php include "includes/footer.php";	?>
</body>
</html>