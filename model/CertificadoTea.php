<?php 
class CertificadoTea
{
    private $nombre;
    private $fnombre;

    public function __construct($nombre, $fnombre)
    {
        $this->nombre = $nombre;
        $this->fnombre = $fnombre;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getFnombre()
    {
        return $this->fnombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function setFnombre($fnombre)
    {
        $this->fnombre = $fnombre;
    }
    
}

?>