<?php
include_once('../../layout/header.php');
$ofertaLaboral = $_SESSION['ofertaLaboralEspecifica'];
?>
<link rel="stylesheet" href="http://localhost/teincluyes/css/curriculum/curriculum.css">
<section class="pb-5 estilos-header" id="cv">
    <div class="container px-5 my-5">
        <div>
            <?php if (isset($_SESSION['exitoOfertaLaboral'])) { ?>
                <div class="alert alert-success" role="alert">
                    <strong> <?php echo $_SESSION['exitoOfertaLaboral'] ?> </strong>
                    <?php unset($_SESSION['exitoOfertaLaboral']) ?>
                </div>
            <?php } ?>
            <?php if (isset($_SESSION['errorOfertaLaboral'])) { ?>
                <div class="alert alert-danger" role="alert">
                    <strong> <?php echo $_SESSION['errorOfertaLaboral'] ?> </strong>
                    <?php unset($_SESSION['errorOfertaLaboral']) ?>
                </div>
            <?php } ?>
        </div>
        <div class="row gx-5">
            <div class="col-lg-12 estilo-informacion-general">
                <div>
                    <h2>
                        <?php echo $ofertaLaboral[0]['titulo'] ?>
                    </h2>
                    <h6><?php echo $ofertaLaboral[0]['nombreEmpresa'] ?></h6>
                </div>
                <div>
                    <h4> <strong>Informacion general</strong></h4>
                    <h6>Fechas de publicacion: <?php echo $ofertaLaboral[0]['fechaInicio'] . ' - ' . $ofertaLaboral[0]['fechaTermino'] ?></h6>
                    <h6>Rubro de la empresa: <?php echo $ofertaLaboral[0]['rubro'] ?></h6>
                    <h6>Tipo de cargo: <?php echo $ofertaLaboral[0]['tipoDeCargo'] ?></h6>
                    <h6>Area: <?php echo $ofertaLaboral[0]['area'] ?></h6>
                    <h6>Cantidad de vacantes: <?php echo $ofertaLaboral[0]['cantidadVacantes'] ?></h6>
                    <h6>Region: <?php echo $ofertaLaboral[0]['region'] ?></h6>
                    <h6>Comuna: <?php echo $ofertaLaboral[0]['comuna'] ?></h6>
                    <h6>Direccion: <?php echo $ofertaLaboral[0]['direccion'] ?></h6>
                    <h6>Jornada laboral: <?php echo $ofertaLaboral[0]['jornada'] ?></h6>
                </div>
                <div>
                    <h4> <strong>Descripcion</strong></h4>
                    <h6><?php echo $ofertaLaboral[0]['descripcion'] ?></h6>
                </div>
                <div>
                    <h4> <strong> Requisitos</strong></h4>
                    <h6>Requisitos minimos: <?php echo $ofertaLaboral[0]['requisitosMinimos'] ?></h6>
                    <h6>Experiencia minima: <?php echo $ofertaLaboral[0]['experienciaMinima'] ?></h6>
                    <h6>Estudios minimos: <?php echo $ofertaLaboral[0]['estudiosMinimos'] ?></h6>
                    <h6>Situacion academica: <?php echo $ofertaLaboral[0]['situacionAcademica'] ?></h6>
                    <h6>Carreras de interes: <?php echo $ofertaLaboral[0]['carreras'] ?></h6>
                </div>
                <div>
                    <h4> <strong>Beneficios</strong></h4>
                    <h5>Sueldo + (bonos si es que incluye): <?php echo $ofertaLaboral[0]['sueldo'] ?></h5>
                </div>
                <?php if ($_SESSION['usuario']['tipoUsuario_idtipoUsuario'] == 1) { ?>
                    <hr>
                    <div>
                        <form action="http://localhost/teincluyes/controladorTrabajo" method="post">
                            <button class="btn botones" type="submit" name="btnOfertaLaboral" value="postularOfertaLaboral">
                                Postular a la oferta
                            </button>
                            <input type="hidden" name="idCurriculum" value="<?php echo $_SESSION['usuario']['idcurriculum'] ?>">
                            <input type="hidden" name="idOfertaLaboral" value="<?php echo $ofertaLaboral[0]['idofertaLaboral']  ?>">
                        </form>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>
<?php
include_once('../../layout/footer.php');
?>