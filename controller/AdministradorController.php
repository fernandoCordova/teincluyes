<?php
if (isset($_POST['btnAdministrador'])) {
    session_start();
    include_once('../config/BDConfiguracion.php');
    include_once('../repository/sql/UsuarioTeaSql.php');
    $objetoConexion = new BDConfiguracion();
    $objetoUsuarioTea = new UsuarioTeaSql();
    $conexion = $objetoConexion->obtenerConexion();
    $accion = $_POST['btnAdministrador'];
    switch ($accion) {
        case 'validarCertificados':
            $obtenerUsuariosTea = $objetoUsuarioTea->obtenerUsuariosTea($conexion);
            $_SESSION['usuariosTea'] = $obtenerUsuariosTea;
            header('Location: http://localhost/teincluyes/administrador/certificados');
            break;
        case 'validarCertificado':
            if (isset($_POST['idusuario'])) {
                if ($_POST['idusuario'] != '') {
                    $cambiarEstadoUsuario = $objetoUsuarioTea->cambiarEstadoUsuario($_POST['idestado'], $_POST['idusuario'], $conexion);
                    if ($cambiarEstadoUsuario == 1) {
                        $obtenerUsuariosTea = $objetoUsuarioTea->obtenerUsuariosTea($conexion);
                        $_SESSION['usuariosTea'] = $obtenerUsuariosTea;
                        header('Location: http://localhost/teincluyes/administrador/certificados');
                    } else {
                        $_SESSION['error'] = 'Error al eliminar el idioma';
                        header('Location: http://localhost/teincluyes/administrador/certificados');
                    }
                } else {
                    $_SESSION['error'] = 'Error al eliminar el idioma';
                    header('Location: http://localhost/teincluyes/administrador/certificados');
                }
            } else {
                $_SESSION['error'] = 'Error al eliminar el idioma';
                header('Location: http://localhost/teincluyes/administrador/certificados');
            }
            break;
    }
}
