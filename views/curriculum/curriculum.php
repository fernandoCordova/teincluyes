<?php
include_once('../layout/header.php');
$experienciasLaborales = $_SESSION['experienciasLaborales'];
$formacionAcademica = $_SESSION['formacionAcademica'];
$habilidades = $_SESSION['habilidades'];
$idiomas = $_SESSION['idiomasUsuario'];
?>
<link rel="stylesheet" href="http://localhost/teincluyes/css/curriculum/curriculum.css">
<section class="pb-5 estilos-header" id="cv">
    <div class="container px-5 my-5">
        <?php if (isset($_SESSION['errorCurriculum'])) { ?>
            <div class="alert alert-danger" role="alert">
                <strong> <?php echo $_SESSION['errorCurriculum'] ?> </strong>
                <?php unset($_SESSION['errorCurriculum']) ?>
            </div>
        <?php } ?>
        <div class="row gx-5">
            <div class="col-lg-4 mb-5 mb-lg-0 estilo-informacion-personal">
                <div>
                    <div>
                        <h6>
                            <?php
                            if ($_SESSION['usuario']['telefono'] != '') {
                                echo '+' . $_SESSION['usuario']['telefono'];
                            } else {
                                echo 'No se ha ingresado un telefono';
                            }
                            ?>
                        </h6>
                        <h6>Correo:
                            <?php
                            if ($_SESSION['usuario']['correo'] != '') {
                                echo $_SESSION['usuario']['correo'];
                            } else {
                                echo 'No se ha ingresado una descripcion';
                            }
                            ?>
                        </h6>
                    </div>
                </div>
                <hr>
                <div>
                    <h4>Acerca de mi</h4>
                    <p>
                        <?php
                        if ($_SESSION['usuario']['acercaDeMi'] != '') {
                            echo $_SESSION['usuario']['acercaDeMi'];
                        } else {
                            echo 'No se ha ingresado una descripcion';
                        }
                        ?>
                    </p>
                </div>
                <hr>
                <div>
                    <p>
                        <?php
                        if ($_SESSION['usuario']['direccion'] != '' || $_SESSION['usuario']['region'] != '' || $_SESSION['usuario']['nombrePais'] != '') {
                            echo 'Direccion: ' . $_SESSION['usuario']['direccion'] . ', ' . $_SESSION['usuario']['region'] . ', ' . $_SESSION['usuario']['nombrePais'];
                        } else {
                            echo 'No se ha ingresado una direccion';
                        }
                        ?>
                    </p>
                </div>
                <div>
                    <p>
                        <?php
                        if ($_SESSION['usuario']['nombreGentilicio'] != '') {
                            echo 'Nacionalidad: ' . $_SESSION['usuario']['nombreGentilicio'];
                        } else {
                            echo 'No se ha ingresado una nacionalidad';
                        }
                        ?>
                    </p>
                    <p>
                        <?php
                        if ($_SESSION['usuario']['genero'] != '') {
                            echo 'Genero: ' . $_SESSION['usuario']['genero'];
                        } else {
                            echo 'No se ha ingresado un genero';
                        }
                        ?>
                    </p>
                    <p>
                        <?php
                        if ($_SESSION['usuario']['rut'] != '') {
                            echo 'Rut: ' . $_SESSION['usuario']['rut'];
                        } else {
                            echo 'No se ha ingresado un rut';
                        }
                        ?>
                    </p>
                    <p>
                        <?php
                        if ($_SESSION['usuario']['fechaNacimiento'] != '') {
                            date_default_timezone_set('America/Santiago');
                            $fecha_nacimiento = $_SESSION['usuario']['fechaNacimiento'];
                            $dia_actual = date("Y-m-d");
                            $edad_diff = date_diff(date_create($fecha_nacimiento), date_create($dia_actual));
                            echo 'Edad: ' . $edad_diff->format('%y');
                        } else {
                            echo 'No se ha ingresado una edad';
                        }
                        ?>
                    </p>
                </div>

            </div>
            <div class="col-lg-8 estilo-informacion-general">
                <div>
                    <h2>
                        <form action="http://localhost/teincluyes/controladorCurriculum" method="post">
                            <?php echo $_SESSION['usuario']['nombres'] . ' ' . $_SESSION['usuario']['apellidos'] ?>
                            <button class="btn boton-curriculum-general" type="subtmit" name="btnCurriculum" value="editarInformacionPersonal">
                                <i class="bi bi-pencil"></i>
                            </button>
                        </form>
                    </h2>
                    <h4>
                        <?php
                        if ($_SESSION['usuario']['titulo'] != '') {
                            echo $_SESSION['usuario']['titulo'];
                        } else {
                            echo 'No se ha ingresado un titulo o profesion';
                        }
                        ?>
                    </h4>
                    <h6>
                        <?php
                        if ($_SESSION['usuario']['experiencia'] != '') {
                            echo 'Años de experiencia: ' . $_SESSION['usuario']['experiencia'];
                        } else {
                            echo 'No se ha ingresado la cantidad de experiencia laboral';
                        }
                        ?>
                    </h6>
                </div>
                <div>
                    <h4>Experiencia laboral</h4>
                    <?php
                    foreach ($experienciasLaborales as $experiencia) { ?>
                        <p>
                        <h5 class="my-0">
                            <form action="http://localhost/teincluyes/controladorCurriculum" method="post">
                                <?php echo $experiencia['cargo'] ?>
                                <button class="btn boton-curriculum-general" type="submit" name="btnCurriculum" value="verDetallesExperienciaLaboral">
                                    <i class="bi bi-pencil"></i>
                                </button>
                                <input type="hidden" name="idExperienciaLaboral" value="<?php echo $experiencia['idexperienciaLaboral'] ?>">
                            </form>
                        </h5>
                        <p class="my-0">
                            <?php echo $experiencia['nombreEmpresa'] ?>
                        </p>
                        <p class="my-0">
                            <?php echo $experiencia['fechaInicio'] ?> - <?php echo $experiencia['fechaTermino'] ?>
                        </p>
                        <p class="my-0">
                            <?php echo $experiencia['descripcion'] ?>
                        </p>
                    <?php } ?>
                    <form action="http://localhost/teincluyes/controladorCurriculum" method="post">
                        <button class="btn boton-curriculum-general" type="submit" name="btnCurriculum" value="experienciaLaboral"><i class="bi bi-plus-square"></i> Agregar experiencia</button>
                    </form>
                </div>
                <div>
                    <h4>Formación académica</h4>
                    <?php
                    foreach ($formacionAcademica as $formacionAcademica) {
                        if ($formacionAcademica['nivelEstudio_idnivelEstudio'] > 3) {
                    ?>
                            <p>
                            <h5 class="my-0">
                                <form action="http://localhost/teincluyes/controladorCurriculum" method="post">
                                    <?php echo $formacionAcademica['carrera'] . ' ' . $formacionAcademica['mencion'] ?>
                                    <button class="btn boton-curriculum-general" type="submit" name="btnCurriculum" value="verDetallesFormacionAcademica">
                                        <i class="bi bi-pencil"></i>
                                    </button>
                                    <input type="hidden" name="idformacionAcademica" value="<?php echo $formacionAcademica['idformacionAcademica'] ?>">
                                </form>
                            </h5>
                            <p class="my-0">
                                <?php echo $formacionAcademica['institucion'] . ' - ' . $formacionAcademica['situacion'] . ' - ' . $formacionAcademica['modalidad'] ?>
                            </p>
                            <p class="my-0">
                                <?php echo $formacionAcademica['fechaInicio'] ?> - <?php echo $formacionAcademica['fechaTermino'] ?>
                            </p>
                        <?php } else { ?>
                            <p>
                            <h5 class="my-0">
                                <form action="http://localhost/teincluyes/controladorCurriculum" method="post">
                                    <?php echo 'Enseñanza: ' . $formacionAcademica['estudios'] ?>
                                    <button class="btn boton-curriculum-general" type="submit" name="btnCurriculum" value="verDetallesFormacionAcademica">
                                        <i class="bi bi-pencil"></i>
                                    </button>
                                    <input type="hidden" name="idformacionAcademica" value="<?php echo $formacionAcademica['idformacionAcademica'] ?>">
                                </form>
                            </h5>
                            <p class="my-0">
                                <?php echo $formacionAcademica['institucion'] ?>
                            </p>
                            <p class="my-0">
                                <?php echo $formacionAcademica['fechaTermino'] ?>
                            </p>
                    <?php
                        }
                    } ?>
                    <form action="http://localhost/teincluyes/controladorCurriculum" method="post">
                        <button class="btn boton-curriculum-general" type="submit" name="btnCurriculum" value="formacionAcademica"><i class="bi bi-plus-square"></i> Agregar formacion</button>
                    </form>
                </div>
                <div>
                    <h4>Habilidades</h4>
                    <ol>
                        <?php foreach ($habilidades as $habilidad) { ?>
                            <form action="http://localhost/teincluyes/controladorCurriculum" method="post">
                                <li><?php echo $habilidad['nombreHabilidad'] ?><button class="btn boton-curriculum-general" type="submit" name="btnCurriculum" value="eliminarHabilidad"><i class="bi bi-x-square"></i></button></li>
                                <input type="hidden" name="idhabilidad" value="<?php echo $habilidad['idhabilidad'] ?>">
                            </form>
                        <?php } ?>
                    </ol>
                    <form action="http://localhost/teincluyes/controladorCurriculum" method="post">
                        <button class="btn boton-curriculum-general" type="submit" name="btnCurriculum" value="habilidades"><i class="bi bi-plus-square"></i> Agregar habilidad</button>
                    </form>
                </div>
                <div>
                    <h4>Idiomas</h4>
                    <ol>
                        <?php foreach ($idiomas as $idioma) { ?>
                            <form action="http://localhost/teincluyes/controladorCurriculum" method="post">
                                <li><?php echo $idioma['nombre'] ?><button class="btn boton-curriculum-general" type="submit" name="btnCurriculum" value="eliminarIdioma"><i class="bi bi-x-square"></i></button></li>
                                <input type="hidden" name="ididioma" value="<?php echo $idioma['ididioma'] ?>">
                            </form>
                        <?php } ?>
                    </ol>
                    <form action="http://localhost/teincluyes/controladorCurriculum" method="post">
                        <button class="btn boton-curriculum-general" type="submit" name="btnCurriculum" value="idiomas"><i class="bi bi-plus-square"></i> Agregar idioma</button>
                    </form>
                </div>
                <div>
                    <h4>Expectativa de renta</h4>
                    <p>
                        <?php
                        if ($_SESSION['usuario']['renta'] != '') {
                            echo '$' . $_SESSION['usuario']['renta'] . ' pesos liquido mensual';
                        } else {
                            echo 'No se ha ingresado una expectativa de renta';
                        }
                        ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
include_once('../layout/footer.php');
?>