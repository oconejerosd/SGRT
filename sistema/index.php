<?php
session_start();
include "../conexion.php";

/*$query_dash = mysqli_query($conection,"CALL dataDashboard();");
$result_dash = mysqli_num_rows($query_dash);
if($result_dash > 0){
    $data_dash = mysqli_fetch_assoc($query_dash);
    mysqli_close($conection);
}*/
include "../conexion.php";
//Funcionarios
$sql_funcionarios = "SELECT COUNT(*) total_f FROM funcionarios WHERE estatus_fun = 1";
$result_f = mysqli_query($conection, $sql_funcionarios);
$fila_f = mysqli_fetch_assoc($result_f);

// AIO
$sql_aio = "SELECT COUNT(*) total_aio FROM equipos WHERE id_tipe = 2 and estatus_equ = 1";
$result_aio = mysqli_query($conection, $sql_aio);
$fila_aio = mysqli_fetch_assoc($result_aio);

// NOTEBOOK
$sql_note = "SELECT COUNT(*) total_note FROM equipos WHERE id_tipe = 1 and estatus_equ = 1";
$result_note = mysqli_query($conection, $sql_note);
$fila_note = mysqli_fetch_assoc($result_note);

// IMPRESORAS
$sql_imp = "SELECT COUNT(*) total_imp FROM equipos WHERE id_tipe = 3 and estatus_equ = 1";
$result_imp = mysqli_query($conection, $sql_imp);
$fila_imp = mysqli_fetch_assoc($result_imp);

// PROYECTOR
$sql_pro = "SELECT COUNT(*) total_pro FROM equipos WHERE id_tipe = 4 and estatus_equ = 1";
$result_pro = mysqli_query($conection, $sql_pro);
$fila_pro = mysqli_fetch_assoc($result_pro);

// NOTEBOOK ASIGNADOS
$sql_notea = "SELECT COUNT(*) total_notea FROM equipos WHERE id_tipe = 1 and estatus_equ = 1 and asig_equ=1";
$result_notea = mysqli_query($conection, $sql_notea);
$fila_notea = mysqli_fetch_assoc($result_notea);


// NOTEBOOK DISPONIBLES
$sql_noted = "SELECT COUNT(*) total_noted FROM equipos WHERE id_tipe = 1 and estatus_equ = 1 and asig_equ=0";
$result_noted = mysqli_query($conection, $sql_noted);
$fila_noted = mysqli_fetch_assoc($result_noted);

// LICENCIAS WINDOWS
$sql_licwin = "SELECT COUNT(*) total_licwin FROM equipos WHERE licwin_equ != null or licwin_equ != '' and estatus_equ = 1";
$result_licwin = mysqli_query($conection, $sql_licwin);
$fila_licwin = mysqli_fetch_assoc($result_licwin);

// LICENCIAS OFFICE
$sql_licoffice = "SELECT COUNT(*) total_licoffice FROM equipos WHERE licoffice_equ != null or licoffice_equ != '' and estatus_equ = 1";
$result_licoffice = mysqli_query($conection, $sql_licoffice);
$fila_licoffice = mysqli_fetch_assoc($result_licoffice);

// MANTENCIONES
$sql_mantenciones = "SELECT COUNT(*) total_mantenciones FROM mantencion";
$result_mantenciones = mysqli_query($conection, $sql_mantenciones);
$fila_mantenciones = mysqli_fetch_assoc($result_mantenciones);
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<?php 
		include "includes/scripts.php";
	?>
	<title>Sistema SGRT</title>
</head>
<body>
<?php include "includes/header.php";	?>
	<section id="container">
        <div class="divContainer">
            <div><br>
                <h1 class="titlePanelControl" align="center"><i class="fas fa-tachometer-alt"></i> PANEL DE CONTROL SGRT</h1>
            </div><br>
            <div class="dashboard">
                <a href="lista_funcionarios.php"><i class="fas fa-users"></i>
                    <p>
                        <strong>Cant.Funcionarios</strong><br>
                        <span><?php echo $fila_f['total_f']; ?></span>
                    </p>
                </a>
                <a href="listado_computadores.php"><i class="fas fa-desktop"></i>
                    <p>
                        <strong>Cant.Computadores</strong><br>
                        <span><?php echo $fila_aio['total_aio']; ?></span>
                    </p>
                </a><a href="listado_notebooks.php"><i class="fas fa-laptop"></i>
                    <p>
                        <strong>Cant.Notebook</strong><br>
                        <span><?php echo $fila_note['total_note']; ?></span>
                    </p>
                </a><a href="listado_impresoras.php"><i class="fas fa-print"></i>
                    <p>
                        <strong>Cant.Impresoras</strong><br>
                        <span><?php echo $fila_imp['total_imp']; ?></span>
                    </p>
                </a>
                </a><a href="listado_proyectores.php"><i class="fas fa-lightbulb"></i>
                    <p>
                        <strong>Cant.Proyectores</strong><br>
                        <span><?php echo $fila_pro['total_pro']; ?></span>
                    </p>
                </a>
            </div><br><br>
            <div class="dashboard">
                <a href="notebook_asignados.php"><i class="fas fa-laptop"></i>
                    <p>
                        <strong>Notebook Asignados</strong><br>
                        <span><?php echo $fila_notea['total_notea']; ?></span>
                    </p>
                </a>
                <a href="notebook_disponibles.php"><i class="fas fa-laptop"></i>
                    <p>
                        <strong>Notebook Disponibles</strong><br>
                        <span><?php echo $fila_noted['total_noted']; ?></span>
                    </p>
                </a><a href="listado_windows.php"><i class="fab fa-windows"></i>
                    <p>
                        <strong>Licencias Windows</strong><br>
                        <span><?php echo $fila_licwin['total_licwin']; ?></span>
                    </p>
                </a><a href="listado_office.php"><i class="far fa-file-word"></i>
                    <p>
                        <strong>Licencias Office</strong><br>
                        <span><?php echo $fila_licoffice['total_licoffice']; ?></span>
                    </p>
                </a>
                </a><a href="reporte_mant_total.php"><i class="fas fa-wrench"></i>
                    <p>
                        <strong>Mantenciones</strong><br>
                        <span><?php echo $fila_mantenciones['total_mantenciones']; ?></span>
                    </p>
                </a>
            </div>
        </div>
	</section>
    <section id="container">
       
    </section>
        
<?php include "includes/footer.php";	?>
</body>
</html>