<?php
class FormacionAcademicaSql
{
    public function agregarFormacionProfesional($formacionProfesional, $conexion)
    {
        $carrera = $formacionProfesional->getCarrera();
        $mencion = $formacionProfesional->getMencion();
        $modalidad = $formacionProfesional->getModalidad();
        $situacion = $formacionProfesional->getSituacion();
        $fechaInicio = $formacionProfesional->getFechaInicio();
        $fechaTermino = $formacionProfesional->getFechaTermino();
        $institucion = $formacionProfesional->getInstitucion();
        $pais = $formacionProfesional->getPais_idpais();
        $sede = $formacionProfesional->getRegion_idregion();
        $nivelEstudio = $formacionProfesional->getNivelEstudio_idnivelEstudio();
        $curriculum = $formacionProfesional->getCurriculum_idcurriculum();
        $sql = $conexion->prepare('INSERT INTO formacionacademica (carrera, mencion, modalidad, situacion, fechaInicio, fechaTermino, institucion, pais_idpais, region_idregion, nivelEstudio_idnivelEstudio, curriculum_idcurriculum) VALUES (:carrera, :mencion, :modalidad, :situacion, :fechaInicio, :fechaTermino, :institucion, :pais, :sede, :nivelEstudio, :curriculum)');
        $sql->bindParam(':carrera', $carrera);
        $sql->bindParam(':mencion', $mencion);
        $sql->bindParam(':modalidad', $modalidad);
        $sql->bindParam(':situacion', $situacion);
        $sql->bindParam(':fechaInicio', $fechaInicio);
        $sql->bindParam(':fechaTermino', $fechaTermino);
        $sql->bindParam(':institucion', $institucion);
        $sql->bindParam(':pais', $pais);
        $sql->bindParam(':sede', $sede);
        $sql->bindParam(':nivelEstudio', $nivelEstudio);
        $sql->bindParam(':curriculum', $curriculum);
        if ($sql->execute()) {
            return 1;
        } else {
            return 0;
        }
    }

    public function editarFormacionAcademica($formacionAcademica, $idformacionAcademica, $conexion)
    {
        $carrera = $formacionAcademica->getCarrera();
        $mencion = $formacionAcademica->getMencion();
        $modalidad = $formacionAcademica->getModalidad();
        $situacion = $formacionAcademica->getSituacion();
        $fechaInicio = $formacionAcademica->getFechaInicio();
        $fechaTermino = $formacionAcademica->getFechaTermino();
        $institucion = $formacionAcademica->getInstitucion();
        $pais = $formacionAcademica->getPais_idpais();
        $sede = $formacionAcademica->getRegion_idregion();
        $nivelEstudio = $formacionAcademica->getNivelEstudio_idnivelEstudio();
        $curriculum = $formacionAcademica->getCurriculum_idcurriculum();
        $sql = $conexion->prepare('UPDATE formacionacademica SET carrera = :carrera, mencion = :mencion, modalidad = :modalidad, situacion = :situacion, fechaInicio = :fechaInicio, fechaTermino = :fechaTermino, institucion = :institucion, pais_idpais = :pais, region_idregion = :sede, nivelEstudio_idnivelEstudio = :nivelEstudio, curriculum_idcurriculum = :curriculum 
        WHERE idformacionAcademica = :idformacionAcademica');
        $sql->bindParam(':carrera', $carrera);
        $sql->bindParam(':mencion', $mencion);
        $sql->bindParam(':modalidad', $modalidad);
        $sql->bindParam(':situacion', $situacion);
        $sql->bindParam(':fechaInicio', $fechaInicio);
        $sql->bindParam(':fechaTermino', $fechaTermino);
        $sql->bindParam(':institucion', $institucion);
        $sql->bindParam(':pais', $pais);
        $sql->bindParam(':sede', $sede);
        $sql->bindParam(':nivelEstudio', $nivelEstudio);
        $sql->bindParam(':curriculum', $curriculum);
        $sql->bindParam(':idformacionAcademica', $idformacionAcademica);
        if ($sql->execute()) {
            return 1;
        } else {
            return 0;
        }
    }

    public function eliminarFormacionAcademica($idformacionAcademica, $conexion)
    {
        $sql = $conexion->prepare('DELETE FROM formacionacademica WHERE idformacionAcademica = :idformacionAcademica');
        $sql->bindParam(':idformacionAcademica', $idformacionAcademica);
        if ($sql->execute()) {
            return 1;
        } else {
            return 0;
        }
    }

    public function obtenerFormacionAcademicaEspecifica($datos, $conexion)
    {
        $idformacionAcademica = $datos['idformacionAcademica'];
        $sql = $conexion->prepare('SELECT * FROM formacionacademica
        INNER JOIN nivelestudio
        ON formacionacademica.nivelEstudio_idnivelEstudio = nivelestudio.idnivelEstudio
        INNER JOIN pais
        ON formacionacademica.pais_idpais = pais.idpais
        INNER JOIN region
        ON formacionacademica.region_idregion = region.idregion
        WHERE formacionacademica.idformacionAcademica = :idformacionAcademica');
        $sql->bindParam(':idformacionAcademica', $idformacionAcademica);
        $sql->execute();
        $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;
    }
}
