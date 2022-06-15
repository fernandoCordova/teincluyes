<?php
include_once('../layout/header.php');
?>
<link rel="stylesheet" href="http://localhost/teincluyes/css/inicioSesion/inicioSesion.css">
<div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        <div class="card rounded-lg mt-5">
                            <div class="card-header estilos-navbar mb-4 text-center text-white">
                                <h2 class="text-center font-weight-light my-4">Inicio de sesión</h2>
                            </div>
                            <div class="card-body">
                                <form action="http://localhost/teincluyes/controladorInicioSesion" method="POST" id="formInicioSesion" autocomplete="off" enctype="multipart/form-data">
                                    <div class="form-floating mb-3">
                                        <input class="form-control" name="correo" id="correo" type="email" placeholder="correo@correo.com" />
                                        <label for="correo">Correo</label>
                                        <div>
                                            <p id="errorCorreo"></p>
                                        </div>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" name="clave" id="clave" type="password" placeholder="Contraseña" />
                                        <label for="clave">Contraseña</label>
                                        <div>
                                            <p id="errorClave"></p>
                                        </div>
                                    </div>
                                    <?php if (isset($_SESSION['errorInicioSesion'])) { ?>
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <?php
                                            print_r($_SESSION['errorInicioSesion']);
                                            unset($_SESSION['errorInicioSesion']);
                                            ?>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    <?php } ?>
                                    <?php if (isset($_SESSION['exitoRegistro'])) { ?>
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <?php
                                            print_r($_SESSION['exitoRegistro']);
                                            unset($_SESSION['exitoRegistro']);
                                            ?>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    <?php } ?>
                                    <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                        <button class="btn botones" type="submit" name="btnIniciarSesion" id="btnIniciarSesion" value="ingresar">
                                            Ingresar
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer estilos-footer text-center py-3">
                                <form action="http://localhost/teincluyes/controladorRegistro" method="post">
                                    <div class="small">
                                        <button class="btn botones-enlace" type="submit" name="btnRegistro" value="registroUsuario">
                                            ¿Necesitas una cuenta? Registrate ahora!
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
<script src="http://localhost/teincluyes/js/inicioSesion/inicioSesion.js"></script>
<?php
include_once('../layout/footer.php');
?>