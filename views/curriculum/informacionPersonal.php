<?php
include_once('../layout/header.php');
$nacionalidades = $_SESSION['nacionalidades'];
$paises = $_SESSION['paises'];
$regiones = $_SESSION['regiones'];
?>
<section class="pb-5" id="informacionPersonal">
    <div class="container px-5 my-5">
        <form action="http://localhost/teincluyes/controladorCurriculum" method="post">
            <div class="row gx-5">
                <div class="mb-0">
                    <h2>Informacion personal y contacto</h2>
                </div>
                <div class="col-lg-12 mt-5">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="mb-3 mb-md-0">
                                <label for="nombres">Seleccione el nivel de estudios</label>
                                <?php if ($_SESSION['usuario']['nombres'] != '') { ?>
                                    <input class="form-control" type="text" name="nombres" placeholder="Juan Patricio" value="<?php echo $_SESSION['usuario']['nombres'] ?>" />
                                <?php } else { ?>
                                    <input class="form-control" type="text" name="nombres" placeholder="Juan Patricio" />
                                <?php } ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3 mb-md-0">
                                <label for="apellidos">Ingrese sus apellidos</label>
                                <?php if ($_SESSION['usuario']['apellidos'] != '') { ?>
                                    <input class="form-control" type="text" name="apellidos" placeholder="Garcia Garcia" value="<?php echo $_SESSION['usuario']['apellidos'] ?>" />
                                <?php } else { ?>
                                    <input class="form-control" type="text" name="apellidos" placeholder="Garcia Garcia" />
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="mb-3 mb-md-0">
                                <label for="cargo">Ingrese su Cargo/ Profesion/ Oficio</label>
                                <?php if ($_SESSION['usuario']['titulo'] != '') { ?>
                                    <input class="form-control" type="text" name="cargo" placeholder="Ingeniero comercial" value="<?php echo $_SESSION['usuario']['titulo'] ?>" />
                                <?php } else { ?>
                                    <input class="form-control" type="text" name="apellidos" placeholder="Garcia Garcia" />
                                <?php } ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3 mb-md-0">
                                <label for="aniosExperiencia">Años de experiencia</label>
                                <?php if ($_SESSION['usuario']['experiencia'] != '') { ?>
                                    <input class="form-control" type="number" name="aniosExperiencia" placeholder="1" value="<?php echo $_SESSION['usuario']['experiencia'] ?>" />
                                <?php } else { ?>
                                    <input class="form-control" type="number" name="aniosExperiencia" placeholder="1" />
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="mb-3 mb-md-0">
                                <label for="correo">Ingrese su correo</label>
                                <input class="form-control" type="mail" p value="<?php echo $_SESSION['usuario']['correo'] ?>" disabled />
                                <input type="hidden" value="<?php echo $_SESSION['usuario']['correo'] ?>" name="correo">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3 mb-md-0">
                                <label for="telefono">Ingrese su telefono (incluyendo el prefijo)</label>
                                <?php if ($_SESSION['usuario']['telefono'] != '') { ?>
                                    <input class="form-control" type="number" name="telefono" placeholder="5697805214" value="<?php echo $_SESSION['usuario']['telefono'] ?>" />
                                <?php } else { ?>
                                    <input class="form-control" type="number" name="telefono" placeholder="5697805214" />
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="mb-3 mb-md-0">
                                <label for="portafolio">Ingrese su portafolio (website/ github/ otros)</label>
                                <?php if ($_SESSION['usuario']['portafolio'] != '') { ?>
                                    <input class="form-control" type="text" name="portafolio" placeholder="portafolioJuanito.com" value="<?php echo $_SESSION['usuario']['portafolio'] ?>" />
                                <?php } else { ?>
                                    <input class="form-control" type="text" name="portafolio" placeholder="portafolioJuanito.com" />
                                <?php } ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3 mb-md-0">
                                <label for="nacionalidad">
                                    Ingrese su nacionalidad
                                </label>
                                <select class="nacionalidad form-select" name="nacionalidad">
                                    <option disabled class="text-primary">Nacionalidad actual</option>
                                    <option value="<?php echo $_SESSION['usuario']['idnacionalidad'] ?>" selected><?php echo $_SESSION['usuario']['nombreGentilicio'] ?></option>
                                    <option disabled>------------------</option>
                                    <option disabled class="text-primary">Nacionalidades disponibles</option>
                                    <?php
                                    foreach ($nacionalidades as $nacionalidad) { ?>
                                        <option value="<?php print_r($nacionalidad['idnacionalidad']) ?>">
                                            <?php print_r($nacionalidad['nombreGentilicio']) ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="mb-3 mb-md-0">
                                <label for="rut">Ingrese su rut/ pasaporte</label>
                                <input class="form-control" type="text" name="rut" placeholder="19972084-2" value="<?php echo $_SESSION['usuario']['rut'] ?>" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3 mb-md-0">
                                <label for="fechaNacimiento">Ingrese su fecha de nacimiento</label>
                                <?php if ($_SESSION['usuario']['fechaNacimiento'] != '') { ?>
                                    <input class="form-control" type="date" name="fechaNacimiento" value="<?php echo $_SESSION['usuario']['fechaNacimiento'] ?>" />
                                <?php } else { ?>
                                    <input class="form-control" type="date" name="fechaNacimiento" />
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="mb-3 mb-md-0">
                                <label for="genero">
                                    Ingrese su genero
                                </label>
                                <select class="genero form-select" name="genero">
                                    <option disabled class="text-primary">Genero actual</option>
                                    <option value="<?php echo $_SESSION['usuario']['genero'] ?>" selected><?php echo $_SESSION['usuario']['genero'] ?></option>
                                    <option disabled>------------------</option>
                                    <option disabled class="text-primary">Generos disponibles</option>
                                    <option value="Masculino">Masculino</option>
                                    <option value="Femenino">Femenino</option>
                                    <option value="Otro">Otro</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3 mb-md-0">
                                <label for="pais">
                                    Ingrese su pais
                                </label>
                                <select class="pais form-select" name="pais">
                                    <option disabled class="text-primary">Pais actual</option>
                                    <option value="<?php echo $_SESSION['usuario']['idpais'] ?>" selected><?php echo $_SESSION['usuario']['nombrePais'] ?></option>
                                    <option disabled>------------------</option>
                                    <option disabled class="text-primary">Paises disponibles</option>
                                    <?php foreach ($paises as $pais) { ?>
                                        <option value="<?php print_r($pais['idpais']) ?>"><?php print_r($pais['nombre']) ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="mb-3 mb-md-0">
                                <label for="region">
                                    Ingrese su region
                                </label>
                                <select class="region form-select" name="region">
                                    <option disabled class="text-primary">Region actual</option>
                                    <option value="<?php echo $_SESSION['usuario']['idregion'] ?>" selected><?php echo $_SESSION['usuario']['region'] ?></option>
                                    <option disabled>------------------</option>
                                    <option disabled class="text-primary">Regiones disponibles</option>
                                    <?php foreach ($regiones as $region) { ?>
                                        <option value="<?php print_r($region['idregion']) ?>"><?php print_r($region['region']) ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3 mb-md-0">
                                <label for="direccion">Ingrese su direccion</label>
                                <?php if ($_SESSION['usuario']['direccion'] != '') { ?>
                                    <input class="form-control" type="text" name="direccion" placeholder="Calle ejemplo 2231" value="<?php echo $_SESSION['usuario']['direccion'] ?>" />
                                <?php } else { ?>
                                    <input class="form-control" type="text" name="direccion" placeholder="Calle ejemplo 2231" />
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="mb-3 mb-md-0">
                                <label for="renta">Ingrese su expectativa de renta</label>
                                <?php if ($_SESSION['usuario']['renta'] != '') { ?>
                                    <input class="form-control" type="number" name="renta" placeholder="700000" value="<?php echo $_SESSION['usuario']['renta'] ?>" />
                                <?php } else { ?>
                                    <input class="form-control" type="number" name="renta" placeholder="700000" />
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="mb-3 mb-md-0">
                                <label for="sobremi">Sobre mi</label>
                                <?php if ($_SESSION['usuario']['acercaDeMi'] != '') { ?>
                                    <textarea class="form-control" name="sobremi" rows="3"><?php echo $_SESSION['usuario']['acercaDeMi'] ?>
                                    </textarea>
                                <?php } else { ?>
                                    <textarea class="form-control" name="sobremi" rows="3"></textarea>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <form action="http://localhost/teincluyes/controladorCurriculum" method="post">
                                <button class="btn botones" type="submit" name="btnCurriculum" value="curriculum">Cancelar</button>
                            </form>
                            <button class="btn botones" type="submit" name="btnCurriculum" value="actualizarCurriculum">Guardar</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
<script src="http://localhost/teincluyes/js/curriculum/curriculum.js"></script>
<?php
include_once('../layout/footer.php');
?>