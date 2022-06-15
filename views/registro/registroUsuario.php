<?php
include_once('../layout/header.php');
?>
<link rel="stylesheet" href="http://localhost/teincluyes/css/registro/registro.css">
<div id="layoutAuthentication" class="mb-5">
    <div id="layoutAuthentication_content">
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <div class="card rounded-lg mt-5">
                            <div class="card-header estilos-navbar mb-4 text-center text-white">
                                <h2 class="text-center font-weight-light my-4">Registro de usuarios</h2>
                            </div>
                            <div class="card-body">
                                <form action="http://localhost/teincluyes/controladorRegistro" method="POST" enctype="multipart/form-data" autocomplete="off" id="formRegistroUsuario">
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3 mb-md-0">
                                                <input class="form-control" type="mail" name="correo" id="correo" placeholder="correo@correo.com" />
                                                <label for="correo">Ingrese su correo</label>
                                            </div>
                                            <div>
                                                <p id="errorCorreo"></p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3 mb-md-0">
                                                <input class="form-control" type="text" name="clave" id="clave" placeholder="Contraseña" />
                                                <label for="clave">Ingrese una contraseña</label>
                                            </div>
                                            <div>
                                                <p id="errorClave"></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <div class="form-floating mb-3 mb-md-0">
                                                <input class="form-control" type="text" name="rut" id="rut" placeholder="11111111-1" />
                                                <label for="rut">Ingrese su rut</label>
                                            </div>
                                            <div>
                                                <p id="errorRut"></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <div class="form-floating mb-3 mb-md-0">
                                                <input class="form-control" type="text" name="nombres" id="nombres" placeholder="Juan Ignacio" />
                                                <label for="nombres">Ingrese sus nombres</label>
                                            </div>
                                            <div>
                                                <p id="errorNombres"></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <div class="form-floating mb-3 mb-md-0">
                                                <input class="form-control" type="text" name="apellidos" id="apellidos" placeholder="Garcia Garcia" />
                                                <label for="apellidos">Ingrese sus apellidos</label>
                                            </div>
                                            <div>
                                                <p id="errorApellidos"></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <div class="form-floating mb-3 mb-md-0">
                                                <select class="form-control" name="espectro" id="espectro">
                                                    <option value="Autismo">Autismo</option>
                                                    <option value="Síndrome de Rett">Síndrome de Rett.</option>
                                                    <option value="Síndrome de Asperger">Síndrome de Asperger</option>
                                                    <option value="Trastorno desintegrado infantil o síndrome de Heller">Trastorno desintegrado infantil o síndrome de Heller.</option>
                                                    <option value="Trastorno generalizado del desarrollo no especificado">Trastorno generalizado del desarrollo no especificado</option>
                                                </select>
                                                <label for="espectro">Seleccione su espectro</label>
                                            </div>
                                            <div>
                                                <p id="errorEspectro"></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <div class="mb-3 mb-md-0">
                                                <label for="certificado">Seleccione su certificado de TEA</label>
                                                <input class="form-control" type="file" name="certificado" id="certificado">
                                            </div>
                                            <div>
                                                <p id="errorCertificado"></p>
                                            </div>
                                        </div>
                                    </div>
                                    <?php if (isset($_SESSION['errorRegistroUsuario'])) { ?>
                                        <div class="alert alert-danger my-2" role="alert">
                                            <?php
                                            print_r($_SESSION['errorRegistroUsuario']);
                                            unset($_SESSION['errorRegistroUsuario']);
                                            ?>
                                        </div>
                                    <?php } ?>
                                    <div class="mt-4 mb-0">
                                        <div class="d-grid">
                                            <button class="btn botones btn-block" type="submit" name="btnRegistro" id="btnRegistro" value="insertarUsuario">Crear cuenta</button>
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
<script src="http://localhost/teincluyes/js/registro/registroUsuario.js"></script>
<?php
include_once('../layout/footer.php');
?>