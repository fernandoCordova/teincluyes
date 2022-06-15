<?php
include_once('../layout/header.php');
$obtenerCategorias = $_SESSION['obtenerCategorias'];
?>
<section class="pb-5" id="informacionPersonal">
    <div class="container px-5 my-5">
        <form action="http://localhost/teincluyes/controladorForo" method="post">
            <div class="row gx-5">
                <div class="mb-0">
                    <h2>Agregar topico</h2>
                </div>
                <div class="col-lg-12 mt-5">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="mb-3 mb-md-0">
                                <label for="nombreTopico">Nombre del topico</label>
                                <input type="text" class="form-control" name="nombreTopico" placeholder="Ingrese un nombre para el topico">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3 mb-md-0">
                                <label for="categoria">Habilidad</label>
                                <select class="form-control" name="categoria">
                                    <?php foreach ($obtenerCategorias as $categoria) { ?>
                                        <option value="<?php echo $categoria['idcategoria'] ?>"><?php echo $categoria['nombre'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="mb-3 mb-md-0">
                                <label for="contenido">Contenido</label>
                                <textarea class="form-control" name="contenido" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                    </div>
                    <div>
                        <?php if (isset($_SESSION['error'])) { ?>
                            <div class="alert alert-danger" role="alert">
                                <strong> <?php echo $_SESSION['error'] ?> </strong>
                                <?php unset($_SESSION['error']) ?>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <button class="btn botones" type="submit" name="btnForo" value="foro">Cancelar</button>
                            <button class="btn botones" type="submit" name="btnForo" value="insertarTopico">Guardar</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
<?php
include_once('../layout/footer.php');
?>