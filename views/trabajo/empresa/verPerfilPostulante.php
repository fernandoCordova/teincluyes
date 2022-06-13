<?php
include_once('../../layout/header.php');
$postulante = $_SESSION['postulante'];
$experienciasLaborales = $_SESSION['experienciasLaborales'];
$formacionAcademica = $_SESSION['formacionAcademica'];
$habilidades = $_SESSION['habilidades'];
$idiomas = $_SESSION['idiomasUsuario'];

?>
<link rel="stylesheet" href="http://localhost/teincluyes/css/curriculum/curriculum.css">
<section class="pb-5 estilos-header" id="cv">
    <div class="container px-5 my-5">
        <div class="row gx-5">
            <div class="col-lg-4 mb-5 mb-lg-0 estilo-informacion-personal">
                <div>
                    <div>
                        <h6>
                            <?php
                            echo $postulante[0]['telefono'];
                            ?>
                        </h6>
                        <h6>Correo:
                            <?php
                            echo $postulante[0]['correo'];
                            ?>
                        </h6>
                    </div>
                </div>
                <hr>
                <div>
                    <h4>Acerca de mi</h4>
                    <p>
                        <?php
                        echo $postulante[0]['acercaDeMi'];
                        ?>
                    </p>
                </div>
                <hr>
                <div>
                    <p>
                        <?php
                        echo $postulante[0]['direccion'] . ' - ' . $postulante[0]['region'] . ' - ' . $postulante[0]['nombre'];
                        ?>
                    </p>
                </div>
                <div>
                    <p>
                        <?php
                        echo $postulante[0]['nombreGentilicio'];
                        ?>
                    </p>
                    <p>
                        <?php
                        echo $postulante[0]['genero'];
                        ?>
                    </p>
                    <p>
                        <?php
                        echo $postulante[0]['rut'];
                        ?>
                    </p>
                    <p>
                        <?php
                        date_default_timezone_set('America/Santiago');
                        $fecha_nacimiento = $postulante[0]['fechaNacimiento'];
                        $dia_actual = date("Y-m-d");
                        $edad_diff = date_diff(date_create($fecha_nacimiento), date_create($dia_actual));
                        echo 'Edad: ' . $edad_diff->format('%y');
                        ?>
                    </p>
                </div>

            </div>
            <div class="col-lg-8 estilo-informacion-general">
                <div>
                    <h2>
                        <?php echo $postulante[0]['nombres'] . ' ' . $postulante[0]['apellidos'] ?>
                    </h2>
                    <h4>
                        <?php
                        echo $postulante[0]['titulo'];
                        ?>
                    </h4>
                    <h6>
                        <?php
                        echo $postulante[0]['experiencia'];
                        ?>
                    </h6>
                </div>
                <div>
                    <h4>Experiencia laboral</h4>
                    <?php
                    foreach ($experienciasLaborales as $experiencia) { ?>
                        <p>
                        <h5 class="my-0">
                            <?php echo $experiencia['cargo'] ?>
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
                </div>
                <div>
                    <h4>Formación académica</h4>
                    <?php
                    foreach ($formacionAcademica as $formacionAcademica) {
                        if ($formacionAcademica['nivelEstudio_idnivelEstudio'] > 3) {
                    ?>
                            <p>
                            <h5 class="my-0">
                                <?php echo $formacionAcademica['carrera'] . ' ' . $formacionAcademica['mencion'] ?>
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
                                <?php echo 'Enseñanza: ' . $formacionAcademica['estudios'] ?>

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
                </div>
                <div>
                    <h4>Habilidades</h4>
                    <ol>
                        <?php foreach ($habilidades as $habilidad) { ?>
                            <li><?php echo $habilidad['nombreHabilidad'] ?></li>
                        <?php } ?>
                    </ol>
                </div>
                <div>
                    <h4>Idiomas</h4>
                    <ol>
                        <?php foreach ($idiomas as $idioma) { ?>
                            <li><?php echo $idioma['nombre'] ?></li>
                        <?php } ?>
                    </ol>
                </div>
                <div>
                    <h4>Expectativa de renta</h4>
                    <p>
                        <?php
                        echo '$'.$postulante[0]['renta']. ' pesos liquido mensual';
                        ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
include_once('../../layout/footer.php');
?>