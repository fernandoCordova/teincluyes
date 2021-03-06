<?php
if (isset($_POST['btnOfertaLaboral'])) {
    session_start();
    date_default_timezone_set('America/Santiago');
    include_once('../config/BDConfiguracion.php');
    include_once('../model/OfertaLaboral.php');
    include_once('../repository/sql/UsuarioSql.php');
    include_once('../repository/sql/OfertaLaboralSql.php');
    include_once('../repository/sql/UsuarioTeaSql.php');
    include_once('../repository/sql/CurriculumSql.php');
    $objetoConexion = new BDConfiguracion();
    $objetoUsuarioSql = new UsuarioSql();
    $objetoUsuarioTeaSql = new UsuarioTeaSql();
    $objetoCurriculumSql = new CurriculumSql();
    $objetoOfertaLaboralSql = new OfertaLaboralSql();
    $fecha = new DateTime();
    $conexion = $objetoConexion->obtenerConexion();
    $accion = $_POST['btnOfertaLaboral'];
    switch ($accion) {
        case 'publicarTrabajo':
            header('Location: http://localhost/teincluyes/trabajo/publicarTrabajo');
            break;
        case 'agregarOfertaLaboral':
            if (isset($_POST['titulo']) && isset($_POST['rubro']) && isset($_POST['fechaInicio']) && isset($_POST['cargo']) && isset($_POST['vacantes']) && isset($_POST['area']) && isset($_POST['region']) && isset($_POST['comuna']) && isset($_POST['direccion']) && isset($_POST['duracion']) && isset($_POST['jornada']) && isset($_POST['sueldo']) && isset($_POST['fechaTermino']) && isset($_POST['descripcion']) && isset($_POST['requisitosMinimos']) && isset($_POST['experienciaMinima']) && isset($_POST['estudiosMinimos']) && isset($_POST['carreras']) && isset($_POST['situacionAcademica'])) {
                if ($_POST['titulo'] != '' && $_POST['rubro'] != '' && $_POST['fechaInicio'] != '' && $_POST['cargo'] != '' && $_POST['vacantes'] != '' && $_POST['area'] != '' && $_POST['region'] != '' && $_POST['comuna'] != '' && $_POST['direccion'] != '' && $_POST['duracion'] != '' && $_POST['jornada'] != '' && $_POST['sueldo'] != '' && $_POST['fechaTermino'] != '' && $_POST['descripcion'] != '' && $_POST['requisitosMinimos'] != '' && $_POST['experienciaMinima'] != '' && $_POST['estudiosMinimos'] != '' && $_POST['carreras'] != '' && $_POST['situacionAcademica'] != '') {
                    $objetoOfertaLaboral = new OfertaLaboral($_POST['titulo'], $_POST['rubro'], $_POST['fechaInicio'], $_POST['fechaTermino'], $_POST['descripcion'], $_POST['cargo'], $_POST['vacantes'], $_POST['area'], $_POST['region'], $_POST['comuna'], $_POST['direccion'], $_POST['duracion'], $_POST['jornada'], $_POST['sueldo'], $_POST['requisitosMinimos'], $_POST['experienciaMinima'], $_POST['estudiosMinimos'], $_POST['situacionAcademica'], $_POST['carreras'], 'habilitado', $_SESSION['usuario']['idusuarioEmpresa']);
                    $insertarOfertaLaboral = $objetoOfertaLaboralSql->insertarOfertaLaboral($objetoOfertaLaboral, $conexion);
                    if ($insertarOfertaLaboral == 1) {
                        $_SESSION['exitoOfertaLaboral'] = "Se publico con exito la oferta laboral";
                        header('Location: http://localhost/teincluyes/trabajo/publicarTrabajo');
                    } else {
                        $_SESSION['errorOfertaLaboral'] = "Debe completar todos los campos";
                        header('Location: http://localhost/teincluyes/trabajo/publicarTrabajo');
                    }
                } else {
                    $_SESSION['errorOfertaLaboral'] = "Debe completar todos los campos";
                    header('Location: http://localhost/teincluyes/trabajo/publicarTrabajo');
                }
            } else {
                $_SESSION['errorOfertaLaboral'] = "Debe completar todos los campos";
                header('Location: http://localhost/teincluyes/trabajo/publicarTrabajo');
            }
            break;
        case 'empresa':
            $obtenerOfertasLaborales = $objetoOfertaLaboralSql->obtenerOfertasLaborales($_SESSION['usuario']['idusuarioEmpresa'], $conexion);
            $_SESSION['ofertasLaborales'] = $obtenerOfertasLaborales;
            header('Location: http://localhost/teincluyes/empresa/perfil');
            break;
        case 'verDetallesOfertaLaboral':
            if (isset($_POST['idOfertaLaboral'])) {
                if ($_POST['idOfertaLaboral'] != '') {
                    $obtenerOfertaLaboralEspecifica = $objetoOfertaLaboralSql->obtenerOfertaLaboralEspecifica($_POST['idOfertaLaboral'], $conexion);
                    $_SESSION['ofertaLaboralEspecifica'] = $obtenerOfertaLaboralEspecifica;
                    header('Location: http://localhost/teincluyes/empresa/verDetallesOfertaLaboral');
                } else {
                    $_SESSION['errorOfertaLaboral'] = "Error al cargar los detalles de la oferta laboral";
                    header('Location: http://localhost/teincluyes/empresa/perfil');
                }
            } else {
                $_SESSION['errorOfertaLaboral'] = "Error al cargar los detalles de la oferta laboral";
                header('Location: http://localhost/teincluyes/empresa/perfil');
            }
            break;
        case 'verPostulantes':
            if (isset($_POST['idOfertaLaboral'])) {
                if ($_POST['idOfertaLaboral'] != '') {
                    $obtenerPostulantes = $objetoOfertaLaboralSql->obtenerPostulantes($_POST['idOfertaLaboral'], $conexion);
                    $_SESSION['postulantes'] = $obtenerPostulantes;
                    header('Location: http://localhost/teincluyes/trabajo/verPostulantes');
                } else {
                    $_SESSION['errorOfertaLaboral'] = "Error al cargar los postulantes";
                    header('Location: http://localhost/teincluyes/empresa/perfil');
                }
            } else {
                $_SESSION['errorOfertaLaboral'] = "Error al cargar los postulantes";
                header('Location: http://localhost/teincluyes/empresa/perfil');
            }
            break;
        case 'verPerfilPostulante':
            if (isset($_POST['idPostulante'])) {
                if ($_POST['idPostulante'] != '') {
                    $obtenerExperienciasLaboralesUsuariosTea = $objetoUsuarioSql->obtenerExperienciasLaboralesUsuariosTea($_POST['idPostulante'], $conexion);
                    $_SESSION['experienciasLaborales'] = $obtenerExperienciasLaboralesUsuariosTea;
                    $obtenerFormacionAcademica = $objetoUsuarioSql->obtenerFormacionAcademica($_POST['idPostulante'], $conexion);
                    $_SESSION['formacionAcademica'] = $obtenerFormacionAcademica;
                    $obtenerHabilidades = $objetoUsuarioSql->obtenerHabilidad($_POST['idPostulante'], $conexion);
                    $_SESSION['habilidades'] = $obtenerHabilidades;
                    $obtenerIdiomas = $objetoUsuarioSql->obtenerIdioma($_POST['idPostulante'], $conexion);
                    $_SESSION['idiomasUsuario'] = $obtenerIdiomas;
                    $obtenerPostulante = $objetoOfertaLaboralSql->obtenerPostulante($_POST['idPostulante'], $conexion);
                    $_SESSION['postulante'] = $obtenerPostulante;
                    header('Location: http://localhost/teincluyes/trabajo/verPerfilPostulante');
                } else {
                    $_SESSION['errorOfertaLaboral'] = "No se pudo cargar el perfil del postulante";
                    header('Location: http://localhost/teincluyes/trabajo/verPostulantes');
                }
            } else {
                $_SESSION['errorOfertaLaboral'] = "No se pudo cargar el perfil del postulante";
                header('Location: http://localhost/teincluyes/trabajo/verPostulantes');
            }
            break;
        case 'eliminarOferta':
            if (isset($_POST['idOfertaLaboral'])) {
                if ($_POST['idOfertaLaboral'] != '') {
                    $eliminarPostulaciones = $objetoOfertaLaboralSql->eliminarPostulaciones($_POST['idOfertaLaboral'], $conexion);
                    $eliminarOfertaLaboral = $objetoOfertaLaboralSql->eliminarOfertaLaboral($_POST['idOfertaLaboral'], $conexion);
                    if ($eliminarPostulaciones == 1) {
                        if ($eliminarOfertaLaboral == 1) {
                            $obtenerOfertasLaborales = $objetoOfertaLaboralSql->obtenerOfertasLaborales($_SESSION['usuario']['idusuarioEmpresa'], $conexion);
                            $_SESSION['ofertasLaborales'] = $obtenerOfertasLaborales;
                            $_SESSION['exitoOfertaLaboral'] = "Se elimino con exito la oferta laboral";
                            header('Location: http://localhost/teincluyes/empresa/perfil');
                        } else {
                            $_SESSION['errorOfertaLaboral'] = "No se pudo eliminar la oferta laboral";
                            header('Location: http://localhost/teincluyes/empresa/perfil');
                        }
                    } else {
                        $_SESSION['errorOfertaLaboral'] = "No se pudo eliminar la oferta laboral";
                        header('Location: http://localhost/teincluyes/empresa/perfil');
                    }
                } else {
                    $_SESSION['errorOfertaLaboral'] = "No se pudo eliminar la oferta laboral";
                    header('Location: http://localhost/teincluyes/empresa/perfil');
                }
            } else {
                $_SESSION['errorOfertaLaboral'] = "No se pudo eliminar la oferta laboral";
                header('Location: http://localhost/teincluyes/empresa/perfil');
            }
            break;
        case 'verOfertasLaborales':
            $obtenerTodasLasOfertasLaborales = $objetoOfertaLaboralSql->obtenerTodasLasOfertasLaborales($conexion);
            $_SESSION['obtenerTodasLasOfertasLaborales'] = $obtenerTodasLasOfertasLaborales;
            header('Location: http://localhost/teincluyes/usuario/verOfertasLaborales');
            break;
        case 'postularOfertaLaboral':
            if (isset($_POST['idOfertaLaboral']) && isset($_POST['idCurriculum'])) {
                if ($_POST['idOfertaLaboral'] != '' && $_POST['idCurriculum'] != '') {
                    $obtenerPostulacionOfertaLaboral = $objetoOfertaLaboralSql->obtenerPostulacionOfertaLaboral($_POST['idCurriculum'], $conexion);
                    print_r($obtenerPostulacionOfertaLaboral);
                    if ($obtenerPostulacionOfertaLaboral['cantidad'] == 0) {
                        $ingresarPostulacionLaboral = $objetoOfertaLaboralSql->ingresarPostulacionLaboral($_POST['idCurriculum'], $_POST['idOfertaLaboral'], $fecha->format('Y-m-d H:i:s'), $conexion);
                        if ($ingresarPostulacionLaboral == 1) {
                            $_SESSION['exitoOfertaLaboral'] = "Se postulo con exito a la oferta laboral";
                            header('Location: http://localhost/teincluyes/usuario/verOfertasLaborales');
                        } else {
                            $_SESSION['errorOfertaLaboral'] = "No se pudo postular la oferta laboral";
                            header('Location: http://localhost/teincluyes/usuario/verOfertasLaborales');
                        }
                    } else {
                        $_SESSION['errorOfertaLaboral'] = "Ya se postulo a esta oferta laboral";
                        header('Location: http://localhost/teincluyes/usuario/verOfertasLaborales');
                    }
                } else {
                    $_SESSION['errorOfertaLaboral'] = "Error al postular a la oferta laboral";
                    header('Location: http://localhost/teincluyes/usuario/verOfertasLaborales');
                }
            } else {
                $_SESSION['errorOfertaLaboral'] = "Error al postular a la oferta laboral";
                header('Location: http://localhost/teincluyes/usuario/verOfertasLaborales');
            }
            break;
    }
} else {
    Header('Location: http://localhost/teincluyes/inicio');
}
