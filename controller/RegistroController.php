<?php
if (isset($_POST['btnRegistro'])) {
    session_start();
    date_default_timezone_set('America/Santiago');
    include_once('../config/BDConfiguracion.php');
    include_once('../repository/sql/UsuarioSql.php');
    include_once('../repository/sql/UsuarioTeaSql.php');
    include_once('../repository/sql/UsuarioEmpresaSql.php');
    include_once('../repository/sql/CurriculumSql.php');
    include_once('../model/Usuario.php');
    include_once('../model/UsuarioTea.php');
    include_once('../model/UsuarioEmpresa.php');
    include_once('../model/Curriculum.php');
    $objetoConexion = new BDConfiguracion();
    $objetoUsuario = new UsuarioSql();
    $objetoUsuarioTea = new UsuarioTeaSql();
    $objetoUsuarioEmpresa = new UsuarioEmpresaSql();
    $objetoCurriculum = new CurriculumSql();
    $create = new DateTime();
    $conexion = $objetoConexion->obtenerConexion();
    $accion = $_POST['btnRegistro'];
    switch ($accion) {
        case 'registroUsuario':
            header('Location: http://localhost/teincluyes/registro/usuario');
            break;
        case 'registroEmpresa':
            header('Location: http://localhost/teincluyes/registro/empresa');
            break;
        case 'insertarUsuario':
            if (isset($_POST['correo']) && isset($_POST['clave']) && isset($_POST['rut']) && isset($_POST['nombres']) && isset($_POST['apellidos']) && isset($_POST['espectro']) && isset($_FILES['certificado'])) {
                if ($_POST['correo'] != '' && $_POST['clave'] != '' && $_POST['rut'] != '' && $_POST['nombres'] != '' && $_POST['apellidos'] != '' && $_POST['espectro'] != '') {
                    $name = $_FILES['certificado']['name'];
                    $size = $_FILES['certificado']['size'];
                    $type = $_FILES['certificado']['type'];
                    $temp = $_FILES['certificado']['tmp_name'];
                    $fname = date("YmdHis") . '_' . $name;
                    if (pathinfo($name)['extension'] == 'pdf') {
                        $datosValidacion = [
                            'correo' => $_POST['correo'],
                            'rut' => $_POST['rut'],
                        ];
                        $validarUsuarioRegistro = $objetoUsuario->validarUsuarioRegistro($datosValidacion, $conexion);
                        if ($validarUsuarioRegistro == 0) {
                            $usuario = new Usuario($_POST['correo'], $_POST['clave'], $_POST['rut'], $_POST['nombres'], $_POST['apellidos'], $create->format('Y-m-d H:i:s'), null, 1, 2);
                            $insertarUsuario = $objetoUsuario->insertarUsuario($usuario, $conexion);
                            if ($insertarUsuario == 1) {
                                $datosCertificadoTea = [
                                    'name' => $name,
                                    'size' => $size,
                                    'type' => $type,
                                    'temp' => $temp,
                                    'fname' => $fname
                                ];
                                $insertarCertificadoTea = $objetoUsuarioTea->insertarCertificado($datosCertificadoTea, $conexion);
                                if ($insertarCertificadoTea == 1) {
                                    $datosObtenerIdUsuario = [
                                        'correo' => $_POST['correo'],
                                        'rut' => $_POST['rut'],
                                    ];
                                    $obtenerIdUsuario = $objetoUsuario->obtenerIdUsuario($datosObtenerIdUsuario, $conexion);
                                    $idusuario = $obtenerIdUsuario['idusuario'];
                                    $obtenerIdCertificado = $objetoUsuarioTea->obtenerIdCertificado($datosCertificadoTea, $conexion);
                                    $idCertificadoTea = $obtenerIdCertificado[0]['idcertificadoTea'];
                                    $usuarioTea = new UsuarioTea($_POST['espectro'], $idusuario, $idCertificadoTea);
                                    $insertarUsuarioTea = $objetoUsuarioTea->insertarUsuarioTea($usuarioTea, $conexion);
                                    if ($insertarUsuarioTea == 1) {
                                        $datosObtenerUsuarioTea = [
                                            'idusuario' => $idusuario,
                                        ];
                                        $obtenerIdUsuarioTea = $objetoUsuarioTea->obtenerIdUsuarioTea($datosObtenerUsuarioTea, $conexion);
                                        $idUsuarioTea = $obtenerIdUsuarioTea['idusuarioTea'];
                                        $curriculum = new Curriculum('', '', '', '', '', '', '', '', '', '', '1', '1', '1', $idUsuarioTea);
                                        $insertarCurriculum = $objetoCurriculum->insertarCurriculum($curriculum, $conexion);
                                        if ($insertarCurriculum == 1) {
                                            $_SESSION['exitoRegistro'] = 'Usuario registrado correctamente';
                                            header('Location: http://localhost/teincluyes/inicioSesion');
                                        } else {
                                            $_SESSION['errorRegistroUsuario'] = 'Error al registrar curriculum';
                                            header('Location: http://localhost/teincluyes/registro/usuario');
                                        }
                                    } else {
                                        $_SESSION['errorRegistroUsuario'] = 'Error al registrar usuario';
                                        header('Location: http://localhost/teincluyes/registro/usuario');
                                    }
                                } else {
                                    $_SESSION['errorRegistroUsuario'] = 'No se pudo subir el certificado';
                                    header('Location: http://localhost/teincluyes/registro/usuario');
                                }
                            } else {
                                $_SESSION['errorRegistroUsuario'] = 'Error al registrar usuario';
                                header('Location: http://localhost/teincluyes/registro/usuario');
                            }
                        } else {
                            $_SESSION['errorRegistroUsuario'] = 'El correo o rut ya se encuentra registrado';
                            header('Location: http://localhost/teincluyes/registro/usuario');
                        }
                    } else {
                        $_SESSION['errorRegistroUsuario'] = 'El archivo no es un PDF';
                        header('Location: http://localhost/teincluyes/registro/usuario');
                    }
                } else {
                    $_SESSION['errorRegistroUsuario'] = 'Debe llenar todos los campos';
                    header('Location: http://localhost/teincluyes/registro/usuario');
                }
            } else {
                $_SESSION['errorRegistroUsuario'] = 'Error al registrar usuario';
                header('Location: http://localhost/teincluyes/registro/usuario');
            }
            break;
        case 'insertarEmpresa':
            if (isset($_POST['correo']) && isset($_POST['clave']) && isset($_POST['rut']) && isset($_POST['nombres']) && isset($_POST['apellidos']) && isset($_POST['nombreEmpresa']) && isset($_POST['telefono'])) {
                if ($_POST['correo'] != '' && $_POST['clave'] != '' && $_POST['rut'] != '' && $_POST['nombres'] != '' && $_POST['apellidos'] != '' && $_POST['nombreEmpresa'] != '' && $_POST['telefono'] != '') {
                    $datosValidacionEmpresa = [
                        'correo' => $_POST['correo'],
                        'rut' => $_POST['rut'],
                        'nombreEmpresa' => $_POST['nombreEmpresa'],
                    ];
                    $validarEmpresaRegistro = $objetoUsuarioEmpresa->validarUsuarioRegistro($datosValidacionEmpresa, $conexion);
                    if ($validarEmpresaRegistro == 0) {
                        $usuario = new Usuario($_POST['correo'], $_POST['clave'], $_POST['rut'], $_POST['nombres'], $_POST['apellidos'], $create->format('Y-m-d H:i:s'), null, 2, 1);
                        $insertarUsuario = $objetoUsuario->insertarUsuario($usuario, $conexion);
                        if ($insertarUsuario == 1) {
                            $datosValidacionEmpresa = [
                                'correo' => $_POST['correo'],
                                'rut' => $_POST['rut']
                            ];
                            $obtenerIdUsuario = $objetoUsuario->obtenerIdUsuario($datosValidacionEmpresa, $conexion);
                            $usuarioEmpresa = new UsuarioEmpresa($_POST['nombreEmpresa'], $_POST['telefono'], $obtenerIdUsuario['idusuario']);
                            $insertarUsuarioEmpresa = $objetoUsuarioEmpresa->insertarUsuarioEmpresa($usuarioEmpresa, $conexion);
                            if ($insertarUsuarioEmpresa == 1) {
                                $_SESSION['exitoRegistro'] = 'Usuario registrado correctamente';
                                header('Location: http://localhost/teincluyes/inicioSesion');
                            } else {
                                $_SESSION['errorRegistroEmpresa'] = 'Error al registrar usuario';
                                header('Location: http://localhost/teincluyes/registro/empresa');
                            }
                        } else {
                            $_SESSION['errorRegistroEmpresa'] = 'Error al registrar usuario';
                            header('Location: http://localhost/teincluyes/registro/empresa');
                        }
                    } else {
                        $_SESSION['errorRegistroEmpresa'] = 'El correo, rut o nombre de la empresa ya se encuentra registrado';
                        header('Location: http://localhost/teincluyes/registro/empresa');
                    }
                } else {
                    $_SESSION['errorRegistroEmpresa'] = 'Debe llenar todos los campos';
                    header('Location: http://localhost/teincluyes/registro/empresa');
                }
            } else {
                $_SESSION['errorRegistroEmpresa'] = 'Error al registrar la empresa';
                header('Location: http://localhost/teincluyes/registro/empresa');
            }
            break;
    }
} else {
    Header('Location: http://localhost/teincluyes/inicio');
}
