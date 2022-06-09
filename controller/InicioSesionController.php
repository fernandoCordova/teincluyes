<?php
if (isset($_POST['btnIniciarSesion'])) {
    session_start();
    include_once('../config/BDConfiguracion.php');
    include_once('../repository/sql/UsuarioSql.php');
    $objetoConexion = new BDConfiguracion();
    $objetoUsuarioSql = new UsuarioSql();
    $conexion = $objetoConexion->obtenerConexion();
    $accion = $_POST['btnIniciarSesion'];
    switch ($accion) {
        case 'inicioSesion':
            header('Location: http://localhost/teincluyes/inicioSesion');
            break;
        case 'ingresar':
            if (isset($_POST['correo']) && isset($_POST['clave'])) {
                if ($_POST['correo'] != '' && $_POST['clave'] != '') {
                    $datos = [
                        'correo' => $_POST['correo'],
                        'clave' => $_POST['clave']
                    ];
                    $validarUsurio = $objetoUsuarioSql->validarUsuarioLogin($datos, $conexion);
                    if ($validarUsurio) {
                        $_SESSION['usuario'] = $validarUsurio;
                        header('Location: http://localhost/teincluyes/inicio');
                    } else {
                        $_SESSION['error'] = 'Correo o contraseña incorrectos';
                        header('Location: http://localhost/teincluyes/inicioSesion');
                    }
                } else {
                    $_SESSION['error'] = 'Debe completar todos los campos';
                    header('Location: http://localhost/teincluyes/inicioSesion');
                }
            } else {
                $_SESSION['error'] = 'No se pudo ingresar a la plataforma';
                header('Location: http://localhost/teincluyes/inicioSesion');
            }
            break;
        case 'cerrarSesion':
            session_destroy();
            header('Location: http://localhost/teincluyes/inicioSesion');
            break;
    }
} else {
    Header('Location: http://localhost/teincluyes/inicio');
}
