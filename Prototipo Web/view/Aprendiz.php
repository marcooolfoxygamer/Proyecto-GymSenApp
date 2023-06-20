<?php
    include ("../model/seguridad_aprendiz.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenid@ Aprendiz</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="navbar">
        <img src="Imagenes/Logo_GsA-removebg-preview.png" class="logo">
        <ul>
            <li><a href="index.html">Inicio</a></li>
            <li><a href="Anuncios.html">Anuncios</a></li>
            <li><a href="Recomendaciones.html">Recomendaciones</a></li>
            <li><a href="Registro.php">Registrarse</a></li>
            <li><a href="Inicio_Sesion.html">Iniciar sesión</a></li>
			<li id="liFinLinea"><a href="../model/salir.php">Cerrar Sesion</a></li>
        </ul>
    </div>
    
    <section id="Apre_Inst">
		<div class="container">
			<div class="row row-pb-md">
				<div class="col-md-8 heading">
					<h1>Bienvenid@ a tu cuenta aprendiz</h1>
					<p class="subtle-text">Bienvenid@</p>
				</div>
			</div>
			<div class="row team-item gtco-team-reverse">
				<div class="col-md-6 col-md-push-7">
					<div class="img-shadow">
						<img src="Imagenes/Aprendiz.jpg" class="img-responsive" alt="Free HTML5 Bootstrap Template by FreeHTML5.co">
					</div>
				</div>
				<div class="col-md-6 col-md-pull-6">
					<h2 class="heading-colored rowText rowTextH2">Mis actividades</h2>
        			<p class="rowText">Aquí puedes acceder a tus actividades dentro del sistema, selecciona el hipervinculo ubicado aquí debajo.</p>
					<a href="Aprendiz-Act.php" class="rowText link-ini-ses">Acceder a mis actividades</a>
				</div>
			</div>
			<p style="margin-bottom: 100px;"></p>
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