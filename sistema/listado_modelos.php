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
    
	<title>LISTADO MODELOS CORMUN</title>
</head>
<body>
<?php include "includes/header.php";	?>

	<section id="container">
    
		<h1><i class="fas fa-desktop"></i> LISTADO MODELOS CORMUN</h1>
        <a href="registro_modelos.php" class="btn_new">Crear Modelo</a>
        <?php
           if (!isset($_POST['buscar'])) {
                $_POST['buscar']= "";

                $buscar = $_POST['buscar'];
            }
            $buscar = $_POST['buscar'];
            $SQL_READ = "SELECT * FROM modelo WHERE estatus_mod = 1";

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
                                <th>N°</th>
                                <th>MODELO</th>
                                <th>ACCIONES</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($row= mysqli_fetch_array($sql_query)){?>
                                <tr>
                                    <td><?= $row['id_mod']?></td>
                                    <td><?= $row['nom_mod']?></td>
                                    <td>
                                        <a class ="link_edit" href="editar_modelo.php?id=<?php echo $row["id_mod"]  ?>"><i class="fas fa-edit"></i> Editar</a>
                                        |
                                        <a class ="link_delete" href="eliminar_confirmar_modelos.php?id=<?php echo $row["id_mod"]  ?>"><i class="fas fa-trash-alt"></i> Eliminar</a>
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