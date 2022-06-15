<?php
include_once('../layout/header.php');
$topicoEspecifico = $_SESSION['topicoEspecifico'];
$comentariosTopico = $_SESSION['comentariosTopico'];
?>
<link rel="stylesheet" href="http://localhost/teincluyes/css/curriculum/curriculum.css">
<section class="pb-5 estilos-header" id="cv">
    <div class="container px-5 my-5">
        <div class="row gx-5">
            <div class="col-lg-12 estilo-informacion-general">
                <div>
                    <h2>
                        <?php echo $topicoEspecifico[0]['nombre'] ?>
                    </h2>
                    <h6><?php echo $topicoEspecifico[0]['fechaPublicacion'] ?></h6>
                    <h4><?php echo 'Categoria: '.$topicoEspecifico[0]['nombreCategoria'] ?></h4>
                </div>
                <div>
                    <p>
                        <?php echo $topicoEspecifico[0]['contenido'] ?>
                    </p>
                </div>
                <?php if ($_SESSION['usuario']['idusuarioTea'] == $topicoEspecifico[0]['idUsuarioTea']) { ?>
                    <hr>
                    <div>
                        <form action="http://localhost/teincluyes/controladorForo" method="post">
                            <button class="btn botones" type="submit" name="btnForo" value="eliminarTopico">
                                Eliminar publicacion
                            </button>
                            <input type="hidden" name="idUsuarioTea" value="<?php echo $topicoEspecifico[0]['idUsuarioTea'] ?>">
                            <input type="hidden" name="idtopico" value="<?php echo $topicoEspecifico[0]['idtopico']  ?>">
                        </form>
                    </div>
                <?php } ?>
                <hr>
                <div>
                    <h4>Comentarios</h4>
                    <?php foreach ($comentariosTopico as $comentario) { ?>
                        <div>
                            <h6><?php echo $comentario['fechaPublicacion'] ?></h6>
                            <h6><?php echo $comentario['nombres'] . ' ' . $comentario['apellidos'] ?></h6>
                            <p>
                                <?php echo $comentario['contenido'] ?>
                            </p>
                        </div>
                        <hr>
                    <?php } ?>
                    <div>
                        <form action="http://localhost/teincluyes/controladorForo" method="post">
                            <textarea class="form-control" name="contenido" cols="30" rows="5"></textarea>
                            <input type="hidden" name="idUsuarioTea" value="<?php echo $_SESSION['usuario']['idusuarioTea'] ?>">
                            <input type="hidden" name="idtopico" value="<?php echo $topicoEspecifico[0]['idtopico']  ?>">
                            <button class="btn botones mt-2" type="submit" name="btnForo" value="comentarTopico">
                                Comentar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
include_once('../layout/footer.php');
?>