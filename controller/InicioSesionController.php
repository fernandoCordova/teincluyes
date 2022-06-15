<?php
if (isset($_POST['btnIniciarSesion'])) {
    session_start();
    include_once('../config/BDConfiguracion.php');
    include_once('../repository/sql/UsuarioSql.php');
    include_once('../repository/sql/UsuarioTeaSql.php');
    include_once('../repository/sql/CurriculumSql.php');
    $objetoConexion = new BDConfiguracion();
    $objetoUsuarioSql = new UsuarioSql();
    $objetoUsuarioTeaSql = new UsuarioTeaSql();
    $objetoCurriculumSql = new CurriculumSql();
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
                    if ($validarUsurio['tipoUsuario_idtipoUsuario'] == 1) {
                        $datosObtenerUsuario = [
                            'idusuario' => $validarUsurio['idusuario'],
                        ];
                        $datosObtenerUsuarioTea = [
                            'idusuario' => $validarUsurio['idusuario'],
                        ];
                        $idUsuarioTea = $objetoUsuarioTeaSql->obtenerIdUsuarioTea($datosObtenerUsuarioTea, $conexion);
                        $idCurriculum = $objetoCurriculumSql->obtenerIdCurriculum($idUsuarioTea['idusuarioTea'], $conexion);
                        $obtenerExperienciasLaboralesUsuariosTea = $objetoUsuarioSql->obtenerExperienciasLaboralesUsuariosTea($idCurriculum, $conexion);
                        $_SESSION['experienciasLaborales'] = $obtenerExperienciasLaboralesUsuariosTea;
                        $obtenerFormacionAcademica = $objetoUsuarioSql->obtenerFormacionAcademica($idCurriculum['idcurriculum'], $conexion);
                        $_SESSION['formacionAcademica'] = $obtenerFormacionAcademica;
                        $obtenerHabilidades = $objetoUsuarioSql->obtenerHabilidad($idCurriculum['idcurriculum'], $conexion);
                        $_SESSION['habilidades'] = $obtenerHabilidades;
                        $obtenerIdiomas = $objetoUsuarioSql->obtenerIdioma($idCurriculum['idcurriculum'], $conexion);
                        $_SESSION['idiomasUsuario'] = $obtenerIdiomas;
                        $obtenerDatosUsuario = $objetoUsuarioSql->obtenerDatosUsuarioTea($datosObtenerUsuario, $conexion);
                        $_SESSION['usuario'] = $obtenerDatosUsuario;
                        header('Location: http://localhost/teincluyes/inicio');
                    } else if ($validarUsurio['tipoUsuario_idtipoUsuario'] == 2) {
                        $datosObtenerUsuario = [
                            'idusuario' => $validarUsurio['idusuario'],
                        ];
                        $obtenerDatosUsuario = $objetoUsuarioSql->obtenerDatosUsuarioEmpresa($datosObtenerUsuario, $conexion);
                        $_SESSION['usuario'] = $obtenerDatosUsuario;
                        header('Location: http://localhost/teincluyes/inicio');
                    } else if ($validarUsurio['tipoUsuario_idtipoUsuario'] == 3) {
                        $datosObtenerUsuario = [
                            'idusuario' => $validarUsurio['idusuario'],
                        ];
                        $obtenerDatosUsuario = $objetoUsuarioSql->obtenerDatosUsuarioAdministrador($datosObtenerUsuario, $conexion);
                        $_SESSION['usuario'] = $obtenerDatosUsuario;
                        header('Location: http://localhost/teincluyes/inicio');
                    } else {
                        $_SESSION['errorInicioSesion'] = 'Usuario o contraseña incorrectos';
                        header('Location: http://localhost/teincluyes/inicioSesion');
                    }
                } else {
                    $_SESSION['errorInicioSesion'] = 'Debe completar todos los campos';
                    header('Location: http://localhost/teincluyes/inicioSesion');
                }
            } else {
                $_SESSION['errorInicioSesion'] = 'No se pudo ingresar a la plataforma';
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
