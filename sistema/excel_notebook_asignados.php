<?php
include "../conexion.php";
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename= listado_note_asignados.xls");

?>

<table>
            <tr>
                <th>ID</th>
                <th>RUT</th>
                <th>NOMBRE FUNCIONARIO</th>
                <th>DEPARTAMENTO</th>
                <th>MARCA</th>
                <th>MODELO</th>
                <th>SERIE</th>
            </tr>
            <?php
                $query = mysqli_query($conection,"SELECT a.id_asignacion, f.rut_fun,f.nom_fun, d.nom_depto, m.nom_mar, mo.nom_mod,e.ser_equ FROM asignacion a 
                INNER JOIN equipos e ON e.id_equ = a.id_equ
                INNER JOIN funcionarios f ON f.id_fun = a.id_fun
                INNER JOIN departamentos d ON d.id_depto = f.id_depto
                INNER JOIN marcas m ON m.id_mar = e.id_mar
                INNER JOIN modelo mo ON mo.id_mod = e.id_mod
                INNER JOIN tipos_equipos te ON te.id_tipe = e.id_tipe
                WHERE e.asig_equ = 1 and e.estatus_equ = 1 and a.estatus_asignacion = 1");
            
            $result = mysqli_num_rows($query);
            
            if($result >0){
                while($data = mysqli_fetch_array($query)){
            ?>
            <tr>
                <td><?php echo $data["id_asignacion"]  ?></td>
                <td><?php echo $data["rut_fun"]  ?></td>
                <td><?php echo $data["nom_fun"]  ?></td>
                <td><?php echo $data["nom_depto"]  ?></td>
                <td><?php echo $data["nom_mar"]  ?></td>
                <td><?php echo $data["nom_mod"]  ?></td>
                <td><?php echo $data["ser_equ"]  ?></td>
            </tr>
            <?php
               }    

            }    
            ?>
            
        </table>