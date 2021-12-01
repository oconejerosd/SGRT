<?php
session_start();
include "../conexion.php";


include "../conexion.php";
// NOTEBOOK ASIGNADOS
$sql_notea = "SELECT COUNT(*) total_notea FROM equipos WHERE id_tipe = 1 and estatus_equ = 1 and asig_equ=1";
$result_notea = mysqli_query($conection, $sql_notea);
$fila_notea = mysqli_fetch_assoc($result_notea);

// NOTEBOOK DISPONIBLES
$sql_noted = "SELECT COUNT(*) total_noted FROM equipos WHERE id_tipe = 1 and estatus_equ = 1 and asig_equ=0";
$result_noted = mysqli_query($conection, $sql_noted);
$fila_noted = mysqli_fetch_assoc($result_noted);
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
<?php include "includes/header.php";?>
    <section id="container">
        <div><br>
            <h1 class="titlePanelControl" align="center"><i class="fas fa-tachometer-alt"></i> Panel de Reportes SGRT</h1><br>
        </div>
        <div class="row row-cols-1 row-cols-md-3 g-2">
        <div class="col"><br><br>
            <div class="card h-100">
                <br>
                <div class="dashboard">
                    <i class="fas fa-desktop fa-3x"></i>
                </div>
                <div class="card-body">
                    <h5 class="card-title" align="center">Computadores</h5>
                    <p class="card-text"><a href="reporte_equipos.php">Listado de Computadores</a></p>
                    <p class="card-text"><a href="reporte_mant_computador.php">Mantención Computadores</a></p>
                </div>
            </div>
        </div>
        <div class="col"><br><br>
            <div class="card h-100">
            <br>
                <div class="dashboard">
                    <i class="fas fa-laptop fa-3x"></i>
                </div>
                    <div class="card-body">
                    <h5 class="card-title" align="center">Notebook</h5>
                    <p class="card-text"><a href="reporte_notebooks.php">Listado de Notebooks</a></p>
                    <p class="card-text"><a href="reporte_mant_notebook.php">Mantención Notebooks</a></p>
                    </div>
            </div>
        </div>
        <div class="col"><br><br>
            <div class="card h-100">
            <br>
                <div class="dashboard">
                    <i class="fas fa-print fa-3x"></i>
                </div>
            <div class="card-body">
            <h5 class="card-title" align="center">Impresora</h5>
                    <p class="card-text"><a href="reporte_impresoras.php">Listado de Impresoras</a></p>
                    <p class="card-text"><a href="reporte_mant_impresoras.php">Mantención Impresoras</a></p>
            </div>
            </div>
        </div>
        <div class="col"><br><br>
            <div class="card h-100">
            <br>
                <div class="dashboard">
                    <i class="fas fa-lightbulb fa-3x"></i>
                </div>
            <div class="card-body">
            <h5 class="card-title" align="center">Proyector</h5>
                    <p class="card-text"><a href="reporte_proyectores.php">Listado de Proyectores</a></p>
                    <p class="card-text"><a href="reporte_mant_proyectores.php">Mantención Proyectores</a></p>
            </div>
            </div>
        </div>
        </div>
    </section>   
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <div class="container">
       

    </div>
<?php include "includes/footer.php";	?>
</body>
</html>