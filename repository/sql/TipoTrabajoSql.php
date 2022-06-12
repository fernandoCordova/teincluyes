<?php
class TipoTrabajoSql
{
    public function obtenerTiposDeTrabajo($conexion)
    {
        $sql = $conexion->prepare('SELECT * FROM tipotrabajo');
        $sql->execute();
        $tiposDeTrabajo = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $tiposDeTrabajo;
    }
}
