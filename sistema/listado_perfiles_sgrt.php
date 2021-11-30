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
	<title>Perfiles SGRT</title>
</head>
<body>
<?php include "includes/header.php";	?>
	<section id="container">
		<h1>Perfiles SGRT</h1>
        <a href="#" class="btn_new">Crear Perfil</a>
        
        <table>
            <tr>
                <th>Tipo Código</th>
                <th>Tipo Perfil SGRT</th>
                <th>Acciones</th>
            </tr>
            <?php
                $query = mysqli_query($conection,"SELECT * FROM rol WHERE estatus_rol = 1");

                $result = mysqli_num_rows($query);
                if($result >0){
                    while($data = mysqli_fetch_array($query)){
            ?>
            <tr>
                <td><?php echo $data["rol_Id"]  ?></td>
                <td><?php echo $data["rol_Nom"]  ?></td>
                <td>
                    <a class ="link_edit" href="editar_perfil_sgrt.php?id=<?php echo $data["rol_Id"]; ?>">Editar</a>
                    |
                    <a class ="link_delete" href="eliminar_confirmar_perfiles_sgrt.php?id=<?php echo $data["rol_Id"]; ?>">Eliminar</a>
                </td>
            </tr>
            <?php
                    }
                }
                    
            ?>
            
        </table>
	</section>
<?php include "includes/footer.php";	?>
</body>
</html>