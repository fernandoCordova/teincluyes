<?php
include_once('../layout/header.php');
?>
<div id="layoutAuthentication" class="mb-5">
    <div id="layoutAuthentication_content">
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <div class="card rounded-lg mt-5">
                            <div class="card-header estilos-navbar mb-4 text-center text-white">
                                <h2 class="text-center font-weight-light my-4">Registro de empresas</h3>
                            </div>
                            <div class="card-body">
                                <form action="http://localhost/teincluyes/controladorRegistro" method="POST">
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3 mb-md-0">
                                                <input class="form-control" type="mail" name="correo" placeholder="correo@correo.com" />
                                                <label for="correo">Ingrese su correo</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3 mb-md-0">
                                                <input class="form-control" type="text" name="clave" placeholder="Contraseña" />
                                                <label for="clave">Ingrese una contraseña</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <div class="form-floating mb-3 mb-md-0">
                                                <input class="form-control" type="text" name="rut" placeholder="11111111-1" />
                                                <label for="rut">Ingrese rut de la empresa</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <div class="form-floating mb-3 mb-md-0">
                                                <input class="form-control" type="text" name="nombres" placeholder="Juan Ignacio" />
                                                <label for="nombres">Ingrese sus nombres</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <div class="form-floating mb-3 mb-md-0">
                                                <input class="form-control" type="text" name="apellidos" placeholder="Garcia Garcia" />
                                                <label for="apellidos">Ingrese sus apellidos</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <div class="form-floating mb-3 mb-md-0">
                                                <input class="form-control" type="text" name="nombreEmpresa" placeholder="Empresa1" />
                                                <label for="nombreEmpresa">Ingrese el nombre de la empresa</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <div class="form-floating mb-3 mb-md-0">
                                                <input class="form-control" type="text" name="telefono" placeholder="+56978068315" />
                                                <label for="telefono">Teléfono</label>
                                            </div>
                                        </div>
                                    </div>
                                    <?php if (isset($_SESSION['error'])) { ?>
                                        <div class="alert alert-danger my-2" role="alert">
                                            <?php
                                            print_r($_SESSION['error']);
                                            unset($_SESSION['error']);
                                            ?>
                                        </div>
                                    <?php } ?>
                                    <div class="mt-4 mb-0">
                                        <div class="d-grid">
                                            <button class="btn botones btn-block" type="submit" name="btnRegistro" value="insertarEmpresa">Crear cuenta</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer estilos-footer text-center py-3">
                                <form action="http://localhost/teincluyes/controladorInicioSesion" method="post">
                                    <div class="small">
                                        <button class="btn botones-enlace" name="btnIniciarSesion" value="inicioSesion">
                                            ¿Ya tienes cuenta? Inicia sesión aqui
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
<?php
include_once('../layout/footer.php');
?>