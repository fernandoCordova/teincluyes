<?php
class JerarquiaEmpresaSql
{
    public function obtenerJerarquiasEmpresa($conexion)
    {
        $sql = $conexion->prepare('SELECT * FROM jerarquiaempresa');
        $sql->execute();
        $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;
    }
}
