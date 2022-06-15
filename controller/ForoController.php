<?php
if (isset($_POST['btnForo'])) {
    session_start();
    date_default_timezone_set('America/Santiago');
    include_once('../config/BDConfiguracion.php');
    include_once('../repository/sql/UsuarioTeaSql.php');
    include_once('../repository/sql/TopicoSql.php');
    include_once('../repository/sql/CategoriaSql.php');
    include_once('../model/Topico.php');
    $objetoConexion = new BDConfiguracion();
    $objetoUsuarioTea = new UsuarioTeaSql();
    $objetoTopico = new TopicoSql();
    $objetoCategoria = new CategoriaSql();
    $create = new DateTime();
    $conexion = $objetoConexion->obtenerConexion();
    $accion = $_POST['btnForo'];
    switch ($accion) {
        case 'foro':
            $obtenerTodosLosTopicos = $objetoTopico->obtenerTodosLosTopicos($conexion);
            $_SESSION['obtenerTodosLosTopicos'] = $obtenerTodosLosTopicos;
            header('Location: http://localhost/teincluyes/usuario/foroDeComunidad');
            break;
        case 'publicarTopico':
            $obtenerCategorias = $objetoCategoria->obtenerCategorias($conexion);
            $_SESSION['obtenerCategorias'] = $obtenerCategorias;
            header('Location: http://localhost/teincluyes/usuario/topico/agregar');
            break;
        case 'insertarTopico':
            if (isset($_POST['nombreTopico']) && isset($_POST['contenido']) && isset($_POST['categoria'])) {
                if ($_POST['nombreTopico'] != '' && $_POST['contenido'] != '' && $_POST['categoria'] != '') {
                    $topico = new Topico($_POST['nombreTopico'], $create->format('Y-m-d H:i:s'), $_POST['contenido'], $_SESSION['usuario']['idusuarioTea'], $_POST['categoria']);
                    $insertarTopico = $objetoTopico->insertarTopico($topico, $conexion);
                    if ($insertarTopico == 1) {
                        $obtenerTodosLosTopicos = $objetoTopico->obtenerTodosLosTopicos($conexion);
                        $_SESSION['obtenerTodosLosTopicos'] = $obtenerTodosLosTopicos;
                        $_SESSION['exito'] = 'El topico se ha publicado correctamente';
                        header('Location: http://localhost/teincluyes/usuario/foroDeComunidad');
                    } else {
                        $_SESSION['error'] = 'Error con el servidor, no se pudo publicar el topico';
                        header('Location: http://localhost/teincluyes/usuario/topico/agregar');
                    }
                } else {
                    $_SESSION['error'] = 'Debe completar todos los campos';
                    header('Location: http://localhost/teincluyes/usuario/topico/agregar');
                }
            } else {
                $_SESSION['error'] = 'Error al publicar el topico';
                header('Location: http://localhost/teincluyes/usuario/topico/agregar');
            }
            break;
        case 'verDetallesDeTopico':
            if (isset($_POST['idtopico'])) {
                if ($_POST['idtopico'] != '') {
                    $topicoEspecifico = $objetoTopico->topicoEspecifico($_POST['idtopico'], $conexion);
                    $_SESSION['topicoEspecifico'] = $topicoEspecifico;
                    $comentariosTopico = $objetoTopico->comentariosTopico($_POST['idtopico'], $conexion);
                    $_SESSION['comentariosTopico'] = $comentariosTopico;
                    header('Location: http://localhost/teincluyes/usuario/topico/contenido');
                } else {
                    $_SESSION['error'] = 'Error al ver los detalles del topico';
                    header('Location: http://localhost/teincluyes/usuario/foroDeComunidad');
                }
            } else {
                $_SESSION['error'] = 'Error al ver los detalles del topico';
                header('Location: http://localhost/teincluyes/usuario/foroDeComunidad');
            }
            break;
        case 'comentarTopico':
            if (isset($_POST['contenido']) && isset($_POST['idUsuarioTea']) && isset($_POST['idtopico'])) {
                if ($_POST['contenido'] != '' && $_POST['idUsuarioTea'] != '' && $_POST['idtopico'] != '') {
                    $comentarTopico = $objetoTopico->comentarTopico($_POST['contenido'], $create->format('Y-m-d H:i:s'), $_POST['idtopico'], $_POST['idUsuarioTea'], $conexion);
                    if ($comentarTopico == 1) {
                        $comentariosTopico = $objetoTopico->comentariosTopico($_POST['idtopico'], $conexion);
                        $_SESSION['comentariosTopico'] = $comentariosTopico;
                        $_SESSION['exito'] = 'El comentario se ha publicado correctamente';
                        header('Location: http://localhost/teincluyes/usuario/topico/contenido');
                    } else {
                        $_SESSION['error'] = 'Error con el servidor, no se pudo publicar el comentario';
                        header('Location: http://localhost/teincluyes/usuario/topico/contenido');
                    }
                } else {
                    $_SESSION['error'] = 'Debe completar todos los campos';
                    header('Location: http://localhost/teincluyes/usuario/topico/contenido');
                }
            } else {
                $_SESSION['error'] = 'Error al comentar el topico';
                header('Location: http://localhost/teincluyes/usuario/topico/contenido');
            }
            break;
        case 'eliminarTopico':
            if (isset($_POST['idtopico'])) {
                if ($_POST['idtopico'] != '') {
                    $eliminarComentarios = $objetoTopico->eliminarComentarios($_POST['idtopico'], $conexion);
                    if ($eliminarComentarios == 1) {
                        $eliminarTopico = $objetoTopico->eliminarTopico($_POST['idtopico'], $conexion);
                        if ($eliminarTopico == 1) {
                            $obtenerTodosLosTopicos = $objetoTopico->obtenerTodosLosTopicos($conexion);
                            $_SESSION['obtenerTodosLosTopicos'] = $obtenerTodosLosTopicos;
                            $_SESSION['exito'] = 'El topico se ha eliminado correctamente';
                            header('Location: http://localhost/teincluyes/usuario/foroDeComunidad');
                        } else {
                            $_SESSION['error'] = 'Error con el servidor, no se pudo eliminar el topico';
                            header('Location: http://localhost/teincluyes/usuario/foroDeComunidad');
                        }
                    } else {
                        $_SESSION['error'] = 'Error al eliminar los comentarios';
                        header('Location: http://localhost/teincluyes/usuario/foroDeComunidad');
                    }
                } else {
                    $_SESSION['error'] = 'Error al eliminar el topico';
                    header('Location: http://localhost/teincluyes/usuario/foroDeComunidad');
                }
            } else {
                $_SESSION['error'] = 'Error al eliminar el topico';
                header('Location: http://localhost/teincluyes/usuario/foroDeComunidad');
            }
            break;
    }
} else {
    Header('Location: http://localhost/teincluyes/inicio');
}
