<?php
class AsistenciaModel {
    private $db;

    public function __construct() {
        $this->db = new mysqli('localhost', 'root', '', 'bd_gymsenapp');
        if ($this->db->connect_errno) {
            die('Error en la conexión a la base de datos: ' . $this->db->connect_error);
        }
    }

    public function guardarAsistencia($idInstructor, $idAprendiz, $nom1Aprendiz, $nom2Aprendiz, $ape1Aprendiz, $ape2Aprendiz, $correoSenaAprendiz, $fecha) {
        $stmt = $this->db->prepare("INSERT INTO asistencia (fk_id_instruc, id_aprend_asis, nom1_aprend_asis, nom2_aprend_asis, ape1_aprend_asis, ape2_aprend_asis, correo_sena_aprend_asis, fecha_asis) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("iissssss", $idInstructor, $idAprendiz, $nom1Aprendiz, $nom2Aprendiz, $ape1Aprendiz, $ape2Aprendiz, $correoSenaAprendiz, $fecha);
        if ($stmt->execute()) {
            $stmt->close();
            return true;
        } else {
            $stmt->close();
            return false;
        }
    }

}
?>
