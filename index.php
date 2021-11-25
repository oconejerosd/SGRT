<?php
    $alert = '';
    session_start();
    if(!empty($_SESSION['active']))
    {
        header('location: sistema/');
    }else{

    if(!empty($_POST))
        {
            if(empty($_POST['usuario']) || empty($_POST['clave']))
        {
            $alert = 'Ingrese su usuario o su clave'; 
        }else{

            require_once "conexion.php";

            $user = mysqli_real_escape_string($conection,$_POST['usuario']);
            $pass = md5(mysqli_real_escape_string($conection,$_POST['clave']));
         //echo $user;
         // echo $pass; exit;

          
            $query = mysqli_query($conection,"SELECT u.id_usu, u.nom_usu, u.cor_usu, u.pass_usu, r.rol_Id, r.rol_Nom 
                                              FROM `usuarios` u INNER JOIN rol r 
                                              ON u.rol_Id = r.rol_Id  
                                              WHERE u.cor_usu = '$user' AND u.pass_usu = '$pass'");

           

            $result = mysqli_num_rows($query);
           // echo $result;
          //  exit;
            if($result > 0)
            {
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
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>LOGIN | SGRT</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maxium-scale=1.0, minium-scale=1.0">
	<meta charset="utf-8">
    

</head>
<body>
	<section id="container">
        <form action ="" method="post">
            <h3>SGRT</h3>
            <img src="img/logocormun.png" class="rounded" height="150" alt="">
            <input type="text" name="usuario" placeholder="Usuario">
            <input type="password" name="clave" placeholder="Contraseña">
            <div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>
            <input type="submit" value="INGRESAR">
        </form>
    </section>
	
</body>

</html>