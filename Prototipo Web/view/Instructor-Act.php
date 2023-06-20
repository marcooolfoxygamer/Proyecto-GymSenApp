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
    
    <section id="Asistencia">
		<div class="container">
			<div class="row row-pb-md">
				<div class="col-md-8 heading">
					<h1>Toma de asistencia</h1>
					<p class="sub-doub">En este espacio, podrás tomar la asistencia al gimnasio por parte de los aprendices.</p>
					<p class="sub-doub">Te invitamos a que llenes con ayuda de cada aprendiz el siguiente formulario, en el que se deberán registrar ciertos datos para quedar cada aprendiz registrado como asistente.</p>
                    <p class="sub">Además, más abajo, tendrás un link con el que podrás acceder a los datos de asistencia de los aprendices.</p>
					<p class="subtle-text">Asistencia</p>
				</div>
			</div>
			<div class="row">
				<div class="cont-r">
					<form action="../controller/c_asis_registro.php" method="POST">
                        <div id="cont_items_asist">
                            <div class="items_asist">
                                <div class="titulo-asist">
                                    <p>Identificación del Instructor</p>
                                </div>
                                <div class="caja_input">
                                    <label for="id_Instructor" class="lab_sesinic"></label>
                                    <input type="number" class="formul_sesinic" id="id_Instructor" name="id_Instructor" required>
                                </div>
                            </div>
                            <div class="items_asist">
                                <div class="titulo-asist">
                                    <p>Identificación del Aprendiz</p>
                                </div>
                                <div class="caja_input">
                                    <label for="id_Aprendiz" class="lab_sesinic"></label>
                                    <input type="number" class="formul_sesinic" id="id_Aprendiz" name="id_Aprendiz" required>
                                </div>
                            </div>
                            <div class="items_asist">
                                <div class="titulo-asist">
                                    <p>Fecha</p>
                                </div>
                                <div class="caja_input">
                                    <label for="fecha" class="lab_sesinic"></label>
                                    <input type="date" class="formul_sesinic" id="fecha" name="fecha" required>
                                </div>
                            </div>
                        </div>
						<div class="form-group" style="margin-top: 3%;">
							<input type="submit" value="Guardar" class="Subm" id="submit-ed">
						</div>
					</form>
				</div>
                <div class="link_asist_db">
                    <a href="Instructor-Act-ListaAsistencia.php" class="link-db">Acceder a la base de datos de asistencia de aprendices</a>
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