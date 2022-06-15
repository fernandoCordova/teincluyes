<?php 
class CategoriaSql
{
    public function obtenerCategorias($conexion)
    {
        $sql = $conexion->prepare('SELECT * FROM `categoria`');
        $sql->execute();
        $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;
        
    }
}

?>