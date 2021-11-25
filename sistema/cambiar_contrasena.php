<?php
session_start();
if($_SESSION['rol_Nom'] != "Administrador" and $_SESSION['rol_Nom'] != "Tecnico")
{
    header("location:./");
}
include "../conexion.php";

if(!empty($_POST))
        {
            if(empty($_POST['txtPassUser']) || empty($_POST['txtNewPassUser']) || empty($_POST['txtPassConfirm']))
        {
            $alert = 'Ingrese lo solicitado'; 

        }else{

           // require_once "conexion.php";
            
            $pass_actual = md5(mysqli_real_escape_string($conection,$_POST['txtPassUser']));
            $pass_nueva = md5(mysqli_real_escape_string($conection,$_POST['txtPassUser']));
            $pass_confirm = md5(mysqli_real_escape_string($conection,$_POST['txtPassUser']));
            

           // $user = mysqli_real_escape_string($conection,$_POST['usuario']);
          //  $pass = md5(mysqli_real_escape_string($conection,$_POST['clave']));
         //echo $user;
         // echo $pass; exit;
            
        

                $query = mysqli_query($conection,"SELECT id_usu, pass_usu FROM usuarios WHERE id_usu =  AND pass_usu = '$pass_actual' ");
                $result = mysqli_num_rows($query);
                 

            if($result > 0)
            {
                if($pass_nueva == $pass_confirm){
                    $query_act = mysqli_query($conection,"UPDATE `usuarios` SET `pass_usu` = MD5('4321') WHERE `usuarios`.`id_usu` = 1");
                }
                
                $data = mysqli_fetch_array($query);
                
                $_SESSION['active'] = true;
                $_SESSION['emaUsuario'] = $data['cor_usu'];
                $_SESSION['nombre'] = $data['nom_usu'];
                $_SESSION['rol_Id'] = $data['rol_Id'];
                $_SESSION['rol_Nom'] = $data['rol_Nom'];

                header('location: sistema/');
            }else{
                $alert = 'El usuario o la clave son incorrectos'; 
                session_destroy();
                
            }
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
                            
                            <input type="hidden" name="id" id="id" value ="<?php echo $iduser ?>" readonly>
                            <div>
                                <input type="password" name="txtPassUser" id="txtPassUser" placeholder="Contraseña Actual" required>
                            </div>
                            <div>
                                <input class="newPass" type="password" name="txtNewPassUser" id="txtNewPassUser" placeholder="Nueva Contraseña" required>
                            </div>
                            <div>
                                <input class="newPass" type="password" name="txtPassConfirm" id="txtPassConfirm" placeholder="Confirmar Contraseña" required>
                            </div>
                            <div style="display:none;"></div>
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