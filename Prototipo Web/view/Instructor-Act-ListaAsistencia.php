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
                    <table id="lista_asistencia">
                      <thead>
                        <tr>
                          <th scope="col">Identificación instructor</th>
                          <th scope="col">Identificación aprendiz</th>
                          <th scope="col">P.nombre aprendiz</th>
                          <th scope="col">S.nombre aprendiz</th>
                          <th scope="col">P.apellido aprendiz</th>
                          <th scope="col">S.apellido aprendiz</th>
                          <th scope="col">Correo aprendiz</th>
                          <th scope="col">Fecha asistencia</th>
                          <th scope="col" colspan="2">Acciones</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                            $sql="SELECT id_instruc_asis, fk_id_aprend_asis, nom1_user, nom2_user, ape1_user, ape2_user, correo_sena_user, fecha_asis
                            FROM asistencia
                            INNER JOIN usuarios
                            ON fk_id_aprend_asis=id_user";

                            $query=$conexion->query($sql);

                            while($result=$query->fetch_assoc()){
                                $iid_instructor=stripslashes($result["id_instruc_asis"]);
                                $iid_aprendiz=stripslashes($result["fk_id_aprend_asis"]);
                                $nnom1_aprendiz=stripslashes($result["nom1_user"]);
                                $nnom2_aprendiz=stripslashes($result["nom2_user"]);
                                $aape1_aprendiz=stripslashes($result["ape1_user"]);
                                $aape2_aprendiz=stripslashes($result["ape2_user"]);
                                $ccorreo_aprendiz=stripslashes($result["correo_sena_user"]);
                                $ffecha_asis=stripslashes($result["fecha_asis"]);
                        ?>
                        <tr>
                        <?php
                            echo "
                                <td>$iid_instructor</td>
                                <td>$iid_aprendiz</td>
                                <td>$nnom1_aprendiz</td>
                                <td>$nnom2_aprendiz</td>
                                <td>$aape1_aprendiz</td>
                                <td>$aape2_aprendiz</td>
                                <td>$ccorreo_aprendiz</td>
                                <td>$ffecha_asis</td>
                                ";
	                	?>
                            <td><button type="button" class="btn btn-warning" style="font-size: 12px;">Editar</button></td>
                            <td><button type="button" class="btn btn-danger" style="font-size: 12px;">Eliminar</button></td>
                        </tr>
                        <?php
                            }
                        ?>
                      </tbody>
                    </table>
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