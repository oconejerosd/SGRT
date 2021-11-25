<?php
session_start();
if($_SESSION['rol_Nom'] != "Administrador" and $_SESSION['rol_Nom'] != "Tecnico")
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
	<title>LISTADO COMPUTADORES</title>
</head>
<body>
<?php include "includes/header.php";	?>
	<section id="container">
		<h1><i class="fas fa-desktop"></i> LISTADO COMPUTADORES</h1>
        <?php
           if (!isset($_POST['buscar'])) {
                $_POST['buscar']= "";

                $buscar = $_POST['buscar'];
            }
            $buscar = $_POST['buscar'];
            $SQL_READ = "SELECT e.id_equ,e.ser_equ,e.licwin_equ,e.licoffice_equ,e.id_tipe,t.nom_tipe,m.nom_mar, mo.nom_mod, d.nom_depto  
            FROM `equipos` e 
            INNER JOIN tipos_equipos t 
            ON e.id_tipe = t.id_tipe
            INNER JOIN marcas m
            ON e.id_mar = m.id_mar 
            INNER JOIN modelo mo
            ON e.id_mod = mo.id_mod
            INNER JOIN departamentos d 
            ON e.id_depto = d.id_depto
            WHERE e.id_tipe = 2 AND estatus_equ = 1";

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
                                <th>#</th>
                                <th>TIPO EQUIPO</th>
                                <th>MARCA</th>
                                <th>MODELO</th>
                                <th>SERIE EQUIPO</th>
                                <th>LIC WIN</th>
                                <th>LIC OFFICE</th>
                                <th>UBICACIÓN</th>
                                <th>ACCIONES</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($row= mysqli_fetch_array($sql_query)){?>
                                <tr>
                                    <td><?= $row['id_equ']?></td>
                                    <td><?= $row['nom_tipe']?></td>
                                    <td><?= $row['nom_mar']?></td>
                                    <td><?= $row['nom_mod']?></td>
                                    <td><?= $row['ser_equ']?></td>
                                    <td><?= $row['licwin_equ']?></td>
                                    <td><?= $row['licoffice_equ']?></td>
                                    <td><?= $row['nom_depto']?></td>
                                    <td>
                                         <a class ="link_edit" href="editar_computadores.php?id=<?php echo $row["id_equ"]  ?>"><i class="fas fa-edit"></i> Editar</a>
                                         |
                                         <a class ="link_delete" href="eliminar_confirmar_computadores.php?id=<?php echo $row["id_equ"]  ?>"><i class="fas fa-trash-alt"></i> Eliminar</a>     
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                </table>
            </div>
		</div>
	</div><br>
    <a href="excel_fun.php">Descargar Excel Listado Computadores </a>
   
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