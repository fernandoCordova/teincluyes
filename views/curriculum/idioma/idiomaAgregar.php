<?php
include_once('../../layout/header.php');
$idiomas = $_SESSION['idiomas'];
?>
<section class="pb-5" id="informacionPersonal">
    <div class="container px-5 my-5">
        <form action="http://localhost/teincluyes/controladorCurriculum" method="post">
            <div class="row gx-5">
                <div class="mb-0">
                    <h2>Idioma</h2>
                </div>
                <div class="col-lg-12 mt-5">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="mb-3 mb-md-0">
                                <label for="ididioma">Habilidad</label>
                                <select class="form-control" name="ididioma">
                                    <?php foreach ($idiomas as $idioma) { ?>
                                        <option value="<?php echo $idioma['ididioma'] ?>"><?php echo $idioma['nombre'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <button class="btn botones" type="submit" name="btnCurriculum" value="curriculum">Cancelar</button>
                            <button class="btn botones" type="submit" name="btnCurriculum" value="agregarIdioma">Guardar</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
<?php
include_once('../../layout/footer.php');
?>