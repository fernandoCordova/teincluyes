<?php
class NacionalidadSql
{
    public function obtenerNacionalidades($conexion)
    {
        $sql = $conexion->prepare('SELECT * FROM nacionalidad');
        $sql->execute();
        $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;
    }
}
