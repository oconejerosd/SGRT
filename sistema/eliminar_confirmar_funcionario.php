<?php
    session_start();
	if($_SESSION['rol_Nom'] != "Administrador")
	{
		header("location:./");
	}
    include "../conexion.php";
    
    if(!empty($_POST))
    {
        if($_POST['idusuario'] == '13567959'){
            header("Location:lista_funcionarios.php"); 
            exit;
        }
        $idusuario = $_POST['idusuario'];

       // $query_delete = mysqli_query($conection,"DELETE FROM funcionarios WHERE Fun_Rut = '$idusuario'");

        $query_delete = mysqli_query($conection,"UPDATE funcionarios SET estatus_fun = 0 WHERE id_fun = '$idusuario'");
        if($query_delete){
            header("Location:lista_funcionarios.php"); 
        }else{
            echo "Error al eliminar";
        }   
    }
    
    if(empty($_REQUEST['id']) || $_REQUEST['id']== '13567959-3' ){
        header("Location:lista_funcionarios.php");
    }else{
        

        $idusuario = $_REQUEST['id'];

        $query = mysqli_query($conection,"SELECT f.nom_fun, r.rol_Nom
        FROM funcionarios f INNER JOIN rol r ON f.id_rol = r.rol_Id
        WHERE f.id_fun = '$idusuario'");

        $result = mysqli_num_rows($query);

        if($result>0){
            while($data = mysqli_fetch_array($query)){
                $nombre = $data['nom_fun'];
                $tipousuario = $data['rol_Nom'];
            }
        }else{
            header("Location:lista_funcionarios.php"); 
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
            <i class="fas fa-user-times fa-7x" style="color: red"><br></i>
            <h2>¿Esta seguro de eliminar el siguiente registro?</h2><br>
            
            <p>Nombre: <span><?php echo $nombre; ?></span></p>
            <p>Tipo Usuario: <span><?php echo $tipousuario; ?></span></p>

            <form action="" method="post">
                <input type="hidden" name="idusuario" value="<?php echo $idusuario; ?>">
                <a href="lista_funcionarios.php" class="btn_cancel"><i class="fas fa-ban"></i> Cancelar</a>
                <button type="submit" class="btn_ok"><i class="far fa-trash-alt"></i> ELIMINAR</button>
            </form>

        </div>
	</section>
<?php include "includes/footer.php";	?>
</body>
</html>