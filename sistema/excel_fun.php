<?php
include "../conexion.php";
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename= listado_f.xls");

?>
<table>
            <tr>
                <th>#</th>
                <th>Rut</th>
                <th>Nombre</th>
                <th>Correo Electronico</th>
                <th>Usuario AD</th>
                <th>Pass AD</th>
                <th>Departamento</th>
            </tr>
            <?php
            $query = mysqli_query($conection,"SELECT f.id_fun, f.rut_fun, f.nom_fun, f.ema_fun, f.usuad_Fun, f.passad_Fun,
            d.nom_depto FROM funcionarios f                
            INNER JOIN departamentos d ON f.id_depto = d.id_depto WHERE estatus_fun = 1 ORDER BY id_fun ASC");
            
            $result = mysqli_num_rows($query);
            
            if($result >0){
                while($data = mysqli_fetch_array($query)){
            

            ?>
            <tr>
                <td><?php echo $data["id_fun"]  ?></td>
                <td><?php echo $data["rut_fun"]  ?></td>
                <td><?php echo $data["nom_fun"]  ?></td>
                <td><?php echo $data["ema_fun"]  ?></td>
                <td><?php echo $data["usuad_Fun"]  ?></td>
                <td><?php echo $data["passad_Fun"]  ?></td>
                <td><?php echo $data["nom_depto"]  ?></td>
            </tr>
            <?php
               }    

            }    
            ?>
            
        </table>