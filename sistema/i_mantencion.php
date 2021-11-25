<?php
session_start();
include "../conexion.php";

$query_dash = mysqli_query($conection,"CALL dataDashboard();");
$result_dash = mysqli_num_rows($query_dash);
if($result_dash > 0){
    $data_dash = mysqli_fetch_assoc($query_dash);
    mysqli_close($conection);
}
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
        <div>
            <h1 class="titlePanelControl" align="center"><i class="fas fa-tachometer-alt"></i> Panel de Mantención SGRT</h1>
        </div>
        <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col">
            <div class="card h-100">
                <br>
                <div class="dashboard">
                    <i class="fas fa-desktop fa-3x"></i>
                </div>
                <div class="card-body">
                    <h5 class="card-title" align="center">Computadores</h5>
                    <p class="card-text"><a href="listado_computadores.php">Listado de Computadores</a></p>
                    <p class="card-text"><a href="#">Ingresar Mantencion Computador</a></p>
                    <p class="card-text"><a href="#">Mantencion Preventiva</a></p>
                    <p class="card-text"><a href="#">Mantencion Correctiva</a></p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100">
            <br>
                <div class="dashboard">
                    <i class="fas fa-laptop fa-3x"></i>
                </div>
                    <div class="card-body">
                    <h5 class="card-title" align="center">Notebook</h5>
                    <p class="card-text"><a href="listado_notebooks.php">Listado de Notebook</a></p>
                    <p class="card-text"><a href="mantencion_notebook.php">Ingresar Mantencion Notebook</a></p>
                    <p class="card-text"><a href="#">Mantencion Preventiva</a></p>
                    <p class="card-text"><a href="#">Mantencion Correctiva</a></p>
                    </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100">
            <br>
                <div class="dashboard">
                    <i class="fas fa-print fa-3x"></i>
                </div>
            <div class="card-body">
            <h5 class="card-title" align="center">Impresora</h5>
                    <p class="card-text"><a href="#">Listado de Computadores</a></p>
                    <p class="card-text"><a href="#">Computadores en Mantencion</a></p>
                    <p class="card-text"><a href="#">Mantencion Preventiva</a></p>
                    <p class="card-text"><a href="#">Mantencion Correctiva</a></p>
            </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100">
            <br>
                <div class="dashboard">
                    <i class="fas fa-lightbulb fa-3x"></i>
                </div>
            <div class="card-body">
            <h5 class="card-title" align="center">Proyector</h5>
                    <p class="card-text"><a href="#">Listado de Computadores</a></p>
                    <p class="card-text"><a href="#">Computadores en Mantencion</a></p>
                    <p class="card-text"><a href="#">Mantencion Preventiva</a></p>
                    <p class="card-text"><a href="#">Mantencion Correctiva</a></p>
            </div>
            </div>
        </div>
        </div>
    </section>
<?php include "includes/footer.php";	?>
</body>
</html>