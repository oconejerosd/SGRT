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
	<title>Perfil SGRT</title>
</head>
<body>
<?php include "includes/header.php";	?>
	<section id="container">
		<h1>Perfil SGRT</h1>
        <p><br></p>        
        <table>
            <tr>
                <th>Id</th>
                <th>Rut</th>
                <th>Nombres</th>
                <th>Tipo Usuario SGRT</th>
                <th>Acciones</th>
            </tr>
            <?php
                $query = mysqli_query($conection,"SELECT f.id_fun,f.rut_fun,f.nom_fun,r.rol_Nom
                FROM funcionarios f INNER JOIN rol r ON f.id_rol = r.rol_Id");

                $result = mysqli_num_rows($query);
                if($result >0){
                    while($data = mysqli_fetch_array($query)){
            ?>
            <tr>
                <td><?php echo $data["id_fun"]  ?></td>
                <td><?php echo $data["rut_fun"]  ?></td>
                <td><?php echo $data["nom_fun"]  ?></td>
                <td><?php echo $data["rol_Nom"]  ?></td>
               
                <td>
                <?php if($data["rut_fun"] !='13567959-3'){ ?>
                    <a class ="link_edit" href="editar_perfil_funcionario.php?id=<?php echo $data["id_fun"]  ?>">Editar</a>
                <?php } ?>
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