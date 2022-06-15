<?php
include_once('../../layout/header.php');
$nivelEstudios = $_SESSION['nivelEstudios'];
$paises = $_SESSION['paises'];
$regiones = $_SESSION['regiones'];
?>
<section class="pb-5" id="informacionPersonal">
    <div class="container px-5 my-5">
        <?php if (isset($_SESSION['errorCurriculum'])) { ?>
            <div class="alert alert-danger" role="alert">
                <strong> <?php echo $_SESSION['errorCurriculum'] ?> </strong>
                <?php unset($_SESSION['errorCurriculum']) ?>
            </div>
        <?php } ?>
        <form action="http://localhost/teincluyes/controladorCurriculum" method="post">
            <div class="row gx-5">
                <div class="mb-0">
                    <h2>Formacion academica</h2>
                </div>
                <div class="col-lg-12 mt-5">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="mb-3 mb-md-0">
                                <label for="nivelEstudio">Nivel de estudios</label>
                                <select class="nacionalidad form-select" name="nivelEstudio" id="nivelEstudio">
                                    <option value="opcionInicial">Seleccione una opcion</option>
                                    <?php
                                    foreach ($nivelEstudios as $nivelEstudios) { ?>
                                        <option value="<?php print_r($nivelEstudios['idnivelEstudio']) ?>">
                                            <?php print_r($nivelEstudios['estudios']) ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 pais" hidden>
                            <div class="mb-3 mb-md-0">
                                <label for="pais">Pais</label>
                                <select class="form-select" name="pais" id="pais">
                                    <option value="opcionInicial">Seleccione una opcion</option>
                                    <?php
                                    foreach ($paises as $pais) { ?>
                                        <option value="<?php print_r($pais['idpais']) ?>">
                                            <?php print_r($pais['nombre']) ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6 institucion" hidden>
                            <div class="mb-3 mb-md-0">
                                <label for="institucion">Institucion de educacion</label>
                                <input type="text" class="form-control" name="institucion" placeholder="Ingrese su institucion academica">
                            </div>
                        </div>
                        <div class="col-md-6 sede" hidden>
                            <div class="mb-3 mb-md-0">
                                <label for="sede">Region sede de la institucion</label>
                                <select class="form-select" name="sede" id="sede">
                                    <?php
                                    foreach ($regiones as $region) { ?>
                                        <option value="<?php print_r($region['idregion']) ?>">
                                            <?php print_r($region['region']) ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6 carrera" hidden>
                            <div class="mb-3 mb-md-0">
                                <label for="carrera">Carrera</label>
                                <input type="text" class="form-control" name="carrera" placeholder="Ingrese su carrera">
                            </div>
                        </div>
                        <div class="col-md-6 mencion" hidden>
                            <div class="mb-3 mb-md-0">
                                <label for="mencion">Mencion</label>
                                <input type="text" class="form-control" name="mencion" placeholder="Ingrese su mencion">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6 modalidad" hidden>
                            <div class="mb-3 mb-md-0">
                                <label for="modalidad">Modalidad de estudios</label>
                                <input type="text" class="form-control" name="modalidad" placeholder="Ingrese su modalidad">
                            </div>
                        </div>
                        <div class="col-md-6 situacion" hidden>
                            <div class="mb-3 mb-md-0">
                                <label for="situacion">Situacion</label>
                                <input type="text" class="form-control" name="situacion" placeholder="Ingrese su situacion academica">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6 fechaInicio" hidden>
                            <div class="mb-3 mb-md-0">
                                <label for="fechaInicio">Año de inicio</label>
                                <input type="date" class="form-control" name="fechaInicio">
                            </div>
                        </div>
                        <div class="col-md-6 fechaTermino" hidden>
                            <div class="mb-3 mb-md-0">
                                <label for="fechaTermino">Año de termino</label>
                                <input type="date" class="form-control" name="fechaTermino">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <button class="btn botones" type="submit" name="btnCurriculum" value="curriculum">Cancelar</button>
                            <button class="btn botones" type="submit" name="btnCurriculum" value="agregarFormacionAcademica">Guardar</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
<script src="http://localhost/teincluyes/js/curriculum/formacionAcademica.js"></script>
<?php
include_once('../../layout/footer.php');
?>