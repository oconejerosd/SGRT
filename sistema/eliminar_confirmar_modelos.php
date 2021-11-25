<?php
session_start();
if($_SESSION['rol_Nom'] != "Administrador")
{
    header("location:./");
}
    include "../conexion.php";
    
    if(!empty($_POST))
    {
        $idmodelo = $_POST['idmodelo'];
        

       // $query_delete = mysqli_query($conection,"DELETE FROM funcionarios WHERE Fun_Rut = '$idusuario'");

        $query_delete = mysqli_query($conection,"UPDATE modelo SET estatus_mod = 0 WHERE id_mod = '$idmodelo'");
        if($query_delete){
            header("Location:listado_modelos.php"); 
        }else{
            echo "Error al eliminar";
        }   
    }
    
    if(empty($_REQUEST['id']) || $_REQUEST['id']== '13567959-3' ){
        header("Location:listado_modelos.php");
    }else{
        

        $idmodelo = $_REQUEST['id'];

        $query = mysqli_query($conection,"SELECT * FROM modelo WHERE id_mod = '$idmodelo'");

        $result = mysqli_num_rows($query);

        if($result>0){
            while($data = mysqli_fetch_array($query)){
                $nombre = $data['nom_mod'];
               
            }
        }else{
            header("Location:listado_modelos.php"); 
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
	<title>Eliminar Modelo</title>
</head>
<body>
<?php include "includes/header.php";	?>
	<section id="container">
		<div class="data_delete">
            <h2>¿Esta seguro de eliminar el siguiente registro?</h2>
            <p>Nombre: <span><?php echo $nombre; ?></span></p>
                       

            <form action="" method="post">
                <input type="hidden" name="idmodelo" value="<?php echo $idmodelo; ?>">
                <a href="listado_modelos.php" class="btn_cancel">Cancelar</a>
                <input type="submit" value="Aceptar" class="btn_ok">
            </form>

        </div>
	</section>
<?php include "includes/footer.php";	?>
</body>
</html>