<?php
class HabilidadSql
{
    public function agregarHabilidad($habilidad, $conexion)
    {
        $sql = $conexion->prepare('INSERT INTO `habilidad`(`nombreHabilidad`) VALUES (:nombreHabilidad)');
        $sql->bindParam(':nombreHabilidad', $habilidad);
        if ($sql->execute()) {
            return 1;
        } else {
            return 0;
        }
    }

    public function obtenerIdHabilidad($habilidad, $conexion)
    {
        $sql = $conexion->prepare('SELECT idhabilidad FROM habilidad WHERE nombreHabilidad = :nombreHabilidad');
        $sql->bindParam(':nombreHabilidad', $habilidad);
        $sql->execute();
        $resultado = $sql->fetch(PDO::FETCH_ASSOC);
        return $resultado;
    }

    public function insertarHabilidadUsuario($idhabilidad,$idcurriculum,$conexion)
    {
        $sql = $conexion->prepare('INSERT INTO `habilidadusuario`(`habilidad_idhabilidad`, `curriculum_idcurriculum`) VALUES (:idhabilidad,:idcurriculum)');
        $sql->bindParam(':idhabilidad', $idhabilidad);
        $sql->bindParam(':idcurriculum', $idcurriculum);
        if ($sql->execute()) {
            return 1;
        } else {
            return 0;
        }
    }

    public function eliminarHabilidad($idhabilidad,$conexion)
    {
        $sql = $conexion->prepare('DELETE FROM `habilidad` WHERE idhabilidad = :idhabilidad');
        $sql->bindParam(':idhabilidad', $idhabilidad);
        if ($sql->execute()) {
            return 1;
        } else {
            return 0;
        }
    }

    public function eliminarHabilidadUsuario($idhabilidad,$idcurriculum,$conexion)
    {
        $sql = $conexion->prepare('DELETE FROM `habilidadusuario` WHERE habilidad_idhabilidad = :idhabilidad AND curriculum_idcurriculum = :idcurriculum');
        $sql->bindParam(':idhabilidad', $idhabilidad);
        $sql->bindParam(':idcurriculum', $idcurriculum);
        if ($sql->execute()) {
            return 1;
        } else {
            return 0;
        }
    }
}
