<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anuncios</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
	<?php
		include("../model/conexion.php");
	?>
    <div class="navbar">
		<img src="Imagenes/Logo_GsA-removebg-preview.png" class="logo">
        <ul>
            <li><a href="index.html">Inicio</a></li>
            <li><a href="Anuncios.php">Anuncios</a></li>
            <li><a href="Recomendaciones.html">Recomendaciones</a></li>
            <li><a href="Registro.php">Registrarse</a></li>
            <li id="liFinLinea"><a href="Inicio_Sesion.html">Iniciar sesión</a></li>
        </ul>
    </div>
    
    <section id="Anuncios">
		<div class="container">
			<div class="row row-pb-md">
				<div class="col-md-8 heading">
					<h1>Anuncios</h1>
					<p class="sub">En la parte inferior encontrará anuncios importantes que el gimnasio tiene para usted.</p>
					<p class="subtle-text">Anuncios</p>
				</div>
			</div>
			<?php
				$sql="SELECT * FROM anuncios WHERE estado_anunc=1";
				$query=$conexion->query($sql);

				while($result=$query->fetch_assoc()){
					$iid_anunc=stripslashes($result["id_anunc"]);
					$ffk_id_admin_anunc=stripslashes($result["fk_id_admin_anunc"]);
					$ttitulo_anunc=stripslashes($result["titulo_anunc"]);
					$ddesc_anunc=stripslashes($result["desc_anunc"]);
					$iimg_anunc=stripslashes($result["img_anunc"]);
			?>
			<div class="row team-item gtco-team">
				<div class="col-md-6">
					<div class="cont_img_anunc">
						<div class="img-shadow_anunc">
						<?php
							echo"
								<img src='Imagenes/anuncios/$iimg_anunc' class='img-responsive_anunc'>
								";
						?>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<?php
						echo"
							<h2 class='heading-colored rowText rowTextH2'>$ttitulo_anunc</h2>
        					<p class='rowText'>$ddesc_anunc</p>
							";
					?>
				</div>
			</div>
			<p style="margin-bottom: 100px;"></p>
			<?php
				}
			?>
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