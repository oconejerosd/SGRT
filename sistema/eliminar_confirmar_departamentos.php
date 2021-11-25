<?php
session_start();
if($_SESSION['rol_Nom'] != "Administrador")
{
    header("location:./");
}
    include "../conexion.php";
    
    if(!empty($_POST))
    {
        
        $iddepto = $_POST['id'];

       // $query_delete = mysqli_query($conection,"DELETE FROM funcionarios WHERE Fun_Rut = '$idusuario'");

        $query_delete = mysqli_query($conection,"UPDATE departamentos SET estatus_depto = 0 WHERE id_depto = '$iddepto'");
        if($query_delete){
            header("Location:listado_departamentos.php"); 
        }else{
            echo "Error al eliminar";
        }   
    }
    
    if(empty($_REQUEST['id'])){
        header("Location:listado_departamentos.php");
    }else{
        

        $iddepto = $_REQUEST['id'];

        $query = mysqli_query($conection,"SELECT * FROM departamentos WHERE id_depto = '$iddepto'");

        $result = mysqli_num_rows($query);

        if($result>0){
            while($data = mysqli_fetch_array($query)){
                $nombre = $data['nom_depto'];
                
            }
        }else{
            header("Location:listado_departamentos.php"); 
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
	<title>Eliminar Funcionario</title>
</head>
<body>
<?php include "includes/header.php";	?>
	<section id="container">
		<div class="data_delete">
        <i class="fas fa-landmark fa-5x"></i> <br>
            <h2> <br> ¿Esta seguro de eliminar el siguiente registro?</h2>
            <p>Nombre: <span><?php echo $nombre; ?></span></p>
            

            <form action="" method="post">
                <input type="hidden" name="id" value="<?php echo $iddepto; ?>">
                <a href="listado_departamentos.php" class="btn_cancel"><i class="fas fa-ban"></i> Cancelar</a>
                
                <button type="submit" class="btn_ok"><i class="far fa-trash-alt"></i> ACEPTAR</button>
            </form>

        </div>
	</section>
<?php include "includes/footer.php";	?>
</body>
</html>