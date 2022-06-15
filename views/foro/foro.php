<?php
include_once('../layout/header.php');
$obtenerTodosLosTopicos = $_SESSION['obtenerTodosLosTopicos'];
?>
<link rel="stylesheet" href="http://localhost/teincluyes/css/curriculum/curriculum.css">
<section class="pb-5 estilos-header" id="cv">
    <div class="container px-5 my-5">
        <div class="mb-5">
            <h2>Foro de la comunidad - Topicos</h2>
        </div>
        <div>
            <?php if (isset($_SESSION['exito'])) { ?>
                <div class="alert alert-primary" role="alert">
                    <strong> <?php echo $_SESSION['exito'] ?> </strong>
                    <?php unset($_SESSION['exito']) ?>
                </div>
            <?php } ?>
        </div>
        <div>
            <form action="http://localhost/teincluyes/controladorForo" method="post">
                <button class="btn botones" name="btnForo" value="publicarTopico">Publicar topico</button>
            </form>
        </div>
        <div class="my-4">
            <table id="table_id" class="display">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Fecha de publicacion</th>
                        <th>Categoria</th>
                        <th>Usuario que lo publico</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($obtenerTodosLosTopicos as $topico) { ?>
                        <tr>
                            <td>
                                <form action="http://localhost/teincluyes/controladorForo" method="post">
                                    <button class="btn botones-enlace-ofertasLaborales" name="btnForo" value="verDetallesDeTopico">
                                        <?php echo $topico['nombre'] ?>
                                    </button>
                                    <input type="hidden" name="idtopico" value="<?php echo $topico['idtopico'] ?>">
                                </form>
                            </td>
                            <td><?php echo $topico['fechaPublicacion'] ?></td>
                            <td><?php echo $topico['nombreCategoria'] ?></td>
                            <td><?php echo $topico['nombres'] . ' ' . $topico['apellidos'] ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
<script src="http://localhost/teincluyes/js/trabajo/empresa/empresa.js"></script>
<?php
include_once('../layout/footer.php');
?>