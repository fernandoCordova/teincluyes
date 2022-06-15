<?php
include_once('../../layout/header.php');
$tipoTrabajo = $_SESSION['tipoTrabajo'];
$jerarquiaEmpresa = $_SESSION['jerarquiaEmpresa'];
$actividadEmpresa = $_SESSION['actividadEmpresa'];
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
                    <h2>Experiencia laboral</h2>
                </div>
                <div class="col-lg-12 mt-5">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="mb-3 mb-md-0">
                                <label for="cargo">Cargo u ocupacion</label>
                                <input class="form-control" type="text" name="cargo" placeholder="Ingresa el cargo" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3 mb-md-0">
                                <label for="tipoTrabajo">Tipo de trabajo</label>
                                <select class="nacionalidad form-select" name="tipoTrabajo">
                                    <option>Selecione un tipo de trabajo</option>
                                    <?php
                                    foreach ($tipoTrabajo as $tipoTrabajo) { ?>
                                        <option value="<?php print_r($tipoTrabajo['idtipoTrabajo']) ?>">
                                            <?php print_r($tipoTrabajo['tipo']) ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="mb-3 mb-md-0">
                                <label for="empresa">Empresa</label>
                                <input class="form-control" type="text" name="empresa" placeholder="Ingrese el nombre de la empresa" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3 mb-md-0">
                                <label for="jerarquia">Jerarquia</label>
                                <select class="nacionalidad form-select" name="jerarquia">
                                    <option>Selecione una jerarquia</option>
                                    <?php
                                    foreach ($jerarquiaEmpresa as $jerarquiaEmpresa) { ?>
                                        <option value="<?php print_r($jerarquiaEmpresa['idjerarquiaEmpresa']) ?>">
                                            <?php print_r($jerarquiaEmpresa['jerarquia']) ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="mb-3 mb-md-0">
                                <label for="actividad">Actividad de la empresa</label>
                                <select class="nacionalidad form-select" name="actividad">
                                    <option>Selecione una actividad</option>
                                    <?php
                                    foreach ($actividadEmpresa as $actividadEmpresa) { ?>
                                        <option value="<?php print_r($actividadEmpresa['idactividadEmpresa']) ?>">
                                            <?php print_r($actividadEmpresa['actividad']) ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3 mb-md-0">
                                <label for="fechaInicio">Fecha de inicio</label>
                                <input type="date" class="form-control" name="fechaInicio">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="mb-3 mb-md-0">
                                <label for="fechaTermino">Fecha de Termino</label>
                                <input type="date" class="form-control" name="fechaTermino">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3 mb-md-0">
                                <label for="continuidadLaboral">¿Actualmente sigue trabajando en la empresa?</label>
                                <select name="continuidadLaboral" class="form-select">
                                    <option value="0">Si</option>
                                    <option value="1">No</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="mb-3 mb-md-0">
                                <label for="responsabilidades">Responsabilidades y logros en el cargo</label>
                                <textarea class="form-control" name="responsabilidades" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <button class="btn botones" type="submit" name="btnCurriculum" value="curriculum">Cancelar</button>
                            <button class="btn botones" type="submit" name="btnCurriculum" value="agregarExperienciaLaboral">Guardar</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
<script src="http://localhost/teincluyes/js/curriculum/curriculum.js"></script>
<?php
include_once('../../layout/footer.php');
?>