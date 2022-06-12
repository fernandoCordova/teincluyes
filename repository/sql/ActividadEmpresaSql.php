<?php
class ActividadEmpresaSql
{
    public function obtenerActividadesEmpresa($conexion)
    {
        $sql = $conexion->prepare('SELECT * FROM actividadempresa');
        $sql->execute();
        $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;
    }
}
