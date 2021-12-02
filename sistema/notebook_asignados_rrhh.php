<?php
session_start();
if($_SESSION['rol_Nom'] != "Consultor RRHH")
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
	<title>NOTEBOOKS ASIGNADOS</title>
</head>
<body>
<?php include "includes/header.php";	?>
	<section id="container">
		<h1><i class="fas fa-desktop"></i> NOTEBOOK ASIGNADOS</h1>
        <?php
           if (!isset($_POST['buscar'])) {
                $_POST['buscar']= "";

                $buscar = $_POST['buscar'];
            }
            $buscar = $_POST['buscar'];
            $SQL_READ = "SELECT a.id_asignacion, f.rut_fun,f.nom_fun, d.nom_depto, m.nom_mar, mo.nom_mod,e.ser_equ, a.carta_asignacion FROM asignacion a 
            INNER JOIN equipos e ON e.id_equ = a.id_equ
            INNER JOIN funcionarios f ON f.id_fun = a.id_fun
            INNER JOIN departamentos d ON d.id_depto = f.id_depto
            INNER JOIN marcas m ON m.id_mar = e.id_mar
            INNER JOIN modelo mo ON mo.id_mod = e.id_mod
            INNER JOIN tipos_equipos te ON te.id_tipe = e.id_tipe
            WHERE e.asig_equ = 1 and e.estatus_equ = 1 and a.estatus_asignacion = 1";

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
                                <th>ID</th>
                                <th>RUT</th>
                                <th>NOMBRE FUNCIONARIO</th>
                                <th>DEPARTAMENTO</th>
                                <th>MARCA</th>
                                <th>MODELO</th>
                                <th>SERIE EQUIPO</th>
                                <th>DCTO COMODATO</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($row= mysqli_fetch_array($sql_query)){?>
                                <tr>
                                    <td><?= $row['id_asignacion']?></td>
                                    <td><?= $row['rut_fun']?></td>
                                    <td><?= $row['nom_fun']?></td>
                                    <td><?= $row['nom_depto']?></td>
                                    <td><?= $row['nom_mar']?></td>
                                    <td><?= $row['nom_mod']?></td>
                                    <td><?= $row['ser_equ']?></td>
                                    <td>
                                         <a class ="link_edit" href="/INACAP/sgrt<?php echo $row["carta_asignacion"]  ?>"><i class="fa fa-download" aria-hidden="true"></i></a>
                                    </td>
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