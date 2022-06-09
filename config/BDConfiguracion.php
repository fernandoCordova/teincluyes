<?php
class BDConfiguracion
{
    static public function obtenerConexion()
    {
        $host = '127.0.0.1';
        $db = 'teincluyes';
        $usuario = 'root';
        $clave = '';
        $puerto = '3306';
        $charset = 'utf8mb4';
        try {
            $dsn = "mysql:host=" . $host . ";" . "dbname=" . $db . ";" . "port=" . $puerto . ";" . "charset=" . $charset;
            $baseDatos = new PDO($dsn, $usuario, $clave);
            $baseDatos->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $baseDatos;
        } catch (PDOException $errores) {
            echo "No me pude conectar a la BD " . $errores->getmessage();
            exit;
        }
    }
}
