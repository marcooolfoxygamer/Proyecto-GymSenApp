<?php
    include ("../model/seguridad_instructor.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asistencia</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="navbar">
        <img src="Imagenes/LogoSena.png" class="logo">
        <ul>
            <li><a href="index.html">Inicio</a></li>
            <li><a href="Anuncios.html">Anuncios</a></li>
            <li><a href="Recomendaciones.html">Recomendaciones</a></li>
            <li><a href="Registro.php">Registrarse</a></li>
            <li><a href="Inicio_Sesion.html">Iniciar sesión</a></li>
			<li id="liFinLinea"><a href="../model/salir.php">Cerrar Sesion</a></li>
        </ul>
    </div>
    
    <section id="Asistencia">
		<div class="container">
			<div class="row row-pb-md">
				<div class="col-md-8 heading">
					<h1>Listado de asistencia</h1>
					<p class="sub-doub">En este espacio tienes completo acceso a la lista de de aprendices que han desarrollado actividades en el gimnasio</p>
                    <p class="sub">Puedes actualizar información si así lo requieres...</p>
					<!-- <p class="subtle-text">Asistencia</p> -->
				</div>
			</div>
			<div class="row">
				<div class="cont-r">
                    <?php
                        include("Instructor-Act-ListaVista.php");
                    ?>
				</div>
			</div>
		</div>
	</section>

	<footer id="footer">
		<div class="container">
			<div class="row copyright">
				<div class="col-md-12">
					<p class="pull-left">
						<small class="block" style="padding-bottom: 8px;">&copy; 2016 Free HTML5. All Rights Reserved.</small> 
						<small class="block">Designed by <a href="http://freehtml5.co/" target="_blank" style="color: #65a124;">FreeHTML5.co</a> Demo Images: <a href="http://unsplash.com/" target="_blank" style="color: #65a124;">Unsplash</a></small>
					</p>
				</div>
			</div>
		</div>
	</footer>
</body>
</html>