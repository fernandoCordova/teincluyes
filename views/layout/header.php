<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>TeIncluyes</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="https://i.ibb.co/2vcSX7f/imagen-inicio.png" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="http://localhost/teincluyes/css/plantilla-usuario/styles.css" rel="stylesheet" />
    <!-- Estilos personalizados-->
    <link href="http://localhost/teincluyes/css/plantilla-usuario/estilos-personalizados.css" rel="stylesheet">
</head>

<body class="d-flex flex-column h-100">
    <main class="flex-shrink-0">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light estilos-navbar">
            <div class="container px-5">
                <a class="navbar-brand">
                    <img src="http://localhost/teincluyes/img/plantilla/logo-teincluyes.jpg" class="img-fluid imagen-navbar" alt="img-logo">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <?php if (isset($_SESSION['usuario'])) { ?>
                        <?php if ($_SESSION['usuario']['tipoUsuario_idtipoUsuario'] == 1) { ?>
                            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                                <form action="http://localhost/teincluyes/controladorInicio" method="post">
                                    <li class="nav-item">
                                        <button class="btn botones-navbar" name="btnInicio" value="inicio">
                                            <i class="bi bi-house"></i> Inicio
                                        </button>
                                    </li>
                                </form>
                                <form action="http://localhost/teincluyes/controladorTrabajo" method="post">
                                    <li class="nav-item">
                                        <button class="btn botones-navbar" name="btnIniciarSesion" value="inicioSesion">
                                            <i class="bi bi-search"></i> Buscar trabajo
                                        </button>
                                    </li>
                                </form>
                                <form action="http://localhost/teincluyes/controladorForo" method="post">
                                    <li class="nav-item">
                                        <button class="btn botones-navbar" name="btnIniciarSesion" value="inicioSesion">
                                            <i class="bi bi-chat-left-text"></i> Foro de la comunidad
                                        </button>
                                    </li>
                                </form>
                                <li class="nav-item dropdown">
                                    <a class="btn botones-navbar dropdown-toggle" id="navbarDropdownPortfolio" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-person"></i> 
                                    <?php echo $_SESSION['usuario']['nombres'] ?></a>
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownPortfolio">
                                        <form action="http://localhost/teincluyes/controladorCurriculum" method="post">
                                            <li class="nav-item">
                                                <button class="btn botones-dropdown-navbar" name="btnRegistro" value="registroUsuario">
                                                    <i class="bi bi-file-pdf"></i> Curriculum
                                                </button>
                                            </li>
                                        </form>
                                        <form action="http://localhost/teincluyes/controladorInicioSesion" method="post">
                                            <li class="nav-item">
                                                <button class="btn botones-dropdown-navbar" name="btnIniciarSesion" value="cerrarSesion">
                                                    <i class="bi bi-door-closed"></i> Cerrar sesión
                                                </button>
                                            </li>
                                        </form>
                                    </ul>
                                </li>
                            </ul>
                        <?php } elseif ($_SESSION['usuario']['tipoUsuario_idtipoUsuario'] == 2) { ?>
                            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                                <form action="http://localhost/teincluyes/controladorInicio" method="post">
                                    <li class="nav-item">
                                        <button class="btn botones-navbar" name="btnInicio" value="inicio">
                                            <i class="bi bi-house"></i> Inicio
                                        </button>
                                    </li>
                                </form>
                                <form action="http://localhost/teincluyes/controladorTrabajo" method="post">
                                    <li class="nav-item">
                                        <button class="btn botones-navbar" name="btnIniciarSesion" value="inicioSesion">
                                            <i class="bi bi-chat"></i> Publicar trabajo
                                        </button>
                                    </li>
                                </form>
                                <li class="nav-item dropdown">
                                    <a class="btn botones-navbar dropdown-toggle" id="navbarDropdownPortfolio" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-person"></i> 
                                    <?php echo $_SESSION['usuario']['nombres'] ?></a>
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownPortfolio">
                                        <form action="" method="post">
                                            <li class="nav-item">
                                                <button class="btn botones-dropdown-navbar" name="btnRegistro" value="registroUsuario">
                                                    <i class="bi bi-building"></i> Empresa
                                                </button>
                                            </li>
                                        </form>
                                        <form action="http://localhost/teincluyes/controladorInicioSesion" method="post">
                                            <li class="nav-item">
                                                <button class="btn botones-dropdown-navbar" name="btnIniciarSesion" value="cerrarSesion">
                                                    <i class="bi bi-door-closed"></i> Cerrar sesión
                                                </button>
                                            </li>
                                        </form>
                                    </ul>
                                </li>
                            </ul>
                        <?php } elseif ($_SESSION['usuario']['tipoUsuario_idtipoUsuario'] == 3) { ?>
                            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                                <form action="http://localhost/teincluyes/controladorInicio" method="post">
                                    <li class="nav-item">
                                        <button class="btn botones-navbar" name="btnInicio" value="inicio">
                                            <i class="bi bi-house"></i> Inicio
                                        </button>
                                    </li>
                                </form>
                                <form action="" method="post">
                                    <li class="nav-item">
                                        <button class="btn botones-navbar" name="btnIniciarSesion" value="inicioSesion">
                                            <i class="bi bi-speedometer2"></i> Panel de control
                                        </button>
                                    </li>
                                </form>
                                <li class="nav-item dropdown">
                                    <a class="btn botones-navbar dropdown-toggle" id="navbarDropdownPortfolio" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-person"></i> <?php echo $_SESSION['usuario']['nombres'] ?></a>
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownPortfolio">
                                        <form action="http://localhost/teincluyes/controladorInicioSesion" method="post">
                                            <li class="nav-item">
                                                <button class="btn botones-dropdown-navbar" name="btnIniciarSesion" value="cerrarSesion">
                                                    <i class="bi bi-door-closed"></i> Cerrar sesión
                                                </button>
                                            </li>
                                        </form>
                                    </ul>
                                </li>
                            </ul>
                        <?php } ?>
                    <?php } else { ?>
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <form action="http://localhost/teincluyes/controladorInicio" method="post">
                                <li class="nav-item">
                                    <button class="btn botones-navbar" name="btnInicio" value="inicio">
                                        <i class="bi bi-house"></i> Inicio
                                    </button>
                                </li>
                            </form>
                            <form action="http://localhost/teincluyes/controladorInicioSesion" method="post">
                                <li class="nav-item">
                                    <button class="btn botones-navbar" name="btnIniciarSesion" value="inicioSesion">
                                        <i class="bi bi-door-open"></i> Iniciar sesión
                                    </button>
                                </li>
                            </form>
                            <li class="nav-item dropdown">
                                <a class="btn botones-navbar dropdown-toggle" id="navbarDropdownPortfolio" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-person-plus"></i> Registro</a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownPortfolio">
                                    <form action="http://localhost/teincluyes/controladorRegistro" method="post">
                                        <li class="nav-item">
                                            <button class="btn botones-dropdown-navbar" name="btnRegistro" value="registroUsuario">
                                                <i class="bi bi-person"></i> Como usuario
                                            </button>
                                        </li>
                                    </form>
                                    <form action="http://localhost/teincluyes/controladorRegistro" method="post">
                                        <li class="nav-item">
                                            <button class="btn botones-dropdown-navbar" name="btnRegistro" value="registroEmpresa">
                                                <i class="bi bi-building"></i> Como empresa
                                            </button>
                                        </li>
                                    </form>
                                </ul>
                            </li>
                        </ul>
                    <?php } ?>
                </div>
            </div>
        </nav>