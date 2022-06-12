<?php
class IdiomaSql
{

    public function obtenerIdiomas($conexion)
    {
        $sql = $conexion->prepare('SELECT * FROM idioma');
        $sql->execute();
        $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;
    }

    public function insertarIdiomaUsuario($ididioma, $idcurriculum, $conexion)
    {
        $sql = $conexion->prepare('INSERT INTO `idiomaUsuario`(`idioma_ididioma`, `curriculum_idcurriculum`) VALUES (:ididioma,:idcurriculum)');
        $sql->bindParam(':ididioma', $ididioma);
        $sql->bindParam(':idcurriculum', $idcurriculum);
        if ($sql->execute()) {
            return 1;
        } else {
            return 0;
        }
    }

    public function eliminarIdiomaUsuario($ididioma,$idcurriculum,$conexion)
    {
        $sql = $conexion->prepare('DELETE FROM `idiomausuario` WHERE idioma_ididioma = :ididioma AND curriculum_idcurriculum = :idcurriculum');
        $sql->bindParam(':ididioma', $ididioma);
        $sql->bindParam(':idcurriculum', $idcurriculum);
        if ($sql->execute()) {
            return 1;
        } else {
            return 0;
        }
    }
}
