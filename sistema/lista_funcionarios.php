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
    
	<title>LISTADO FUNCIONARIOS CORMUN</title>
</head>
<body>
<?php include "includes/header.php";	?>
	<section id="container">
		<h1><i class="fas fa-users"></i> LISTADO FUNCIONARIOS CORMUN</h1>
        <a href="registro_funcionarios.php" class="btn_new">Crear Funcionario</a>
        <?php
           if (!isset($_POST['buscar'])) {
                $_POST['buscar']= "";

                $buscar = $_POST['buscar'];
            }
            $buscar = $_POST['buscar'];
            $SQL_READ = "SELECT f.id_fun, f.rut_fun, f.nom_fun, f.ema_Fun, f.usuad_Fun, f.passad_Fun,
            d.nom_depto 
            FROM funcionarios f                
           INNER JOIN departamentos d 
           ON f.id_depto = d.id_depto WHERE estatus_fun = 1";

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
                                <th>RUT</th>
                                <th>NOMBRE</th>
                                <th>CORREO ELECTRONICO</th>
                                <th>USUARIO AD</th>
                                <th>PASS AD</th>
                                <th>DEPARTAMENTO</th>
                                <th>ACCIONES</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($row= mysqli_fetch_array($sql_query)){?>
                                <tr>
                                    <td><?= $row['id_fun']?></td>
                                    <td><?= $row['rut_fun']?></td>
                                    <td><?= $row['nom_fun']?></td>
                                    <td><?= $row['ema_Fun']?></td>
                                    <td><?= $row['usuad_Fun']?></td>
                                    <td><?= $row['passad_Fun']?></td>
                                    <td><?= $row['nom_depto']?></td>
                                    <td>
                    <a class ="link_edit" href="editar_funcionario.php?id=<?php echo $row["id_fun"]  ?>"><i class="fas fa-edit"></i> Editar</a>
                    <?php if($row["id_fun"] !='oscar.conejeros@cormun.cl'){ ?>
                    |
                    <a class ="link_delete" href="eliminar_confirmar_funcionario.php?id=<?php echo $row["id_fun"]  ?>"><i class="fas fa-trash-alt"></i> Eliminar</a>
                    <?php } ?>
                </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                </table>
            </div>
		</div>
	</div><br>
    <a href="excel_fun.php">Descargar Excel Listado Funcionarios </a>
   
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