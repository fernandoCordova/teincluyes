<?php
class UsuarioTeaSql
{
    public function insertarUsuarioTea($usuarioTea, $conexion)
    {
        $espectro = $usuarioTea->getEspectro();
        $idusuario = $usuarioTea->getUsuario_idusuario();
        $certificado = $usuarioTea->getCertificadoTea_idcertificadoTea();
        $sql = $conexion->prepare('INSERT INTO usuariotea (espectro, usuario_idusuario , certificadoTea_idcertificadoTea )
         VALUES (:espectro, :usuario_idusuario, :certificadoTea_idcertificadoTea)');
        $sql->bindparam(':espectro', $espectro);
        $sql->bindparam(':usuario_idusuario', $idusuario);
        $sql->bindparam(':certificadoTea_idcertificadoTea', $certificado);
        if ($sql->execute()) {
            return 1;
        } else {
            return 0;
        }
    }

    public function insertarCertificado($datosCertificadoTea, $conexion)
    {
        $name = $datosCertificadoTea['name'];
        $type = $datosCertificadoTea['type'];
        $temp = $datosCertificadoTea['temp'];
        $size = $datosCertificadoTea['size'];
        $fname = $datosCertificadoTea['fname'];
        $chk = $conexion->query("SELECT * FROM  certificadotea WHERE nombre = '$name' ")->rowCount();
        if ($chk) {
            $i = 1;
            $c = 0;
            while ($c == 0) {
                $i++;
                $reversedParts = explode('.', strrev($name), 2);
                $tname = (strrev($reversedParts[1])) . "_" . ($i) . '.' . (strrev($reversedParts[0]));
                $chk2 = $conexion->query("SELECT * FROM  certificadotea where name = '$tname' ")->rowCount();
                if ($chk2 == 0) {
                    $c = 1;
                    $name = $tname;
                }
            }
        }
        $move =  move_uploaded_file($temp, "../certificados/" . $fname);
        if ($move) {
            $query = $conexion->query("INSERT INTO certificadotea(nombre,fnombre)values('$name','$fname')");
            if ($query) {
                return 1;
            } else {
                return 0;
            }
        }
    }

    public function obtenerIdCertificado($datos, $conexion)
    {
        $name = $datos['name'];
        $fname = $datos['fname'];
        $sql = $conexion->prepare("SELECT idcertificadoTea FROM certificadotea WHERE nombre = :nombre AND fnombre = :fnombre");
        $sql->bindparam(':nombre', $name);
        $sql->bindparam(':fnombre', $fname);
        $sql->execute();
        $result = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}
