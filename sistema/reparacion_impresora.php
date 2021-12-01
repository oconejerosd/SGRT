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
		if(empty($_POST['idNote'])|| empty($_POST['fingreso']))
		{
			$alert= '<p class="msg_error">Todos los campos son obligatorios</p>';
		}else{

			
			$fingreso = $_POST['fingreso'];
			$tipomantencion = $_POST['tipomantencion'];
			$canthactual = $_POST['canthactual'];
            $canthproxima = $_POST['canthprox'];
            $detalle = $_POST['detalle'];
            $idNote = $_POST['idNote'];

			//$sentencia = "INSERT INTO mantencion(fingreso_mantencion,tipo_mantencion,canthojasa_mantencion,canthojasp_mantencion,informe_mantencion,id_equ) VALUES ('$fingreso','$tipomantencion','$motivo','$detalle','$idNote')";
			//echo $sentencia;
			//$resulset=mysqli_query($conection,$sentencia);

			

			$query_insert = mysqli_query($conection,"INSERT INTO mantencion(fingreso_mantencion,tipo_mantencion,canthojasa_mantencion,canthojasp_mantencion,informe_mantencion,id_equ) 
			                             VALUES ('$fingreso','$tipomantencion','$canthactual','$canthproxima','$detalle','$idNote')");
			


			if($query_insert){
				$alert ='<p class="msg_save">El equipo ha sido ingresado a mantención</p>';
				$sql_est_mant = mysqli_query($conection,"UPDATE equipos 
														 SET mant_equ = '1' 
														 WHERE id_equ ='$idNote'");
				header('location:reporte_mant_impresoras.php');
			}else{
				
				$alert ='<p class="msg_error">Error al ingresar mantención.</p>';
			}
		}
	}
   
	// Mostrar Datos Equipo

	if(empty($_GET['id']))
	{
		header('location:reporte_mant_impresoras.php');
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
    WHERE te.id_tipe = 3 AND e.id_equ = $idcom");

	$result_sql = mysqli_num_rows($sql);
	if($result_sql == 0){
		header('Location: listado_impresoras.php');
	}else{
		$option2 = '';
		while ($data = mysqli_fetch_array($sql)){
			$idequ = $data['id_equ'];
            $tipe = $data['nom_tipe'];
			$modelo = $data['nom_mod'];
            $serie = $data['ser_equ'];
            $ip = $data['ip_equ'];
			$fadquisicion = $data['fadq_equ'];
			$garantia = $data['gtia_equ'];
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
	<title>MANTENCIÓN IMPRESORA</title>
</head>
<body>
<?php include "includes/header.php";	?>
	<section id="container">
		<div class="form_register">
			<h1>Mantención Impresora</h1>
			<hr>
			<div class="alert"><?php echo isset($alert) ? $alert : ''; ?> </div>
			<form action="" method="POST">
				<input type="hidden" name="idNote" id="idNote" value ="<?php echo $idequ ?>" readonly>
                <label for="fingreso">Fecha Mantención </label>
                <input type="date" name="fingreso" id="fingreso">
                <label for="tipomantencion">Tipo de Mantención</label>
				<select name="tipomantencion" id="tipomantencion">
                    <option value="PREVENTIVA">Preventiva</option>
                    <option value="CORRECTIVA">Correctiva</option>		
				</select>
                <label for="marca">Marca</label>
				<input type="text" name="marca" id="marca" value ="<?php echo $marca ?>" readonly>
                <label for="modelo">Modelo</label>
				<input type="text" name="modelo" id="modelo" value ="<?php echo $modelo ?>" readonly>										
				<label for="serie">Serie Impresora</label>
				<input type="text" name="serie" id="serie" placeholder="Numero de Serie" value ="<?php echo $serie ?>" readonly>
                <label for="ip">IP Impresora</label>
				<input type="text" name="ip" id="ip" value ="<?php echo $ip ?>" readonly>
                <label for="canthactual">Cantidad Hojas Actual</label>
				<input type="number" name="canthactual" id="canthactual" placeholder="Cantidad Hojas Actual">
                <label for="canthprox">Cantidad Hojas Próxima Mantención</label>
				<input type="number" name="canthprox" id="canthprox" placeholder="Cantidad Hojas Prox Mantención">
				<label for="detalle">Detalle Mantención</label><br>
				<textarea name="detalle" id="detalle" cols="58" rows="5" placeholder="Detalle de la solicitud"></textarea>
				<input type="submit" value="INGRESO MANTENCIÓN" class="btn_grabar">
			</form>
		</div>
	</section>
<?php include "includes/footer.php";	?>
</body>
</html>