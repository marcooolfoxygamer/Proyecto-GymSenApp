<?php
    include ("../model/seguridad_admin.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de anuncios del sistema</title>
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
					<h1>Listado de anuncios del sistema</h1>
					<p class="sub-doub">En este espacio tiene acceso a la lista de anuncios que se muestran en nuestro sistema</p>
                    <p class="sub">Puede agregar o actualizar anuncios si así lo requiere...</p>
          <p class="sub-doub"><a href="../controller/c_anunc_pre_add.php" class="link-db" id="a-volverAsist">Agregar un nuevo anuncio</a></p>
				</div>
			</div>
			<div class="row">
				<div class="cont-r">
          <table id="lista">
            <thead>
              <tr>
                <th class="col admin_anunc_imagenes">Imagen</th>
                <th class="col">Identificación administrador creador</th>
                <th class="col">Titulo anuncio</th>
                <th class="col">Descripción anuncio</th>
                <th class="col admin_anunc_acciones" colspan="2">Acciones</th>
              </tr>
            </thead>
            <tbody>
              <?php
                  $sql="SELECT *
                  FROM anuncios
                  WHERE estado_anunc = 1
                  ORDER BY id_anunc DESC";

                  $query=$conexion->query($sql);

                  while($result=$query->fetch_assoc()){
                      $iid_anunc=stripslashes($result["id_anunc"]);
                      $ffk_id_admin_anunc=stripslashes($result["fk_id_admin_anunc"]);
                      $ttitulo_anunc=stripslashes($result["titulo_anunc"]);
                      $ddesc_anunc=stripslashes($result["desc_anunc"]);
                      $iimg_anunc=stripslashes($result["img_anunc"]);
              ?>
              <tr>
              <?php
                  echo "
                      <td class='tds'><img src='Imagenes/anuncios/$iimg_anunc' alt='' class='img_anunc_admin'></td>
                      <td class='tds'>$ffk_id_admin_anunc</td>
                      <td class='tds'>$ttitulo_anunc</td>
                      <td class='tds'>$ddesc_anunc</td>
                      <td class='tds'><a href='../controller/c_anunc_pre_edit.php?id=$iid_anunc'><button type='button' class='btn btn-update'>Editar</button></a></td>
                      <td class='tds'><button type='button' class='btn btn-delete' onclick='showConfirmBox()'>Eliminar</button></td>
                      
                      <div class='overlay' id='overlay' hidden>
                        <div class='confirm-box'>
                          <br>
                          <h2>Confirmación de decisión</h2>
                          <p>Está segur@ de que quiere eliminar el registro de asitencia?</p>
                          <br>
                          <button id='confirma' onclick='isConfirm(true,$iid_anunc)'>Si</button>
                          <button id='denega'onclick='isConfirm(false)''>No</button>
                        </div>
                      </div>

                      <script>
                        function showConfirmBox() {
                          document.getElementById('overlay').hidden = false;
                        }
                        function closeConfirmBox() {
                          document.getElementById('overlay').hidden = true;
                        }
                      
                        function isConfirm(answer,id) {
                          if (answer) {
                            location.href ='../controller/c_anunc_delete.php?id='+id;
                          }
                          closeConfirmBox();
                        }
                      </script>
                    ";
	            ?>
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