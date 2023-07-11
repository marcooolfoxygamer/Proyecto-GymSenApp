<?php
    include ("../model/seguridad_anuncios.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creación de anuncio</title>
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
            <li><a href="Administrador.php">Mis actividades</a></li>
            <li id="liFinLinea"><a href="../model/salir.php">Cerrar Sesion</a></li>
        </ul>
    </div>
    
    <section id="Admin_anuncios">
		<div class="container">
			<div class="row row-pb-md">
				<div class="col-md-8 heading">
					<h1>Creación de anuncio</h1>
					<p class="sub-doub">En este espacio, el sistema le permitirá crear un nuevo anuncio.</p>
					<p class="sub">Le invitamos a que en la parte inferior seleccione la imagen que tendrá el anuncio, luego escriba el título y por último la descripción del anuncio.</p>
					<p class="subtle-text">Creación anuncio</p>
				</div>
			</div>
			<div class="row">
				<div class="cont-r">
					<form action="../controller/c_anunc_add.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
							<label for="img_anunc" class="sr-only">Imagen del anuncio</label>
                            <input type="file" class="form-control" placeholder="Imagen del anuncio" id="img_anunc" name="img_anunc" required>
						</div>
                        <div class="form-group">
							<label for="titulo_anunc" class="sr-only">Título del anuncio</label>
							<input type="text" class="form-control" placeholder="Título del anuncio" id="titulo_anunc" name="titulo_anunc" required>
						</div>
						<div class="form-group">
							<label for="desc_anunc" class="sr-only">Descripción del anuncio</label>
							<textarea class="form-control" placeholder="Descripción del anuncio" id="desc_anunc" name="desc_anunc"></textarea>
						</div>
						<div class="form-group" style="margin-top: 3%;">
							<input type="submit" value="Añadir" class="Subm" id="submit-anunc_add" name="submit-anunc_add" style="display: block;margin: 0 auto;">
						</div>
					</form>
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