<?php
class UsuarioEmpresaSql
{
    public function insertarUsuarioEmpresa($usuarioEmpresa, $conexion)
    {
        $nombreEmpresa = $usuarioEmpresa->getNombreEmpresa();
        $telefono = $usuarioEmpresa->getTelefono();
        $usuario_idusuario = $usuarioEmpresa->getUsuario_idusuario();
        $slq = $conexion->prepare("INSERT INTO usuarioempresa (nombreEmpresa, telefono, usuario_idusuario) VALUES (:nombreEmpresa, :telefono, :usuario_idusuario)");
        $slq->bindParam(':nombreEmpresa', $nombreEmpresa);
        $slq->bindParam(':telefono', $telefono);
        $slq->bindParam(':usuario_idusuario', $usuario_idusuario);
        if ($slq->execute()) {
            return 1;
        } else {
            return 0;
        }
    }

    public function validarUsuarioRegistro($datos, $conexion)
    {
        $sql = $conexion->prepare('SELECT * FROM usuario
        INNER JOIN usuarioempresa
        ON usuario.idusuario = usuarioempresa.usuario_idusuario
        WHERE usuario.correo = :correo 
        OR usuario.rut = :rut
        OR usuarioempresa.nombreEmpresa = :nombreEmpresa');
        $sql->execute(['correo' => $datos['correo'], 'rut' => $datos['rut'], 'nombreEmpresa' => $datos['nombreEmpresa']]);
        $resultado = $sql->fetch(PDO::FETCH_ASSOC);
        if ($resultado) {
            return $resultado;
        } else {
            return 0;
        }
    }
}
