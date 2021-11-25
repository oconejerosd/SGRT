<?php
session_start();
if($_SESSION['rol_Nom'] != "Administrador")
{
    header("location:./");
}
    include "../conexion.php";
    
    if(!empty($_POST))
    {
        
        $idmarca = $_POST['idmarca'];

       // $query_delete = mysqli_query($conection,"DELETE FROM funcionarios WHERE Fun_Rut = '$idusuario'");

        $query_delete = mysqli_query($conection,"UPDATE marcas SET estatus_mar = 0 WHERE id_mar = '$idmarca'");
        if($query_delete){
            header("Location:listado_marcas.php"); 
        }else{
            echo "Error al eliminar";
        }   
    }
    
    if(empty($_REQUEST['id']) || $_REQUEST['id']== '13567959-3' ){
        header("Location:lista_funcionarios.php");
    }else{
        

        $idmarca = $_REQUEST['id'];

        $query = mysqli_query($conection,"SELECT * FROM marcas WHERE id_mar = '$idmarca'");

        $result = mysqli_num_rows($query);

        if($result>0){
            while($data = mysqli_fetch_array($query)){
                $nombre = $data['nom_mar'];
               
            }
        }else{
            header("Location:listado_marcas.php"); 
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
	<title>Eliminar Marca</title>
</head>
<body>
<?php include "includes/header.php";	?>
	<section id="container">
		<div class="data_delete">
            <h2>¿Esta seguro de eliminar el siguiente registro?</h2>
            <p>Nombre: <span><?php echo $nombre; ?></span></p>
                       

            <form action="" method="post">
                <input type="hidden" name="idmarca" value="<?php echo $idmarca; ?>">
                <a href="listado_marcas.php" class="btn_cancel">Cancelar</a>
                <input type="submit" value="Aceptar" class="btn_ok">
            </form>

        </div>
	</section>
<?php include "includes/footer.php";	?>
</body>
</html>