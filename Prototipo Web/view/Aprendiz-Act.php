<?php
    include ("../model/seguridad_aprendiz.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Planificador</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php
		include("../model/conexion.php");
	?>
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
    
    <section id="Planificador">
		<div class="container">
			<div class="row row-pb-md">
				<div class="col-md-8 heading">
					<h1>Planificador de ejercicios</h1>
					<p class="sub-doub">En este espacio, el sistema te mostrará los ejercicios y máquinas de nuestro gimnasio que puedes usar para trabajar en los músculos que desees entrenar.</p>
					<p class="sub">Te invitamos a que en la parte inferior selecciones los músculos que te gustaría fortalecer, para que el sistema te muestre qué ejercicios y máquinas puedes usar para cumplir con ese objetivo.</p>
					<p class="subtle-text">Planificador</p>
				</div>
			</div>
			<div class="row">
				<div class="cont-r">
					<form action="" method="POST">
						<div class="form-group">
                            <label for="selMusculo" id="sr-only"></label>
                            <select name="selector_musculos" class="form-control op" placeholder="Seleccione el músculo que desea entrenar" id="selMusculo" required>
                                <option value="" selected="selected" disabled="disabled">Aquí seleccione el músculo que desea entrenar</option>
                                <?php
									$sql="SELECT * FROM musculos";
									$query=$conexion->query($sql);

									while($result=$query->fetch_assoc()){
										$mmusculo=stripslashes($result["musculo"]);

										echo"<option value='$mmusculo'>$mmusculo</option>";
									}
								?>
                            </select>
						</div>
						<div class="form-group" style="margin-top: 3%;">
							<input type="submit" value="Buscar" class="Subm" id="submit-musc" name="submit-musc" style="display: block;margin: 0 auto;">
						</div>
					</form>
				</div>
			</div>
            <?php 

                if (isset($_POST["submit-musc"])){

                    $selector_musculos=$_POST["selector_musculos"];
                    $id=$_SESSION["id"];

                    include("../model/m_planificador.php");
                    $user= new usuario();
                    $user->registrar_rutina($selector_musculos,$id);

                    echo"
                        <div id='h_text_musc'><p id='texto_musc_ejerc'>Ejercicios para entrenar $selector_musculos</p></div>
                        <div id='cont_Ejercicios'>
                    ";
                    $sql="SELECT pkfk_musculo, pkfk_ejercicio, imagen_ejerc
                            FROM musculos_ejercicios
                            INNER JOIN ejercicios
                            ON pkfk_ejercicio=ejercicio
                            WHERE pkfk_musculo = '$selector_musculos'";
					$query=$conexion->query($sql);

					while($result=$query->fetch_assoc()){
						$eejercicio=stripslashes($result["pkfk_ejercicio"]);
                        $iimgejercicio=stripslashes($result["imagen_ejerc"]);
				    
                        echo "
                            <article class='ejercicio'>
                                <div class='image-wrap'>
                                    <img src='Imagenes/ejercicios/$iimgejercicio' alt='imagen ejercicio'>    
                                </div>
                                <div class='ejercicio-info'>
                                    <p class='ej-inf-p1'>$eejercicio</p>
                        ";
                        if($eejercicio=="Leg-press"){
                            echo "<p class='ej-inf-p2'>Sentado en el la silla de la prensa, con los pies planos en la plataforma y los hombros separados, 
                                suelta el seguro manual y baja lentamente la carga llevando las rodillas hacia el pecho. Cuando las rodillas estén en un ángulo de 90°,
                                haz una pausa y luego sube lentamente el peso. Para proteger las rodillas, detén el movimiento justo antes de que las piernas
                                estén completamente extendidas. Durante el movimiento, no levantes los glúteos de la silla.
                                </p>";
                        }
                        if($eejercicio=="Extension de pierna"){
                            echo "<p class='ej-inf-p2'>Ajusta la máquina de extensión de piernas de manera que cuando te sientes, tus rodillas estén al borde de la silla y tus tobillos estén debajo del reposapiés.
                                    Siéntate con la espalda bien apoyada en el respaldo, sosteniendo los objetos que se encuentran a los lados de la silla con sus manos.
                                    Luego, extiende las piernas hasta que estén completamente extendidas. Aguanta la carga un momento contrayendo los cuádriceps, y luego vuelve a la posición baja.
                                </p>";
                        }
                        if($eejercicio=="Copa triceps"){
                            echo "<p class='ej-inf-p2'>Sentado en una silla, con la espalda recta, agarrando una mancuerna con ambas manos, las palmas de las manos en el interior de un disco,
                                coloca la mancuerna sobre la cabeza, con los brazos extendidos y los tríceps bien contraídos. Baja los antebrazos por detrás de la cabeza hasta que los codos formen un ángulo de 90°. 
                                Luego extiende los antebrazos, volviendo a la posición inicial.
                                </p>";
                        }
                        if($eejercicio=="Rompecraneos"){
                            echo "<p class='ej-inf-p2'>Acostad@ en la silla, con los pies en el suelo o en el la silla, sostenga la barra sobre su pecho, agarre en posición de pronación,
                                las manos ligeramente más cerradas que el ancho de los hombros. Posteriormente, flexione lentamente los antebrazos sin separar demasiado los codos,
                                llevando la barra a la parte superior de la cabeza. Luego vuelva a la posición inicial y repita el proceso.
                                </p>";
                        }
                        if($eejercicio=="Curl con mancuernas"){
                            echo "<p class='ej-inf-p2'>De pie, con las rodillas ligeramente dobladas y la espalda recta. Sujeta una mancuerna en cada mano, en un agarre neutral a lo largo del cuerpo.
                            Sin mover el pecho, eleva la mancuerna doblando los antebrazos. Mantén tu mano en un agarre neutral.
                            Contrae los bíceps, y luego vuelve lentamente a la posición inicial. Mantén el codo cerca del cuerpo durante el movimiento.
                            Alterne el movimiento realizándolo con un brazo y luego con el oro.
                            </p>";
                        }
                        if($eejercicio=="Dominadas"){
                            echo "<p class='ej-inf-p2'>Agarra la barra con un agarre en pronación, con la cabeza ligeramente levantada, las manos separadas a una distancia superior a la de los hombros y los codos ligeramente doblados.
                                Realiza un movimiento de elevación llevando la barbilla hacia la barra. Luego vuelve lentamente a la posición inicial.
                                </p>";
                        }
                        if($eejercicio=="Puente isometrico"){
                            echo "<p class='ej-inf-p2'>Acuéstese boca arriba sobre la colchoneta. Doble las rodillas y lleve los pies hacia usted, déjelos de forma plana en el suelo. Extienda los brazos a los costados con las palmas hacia abajo.
                                Luego, apoyándose con los talones, levante las caderas del suelo hasta que las rodillas, las caderas y los hombros formen una línea recta. Apriete sus glúteos y mantenga su núcleo reforzado. Haga una pausa y luego baje las caderas a la posición inicial.
                                </p>";
                        }
                        if($eejercicio=="Curl nordico"){
                            echo "<p class='ej-inf-p2'>Acuéstese boca abajo en la máquina de 'curl de piernas tumbado o acostado' con la parte trasera de los tobillos presionando el reposapiés. Agarra los reposamanos.
                                Posteriormente, apoyado firmemente en la silla, flexiona las piernas lo máximo posible. Mantén la carga por un momento en la posición alta contrayendo los músculos isquiotibiales, luego vuelve lentamente a la posición inicial.
                                </p>";
                        }
                        if($eejercicio=="Jalon al pecho"){
                            echo "<p class='ej-inf-p2'>Sentado, muslos bajo las partes acolchadas, barra agarrada en supinación, manos separadas a la anchura de los hombros. Manteniendo la espalda recta.
                                Tira de la barra hasta la parte superior del pecho. Mantenga la contracción por un momento, los hombros bien atrás antes de volver lentamente a la posición inicial.
                                </p>";
                        }
                        if($eejercicio=="Remo brazo"){
                            echo "<p class='ej-inf-p2'>Coloca tu rodilla izquierda y tu mano izquierda en una silla, con el pecho paralelo al suelo. Mantén el pie derecho en el suelo y agarra la mancuerna con la mano derecha. Manteniéndola cerca de tu cuerpo, levanta la parte superior de tu brazo derecho hasta que esté paralelo al suelo.
                                Realiza una extensión del brazo derecho. Cuando esté completamente extendido, contrae tu tríceps por un momento antes de volver a la posición inicial. Una vez que hayas completado tu serie, haz lo mismo con el otro brazo.
                                </p>";
                        }
                        echo "
                                </div>
                            </article>
                        ";
                    }

                
                }
            ?>
                </article>
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