<?php
session_start();
if($_SESSION['rol_Nom'] != "Administrador")
{
    header("location:./");
}
include "../conexion.php";


?>
<DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<?php 
		include "includes/scripts.php";
	?>
    
	<title>LISTADO EQUIPAMIENTO MANTENCIÓN</title>
</head>
<body>
<?php include "includes/header.php";	?>
	<section id="container">
		<h1><i class="fas fa-print"></i> LISTADO MANTENCIÓN DE IMPRESORAS</h1>
        <?php
           if (!isset($_POST['buscar'])) {
                $_POST['buscar']= "";

                $buscar = $_POST['buscar'];
            }
            $buscar = $_POST['buscar'];
            $SQL_READ = "SELECT t.nom_tipe, e.ser_equ, m.fingreso_mantencion, m.tipo_mantencion, d.nom_depto FROM mantencion m 
            INNER JOIN equipos e
            ON m.id_equ = e.id_equ
            INNER JOIN tipos_equipos t 
            on e.id_tipe = t.id_tipe
            INNER JOIN departamentos d 
            on d.id_depto = e.id_depto
            WHERE t.id_tipe = 3";

            $sql_query = mysqli_query($conection,$SQL_READ);	
        ?>
	<br>
	<br>
	<div class="container-fluid">
		<div class="row">
            <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>TIPO EQUIPO</th>
                                <th>SERIE EQUIPO</th>
                                <th>FECHA MANTENCIÓN</th>
                                <th>TIPO MANTENCION</th>
                                <th>UBICACION EQUIPO</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($row= mysqli_fetch_array($sql_query)){?>
                                <tr>
                                    <td><?= $row['nom_tipe']?></td>
                                    <td><?= $row['ser_equ']?></td>
                                    <td><?= $row['fingreso_mantencion']?></td>
                                    <td><?= $row['tipo_mantencion']?></td>
                                    <td><?= $row['nom_depto']?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                </table>
            </div>
		</div>
	</div>
    <a href="excel_fun.php">Descargar Excel </a>
   
<!-- jQuery, Popper.js, Bootstrap JS -->
    <script src="jquery/jquery-3.3.1.min.js"></script>
    <script src="popper/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script> 
    <!-- datatables JS -->
    <script type="text/javascript" src="datatables/datatables.min.js"></script>    
    <script type="text/javascript" src="main.js"></script>  
    <?php include "includes/footer.php";	?>
</body>
</html>