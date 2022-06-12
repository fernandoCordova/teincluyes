<?php
class NivelEstudioSql
{
    public function obtenerNivelEstudios($conexion)
    {
        $sql = $conexion->prepare("SELECT * FROM nivelestudio");
        $sql->execute();
        $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;
    }
}
