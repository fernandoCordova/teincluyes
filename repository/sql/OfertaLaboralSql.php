<?php
class OfertaLaboralSql
{

    public function obtenerOfertasLaborales($idUsuarioEmpresa, $conexion)
    {
        $sql = $conexion->prepare("SELECT * FROM ofertalaboral WHERE usuarioEmpresa_idusuarioEmpresa = :idusuarioempresa AND estado = 'habilitado'");;
        $sql->bindParam(':idusuarioempresa', $idUsuarioEmpresa);
        $sql->execute();
        $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;
    }

    public function ingresarPostulacionLaboral($idCurriculum, $idOfertaLaboral, $fechaPostulacion, $conexion)
    {
        $sql = $conexion->prepare("INSERT INTO postulacion (curriculum_idcurriculum,ofertaLaboral_idofertaLaboral,fecha) VALUES (:curriculum_idcurriculum,:ofertaLaboral_idofertaLaboral,:fecha)");
        $sql->bindParam(':curriculum_idcurriculum', $idCurriculum);
        $sql->bindParam(':ofertaLaboral_idofertaLaboral', $idOfertaLaboral);
        $sql->bindParam(':fecha', $fechaPostulacion);
        if ($sql->execute()) {
            return 1;
        } else {
            return 0;
        }
    }

