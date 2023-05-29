<?php

require_once 'asistencia_model.php';

class AsistenciaController {
    public function guardarAsistencia() {
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $idInstructor = $_POST['id_Instructor'];
            $idAprendiz = $_POST['id_Aprendiz'];
            $nom1Aprendiz = $_POST['nom1_Aprendiz'];
            $nom2Aprendiz = $_POST['nom2_Aprendiz'];
            $ape1Aprendiz = $_POST['ape1_Aprendiz'];
            $ape2Aprendiz = $_POST['ape2_Aprendiz'];
            $correoSenaAprendiz = $_POST['correo_Sena_Aprendiz'];
            $fecha = $_POST['fecha'];

            $asistenciaModel = new AsistenciaModel();

            if ($asistenciaModel->guardarAsistencia($idInstructor, $idAprendiz, $nom1Aprendiz, $nom2Aprendiz, $ape1Aprendiz, $ape2Aprendiz, $correoSenaAprendiz, $fecha)) {
                echo "La asistencia se guardó correctamente.";
            } else {
                echo "Error al guardar la asistencia. Por favor, inténtalo de nuevo.";
            }
        }
    }
}

$asistenciaController = new AsistenciaController();
$asistenciaController->guardarAsistencia();
?>
