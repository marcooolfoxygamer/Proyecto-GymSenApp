<?php
    include ("../model/seguridad_anuncios.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edición de anuncio</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
	<?php
		include("../model/conexion.php");
		$id_anunc=$_GET['id'];
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
    
    <section id="Admin_anuncios_edit">
		<div class="container">
			<div class="row row-pb-md">
				<div class="col-md-8 heading">
					<h1>Edición</h1>
					<p class="sub">Edite los datos del anuncio con un par de teclas y clicks</p>
					<p class="subtle-text">Editar</p>
				</div>
			</div>
			<div class="row">
				<div>
					<form action="../controller/c_anunc_edit.php" method="POST" enctype="multipart/form-data">
					<?php
						$sql="SELECT *
							  FROM anuncios
							  WHERE id_anunc=$id_anunc";

						$query=$conexion->query($sql);

						while($result=$query->fetch_assoc()){
							$iid_anunc=stripslashes($result["id_anunc"]);
							$ffk_id_admin_anunc=stripslashes($result["fk_id_admin_anunc"]);
							$ttitulo_anunc=stripslashes($result["titulo_anunc"]);
							$ddesc_anunc=stripslashes($result["desc_anunc"]);
							$iimg_anunc=stripslashes($result["img_anunc"]);
							
					?>
						<div class="form-group">
							<label for="img_anunc" class="sr-only">Imagen del anuncio</label>
							<?php
    							echo "<input type='file' class='form-control' placeholder='Imagen del anuncio' id='img_anunc' name='img_anunc'>";
							?>
						</div>
						<div class="form-group">
							<label for="titulo_anunc" class="sr-only">Título del anuncio</label>
							<?php
    							echo "<input type='text' class='form-control' placeholder='Título del anuncio' id='titulo_anunc' name='titulo_anunc' value='$ttitulo_anunc' required>";
							?>
						</div>
						<div class="form-group">
							<label for="desc_anunc" class="sr-only">Descripción del anuncio</label>
							<?php
    							echo "<textarea class='form-control' placeholder='Descripción del anuncio' id='desc_anunc' name='desc_anunc'>$ddesc_anunc</textarea>";
							?>
						</div>
							<?php
    							echo "<input type='hidden' name='id_anunc' value='$iid_anunc'>";
								echo "<input type='hidden' name='fk_id_admin_anunc' value='$ffk_id_admin_anunc'>";
								echo "<input type='hidden' name='iimg_anunc' value='$iimg_anunc'>";
							?>
						<div class="form-group" style="margin-top: 3%;">
							<input type="submit" value="Actualizar registro" class="Subm" id="submit-ed">
						</div>
						<?php
   							}
						?>
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