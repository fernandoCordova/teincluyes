<?php
include_once('../../layout/header.php');
$obtenerOfertasLaborales = $_SESSION['ofertasLaborales'];
?>
<link rel="stylesheet" href="http://localhost/teincluyes/css/curriculum/curriculum.css">
<section class="pb-5 estilos-header" id="cv">
    <div class="container px-5 my-5">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="perfil-tab" data-bs-toggle="tab" data-bs-target="#perfil" type="button" role="tab" aria-controls="perfil" aria-selected="true">Empresa</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="ofertas-tab" data-bs-toggle="tab" data-bs-target="#ofertas" type="button" role="tab" aria-controls="ofertas" aria-selected="false">Ofertas laborales</button>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="perfil" role="tabpanel" aria-labelledby="home-tab">
                <div class="my-4 text-center">
                    <h3>
                        <?php echo $_SESSION['usuario']['nombreEmpresa'] ?>
                    </h3>
                    <h5>
                        <?php echo $_SESSION['usuario']['correo'] ?>
                    </h5>
                    <h5>
                        <?php echo $_SESSION['usuario']['telefono'] ?>
                    </h5>
                    <h5>
                        <?php echo $_SESSION['usuario']['rut'] ?>
                    </h5>
                </div>
            </div>
            <div class="tab-pane fade" id="ofertas" role="tabpanel" aria-labelledby="profile-tab">
                <div class="my-4">
                    <table id="table_id" class="display">
                        <thead>
                            <tr>
                                <th>Titulo</th>
                                <th>Fecha inicio</th>
                                <th>Fecha termino</th>
                                <th>Tipo de cargo</th>
                                <th>Area</th>
                                <th>Postulantes</th>
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($obtenerOfertasLaborales as $oferta) { ?>
                                <tr>
                                    <td>
                                        <form action="http://localhost/teincluyes/controladorTrabajo" method="post">
                                            <button class="btn botones-enlace-ofertasLaborales" name="btnOfertaLaboral" value="verDetallesOfertaLaboral">
                                                <?php echo $oferta['titulo'] ?>
                                            </button>
                                            <input type="hidden" name="idOfertaLaboral" value="<?php echo $oferta['idofertaLaboral'] ?>">
                                        </form>
                                    </td>
                                    <td><?php echo $oferta['fechaInicio'] ?></td>
                                    <td><?php echo $oferta['fechaTermino'] ?></td>
                                    <td><?php echo $oferta['tipoDeCargo'] ?></td>
                                    <td><?php echo $oferta['area'] ?></td>
                                    <td>
                                        <form action="http://localhost/teincluyes/controladorTrabajo" method="post">
                                            <button class="btn botones" name="btnOfertaLaboral" value="verPostulantes">
                                                Ver postulantes
                                            </button>
                                            <input type="hidden" name="idOfertaLaboral" value="<?php echo $oferta['idofertaLaboral'] ?>">
                                        </form>
                                    </td>
                                    <td>
                                        <form action="http://localhost/teincluyes/controladorTrabajo" method="post">
                                            <button class="btn botones" name="btnOfertaLaboral" value="eliminarOferta">
                                                Eliminar oferta
                                                <input type="hidden" name="idOfertaLaboral" value="<?php echo $oferta['idofertaLaboral'] ?>">
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
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