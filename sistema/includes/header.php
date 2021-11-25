<?php

if(empty($_SESSION['active']))
{
    header('location: ../');
}

?>

<header>
		<div class="header">
			<a href="#" class="btnMenu"><i class="fas fa-bars"></i></a>
			<h1>SGRT - CORMUN</h1>
			<div class="optionsBar">
				<p><br><?php echo fechaC(); ?></p>
				<span>|</span>
				<span class="user"><?php echo $_SESSION['nombre'].' | '.$_SESSION['rol_Nom']; ?></span>
				<img class="photouser" src="img/user.png" alt="Usuario">
				<a href="salir.php"><img class="close" src="img/salir.png" alt="Salir del sistema" title="Salir"></a>
			</div>
		</div>
		<?php
            include "nav.php";
        ?>
	</header>