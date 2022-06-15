<?php
include_once('../layout/header.php');
$usuariosTea = $_SESSION['usuariosTea'];
?>
<link rel="stylesheet" href="http://localhost/teincluyes/css/curriculum/curriculum.css">
<section class="pb-5 estilos-header" id="cv">
    <div class="container px-5 my-5">
        <?php if (isset($_SESSION['errorValidarCertificado'])) { ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?php
                print_r($_SESSION['errorValidarCertificado']);
                unset($_SESSION['errorValidarCertificado']);
                ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php } ?>
        <?php if (isset($_SESSION['exitoValidarCertificado'])) { ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php
                print_r($_SESSION['exitoValidarCertificado']);
                unset($_SESSION['exitoValidarCertificado']);
                ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php } ?>
        <div class="my-4">
            <table id="table_id" class="display">
                <thead>
                    <tr>
                        <th>Nombre y apellido</th>
                        <th>Correo</th>
                        <th>Espectro</th>
                        <th>Estado</th>
                        <th>Certificado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($usuariosTea as $usuarioTea) { ?>
                        <tr>
                            <td><?php echo $usuarioTea['nombres'] . ' ' . $usuarioTea['apellidos'] ?></td>
                            <td><?php echo $usuarioTea['correo'] ?></td>
                            <td><?php echo $usuarioTea['espectro'] ?></td>
                            <td><?php echo $usuarioTea['estado'] ?></td>
                            <td>
                                <button class="btn botones-enlace"><a href="http://localhost/teincluyes/views/administrador/descargarCertificado.php?filename=<?php echo $usuarioTea['nombre']; ?>&f=<?php echo $usuarioTea['fnombre'] ?>">Descargar</a></button>
                            </td>
                            <td>
                                <form action="http://localhost/teincluyes/controladorAdministrador" method="post">
                                    <button type="submit" name="btnAdministrador" value="validarCertificado" class="btn botones-enlace-ofertasLaborales">
                                        Validar certificado
                                    </button>
                                    <?php if ($usuarioTea['idestado'] == 1) { ?>
                                        <input type="hidden" name="idestado" value="2">
                                    <?php } else { ?>
                                        <input type="hidden" name="idestado" value="1">
                                    <?php } ?>
                                    <input type="hidden" name="idusuario" value="<?php echo $usuarioTea['idusuario'] ?>">
                                </form>
                            </td>
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
include_once('../layout/footer.php');
?>