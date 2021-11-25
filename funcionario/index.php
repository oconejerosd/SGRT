<?php
session_start();
if($_SESSION['rol_Nom'] != "Funcionario")
{
    header("location:./");
}
include "../conexion.php";
$iduser = $_SESSION['id_fun'];
$sql = mysqli_query($conection,"SELECT f.id_fun, f.rut_fun,f.nom_fun,f.ema_Fun, f.usuad_Fun, f.passad_fun,d.nom_depto
									FROM funcionarios f INNER JOIN rol r 
									ON f.id_rol = r.rol_Id INNER JOIN departamentos d 
									ON f.id_depto = d.id_depto WHERE id_fun = $iduser and estatus_fun = 1");

	$result_sql = mysqli_num_rows($sql);
    while ($data = mysqli_fetch_array($sql)){
       // $iduser = $data['id_fun'];
        $rut = $data['rut_fun'];
        $nombre = $data['nom_fun'];
        $email = $data['ema_Fun'];
        $usuarioad = $data['usuad_Fun'];
        $passad = $data['passad_fun'];
        //$usuario = $data['rol_Nom'];
        $departamento = $data['nom_depto'];
    }

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
        <div class="divContainer">
            
        </div>
        <div class="divInfoSistema">
            <div class="containerPerfil">
                <div class="containerDataUser">
                    <div class="logoUser">
                        <img src="img/user.png" alt="">
                    </div>
                    <div class="divdataUser">
               
                        <h4>Información Personal</h4>
                        <div>
                            <label>Nombre:</label><span><?= $_SESSION['nombre']; ?></span>
                            <label>Nombre:</label><span><?= $nombre
                            ; ?></span>
                        </div>
                        <div>
                            <label>Correo:</label><span><?= $_SESSION['emaUsuario']; ?></span>
                        </div>
                        <h4>Datos Usuario</h4>
                        <div>
                            <label>Rol:</label><span><?= $_SESSION['rol_Nom']; ?> </span>
                        </div>
                        <div>
                            <label>Usuario:</label><span><?= $_SESSION['emaUsuario']; ?></span>
                        </div>
                        <h4>Cambiar Contraseña</h4>
                        <form action="" method="post" name="frmChangePass" id="frmChangePass">
                            <div>
                                <input type="password" name="txtPassUser" id="txtPassUser" placeholder="Contraseña Actual" required>
                            </div>
                            <div>
                                <input class="newPass" type="password" name="txtNewPassUser" id="txtNewPassUser" placeholder="Nueva Contraseña" required>
                            </div>
                            <div>
                                <input class="newPass" type="password" name="txtPassConfirm" id="txtPassConfirm" placeholder="Confirmar Contraseña" required>
                            </div>
                            <div class="alertChangePass" style="display:none;"></div>
                            <div>
                                <button type="submit" class="btn_grabar btnChangePass"><i class="fas fa-key"></i> CAMBIAR CONTRASEÑA</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</section>
<?php include "includes/footer.php";	?>
</body>
</html>