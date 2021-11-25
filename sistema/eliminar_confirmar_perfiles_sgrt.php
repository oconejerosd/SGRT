<?php
    include "../conexion.php";
    
    if(!empty($_POST))
    {
        
        $idtperf = $_POST['id'];

       // $query_delete = mysqli_query($conection,"DELETE FROM funcionarios WHERE Fun_Rut = '$idusuario'");

        $query_delete = mysqli_query($conection,"UPDATE tipos_usuarios SET Tip_Status = 0 WHERE Tip_Cod = '$idtperf'");
        if($query_delete){
            header("Location:listado_perfiles_sgrt.php"); 
        }else{
            echo "Error al eliminar";
        }   
    }
    
    if(empty($_REQUEST['id'])){
        header("Location:listado_perfiles_sgrt.php");
    }else{
        

        $idtperf = $_REQUEST['id'];

        $query = mysqli_query($conection,"SELECT * FROM tipos_usuarios WHERE Tip_Cod = '$idtperf'");

        $result = mysqli_num_rows($query);

        if($result>0){
            while($data = mysqli_fetch_array($query)){
                $nombre = $data['Tip_Nom'];
                
            }
        }else{
            header("Location:listado_perfiles_sgrt.php"); 
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
	<title>Eliminar Tipo Perfiles SGRT</title>
</head>
<body>
<?php include "includes/header.php";	?>
	<section id="container">
		<div class="data_delete">
            <h2>¿Esta seguro de eliminar el siguiente registro?</h2>
            <p>Nombre: <span><?php echo $nombre; ?></span></p>
            

            <form action="" method="post">
                <input type="hidden" name="id" value="<?php echo $idtperf; ?>">
                <a href="listado_perfiles_sgrt.php" class="btn_cancel">Cancelar</a>
                <input type="submit" value="Aceptar" class="btn_ok">
            </form>

        </div>
	</section>
<?php include "includes/footer.php";	?>
</body>
</html>