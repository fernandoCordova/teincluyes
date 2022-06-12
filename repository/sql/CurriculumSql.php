<?php
class CurriculumSql
{
    public function insertarCurriculum($curriculum, $conexion)
    {
        $idNacionalidad = $curriculum->getNacionalidad_idnacionalidad();
        $idPais = $curriculum->getPais_idpais();
        $idRegion = $curriculum->getRegion_idregion();
        $idUsuarioTea = $curriculum->getUsuarioTea_idusuarioTea();
        $sql = $conexion->prepare('INSERT INTO `curriculum`(`nacionalidad_idnacionalidad`,`pais_idpais`,`region_idregion`,`usuarioTea_idusuarioTea`) VALUES (:idNacionalidad,:idPais,:idRegion,:idUsuarioTea)');
        $sql->bindParam(':idNacionalidad', $idNacionalidad);
        $sql->bindParam(':idPais', $idPais);
        $sql->bindParam(':idRegion', $idRegion);
        $sql->bindParam(':idUsuarioTea', $idUsuarioTea);
        if ($sql->execute()) {
            return 1;
        } else {
            return 0;
        }
    }

    public function obtenerIdCurriculum($idUsuarioTea, $conexion)
    {
        $sql = $conexion->prepare('SELECT idcurriculum FROM curriculum WHERE usuarioTea_idusuarioTea = :idUsuarioTea');
        $sql->bindParam(':idUsuarioTea', $idUsuarioTea);
        $sql->execute();
        $resultado = $sql->fetch(PDO::FETCH_ASSOC);
        return $resultado;
    }


    public function actualizarCurriculum($curriculum, $idCurriculum, $conexion)
    {
        $telefono = $curriculum->getTelefono();
        $portafolio = $curriculum->getPortafolio();
        $acercaDeMi = $curriculum->getAcercaDeMi();
        $direccion = $curriculum->getDireccion();
        $genero = $curriculum->getGenero();
        $fechaNacimiento = $curriculum->getFechaNacimiento();
        $titulo = $curriculum->getTitulo();
        $experiencia = $curriculum->getExperiencia();
        $renta = $curriculum->getRenta();
        $nacionalidad_idnacionalidad = $curriculum->getNacionalidad_idnacionalidad();
        $pais_idpais = $curriculum->getPais_idpais();
        $region_idregion = $curriculum->getRegion_idregion();
        $usuarioTea_idusuarioTea = $curriculum->getUsuarioTea_idusuarioTea();
        $sql = $conexion->prepare('UPDATE `curriculum` SET `telefono`=:telefono,`portafolio`=:portafolio,`acercaDeMi`=:acercaDeMi,`direccion`=:direccion,`genero`=:genero,`fechaNacimiento`=:fechaNacimiento,`titulo`=:titulo,`experiencia`=:experiencia,`renta`=:renta ,`nacionalidad_idnacionalidad`=:nacionalidad_idnacionalidad,`pais_idpais`=:pais_idpais,`region_idregion`=:region_idregion ,`usuarioTea_idusuarioTea`=:usuarioTea_idusuarioTea WHERE `idcurriculum`=:idcurriculum');
        $sql->bindParam(':telefono', $telefono);
        $sql->bindParam(':portafolio', $portafolio);
        $sql->bindParam(':acercaDeMi', $acercaDeMi);
        $sql->bindParam(':direccion', $direccion);
        $sql->bindParam(':genero', $genero);
        $sql->bindParam(':fechaNacimiento', $fechaNacimiento);
        $sql->bindParam(':titulo', $titulo);
        $sql->bindParam(':experiencia', $experiencia);
        $sql->bindParam(':renta', $renta);
        $sql->bindParam(':nacionalidad_idnacionalidad', $nacionalidad_idnacionalidad);
        $sql->bindParam(':pais_idpais', $pais_idpais);
        $sql->bindParam(':region_idregion', $region_idregion);
        $sql->bindParam(':usuarioTea_idusuarioTea', $usuarioTea_idusuarioTea);
        $sql->bindParam(':idcurriculum', $idCurriculum);
        if ($sql->execute()) {
            return 1;
        } else {
            return 0;
        }
    }
}
