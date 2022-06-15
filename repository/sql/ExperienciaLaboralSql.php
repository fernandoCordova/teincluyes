<?php
class ExperienciaLaboralSql
{
    public function agregarExperienciaLaboral($experienciaLaboral, $conexion)
    {
        $cargo = $experienciaLaboral->getCargo();
        $nombreEmpresa = $experienciaLaboral->getNombreEmpresa();
        $fechaIncio = $experienciaLaboral->getFechaIncio();
        $fechaTermino = $experienciaLaboral->getFechaTermino();
        $continuidad = $experienciaLaboral->getContinuidad();
        $descripcion = $experienciaLaboral->getDescripcion();
        $tipoTrabajo_idtipoTrabajo = $experienciaLaboral->getTipoTrabajo_idtipoTrabajo();
        $jerarquiaEmpresa_idjerarquiaEmpresa = $experienciaLaboral->getJerarquiaEmpresa_idjerarquiaEmpresa();
        $actividadEmpresa_idactividadEmpresa = $experienciaLaboral->getActividadEmpresa_idactividadEmpresa();
        $curriculum_idcurriculum = $experienciaLaboral->getCurriculum_idcurriculum();
        $sql = $conexion->prepare('INSERT INTO experiencialaboral (cargo, nombreEmpresa, fechaInicio, fechaTermino, continuidad, descripcion, tipoTrabajo_idtipoTrabajo, jerarquiaEmpresa_idjerarquiaEmpresa, actividadEmpresa_idactividadEmpresa,curriculum_idcurriculum) 
        VALUES (:cargo, :nombreEmpresa, :fechaInicio, :fechaTermino, :continuidad, :descripcion, :tipoTrabajo_idtipoTrabajo, :jerarquiaEmpresa_idjerarquiaEmpresa, :actividadEmpresa_idactividadEmpresa,:curriculum_idcurriculum)');
        $sql->bindParam(':cargo', $cargo);
        $sql->bindParam(':nombreEmpresa', $nombreEmpresa);
        $sql->bindParam(':fechaInicio', $fechaIncio);
        $sql->bindParam(':fechaTermino', $fechaTermino);
        $sql->bindParam(':continuidad', $continuidad);
        $sql->bindParam(':descripcion', $descripcion);
        $sql->bindParam(':tipoTrabajo_idtipoTrabajo', $tipoTrabajo_idtipoTrabajo);
        $sql->bindParam(':jerarquiaEmpresa_idjerarquiaEmpresa', $jerarquiaEmpresa_idjerarquiaEmpresa);
        $sql->bindParam(':actividadEmpresa_idactividadEmpresa', $actividadEmpresa_idactividadEmpresa);
        $sql->bindParam(':curriculum_idcurriculum', $curriculum_idcurriculum);
        if ($sql->execute()) {
            return 1;
        } else {
            return 0;
        }
    }

    public function editarExperienciaLaboral($experienciaLaboral, $idexperiencialaboral, $conexion)
    {
        $cargo = $experienciaLaboral->getCargo();
        $nombreEmpresa = $experienciaLaboral->getNombreEmpresa();
        $fechaIncio = $experienciaLaboral->getFechaIncio();
        $fechaTermino = $experienciaLaboral->getFechaTermino();
        $continuidad = $experienciaLaboral->getContinuidad();
        $descripcion = $experienciaLaboral->getDescripcion();
        $tipoTrabajo_idtipoTrabajo = $experienciaLaboral->getTipoTrabajo_idtipoTrabajo();
        $jerarquiaEmpresa_idjerarquiaEmpresa = $experienciaLaboral->getJerarquiaEmpresa_idjerarquiaEmpresa();
        $actividadEmpresa_idactividadEmpresa = $experienciaLaboral->getActividadEmpresa_idactividadEmpresa();
        $curriculum_idcurriculum = $experienciaLaboral->getCurriculum_idcurriculum();
        $sql = $conexion->prepare('UPDATE experiencialaboral SET cargo = :cargo, nombreEmpresa = :nombreEmpresa, fechaInicio = :fechaInicio, fechaTermino = :fechaTermino, continuidad = :continuidad, descripcion = :descripcion, tipoTrabajo_idtipoTrabajo = :tipoTrabajo_idtipoTrabajo, jerarquiaEmpresa_idjerarquiaEmpresa = :jerarquiaEmpresa_idjerarquiaEmpresa, actividadEmpresa_idactividadEmpresa = :actividadEmpresa_idactividadEmpresa, curriculum_idcurriculum = :curriculum_idcurriculum WHERE idExperienciaLaboral = :idExperienciaLaboral');
        $sql->bindParam(':cargo', $cargo);
        $sql->bindParam(':nombreEmpresa', $nombreEmpresa);
        $sql->bindParam(':fechaInicio', $fechaIncio);
        $sql->bindParam(':fechaTermino', $fechaTermino);
        $sql->bindParam(':continuidad', $continuidad);
        $sql->bindParam(':descripcion', $descripcion);
        $sql->bindParam(':tipoTrabajo_idtipoTrabajo', $tipoTrabajo_idtipoTrabajo);
        $sql->bindParam(':jerarquiaEmpresa_idjerarquiaEmpresa', $jerarquiaEmpresa_idjerarquiaEmpresa);
        $sql->bindParam(':actividadEmpresa_idactividadEmpresa', $actividadEmpresa_idactividadEmpresa);
        $sql->bindParam(':curriculum_idcurriculum', $curriculum_idcurriculum);
        $sql->bindParam(':idExperienciaLaboral', $idexperiencialaboral);
        if ($sql->execute()) {
            return 1;
        } else {
            return 0;
        }
    }

    public function eliminarExperienciaLaboral($idexperiencialaboral, $conexion)
    {
        $sql = $conexion->prepare('DELETE FROM experiencialaboral WHERE idExperienciaLaboral = :idExperienciaLaboral');
        $sql->bindParam(':idExperienciaLaboral', $idexperiencialaboral);
        if ($sql->execute()) {
            return 1;
        } else {
            return 0;
        }
    }

    public function obtenerExperienciaLaboral($idexperiencialaboral, $conexion)
    {
        $sql = $conexion->prepare('SELECT * FROM experiencialaboral
        INNER JOIN tipotrabajo
        ON experiencialaboral.tipoTrabajo_idtipoTrabajo = tipotrabajo.idtipoTrabajo
        INNER JOIN actividadempresa
        ON experiencialaboral.actividadEmpresa_idactividadEmpresa = actividadempresa.idactividadEmpresa
        INNER JOIN jerarquiaempresa
        ON experiencialaboral.jerarquiaEmpresa_idjerarquiaEmpresa = jerarquiaempresa.idjerarquiaEmpresa
        WHERE experiencialaboral.idexperienciaLaboral = :idExperienciaLaboral');
        $sql->bindParam(':idExperienciaLaboral', $idexperiencialaboral['idExperienciaLaboral']);
        $sql->execute();
        $resultado = $sql->fetch(PDO::FETCH_ASSOC);
        return $resultado;
    }
}
