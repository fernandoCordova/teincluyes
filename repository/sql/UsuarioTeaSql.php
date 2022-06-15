<?php
class UsuarioTeaSql
{

    public function cambiarEstadoUsuario($idestado, $idusuario, $conexion)
    {
        $sql = $conexion->prepare('UPDATE usuario SET estado_idestado = :idestado WHERE idusuario = :idusuario');
        $sql->bindParam(':idestado', $idestado);
        $sql->bindParam(':idusuario', $idusuario);
        if ($sql->execute()) {
            return 1;
        } else {
            return 0;
        }
    }

    public function obtenerUsuariosTea($conexion)
    {
        $sql = $conexion->prepare('SELECT *
        FROM usuariotea
        INNER JOIN usuario
        ON usuariotea.usuario_idusuario = usuario.idusuario
        INNER JOIN certificadotea
        ON usuariotea.certificadoTea_idcertificadoTea = certificadotea.idcertificadoTea
        INNER JOIN estado
        ON usuario.estado_idestado = estado.idestado');
        $sql->execute();
        $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;
    }

    public function obtenerIdUsuarioTea($datos, $conexion)
    {
        $sql = $conexion->prepare('SELECT idusuarioTea FROM usuariotea WHERE usuario_idusuario = :idusuario');
        $sql->bindparam(':idusuario', $datos['idusuario']);
        $sql->execute();
        $resultado = $sql->fetch(PDO::FETCH_ASSOC);
        return $resultado;
    }

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
                $chk2 = $conexion->query("SELECT * FROM  certificadotea WHERE nombre = '$tname' ")->rowCount();
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
