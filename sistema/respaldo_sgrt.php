<?php
session_start();
if($_SESSION['rol_Nom'] != "Administrador" and $_SESSION['rol_Nom'] != "Tecnico")
{
    header("location:./");
}
include "../conexion.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<?php 
		include "includes/scripts.php";
	?>
	<title>Sistema SGRT</title>
</head>
<body>
<?php include "includes/header.php";	?>
<section id="container">
        <div>
            <h1 class="titlePanelControl" align="center"> Respaldo y Restauración BD SGRT</h1>
        </div>
        <div class="row row-cols-1 row-cols-md-3 g-2">
            <div class="col">
                <div class="card h-100"><br>
                    <div class="dashboard">
                        <i class="fas fa-database fa-3x"></i>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title" align="center">Respaldo SGRT</h5>
                        <p class="card-text" align= "center"><a href="./backup.php">Generar respaldo Base de Datos SGRT</a></p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100"><br>
                    <div class="dashboard">
                        <i class="fas fa-window-restore fa-3x"></i>
                    </div>
                        <div class="card-body">
                            <h5 class="card-title" align="center">Restauración SGRT</h5>
                        </div>
                        <div>
                            <form action="./Restore.php" method="POST">
                                <label>Selecciona un punto de restauración</label><br>
                                <select name="restorePoint">
                                    <option value="" disabled="" selected="">Selecciona un punto de restauración</option>
                                    <?php
                                        include_once '../Connet.php';
                                        $ruta=BACKUP_PATH;
                                        if(is_dir($ruta)){
                                            if($aux=opendir($ruta)){
                                                while(($archivo = readdir($aux)) !== false){
                                                    if($archivo!="."&&$archivo!=".."){
                                                        $nombrearchivo=str_replace(".sql", "", $archivo);
                                                        $nombrearchivo=str_replace("-", ":", $nombrearchivo);
                                                        $ruta_completa=$ruta.$archivo;
                                                        if(is_dir($ruta_completa)){
                                                        }else{
                                                            echo '<option value="'.$ruta_completa.'">'.$nombrearchivo.'</option>';
                                                        }
                                                    }
                                                }
                                                closedir($aux);
                                            }
                                        }else{
                                            echo $ruta." No es ruta válida";
                                        }
                                    ?>
                                </select>
                                <input type="submit" value="RESTAURAR" class="btn_grabar">
                            </form>
                        </div>
                </div>
            </div>
        </div>
    </section>
    <br>
<?php include "includes/footer.php";	?>
</body>
</html>