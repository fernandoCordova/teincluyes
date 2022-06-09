<?php
if (isset($_POST['btnInicio'])) {
    $accion = $_POST['btnInicio'];
    switch ($accion) {
        case 'inicio':
            header('Location: http://localhost/teincluyes/inicio');
            break;
    }
} else {
    Header('Location: http://localhost/teincluyes/inicio');
}
