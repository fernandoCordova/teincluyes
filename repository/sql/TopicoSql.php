<?php
class TopicoSql
{
    public function obtenerTodosLosTopicos($conexion)
    {
        $sql = $conexion->prepare('SELECT topico.idtopico,topico.nombre,topico.fechaPublicacion, categoria.nombre AS nombreCategoria, usuario.nombres, usuario.apellidos
        FROM topico
        INNER JOIN categoria
        ON topico.categorias_idcategorias = categoria.idcategoria
        INNER JOIN usuariotea
        ON topico.usuarioTea_idusuarioTea = usuariotea.idusuarioTea
        INNER JOIN usuario
        ON usuariotea.usuario_idusuario = usuario.idusuario');
        $sql->execute();
        $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;
    }

    public function insertarTopico($topico, $conexion)
    {
        $nombre = $topico->getNombre();
        $fechaPublicacion = $topico->getFechaPublicacion();
        $contenido = $topico->getContenido();
        $idUsuarioTea = $topico->getIdUsuarioTea();
        $idCategoria = $topico->getIdCategoria();
        $sql = $conexion->prepare('INSERT INTO topico (nombre, fechaPublicacion, contenido, usuarioTea_idusuarioTea, categorias_idcategorias) VALUES (:nombre, :fechaPublicacion, :contenido, :idUsuarioTea, :idCategoria)');
        $sql->bindParam(':nombre', $nombre);
        $sql->bindParam(':fechaPublicacion', $fechaPublicacion);
        $sql->bindParam(':contenido', $contenido);
        $sql->bindParam(':idUsuarioTea', $idUsuarioTea);
        $sql->bindParam(':idCategoria', $idCategoria);
        if ($sql->execute()) {
            return 1;
        } else {
            return 0;
        }
    }

    public function topicoEspecifico($idtopico, $conexion)
    {
        $sql = $conexion->prepare('SELECT topico.idtopico,topico.nombre, topico.contenido, topico.fechaPublicacion, topico.usuarioTea_idusuarioTea AS idUsuarioTea, categoria.nombre AS nombreCategoria, usuario.nombres, usuario.apellidos
        FROM topico
        INNER JOIN categoria
        ON topico.categorias_idcategorias = categoria.idcategoria
        INNER JOIN usuariotea
        ON topico.usuarioTea_idusuarioTea = usuariotea.idusuarioTea
        INNER JOIN usuario
        ON usuariotea.usuario_idusuario = usuario.idusuario
        WHERE topico.idtopico = :idtopico');
        $sql->bindParam(':idtopico', $idtopico);
        $sql->execute();
        $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;
    }

    public function comentariosTopico($idtopico, $conexion)
    {
        $sql = $conexion->prepare('SELECT comentario.idcomentario,  comentario.contenido, comentario.fechaPublicacion, usuario.nombres, usuario.apellidos
        FROM comentario
        INNER JOIN usuariotea
        ON comentario.usuarioTea_idusuarioTea = usuariotea.idusuarioTea
        INNER JOIN usuario
        ON usuariotea.usuario_idusuario = usuario.idusuario
        WHERE comentario.topico_idtopico = :idtopico');
        $sql->bindParam(':idtopico', $idtopico);
        $sql->execute();
        $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;
    }

    public function comentarTopico($contenido, $fechaPublicacion, $idtopico, $idusuariotea, $conexion)
    {
        $sql = $conexion->prepare('INSERT INTO comentario (contenido, fechaPublicacion, topico_idtopico, usuarioTea_idusuarioTea) VALUES (:contenido, :fechaPublicacion, :idtopico, :idusuariotea)');
        $sql->bindParam(':contenido', $contenido);
        $sql->bindParam(':fechaPublicacion', $fechaPublicacion);
        $sql->bindParam(':idtopico', $idtopico);
        $sql->bindParam(':idusuariotea', $idusuariotea);
        if ($sql->execute()) {
            return 1;
        } else {
            return 0;
        }
    }

    public function eliminarComentarios($idtopico, $conexion)
    {
        $sql = $conexion->prepare('DELETE FROM comentario WHERE topico_idtopico = :idtopico');
        $sql->bindParam(':idtopico', $idtopico);
        if ($sql->execute()) {
            return 1;
        } else {
            return 0;
        }
    }

    public function eliminarTopico($idtopico, $conexion)
    {
        $sql = $conexion->prepare('DELETE FROM topico WHERE idtopico = :idtopico');
        $sql->bindParam(':idtopico', $idtopico);
        if ($sql->execute()) {
            return 1;
        } else {
            return 0;
        }
    }
}