    public function obtenerOfertaLaboralEspecifica($idOfertaLaboral, $conexion)
    {
        $sql = $conexion->prepare("SELECT * 
        FROM ofertalaboral
        INNER JOIN usuarioempresa
        ON ofertalaboral.usuarioEmpresa_idusuarioEmpresa = usuarioempresa.idusuarioEmpresa
        WHERE ofertalaboral.idofertaLaboral = :idofertalaboral");
        $sql->bindParam(':idofertalaboral', $idOfertaLaboral);
        $sql->execute();
        $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;
    }

    public function obtenerPostulantes($idOfertaLaboral, $conexion)
    {
        $sql = $conexion->prepare("SELECT * FROM postulacion
        INNER JOIN curriculum
        ON postulacion.curriculum_idcurriculum = curriculum.idcurriculum
        INNER JOIN usuariotea
        ON curriculum.usuarioTea_idusuarioTea = usuariotea.idusuarioTea
        INNER JOIN usuario
        ON usuariotea.usuario_idusuario = usuario.idusuario
        WHERE postulacion.ofertaLaboral_idofertaLaboral = :idofertalaboral");
        $sql->bindParam(':idofertalaboral', $idOfertaLaboral);
        $sql->execute();
        $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;
    }

    public function obtenerTodasLasOfertasLaborales($conexion)
    {
        $sql = $conexion->prepare("SELECT * FROM ofertalaboral");
        $sql->execute();
        $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;
    }

    public function obtenerPostulante($idCurriculum, $conexion)
    {
        $sql = $conexion->prepare("SELECT * FROM curriculum
        INNER JOIN usuariotea
        ON curriculum.usuarioTea_idusuarioTea = usuariotea.idusuarioTea
        INNER JOIN usuario
        ON usuariotea.usuario_idusuario = usuario.idusuario
        INNER JOIN region
        ON curriculum.region_idregion = region.idregion
        INNER JOIN pais
        ON region.pais_idpais = pais.idpais
        INNER JOIN nacionalidad
        ON curriculum.nacionalidad_idnacionalidad = nacionalidad.idnacionalidad
        WHERE curriculum.idcurriculum = :idcurriculum");
        $sql->bindParam(':idcurriculum', $idCurriculum);
        $sql->execute();
        $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;
    }

    public function eliminarPostulaciones($idOfertaLaboral, $conexion)
    {
        $sql = $conexion->prepare('DELETE FROM postulacion WHERE ofertaLaboral_idofertaLaboral = :idofertalaboral');
        $sql->bindParam(':idofertalaboral', $idOfertaLaboral);
        if ($sql->execute()) {
            return 1;
        } else {
            return 0;
        }
    }

    public function eliminarOfertaLaboral($idOfertaLaboral, $conexion)
    {
        $sql = $conexion->prepare('DELETE FROM ofertalaboral WHERE idofertaLaboral = :idofertalaboral');
        $sql->bindParam(':idofertalaboral', $idOfertaLaboral);
        if ($sql->execute()) {
            return 1;
        } else {
            return 0;
        }
    }

    public function insertarOfertaLaboral($objetoOfertaLaboral, $conexion)
    {
        $titulo = $objetoOfertaLaboral->getTitulo();
        $rubro = $objetoOfertaLaboral->getRubro();
        $fechaInicio = $objetoOfertaLaboral->getFechaInicio();
        $fechaTermino = $objetoOfertaLaboral->getFechaTermino();
        $descripcion = $objetoOfertaLaboral->getDescripcion();
        $cargo = $objetoOfertaLaboral->getTipoDeCargo();
        $vacantes = $objetoOfertaLaboral->getCantidadVacantes();
        $area = $objetoOfertaLaboral->getArea();
        $region = $objetoOfertaLaboral->getRegion();
        $comuna = $objetoOfertaLaboral->getComuna();
        $direccion = $objetoOfertaLaboral->getDireccion();
        $duracion = $objetoOfertaLaboral->getDuracion();
        $jornada = $objetoOfertaLaboral->getJornada();
        $sueldo = $objetoOfertaLaboral->getSueldo();
        $requisitosMinimos = $objetoOfertaLaboral->getRequisitosMinimos();
        $experienciaMinima = $objetoOfertaLaboral->getExperienciaMinima();
        $estudiosMinimos = $objetoOfertaLaboral->getEstudiosMinimos();
        $situacionAcademica = $objetoOfertaLaboral->getSituacionAcademica();
        $carreras = $objetoOfertaLaboral->getCarreras();
        $estado = $objetoOfertaLaboral->getEstado();
        $idUsuarioEmpresa = $objetoOfertaLaboral->getUsuarioEmpresa_idusuarioEmpresa();
        $sql = $conexion->prepare('INSERT INTO ofertalaboral (titulo, rubro, fechaInicio, fechaTermino, descripcion, tipoDeCargo, cantidadVacantes, area, region, comuna, direccion, duracion, jornada, sueldo, requisitosMinimos, experienciaMinima, estudiosMinimos, situacionAcademica, carreras, estado, usuarioEmpresa_idusuarioEmpresa) VALUES (:titulo, :rubro, :fechaInicio, :fechaTermino, :descripcion, :tipoDeCargo, :cantidadVacantes, :area, :region, :comuna, :direccion, :duracion, :jornada, :sueldo, :requisitosMinimos, :experienciaMinima, :estudiosMinimos, :situacionAcademica, :carreras, :estado, :usuarioEmpresa_idusuarioEmpresa)');
        $sql->bindParam(':titulo', $titulo);
        $sql->bindParam(':rubro', $rubro);
        $sql->bindParam(':fechaInicio', $fechaInicio);
        $sql->bindParam(':fechaTermino', $fechaTermino);
        $sql->bindParam(':descripcion', $descripcion);
        $sql->bindParam(':tipoDeCargo', $cargo);
        $sql->bindParam(':cantidadVacantes', $vacantes);
        $sql->bindParam(':area', $area);
        $sql->bindParam(':region', $region);
        $sql->bindParam(':comuna', $comuna);
        $sql->bindParam(':direccion', $direccion);
        $sql->bindParam(':duracion', $duracion);
        $sql->bindParam(':jornada', $jornada);
        $sql->bindParam(':sueldo', $sueldo);
        $sql->bindParam(':requisitosMinimos', $requisitosMinimos);
        $sql->bindParam(':experienciaMinima', $experienciaMinima);
        $sql->bindParam(':estudiosMinimos', $estudiosMinimos);
        $sql->bindParam(':situacionAcademica', $situacionAcademica);
        $sql->bindParam(':carreras', $carreras);
        $sql->bindParam(':estado', $estado);
        $sql->bindParam(':usuarioEmpresa_idusuarioEmpresa', $idUsuarioEmpresa);
        if ($sql->execute()) {
            return 1;
        } else {
            return 0;
        }
    }
}
