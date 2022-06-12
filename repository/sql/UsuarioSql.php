<?php
class UsuarioSql
{
    public function validarUsuarioLogin($datos, $conexion)
    {
        $sql = $conexion->prepare('SELECT * FROM usuario
         WHERE correo = :correo AND clave = :clave AND estado_idestado  = 1');
        $sql->execute(['correo' => $datos['correo'], 'clave' => $datos['clave']]);
        $resultado = $sql->fetch(PDO::FETCH_ASSOC);
        if ($resultado) {
            return $resultado;
        } else {
            return 0;
        }
    }

    public function actualizarUsuario($datosUsuario, $idusuario, $conexion)
    {
        $rut = $datosUsuario['rut'];
        $nombres = $datosUsuario['nombres'];
        $apellidos = $datosUsuario['apellidos'];
        $sql = $conexion->prepare('UPDATE usuario SET rut = :rut, nombres = :nombres, apellidos = :apellidos WHERE idusuario = :idusuario');
        $sql->bindParam(':rut', $rut);
        $sql->bindParam(':nombres', $nombres);
        $sql->bindParam(':apellidos', $apellidos);
        $sql->bindParam(':idusuario', $idusuario);
        if ($sql->execute()) {
            return 1;
        } else {
            return 0;
        }
    }

    public function obtenerIdioma($idcurriculum,$conexion)
    {
        $sql = $conexion->prepare('SELECT * 
        FROM idiomaUsuario 
        INNER JOIN idioma
        ON idiomausuario.idioma_ididioma = idioma.ididioma
        WHERE curriculum_idcurriculum = :idcurriculum');
        $sql->bindParam(':idcurriculum', $idcurriculum);
        $sql->execute();
        $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;
    }

    public function obtenerHabilidad($idcurriculum,$conexion)
    {
        $sql = $conexion->prepare('SELECT habilidad.idhabilidad ,habilidad.nombreHabilidad 
        FROM habilidadUsuario 
        INNER JOIN habilidad ON habilidadUsuario.habilidad_idhabilidad = habilidad.idhabilidad 
        WHERE habilidadUsuario.curriculum_idcurriculum = :idcurriculum');
        $sql->bindParam(':idcurriculum', $idcurriculum);
        $sql->execute();
        $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;
    }

    public function obtenerExperienciasLaboralesUsuariosTea($idcurriculum,$conexion)
    {
        $sql = $conexion->prepare('SELECT * FROM experiencialaboral WHERE curriculum_idcurriculum = :idcurriculum');
        $sql->execute(['idcurriculum' => $idcurriculum['idcurriculum']]);
        $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;
    }

    public function obtenerFormacionAcademica($idcurriculum,$conexion)
    {
        $sql = $conexion->prepare('SELECT * FROM formacionacademica
        INNER JOIN nivelestudio
        ON formacionacademica.nivelEstudio_idnivelEstudio = nivelestudio.idnivelEstudio
        WHERE curriculum_idcurriculum = :idcurriculum');
        $sql->execute(['idcurriculum' => $idcurriculum['idcurriculum']]);
        $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;
    }

    public function obtenerDatosUsuarioTea($datosObtenerUsuario, $conexion)
    {
        $idusuario = $datosObtenerUsuario['idusuario'];
        $sql = $conexion->prepare('SELECT * FROM usuario
        INNER JOIN usuariotea
        ON usuario.idusuario = usuariotea.usuario_idusuario
        INNER JOIN curriculum
        ON curriculum.usuarioTea_idusuarioTea = usuariotea.idusuarioTea
        INNER JOIN nacionalidad
        ON curriculum.nacionalidad_idnacionalidad = nacionalidad.idnacionalidad
        INNER JOIN pais
        ON curriculum.pais_idpais = pais.idpais
        INNER JOIN region
        ON curriculum.region_idregion = region.idregion
        WHERE usuario.idusuario = :idusuario');
        $sql->bindParam(':idusuario', $idusuario);
        $sql->execute();
        $resultado = $sql->fetch(PDO::FETCH_ASSOC);
        return $resultado;
    }

    public function obtenerDatosUsuarioEmpresa($datosObtenerUsuario, $conexion)
    {
        $sql = $conexion->prepare('SELECT * FROM usuario WHERE idusuario = :idusuario');
        $sql->bindParam(':idusuario', $datosObtenerUsuario['idusuario']);
        $sql->execute();
        $resultado = $sql->fetch(PDO::FETCH_ASSOC);
        return $resultado;
    }

    public function obtenerDatosUsuarioAdministrador($datosObtenerUsuario, $conexion)
    {
        $sql = $conexion->prepare('SELECT * FROM usuario WHERE idusuario = :idusuario');
        $sql->bindParam(':idusuario', $datosObtenerUsuario['idusuario']);
        $sql->execute();
        $resultado = $sql->fetch(PDO::FETCH_ASSOC);
        return $resultado;
    }

    public function validarUsuarioRegistro($datos, $conexion)
    {
        $sql = $conexion->prepare('SELECT * FROM usuario
         WHERE correo = :correo OR rut = :rut');
        $sql->execute(['correo' => $datos['correo'], 'rut' => $datos['rut']]);
        $resultado = $sql->fetch(PDO::FETCH_ASSOC);
        if ($resultado) {
            return $resultado;
        } else {
            return 0;
        }
    }

    public function insertarUsuario($usuario, $conexion)
    {
        $correo = $usuario->getCorreo();
        $clave = $usuario->getClave();
        $rut = $usuario->getRut();
        $nombres = $usuario->getNombres();
        $apellidos = $usuario->getApellidos();
        $create_usuario = $usuario->getCreate_usuario();
        $tipoUsuario_idtipoUsuario = $usuario->getTipoUsuario_idtipoUsuario();
        $estado_idestado = $usuario->getEstado_idestado();
        $sql = $conexion->prepare('INSERT INTO usuario (correo, clave, rut, nombres, apellidos, create_usuario, tipoUsuario_idtipoUsuario ,estado_idestado)
         VALUES (:correo, :clave, :rut, :nombres, :apellidos, :create_usuario, :tipoUsuario_idtipoUsuario, :estado_idestado)');
        $sql->bindparam(':correo', $correo);
        $sql->bindparam(':clave', $clave);
        $sql->bindparam(':rut', $rut);
        $sql->bindparam(':nombres', $nombres);
        $sql->bindparam(':apellidos', $apellidos);
        $sql->bindparam(':create_usuario', $create_usuario);
        $sql->bindparam(':tipoUsuario_idtipoUsuario', $tipoUsuario_idtipoUsuario);
        $sql->bindparam(':estado_idestado', $estado_idestado);
        if ($sql->execute()) {
            return 1;
        } else {
            return 0;
        }
    }

    public function obtenerIdUsuario($datos, $conexion)
    {
        $sql = $conexion->prepare('SELECT idusuario FROM usuario
         WHERE correo = :correo AND rut = :rut');
        $sql->execute(['correo' => $datos['correo'], 'rut' => $datos['rut']]);
        $resultado = $sql->fetch(PDO::FETCH_ASSOC);
        if ($resultado) {
            return $resultado;
        } else {
            return 0;
        }
    }
}
