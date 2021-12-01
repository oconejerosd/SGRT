<?php
include "../conexion.php";
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename= listado_eqtotal.xls");

?>
<table>
            <tr>
                <th>N°</th>
                <th>TIPO EQUIPO</th>
                <th>MARCA</th>
                <th>MODELO</th>
                <th>SERIE EQUIPO</th>
            </tr>
            <?php
            $query = mysqli_query($conection,"SELECT e.id_equ,e.ser_equ,t.nom_tipe,m.nom_mar, mo.nom_mod  
            FROM `equipos` e 
            INNER JOIN tipos_equipos t 
            ON e.id_tipe = t.id_tipe
            INNER JOIN marcas m
            ON e.id_mar = m.id_mar 
            INNER JOIN modelo mo
            ON e.id_mod = mo.id_mod
            WHERE estatus_equ = 1");
            
            $result = mysqli_num_rows($query);
            
            if($result >0){
                while($row = mysqli_fetch_array($query)){
            

            ?>
            <tr>
                <td><?= $row['id_equ']?></td>
                <td><?= $row['nom_tipe']?></td>
                <td><?= $row['nom_mar']?></td>
                <td><?= $row['nom_mod']?></td>
                <td><?= $row['ser_equ']?></td>
            </tr>
            <?php
               }    

            }    
            ?>
            
        </table>