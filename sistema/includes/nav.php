<nav>
			<ul>
				<li><a href="index.php"><i class="fas fa-home"></i> Inicio</a></li>
				<?php
					if($_SESSION['rol_Nom'] == "Administrador"){
					?>
				<li class="principal">
					<a href="#"><i class="fas fa-users"></i> Funcionarios <span class="arrow"><i class="fas fa-angle-down"></i></span></a>
					<ul>
						<li><a href="registro_funcionarios.php"><i class="fas fa-user-plus"></i> Registros Funcionarios</a></li>
						<li><a href="lista_funcionarios.php"><i class="fas fa-users"></i> Lista de Funcionarios</a></li>
					</ul>
				</li>
				<?php } ?>
				<?php
					if($_SESSION['rol_Nom'] == "Administrador"){
					?>
				<li class="principal">
					<a href="#"><i class="fas fa-cogs"></i> Mantenedores <span class="arrow"><i class="fas fa-angle-down"></i></a>
					<ul>
						<li><a href="listado_categorias_equipos.php"><i class="fas fa-list"></i> Categoria Equipos</a></li>
						<li><a href="listado_marcas.php"><i class="fas fa-folder"></i> Marcas Equipos</a></li>
						<li><a href="listado_modelos.php"><i class="fas fa-folder-plus"></i> Modelos Equipos</a></li>
						<li><a href="listado_departamentos.php"><i class="fas fa-landmark"></i> Departamentos</a></li>	
					</ul>
				</li>
				<?php } ?>
				<?php
					if($_SESSION['rol_Nom'] == "Administrador" || $_SESSION['rol_Nom'] == "Tecnico"){
					?>
				<li class="principal">
					<a href="#"><i class="fas fa-cogs"></i> Registro Equipos <span class="arrow"><i class="fas fa-angle-down"></i></a>
					<ul>
						<li><a href="registro_computador.php"><i class="fas fa-desktop"></i> Computadores</a></li>
						<li><a href="listado_computadores.php"><i class="fas fa-desktop"></i> Listado Computadores</a></li>
						<li><a href="registro_notebook.php"><i class="fas fa-laptop"></i> Notebook</a></li>
						<li><a href="listado_notebooks.php"><i class="fas fa-laptop"></i> Listado Notebook</a></li>
						<li><a href="registro_impresoras.php"><i class="fas fa-print"></i> Impresoras</a></li>
						<li><a href="listado_impresoras.php"><i class="fas fa-print"></i> Listado Impresoras</a></li>
						<li><a href="registro_proyectores.php"><i class="fas fa-lightbulb"></i> Proyectores</a></li>
						<li><a href="listado_proyectores.php"><i class="fas fa-lightbulb"></i> Listado Proyectores</a></li>
						<!--<li><a href="listado_equipos.php"><i class="fas fa-chalkboard"></i> Listado Equipos</a></li>-->
						
					</ul>
				</li>
				<?php } ?>
				<?php
					if($_SESSION['rol_Nom'] == "Administrador" || $_SESSION['rol_Nom'] == "Tecnico"){
					?>
				<li class="principal">
					<a href="#"><i class="fas fa-signature"></i> Asignacion Equipos <span class="arrow"><i class="fas fa-angle-down"></i></a>
					<ul>
						<li><a href="notebook_disponibles.php"><i class="fas fa-laptop"></i> Notebooks Disponibles</a></li>
						<li><a href="notebook_asignados.php"><i class="fas fa-chalkboard"></i> Notebooks Asignados</a></li>
						
					</ul>
				</li>
				<?php } ?>
				<?php
					if($_SESSION['rol_Nom'] == "Administrador" || $_SESSION['rol_Nom'] == "Tecnico"){
					?>
				<li class="principal">
					<a href="#"><i class="fas fa-tools"></i> Mantencion <span class="arrow"><i class="fas fa-angle-down"></i></a>
					<ul>
						<li><a href="mantencion_computador.php"><i class="fas fa-desktop"></i> Equipos Escritorio</a></li>
						<li><a href="mantencion_notebook.php"><i class="fas fa-laptop"></i> Notebook</a></li>
						<li><a href="mantencion_impresora.php"><i class="fas fa-print"></i> Impresoras</a></li>
						<li><a href="mantencion_proyector.php"><i class="fas fa-lightbulb"></i> Proyectores</a></li>
					</ul>
				</li>
				<?php } ?>
				<?php
					if($_SESSION['rol_Nom'] == "Administrador"){
					?>
				<li class="principal">
					<a href="#"><i class="fas fa-clipboard-list"></i> Reportes <span class="arrow"><i class="fas fa-angle-down"></i></a>
					<ul>
						<li><a href="reportes.php"><i class="fas fa-file"></i> Panel Reportes</a></li>
						<li><a href="reporte_equipamiento_total.php"><i class="fas fa-chalkboard"></i> Reporte EQUIPAMIENTO</a></li>
						<li><a href="notebook_asignados_historico.php"><i class="fas fa-chalkboard"></i> Reporte HISTÓRICO ASIGNACION NOTEBOOK</a></li>
						<li><a href="listado_eq_mantencionp.php"><i class="fas fa-chalkboard"></i> Reporte MANTENCION PREVENTIVA</a></li>
						<li><a href="listado_eq_mantencionc.php"><i class="fas fa-chalkboard"></i> Reporte MANTENCION CORRECTIVA</a></li>
					</ul>
				</li>
				<?php } ?>
				
				<?php
					if($_SESSION['rol_Nom'] == "Administrador" || $_SESSION['rol_Nom'] == "Tecnico"){
					?>
				<li class="principal">
					<a href="#">Admin SGRT <span class="arrow"><i class="fas fa-angle-down"></i></a>
					<ul>
						
						<li><a href="listado_perfiles_sgrt.php">Perfiles SGRT </a></li>
						<li><a href="cambiar_contrasena.php">Cambiar mi Contraseña </a></li>
					</ul>
				</li>
				<?php } ?>
				<?php
					if($_SESSION['rol_Nom'] == "Funcionario"){
					?>
				<li class="principal">
					<a href="#">Mi Información</a>
					<ul>
						<li><a href="#">Asignaciones</a></li>
						
					</ul>
				</li>
				<?php } ?>
				<?php
					if($_SESSION['rol_Nom'] == "Consultor RRHH"){
					?>
				<li class="principal">
					<a href="#"><i class="fas fa-cogs"></i> Consulta RRHH <span class="arrow"><i class="fas fa-angle-down"></i></a>
					<ul>
					<li><a href="notebook_asignados_rrhh.php"><i class="fas fa-chalkboard"></i> Notebooks Asignados</a></li>	
					</ul>
				</li>
				<?php } ?>
			</ul>
		</nav>