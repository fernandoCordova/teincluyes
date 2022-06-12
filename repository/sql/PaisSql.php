<?php
class PaisSql
{
    public function obtenerPaises($conexion)
    {
        $sql = $conexion->prepare('SELECT * FROM pais');
        $sql->execute();
        $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;
    }
}
