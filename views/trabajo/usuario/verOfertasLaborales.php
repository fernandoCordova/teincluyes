<?php
include_once('../../layout/header.php');
$obtenerTodasLasOfertasLaborales = $_SESSION['obtenerTodasLasOfertasLaborales'];
print_r($_SESSION['usuario']);
?>
<link rel="stylesheet" href="http://localhost/teincluyes/css/curriculum/curriculum.css">
<section class="pb-5 estilos-header" id="cv">
    <div class="container px-5 my-5">
        <div class="mb-5">
            <h2>Ver ofertas laborales</h2>
        </div>
        <div>
            <?php if (isset($_SESSION['exito'])) { ?>
                <div class="alert alert-primary" role="alert">
                    <strong> <?php echo $_SESSION['exito'] ?> </strong>
                    <?php unset($_SESSION['exito']) ?>
                </div>
            <?php } ?>
            <?php if (isset($_SESSION['error'])) { ?>
                <div class="alert alert-primary" role="alert">
                    <strong> <?php echo $_SESSION['error'] ?> </strong>
                    <?php unset($_SESSION['error']) ?>
                </div>
            <?php } ?>
        </div>
        <div class="my-4">
            <table id="table_id" class="display">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Rubro</th>
                        <th>Fechas de publicacion</th>
                        <th>Tipo de cargo</th>
                        <th>Localidad</th>
                        <th>Jornada</th>
                        <th>Sueldo</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($obtenerTodasLasOfertasLaborales as $oferta) { ?>
                        <tr>
                            <td>
                                <form action="http://localhost/teincluyes/controladorTrabajo" method="post">
                                    <button class="btn botones-enlace-ofertasLaborales" name="btnOfertaLaboral" value="verDetallesOfertaLaboral">
                                        <?php echo $oferta['titulo'] ?>
                                    </button>
                                    <input type="hidden" name="idOfertaLaboral" value="<?php echo $oferta['idofertaLaboral'] ?>">
                                </form>
                            </td>
                            <td><?php echo $oferta['rubro'] ?></td>
                            <td><?php echo $oferta['fechaInicio'] . ' ' . $oferta['fechaTermino'] ?></td>
                            <td><?php echo $oferta['tipoDeCargo'] ?></td>
                            <td><?php echo $oferta['region'] . ' ' . $oferta['comuna'] ?></td>
                            <td><?php echo $oferta['jornada'] ?></td>
                            <td><?php echo '$' . $oferta['sueldo'] ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <form action="http://localhost/teincluyes/controladorTrabajo" method="post">
    </form>
    </div>
</section>
<script src="http://localhost/teincluyes/js/trabajo/empresa/empresa.js"></script>
<?php
include_once('../../layout/footer.php');
?>