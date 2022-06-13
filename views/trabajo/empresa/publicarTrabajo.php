<?php
include_once('../../layout/header.php');
?>
<link rel="stylesheet" href="http://localhost/teincluyes/css/curriculum/curriculum.css">
<section class="pb-5 estilos-header" id="cv">
    <div class="container px-5 my-5">
        <form action="http://localhost/teincluyes/controladorTrabajo" method="post">
            <div class="row gx-5">
                <div class="col-lg-12 estilo-informacion-general">
                    <div class="my-4">
                        <h3>Publicar oferta laboral</h3>
                        <?php if (isset($_SESSION['exito'])) { ?>
                            <div class="alert alert-success" role="alert">
                                <strong><?php echo $_SESSION['exito'] ?></strong>
                                <?php unset($_SESSION['exito']) ?>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <div class="mb-3 mb-md-0">
                                <label for="titulo">Titulo de la oferta</label>
                                <input type="text" class="form-control" name="titulo" placeholder="Ingrese el titulo de la oferta">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3 mb-md-0">
                                <label for="rubro">Rubro de la empresa</label>
                                <input type="text" class="form-control" name="rubro" placeholder="Ingrese el rubro de la empresa">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3 mb-md-0">
                                <label for="fechaInicio">Fecha de inicio de la publicacion</label>
                                <input type="date" class="form-control" name="fechaInicio">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <div class="mb-3 mb-md-0">
                                <label for="cargo">Tipo de cargo</label>
                                <input type="text" class="form-control" name="cargo" placeholder="Ingrese el tipo de cargo">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3 mb-md-0">
                                <label for="vacantes">Cantidad de vacantes </label>
                                <input type="number" class="form-control" name="vacantes" placeholder="1">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3 mb-md-0">
                                <label for="area">Area de desarrollo </label>
                                <input type="text" class="form-control" name="area" placeholder="Ingrese el area de la oferta">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <div class="mb-3 mb-md-0">
                                <label for="region">Region de la oferta</label>
                                <input type="text" class="form-control" name="region" placeholder="Ingrese la region de la oferta">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3 mb-md-0">
                                <label for="comuna">Comuna de la oferta </label>
                                <input type="text" class="form-control" name="comuna" placeholder="Ingrese la comuna de la oferta">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3 mb-md-0">
                                <label for="direccion">Direccion de la empresa </label>
                                <input type="text" class="form-control" name="direccion" placeholder="Ingrese la direccion de la empresa">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <div class="mb-3 mb-md-0">
                                <label for="duracion">Duracion de la oferta</label>
                                <input type="text" class="form-control" name="duracion" placeholder="Ingrese la duracion de la oferta">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3 mb-md-0">
                                <label for="jornada">Jornada de trabajo </label>
                                <input type="text" class="form-control" name="jornada" placeholder="Ingrese la jornada laboral">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3 mb-md-0">
                                <label for="sueldo">Ingrese el sueldo </label>
                                <input type="text" class="form-control" name="sueldo" placeholder="Ingrese el sueldo de la oferta">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <div class="mb-3 mb-md-0">
                                <label for="fechaTermino">Fecha de termino de la publicacion</label>
                                <input type="date" class="form-control" name="fechaTermino">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="mb-3 mb-md-0">
                                <label for="descripcion">Descripcion de la oferta laboral</label>
                                <textarea class="form-control" name="descripcion" rows="1"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="mb-3 mb-md-0">
                                <label for="requisitosMinimos">Requisitos minimos</label>
                                <textarea class="form-control" name="requisitosMinimos" rows="1"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3 mb-md-0">
                                <label for="experienciaMinima">Experiencia minima</label>
                                <textarea class="form-control" name="experienciaMinima" rows="1"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="mb-3 mb-md-0">
                                <label for="estudiosMinimos">Estudios minimos</label>
                                <textarea class="form-control" name="estudiosMinimos" rows="1"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3 mb-md-0">
                                <label for="carreras">Carreras de interes</label>
                                <textarea class="form-control" name="carreras" rows="1"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="mb-3 mb-md-0">
                                <label for="situacionAcademica">Situacion academica</label>
                                <input type="text" class="form-control" name="situacionAcademica" placeholder="Ingrese la situcion academica de interes">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row my-2 estilo-informacion-personal">
                <div class="col-md-12">
                    <button class="btn boton-curriculum-personal" type="subtmit" name="btnOfertaLaboral" value="agregarOfertaLaboral">
                        Publicar oferta laboral <i class="bi bi-plus-square"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>
</section>
<?php
include_once('../../layout/footer.php');
?>