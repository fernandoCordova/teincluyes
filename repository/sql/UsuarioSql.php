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
