<?php
session_start();
if($_SESSION['rol_Nom'] != "Administrador")
{
    header("location:./");
}
    include "../conexion.php";
    
    if(!empty($_POST))
    {
        
        $idteq = $_POST['id'];

       // $query_delete = mysqli_query($conection,"DELETE FROM funcionarios WHERE Fun_Rut = '$idusuario'");

        $query_delete = mysqli_query($conection,"UPDATE tipos_equipos SET estatus_tipe = 0 WHERE id_tipe = '$idteq'");
        if($query_delete){
            header("Location:listado_categorias_equipos.php"); 
        }else{
            echo "Error al eliminar";
        }   
    }
    
    if(empty($_REQUEST['id'])){
        header("Location:listado_categorias_equipos.php");
    }else{
        

        $idteq = $_REQUEST['id'];

        $query = mysqli_query($conection,"SELECT * FROM tipos_equipos WHERE id_tipe = '$idteq'");

        $result = mysqli_num_rows($query);

        if($result>0){
            while($data = mysqli_fetch_array($query)){
                $nombre = $data['nom_tipe'];
                
            }
        }else{
            header("Location:listado_categorias_equipos.php"); 
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
	<title>Eliminar Categoría de Equipo</title>
</head>
<body>
<?php include "includes/header.php";	?>
	<section id="container">
		<div class="data_delete">
            <h2>¿Esta seguro de eliminar el siguiente registro?</h2>
            <p>Nombre: <span><?php echo $nombre; ?></span></p>
            

            <form action="" method="post">
                <input type="hidden" name="id" value="<?php echo $idteq; ?>">
                <a href="listado_categorias_equipos.php" class="btn_cancel">Cancelar</a>
                <input type="submit" value="Aceptar" class="btn_ok">
            </form>

        </div>
	</section>
<?php include "includes/footer.php";	?>
</body>
</html>