<?php
include_once('../../layout/header.php');
$postulantes = $_SESSION['postulantes'];
?>
<link rel="stylesheet" href="http://localhost/teincluyes/css/curriculum/curriculum.css">
<section class="pb-5 estilos-header" id="cv">
    <div class="container px-5 my-5">
        <div class="my-4">
            <table id="table_id" class="display">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Telefono</th>
                        <th>Titulo</th>
                        <th>Expectativa de renta</th>
                        <th>Años de experiencia</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($postulantes as $postulante) { ?>
                        <tr>
                            <td>
                                <form action="http://localhost/teincluyes/controladorTrabajo" method="post">
                                    <button class="btn botones-enlace-ofertasLaborales" name="btnOfertaLaboral" value="verPerfilPostulante">
                                        <?php echo $postulante['nombres'] . ' ' . $postulante['apellidos'] ?>
                                    </button>
                                    <input type="hidden" name="idPostulante" value="<?php echo $postulante['idcurriculum']?>">
                                </form>
                            </td>
                            <td><?php echo $postulante['correo'] ?></td>
                            <td><?php echo $postulante['telefono'] ?></td>
                            <td><?php echo $postulante['titulo'] ?></td>
                            <td><?php echo $postulante['renta'] ?></td>
                            <td><?php echo $postulante['experiencia'] ?></td>
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