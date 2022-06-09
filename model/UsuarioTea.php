<?php 
class UsuarioTea
{
    private $espectro;
    private $usuario_idusuario;
    private $certificadoTea_idcertificadoTea;


    public function __construct($espectro, $usuario_idusuario, $certificadoTea_idcertificadoTea)
    {
        $this->espectro = $espectro;
        $this->usuario_idusuario = $usuario_idusuario;
        $this->certificadoTea_idcertificadoTea = $certificadoTea_idcertificadoTea;
    }

    public function getEspectro()
    {
        return $this->espectro;
    }

    public function getUsuario_idusuario()
    {
        return $this->usuario_idusuario;
    }

    public function getCertificadoTea_idcertificadoTea()
    {
        return $this->certificadoTea_idcertificadoTea;
    }

    public function setEspectro($espectro)
    {
        $this->espectro = $espectro;
    }

    public function setUsuario_idusuario($usuario_idusuario)
    {
        $this->usuario_idusuario = $usuario_idusuario;
    }

    public function setCertificadoTea_idcertificadoTea($certificadoTea_idcertificadoTea)
    {
        $this->certificadoTea_idcertificadoTea = $certificadoTea_idcertificadoTea;
    }
    
}

?>