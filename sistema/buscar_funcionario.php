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
	<title>Funcionarios SGRT</title>
</head>
<body>
<?php include "includes/header.php";	?>
	<section id="container">
<?php
    $busqueda = strtolower($_REQUEST['busqueda']);
    if(empty($busqueda)){
        header("Location: lista_funcionarios.php");
    }
?>

		<h1>Funcionarios SGRT</h1>
        <a href="registro_funcionarios.php" class="btn_new">Crear Funcionario</a>
        
        <form action="buscar_funcionario.php" method="GET" class="form_search">
            <input type="text" name="busqueda" id="busqueda" placeholder="Buscar" value="<?php echo $busqueda; ?>">
            <input type="submit" value="Buscar" class="btn_search">
        </form>
        <table>
            <tr>
                <th>#</th>
                <th>Rut</th>
                <th>Nombres</th>
                <th>Correo Electronico</th>
                <th>Usuario AD</th>
                <th>Pass AD</th>
                <th>Departamento</th>
                <th>Acciones</th>
            </tr>
            <?php
                
                $depa ='';
                if($busqueda == 'Informática')
                {
                    $depa = "OR id_depto LIKE '%1%'";
                }else if($busqueda == 'RRHH'){
                    $depa = "OR id_depto LIKE '%2%'";
                }else if($busqueda == 'Oficina de Partes'){
                    $depa = "OR id_depto LIKE '%3%'";
                }else if($busqueda == 'Servicios Generales'){
                    $depa = "OR id_depto LIKE '%4%'";
                }else if($busqueda == 'Finanzas'){
                    $depa = "OR id_depto LIKE '%5%'";
                }else if($busqueda == 'Contabilidad'){
                    $depa = "OR id_depto LIKE '%6%'";
                }else if($busqueda == 'Estudios y Proyectos'){
                    $depa = "OR id_depto LIKE '%7%'";
                }else if($busqueda == 'Educación'){
                    $depa = "OR id_depto LIKE '%8%'";
                }else if($busqueda == 'Abastecimiento'){
                    $depa = "OR id_depto LIKE '%9%'";
                }else if($busqueda == 'Comunicaciones'){
                    $depa = "OR id_depto LIKE '%10%'";
                }else if($busqueda == 'Secretaria General'){
                    $depa = "OR id_depto LIKE '%11%'";
                }

                $sql_registe = mysqli_query($conection,"SELECT COUNT(*) as total_registro FROM funcionarios 
                                                        WHERE 
                                                        (rut_fun LIKE '%$busqueda%' OR nom_fun LIKE '%$busqueda%' OR
                                                        ema_Fun LIKE '%$busqueda%' OR  usuad_Fun LIKE '%$busqueda%' OR
                                                        passad_Fun LIKE '%$busqueda%' $depa) AND estatus_fun=1");

                $result_register = mysqli_fetch_array($sql_registe);
                $total_registro = $result_register['total_registro'];

                $por_pagina = 10;
                if(empty($_GET['pagina']))
                {
                    $pagina = 1;
                }else{
                    $pagina = $_GET['pagina'];
                }

                $desde = ($pagina-1) * $por_pagina;
                $total_paginas = ceil($total_registro / $por_pagina);

                $query = mysqli_query($conection,"SELECT f.id_fun,f.rut_fun, f.nom_fun, f.ema_Fun,
                f.usuad_Fun, f.passad_Fun, d.nom_depto FROM funcionarios f                
                INNER JOIN departamentos d ON f.id_depto = d.id_depto 
                WHERE 
                (f.id_fun LIKE '%$busqueda%' OR f.rut_fun LIKE '%$busqueda%' OR f.nom_fun LIKE '%$busqueda%' OR
                f.ema_Fun LIKE '%$busqueda%' OR  f.usuad_Fun LIKE '%$busqueda%' OR
                f.passad_Fun LIKE '%$busqueda%' OR d.id_depto LIKE '%$busqueda%') AND
                estatus_fun = 1 ORDER BY f.nom_fun ASC LIMIT $desde,$por_pagina");

                $result = mysqli_num_rows($query);
                
                if($result >0){
                    while($data = mysqli_fetch_array($query)){
            ?>
            <tr>
                <td><?php echo $data["id_fun"]  ?></td>
                <td><?php echo $data["rut_fun"]  ?></td>
                <td><?php echo $data["nom_fun"]  ?></td>
                <td><?php echo $data["ema_Fun"]  ?></td>
                <td><?php echo $data["usuad_Fun"]  ?></td>
                <td><?php echo $data["passad_Fun"]  ?></td>
                <td><?php echo $data["nom_depto"]  ?></td>
                <td>
                    <a class ="link_edit" href="editar_funcionario.php?id=<?php echo $data["id_fun"]  ?>">Editar</a>
                    <?php if($data["id_fun"] !='13567959-3'){ ?>
                    |
                    <a class ="link_delete" href="eliminar_confirmar_funcionario.php?id=<?php echo $data["id_fun"]  ?>">Eliminar</a>
                    <?php } ?>
                </td>
            </tr>
            <?php
                    }
                }
                    
            ?>
            
        </table>
        <?php  
            if($total_registro !=0)
            {

            
        ?>
        <div class="paginador">
            <ul>
                <?php
                    if($pagina !=1)
                    {                  
                ?>
                <li><a href="?pagina=<?php echo 1; ?>&busqueda=<?php echo $busqueda; ?>">|<<</a></li>
                <li><a href="?pagina=<?php echo $pagina-1; ?>&busqueda=<?php echo $busqueda; ?>"><<</a></li>
                <?php
                    }
                    for($i=1; $i<= $total_paginas; $i++){
                        if($i == $pagina)
                        {
                            echo '<li class="pageSelected">'.$i.'</li>';
                        }else{
                            echo '<li><a href="?pagina='.$i.'&busqueda='.$busqueda.'">'.$i.'</a></li>';
                        }
                        
                    }
                    if($pagina != $total_paginas){
                ?>
                <li><a href="?pagina=<?php echo $pagina + 1; ?>&busqueda=<?php echo $busqueda; ?>">>></a></li>
                <li><a href="?pagina=<?php echo $total_paginas; ?>&busqueda=<?php echo $busqueda; ?>">>>|</a></li>
                <?php } ?>
            </ul>
        </div>

        <?php } ?>
	</section>
<?php include "includes/footer.php";	?>
</body>
</html>