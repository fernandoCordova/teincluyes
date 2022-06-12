<?php 
class RegionSql
{
    public function obtenerRegiones($conexion){
        $sql = $conexion->prepare('SELECT * FROM region');
        $sql->execute();
        $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;
    }
}
