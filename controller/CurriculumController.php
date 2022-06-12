<?php
if (isset($_POST['btnCurriculum'])) {
    session_start();
    include_once('../config/BDConfiguracion.php');
    include_once('../model/Curriculum.php');
    include_once('../model/ExperienciaLaboral.php');
    include_once('../model/FormacionAcademica.php');
    include_once('../repository/sql/NacionalidadSql.php');
    include_once('../repository/sql/PaisSql.php');
    include_once('../repository/sql/RegionSql.php');
    include_once('../repository/sql/CurriculumSql.php');
    include_once('../repository/sql/UsuarioTeaSql.php');
    include_once('../repository/sql/UsuarioSql.php');
    include_once('../repository/sql/TipoTrabajoSql.php');
    include_once('../repository/sql/ActividadEmpresaSql.php');
    include_once('../repository/sql/JerarquiaEmpresaSql.php');
    include_once('../repository/sql/ExperienciaLaboralSql.php');
    include_once('../repository/sql/NivelEstudioSql.php');
    include_once('../repository/sql/FormacionAcademicaSql.php');
    include_once('../repository/sql/habilidadSql.php');
    include_once('../repository/sql/IdiomaSql.php');
    $objetoNacionalidad = new NacionalidadSql();
    $objetoPais = new PaisSql();
    $objetoRegion = new RegionSql();
    $objetoCurriculum = new curriculumSql();
    $objetoUsuarioTea = new UsuarioTeaSql();
    $objetoUsuario = new UsuarioSql();
    $objetoTipoTrabajo = new TipoTrabajoSql();
    $objetoActividadEmpresa = new ActividadEmpresaSql();
    $objetoJerarquiaEmpresa = new JerarquiaEmpresaSql();
    $objetoNivelEstudio = new NivelEstudioSql();
    $objetoExperienciaLaboral = new ExperienciaLaboralSql();
    $objetoFormacionAcademica = new FormacionAcademicaSql();
    $objetoHabilidad = new habilidadSql();
    $objetoIdioma = new IdiomaSql();
    $objetoConexion = new BDConfiguracion();
    $conexion = $objetoConexion->obtenerConexion();
    $accion = $_POST['btnCurriculum'];
    switch ($accion) {
        case 'curriculum':
            header('Location: http://localhost/teincluyes/curriculum');
            break;
        case 'editarInformacionPersonal':
            $nacionalidades =  $objetoNacionalidad->obtenerNacionalidades($conexion);
            $paises = $objetoPais->obtenerPaises($conexion);
            $regiones = $objetoRegion->obtenerRegiones($conexion);
            $_SESSION['nacionalidades'] = $nacionalidades;
            $_SESSION['paises'] = $paises;
            $_SESSION['regiones'] = $regiones;
            header('Location: http://localhost/teincluyes/informacionPersonal/editar');
            break;
        case 'actualizarCurriculum':
            if (
                isset($_POST['nombres']) && isset($_POST['apellidos']) && isset($_POST['cargo']) && isset($_POST['aniosExperiencia'])
                && isset($_POST['correo']) && isset($_POST['telefono']) && isset($_POST['portafolio']) && isset($_POST['nacionalidad'])
                && isset($_POST['rut']) && isset($_POST['fechaNacimiento']) && isset($_POST['genero']) && isset($_POST['pais'])
                && isset($_POST['region']) && isset($_POST['direccion']) && isset($_POST['renta']) &&  isset($_POST['sobremi'])
            ) {
                $datosObtenerUsuarioTea = [
                    'idusuario' => $_SESSION['usuario']['idusuario'],
                ];
                $idUsuarioTea = $objetoUsuarioTea->obtenerIdUsuarioTea($datosObtenerUsuarioTea, $conexion);
                $idCurriculum = $objetoCurriculum->obtenerIdCurriculum($idUsuarioTea['idusuarioTea'], $conexion);
                $curriculum = new Curriculum(null, $_POST['telefono'], $_POST['portafolio'], $_POST['sobremi'], $_POST['direccion'], $_POST['genero'], $_POST['fechaNacimiento'], $_POST['cargo'], $_POST['aniosExperiencia'], $_POST['renta'], $_POST['nacionalidad'], $_POST['pais'], $_POST['region'], $idUsuarioTea['idusuarioTea']);
                $datosUsuario = [
                    'rut' => $_POST['rut'],
                    'nombres' => $_POST['nombres'],
                    'apellidos' => $_POST['apellidos']
                ];
                $actualizarUsuario = $objetoUsuario->actualizarUsuario($datosUsuario, $_SESSION['usuario']['idusuario'], $conexion);
                if ($actualizarUsuario == 1) {
                    $actualizarCurriculum = $objetoCurriculum->actualizarCurriculum($curriculum, $idCurriculum['idcurriculum'], $conexion);
                    if ($actualizarCurriculum == 1) {
                        $obtenerDatosUsuarioTea = $objetoUsuario->obtenerDatosUsuarioTea($_SESSION['usuario']['idusuario'], $conexion);
                        $_SESSION['usuario'] = $obtenerDatosUsuarioTea;
                        header('Location: http://localhost/teincluyes/curriculum');
                    } else {
                        $_SESSION['error'] = 'Error al actualizar el curriculum 2';
                        header('Location: http://localhost/teincluyes/informacionPersonal/editar');
                    }
                } else {
                    $_SESSION['error'] = 'Error al actualizar el curriculum 1';
                    header('Location: http://localhost/teincluyes/informacionPersonal/editar');
                }
            } else {
                $_SESSION['error'] = 'Error al actualizar el curriculum';
                header('Location: http://localhost/teincluyes/informacionPersonal/editar');
            }
            break;
        case 'experienciaLaboral':
            $tipoTrabajo = $objetoTipoTrabajo->obtenerTiposDeTrabajo($conexion);
            $actividadEmpresa = $objetoActividadEmpresa->obtenerActividadesEmpresa($conexion);
            $jerarquiaEmpresa = $objetoJerarquiaEmpresa->obtenerJerarquiasEmpresa($conexion);
            $_SESSION['tipoTrabajo'] = $tipoTrabajo;
            $_SESSION['actividadEmpresa'] = $actividadEmpresa;
            $_SESSION['jerarquiaEmpresa'] = $jerarquiaEmpresa;
            header('Location: http://localhost/teincluyes/experienciaLaboral/agregar');
            break;
        case 'agregarExperienciaLaboral':
            if (isset($_POST['cargo']) && isset($_POST['tipoTrabajo']) && isset($_POST['empresa']) && isset($_POST['jerarquia']) && isset($_POST['actividad']) && isset($_POST['fechaInicio']) && isset($_POST['fechaTermino']) && isset($_POST['continuidadLaboral']) && isset($_POST['responsabilidades'])) {
                if ($_POST['cargo'] != '' && $_POST['tipoTrabajo'] != '' && $_POST['empresa'] != '' && $_POST['jerarquia'] != '' && $_POST['actividad'] != '' && $_POST['fechaInicio'] != '' && $_POST['fechaTermino'] != '' && $_POST['continuidadLaboral'] != '' && $_POST['responsabilidades'] != '') {
                    $datosObtenerUsuarioTea = [
                        'idusuario' => $_SESSION['usuario']['idusuario'],
                    ];
                    $idUsuarioTea = $objetoUsuarioTea->obtenerIdUsuarioTea($datosObtenerUsuarioTea, $conexion);
                    $idCurriculum = $objetoCurriculum->obtenerIdCurriculum($idUsuarioTea['idusuarioTea'], $conexion);
                    $experienciaLaboral = new ExperienciaLaboral($_POST['cargo'], $_POST['empresa'], $_POST['fechaInicio'], $_POST['fechaTermino'], $_POST['continuidadLaboral'], $_POST['responsabilidades'], $_POST['tipoTrabajo'], $_POST['jerarquia'], $_POST['actividad'], $idCurriculum['idcurriculum']);
                    $agregarExperienciaLaboral = $objetoExperienciaLaboral->agregarExperienciaLaboral($experienciaLaboral, $conexion);
                    if ($agregarExperienciaLaboral == 1) {
                        $obtenerExperienciasLaboralesUsuariosTea = $objetoUsuario->obtenerExperienciasLaboralesUsuariosTea($idCurriculum, $conexion);
                        $_SESSION['experienciasLaborales'] = $obtenerExperienciasLaboralesUsuariosTea;
                        header('Location: http://localhost/teincluyes/curriculum');
                    } else {
                        $_SESSION['error'] = 'Error al agregar la experiencia laboral';
                        header('Location: http://localhost/teincluyes/experienciaLaboral/agregar');
                    }
                } else {
                    $_SESSION['error'] = 'Error al agregar la experiencia laboral';
                    header('Location: http://localhost/teincluyes/experienciaLaboral/agregar');
                }
            } else {
                $_SESSION['error'] = 'Error al agregar la experiencia laboral';
                header('Location: http://localhost/teincluyes/experienciaLaboral/agregar');
            }
            break;

        case 'verDetallesExperienciaLaboral':
            if (isset($_POST['idExperienciaLaboral'])) {
                if ($_POST['idExperienciaLaboral'] != '') {
                    $tipoTrabajo = $objetoTipoTrabajo->obtenerTiposDeTrabajo($conexion);
                    $actividadEmpresa = $objetoActividadEmpresa->obtenerActividadesEmpresa($conexion);
                    $jerarquiaEmpresa = $objetoJerarquiaEmpresa->obtenerJerarquiasEmpresa($conexion);
                    $_SESSION['tipoTrabajo'] = $tipoTrabajo;
                    $_SESSION['actividadEmpresa'] = $actividadEmpresa;
                    $_SESSION['jerarquiaEmpresa'] = $jerarquiaEmpresa;
                    $datosObtenerExperienciaLaboral = [
                        'idExperienciaLaboral' => $_POST['idExperienciaLaboral']
                    ];
                    $obtenerExperienciaLaboral = $objetoExperienciaLaboral->obtenerExperienciaLaboral($datosObtenerExperienciaLaboral, $conexion);
                    $_SESSION['experienciaLaboral'] = $obtenerExperienciaLaboral;
                    header('Location: http://localhost/teincluyes/experienciaLaboral/editar');
                } else {
                    $_SESSION['error'] = 'Error al obtener la experiencia laboral';
                    header('Location: http://localhost/teincluyes/curriculum');
                }
            } else {
                $_SESSION['error'] = 'Error al ver los detalles de la experiencia laboral';
                header('Location: http://localhost/teincluyes/curriculum');
            }
            break;
        case 'editarExperienciaLaboral':
            if (isset($_POST['cargo']) && isset($_POST['tipoTrabajo']) && isset($_POST['empresa']) && isset($_POST['jerarquia']) && isset($_POST['actividad']) && isset($_POST['fechaInicio']) && isset($_POST['fechaTermino']) && isset($_POST['continuidadLaboral']) && isset($_POST['responsabilidades']) && isset($_POST['idexperienciaLaboral'])) {
                if ($_POST['cargo'] != '' && $_POST['tipoTrabajo'] != '' && $_POST['empresa'] != '' && $_POST['jerarquia'] != '' && $_POST['actividad'] != '' && $_POST['fechaInicio'] != '' && $_POST['fechaTermino'] != '' && $_POST['continuidadLaboral'] != '' && $_POST['responsabilidades'] != '' && $_POST['idexperienciaLaboral'] != '') {
                    $datosObtenerUsuarioTea = [
                        'idusuario' => $_SESSION['usuario']['idusuario'],
                    ];
                    $idUsuarioTea = $objetoUsuarioTea->obtenerIdUsuarioTea($datosObtenerUsuarioTea, $conexion);
                    $idCurriculum = $objetoCurriculum->obtenerIdCurriculum($idUsuarioTea['idusuarioTea'], $conexion);
                    $experienciaLaboral = new ExperienciaLaboral($_POST['cargo'], $_POST['empresa'], $_POST['fechaInicio'], $_POST['fechaTermino'], $_POST['continuidadLaboral'], $_POST['responsabilidades'], $_POST['tipoTrabajo'], $_POST['jerarquia'], $_POST['actividad'], $idCurriculum['idcurriculum']);
                    $editarExperienciaLaboral = $objetoExperienciaLaboral->editarExperienciaLaboral($experienciaLaboral, $_POST['idexperienciaLaboral'], $conexion);
                    if ($editarExperienciaLaboral == 1) {
                        $obtenerExperienciasLaboralesUsuariosTea = $objetoUsuario->obtenerExperienciasLaboralesUsuariosTea($idCurriculum, $conexion);
                        $_SESSION['experienciasLaborales'] = $obtenerExperienciasLaboralesUsuariosTea;
                        header('Location: http://localhost/teincluyes/curriculum');
                    } else {
                        $_SESSION['error'] = 'Error al agregar la experiencia laboral';
                        header('Location: http://localhost/teincluyes/experienciaLaboral/agregar');
                    }
                } else {
                    $_SESSION['error'] = 'Error al agregar la experiencia laboral';
                    header('Location: http://localhost/teincluyes/experienciaLaboral/agregar');
                }
            } else {
                $_SESSION['error'] = 'Error al agregar la experiencia laboral';
                header('Location: http://localhost/teincluyes/experienciaLaboral/agregar');
            }
            break;
        case 'eliminarExperienciaLaboral':
            if (isset($_POST['idexperienciaLaboral'])) {
                if ($_POST['idexperienciaLaboral'] != '') {
                    $datosObtenerUsuarioTea = [
                        'idusuario' => $_SESSION['usuario']['idusuario'],
                    ];
                    $idUsuarioTea = $objetoUsuarioTea->obtenerIdUsuarioTea($datosObtenerUsuarioTea, $conexion);
                    $idCurriculum = $objetoCurriculum->obtenerIdCurriculum($idUsuarioTea['idusuarioTea'], $conexion);
                    $eliminarExperienciaLaboral = $objetoExperienciaLaboral->eliminarExperienciaLaboral($_POST['idexperienciaLaboral'], $conexion);
                    if ($eliminarExperienciaLaboral == 1) {
                        $obtenerExperienciasLaboralesUsuariosTea = $objetoUsuario->obtenerExperienciasLaboralesUsuariosTea($idCurriculum, $conexion);
                        $_SESSION['experienciasLaborales'] = $obtenerExperienciasLaboralesUsuariosTea;
                        header('Location: http://localhost/teincluyes/curriculum');
                    } else {
                        $_SESSION['error'] = 'Error al eliminar la experiencia laboral';
                        header('Location: http://localhost/teincluyes/curriculum');
                    }
                } else {
                    $_SESSION['error'] = 'Error al eliminar la experiencia laboral';
                    header('Location: http://localhost/teincluyes/curriculum');
                }
            } else {
                $_SESSION['error'] = 'Error al eliminar la experiencia laboral';
                header('Location: http://localhost/teincluyes/curriculum');
            }
            break;
        case 'formacionAcademica':
            $nivelEstudios = $objetoNivelEstudio->obtenerNivelEstudios($conexion);
            $paises = $objetoPais->obtenerPaises($conexion);
            $regiones = $objetoRegion->obtenerRegiones($conexion);
            $_SESSION['paises'] = $paises;
            $_SESSION['regiones'] = $regiones;
            $_SESSION['nivelEstudios'] = $nivelEstudios;
            header('Location: http://localhost/teincluyes/formacionAcademica/agregar');
            break;
        case 'agregarFormacionAcademica':
            if (isset($_POST['nivelEstudio']) && isset($_POST['pais']) && isset($_POST['institucion']) && isset($_POST['sede']) && isset($_POST['carrera']) && isset($_POST['mencion']) && isset($_POST['modalidad']) && isset($_POST['situacion']) && isset($_POST['fechaInicio']) && isset($_POST['fechaTermino'])) {
                if ($_POST['nivelEstudio'] != '' && $_POST['pais'] != '' && $_POST['institucion']) {
                    $datosObtenerUsuarioTea = [
                        'idusuario' => $_SESSION['usuario']['idusuario'],
                    ];
                    if ($_POST['sede'] != '') {
                        $sede = $_POST['sede'];
                    } else {
                        $sede = 1;
                    }
                    $idUsuarioTea = $objetoUsuarioTea->obtenerIdUsuarioTea($datosObtenerUsuarioTea, $conexion);
                    $idCurriculum = $objetoCurriculum->obtenerIdCurriculum($idUsuarioTea['idusuarioTea'], $conexion);
                    $formacionProfesional = new FormacionAcademica($_POST['carrera'], $_POST['mencion'], $_POST['modalidad'], $_POST['situacion'], $_POST['fechaInicio'], $_POST['fechaTermino'], $_POST['institucion'], $_POST['pais'], $sede, $_POST['nivelEstudio'], $idCurriculum['idcurriculum']);
                    $agregarFormacionProfesional = $objetoFormacionAcademica->agregarFormacionProfesional($formacionProfesional, $conexion);
                    if ($agregarFormacionProfesional == 1) {
                        $obtenerFormacionAcademica = $objetoUsuario->obtenerFormacionAcademica($idCurriculum['idcurriculum'], $conexion);
                        $_SESSION['formacionAcademica'] = $obtenerFormacionAcademica;
                        header('Location: http://localhost/teincluyes/curriculum');
                    } else {
                        $_SESSION['error'] = 'Error al agregar la experiencia laboral';
                        header('Location: http://localhost/teincluyes/experienciaLaboral/agregar');
                    }
                } else {
                    $_SESSION['error'] = 'Error al agregar la formación académica';
                    header('Location: http://localhost/teincluyes/formacionAcademica/agregar');
                }
            } else {
                $_SESSION['error'] = 'Error al agregar la formacion academica';
                header('Location: http://localhost/teincluyes/formacionAcademica/agregar');
            }
            break;

        case 'verDetallesFormacionAcademica':
            if (isset($_POST['idformacionAcademica'])) {
                if ($_POST['idformacionAcademica'] != '') {
                    $nivelEstudios = $objetoNivelEstudio->obtenerNivelEstudios($conexion);
                    $paises = $objetoPais->obtenerPaises($conexion);
                    $regiones = $objetoRegion->obtenerRegiones($conexion);
                    $_SESSION['paises'] = $paises;
                    $_SESSION['regiones'] = $regiones;
                    $_SESSION['nivelEstudios'] = $nivelEstudios;
                    $datosObtenerFormacionAcademica = [
                        'idformacionAcademica' => $_POST['idformacionAcademica']
                    ];
                    $obtenerFormacionAcademica = $objetoFormacionAcademica->obtenerFormacionAcademicaEspecifica($datosObtenerFormacionAcademica, $conexion);
                    $_SESSION['formacionAcademicaEspecifica'] = $obtenerFormacionAcademica;
                    header('Location: http://localhost/teincluyes/formacionAcademica/editar');
                } else {
                    $_SESSION['error'] = 'Error al obtener la experiencia laboral';
                    header('Location: http://localhost/teincluyes/curriculum');
                }
            } else {
                $_SESSION['error'] = 'Error al ver los detalles de la experiencia laboral';
                header('Location: http://localhost/teincluyes/curriculum');
            }
            break;
        case 'editarFormacionAcademica':
            if (isset($_POST['nivelEstudio']) && isset($_POST['pais']) && isset($_POST['institucion']) && isset($_POST['sede']) && isset($_POST['carrera']) && isset($_POST['mencion']) && isset($_POST['modalidad']) && isset($_POST['situacion']) && isset($_POST['fechaInicio']) && isset($_POST['fechaTermino'])) {
                if ($_POST['nivelEstudio'] != '' && $_POST['pais'] != '' && $_POST['institucion'] != '') {
                    $datosObtenerUsuarioTea = [
                        'idusuario' => $_SESSION['usuario']['idusuario'],
                    ];
                    if ($_POST['sede'] != '') {
                        $sede = $_POST['sede'];
                    } else {
                        $sede = 1;
                    }
                    $idUsuarioTea = $objetoUsuarioTea->obtenerIdUsuarioTea($datosObtenerUsuarioTea, $conexion);
                    $idCurriculum = $objetoCurriculum->obtenerIdCurriculum($idUsuarioTea['idusuarioTea'], $conexion);
                    $formacionProfesional = new FormacionAcademica($_POST['carrera'], $_POST['mencion'], $_POST['modalidad'], $_POST['situacion'], $_POST['fechaInicio'], $_POST['fechaTermino'], $_POST['institucion'], $_POST['pais'], $sede, $_POST['nivelEstudio'], $idCurriculum['idcurriculum']);
                    $editarFormacionAcademica = $objetoFormacionAcademica->editarFormacionAcademica($formacionProfesional, $_POST['idformacionAcademica'], $conexion);
                    if ($editarFormacionAcademica == 1) {
                        $obtenerFormacionAcademica = $objetoUsuario->obtenerFormacionAcademica($idCurriculum['idcurriculum'], $conexion);
                        $_SESSION['formacionAcademica'] = $obtenerFormacionAcademica;
                        header('Location: http://localhost/teincluyes/curriculum');
                    } else {
                        $_SESSION['error'] = 'Error al agregar la experiencia laboral';
                        header('Location: http://localhost/teincluyes/experienciaLaboral/editar');
                    }
                } else {
                    $_SESSION['error'] = 'Error al agregar la formación académica';
                    header('Location: http://localhost/teincluyes/formacionAcademica/editar');
                }
            } else {
                $_SESSION['error'] = 'Error al agregar la formacion academica';
                header('Location: http://localhost/teincluyes/formacionAcademica/editar');
            }
            break;
        case 'eliminarFormacionAcademica':
            if (isset($_POST['idformacionAcademica'])) {
                if ($_POST['idformacionAcademica'] != '') {
                    $datosObtenerUsuarioTea = [
                        'idusuario' => $_SESSION['usuario']['idusuario'],
                    ];
                    $idUsuarioTea = $objetoUsuarioTea->obtenerIdUsuarioTea($datosObtenerUsuarioTea, $conexion);
                    $idCurriculum = $objetoCurriculum->obtenerIdCurriculum($idUsuarioTea['idusuarioTea'], $conexion);
                    $eliminarFormacionAcademica = $objetoFormacionAcademica->eliminarFormacionAcademica($_POST['idformacionAcademica'], $conexion);
                    if ($eliminarFormacionAcademica == 1) {
                        $obtenerFormacionAcademica = $objetoUsuario->obtenerFormacionAcademica($idCurriculum['idcurriculum'], $conexion);
                        $_SESSION['formacionAcademica'] = $obtenerFormacionAcademica;
                        header('Location: http://localhost/teincluyes/curriculum');
                    } else {
                        $_SESSION['error'] = 'Error al eliminar la experiencia laboral';
                        header('Location: http://localhost/teincluyes/curriculum');
                    }
                } else {
                    $_SESSION['error'] = 'Error al eliminar la experiencia laboral';
                    header('Location: http://localhost/teincluyes/curriculum');
                }
            } else {
                $_SESSION['error'] = 'Error al eliminar la experiencia laboral';
                header('Location: http://localhost/teincluyes/curriculum');
            }
            break;
        case 'habilidades':
            header('Location: http://localhost/teincluyes/habilidad/agregar');
            break;
        case 'agregarHabilidad':
            if (isset($_POST['habilidad'])) {
                if ($_POST['habilidad'] != '') {
                    $datosObtenerUsuarioTea = [
                        'idusuario' => $_SESSION['usuario']['idusuario'],
                    ];
                    $idUsuarioTea = $objetoUsuarioTea->obtenerIdUsuarioTea($datosObtenerUsuarioTea, $conexion);
                    $idCurriculum = $objetoCurriculum->obtenerIdCurriculum($idUsuarioTea['idusuarioTea'], $conexion);
                    $agregarHabilidad = $objetoHabilidad->agregarHabilidad($_POST['habilidad'], $conexion);
                    if ($agregarHabilidad == 1) {
                        $idhabilidad = $objetoHabilidad->obtenerIdHabilidad($_POST['habilidad'], $conexion);
                        $agregarHabilidadUsuario = $objetoHabilidad->insertarHabilidadUsuario($idhabilidad['idhabilidad'], $idCurriculum['idcurriculum'], $conexion);
                        if ($agregarHabilidadUsuario == 1) {
                            $obtenerHabilidades = $objetoUsuario->obtenerHabilidad($idCurriculum['idcurriculum'], $conexion);
                            $_SESSION['habilidades'] = $obtenerHabilidades;
                            header('Location: http://localhost/teincluyes/curriculum');
                        }
                    } else {
                        $_SESSION['error'] = 'Error al agregar la habilidad';
                        header('Location: http://localhost/teincluyes/habilidad/agregar');
                    }
                } else {
                    $_SESSION['error'] = 'Error al agregar la habilidad';
                    header('Location: http://localhost/teincluyes/habilidad/agregar');
                }
            } else {
                $_SESSION['error'] = 'Error al agregar la habilidad';
                header('Location: http://localhost/teincluyes/habilidad/agregar');
            }
            break;
        case 'eliminarHabilidad':
            if (isset($_POST['idhabilidad'])) {
                if ($_POST['idhabilidad'] != '') {
                    $datosObtenerUsuarioTea = [
                        'idusuario' => $_SESSION['usuario']['idusuario'],
                    ];
                    $idUsuarioTea = $objetoUsuarioTea->obtenerIdUsuarioTea($datosObtenerUsuarioTea, $conexion);
                    $idCurriculum = $objetoCurriculum->obtenerIdCurriculum($idUsuarioTea['idusuarioTea'], $conexion);
                    $eliminarHabilidadUsuario = $objetoHabilidad->eliminarHabilidadUsuario($_POST['idhabilidad'], $idCurriculum['idcurriculum'], $conexion);
                    if ($eliminarHabilidadUsuario == 1) {
                        $eliminarHabilidad = $objetoHabilidad->eliminarHabilidad($_POST['idhabilidad'], $conexion);
                        if ($eliminarHabilidad == 1) {
                            $obtenerHabilidades = $objetoUsuario->obtenerHabilidad($idCurriculum['idcurriculum'], $conexion);
                            $_SESSION['habilidades'] = $obtenerHabilidades;
                            header('Location: http://localhost/teincluyes/curriculum');
                        } else {
                            $_SESSION['error'] = 'Error al eliminar la habilidad';
                            header('Location: http://localhost/teincluyes/curriculum');
                        }
                    } else {
                        $_SESSION['error'] = 'Error al eliminar la habilidad';
                        header('Location: http://localhost/teincluyes/curriculum');
                    }
                } else {
                    $_SESSION['error'] = 'Error al eliminar la habilidad';
                    header('Location: http://localhost/teincluyes/curriculum');
                }
            } else {
                $_SESSION['error'] = 'Error al eliminar la habilidad';
                header('Location: http://localhost/teincluyes/curriculum');
            }
            break;
        case 'idiomas':
            $idiomas = $objetoIdioma->obtenerIdiomas($conexion);
            $_SESSION['idiomas'] = $idiomas;
            header('Location: http://localhost/teincluyes/idioma/agregar');
            break;
        case 'agregarIdioma':
            if (isset($_POST['ididioma'])) {
                if ($_POST['ididioma'] != '') {
                    $datosObtenerUsuarioTea = [
                        'idusuario' => $_SESSION['usuario']['idusuario'],
                    ];
                    $idUsuarioTea = $objetoUsuarioTea->obtenerIdUsuarioTea($datosObtenerUsuarioTea, $conexion);
                    $idCurriculum = $objetoCurriculum->obtenerIdCurriculum($idUsuarioTea['idusuarioTea'], $conexion);
                    $agregarIdiomaUsuario = $objetoIdioma->insertarIdiomaUsuario($_POST['ididioma'], $idCurriculum['idcurriculum'], $conexion);
                    if ($agregarIdiomaUsuario == 1) {
                        $obtenerIdiomas = $objetoUsuario->obtenerIdioma($idCurriculum['idcurriculum'], $conexion);
                        $_SESSION['idiomasUsuario'] = $obtenerIdiomas;
                        header('Location: http://localhost/teincluyes/curriculum');
                    } else {
                        $_SESSION['error'] = 'Error al agregar el idioma';
                        header('Location: http://localhost/teincluyes/idioma/agregar');
                    }
                } else {
                    $_SESSION['error'] = 'Error al agregar el idioma';
                    header('Location: http://localhost/teincluyes/idioma/agregar');
                }
            } else {
                $_SESSION['error'] = 'Error al agregar el idioma';
                header('Location: http://localhost/teincluyes/idioma/agregar');
            }
            break;
        case 'eliminarIdioma':
            if (isset($_POST['ididioma'])) {
                if ($_POST['ididioma'] != '') {
                    $datosObtenerUsuarioTea = [
                        'idusuario' => $_SESSION['usuario']['idusuario'],
                    ];
                    $idUsuarioTea = $objetoUsuarioTea->obtenerIdUsuarioTea($datosObtenerUsuarioTea, $conexion);
                    $idCurriculum = $objetoCurriculum->obtenerIdCurriculum($idUsuarioTea['idusuarioTea'], $conexion);
                    $eliminarIdiomaUsuario = $objetoIdioma->eliminarIdiomaUsuario($_POST['ididioma'], $idCurriculum['idcurriculum'], $conexion);
                    if ($eliminarIdiomaUsuario == 1) {
                        $obtenerIdiomas = $objetoUsuario->obtenerIdioma($idCurriculum['idcurriculum'], $conexion);
                        $_SESSION['idiomasUsuario'] = $obtenerIdiomas;
                        header('Location: http://localhost/teincluyes/curriculum');
                    } else {
                        $_SESSION['error'] = 'Error al eliminar el idioma';
                        header('Location: http://localhost/teincluyes/curriculum');
                    }
                } else {
                    $_SESSION['error'] = 'Error al eliminar el idioma';
                    header('Location: http://localhost/teincluyes/curriculum');
                }
            } else {
                $_SESSION['error'] = 'Error al eliminar el idioma';
                header('Location: http://localhost/teincluyes/curriculum');
            }
            break;
    }
}
