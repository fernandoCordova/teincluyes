<?php 
class Topico
{
    private $nombre;
    private $fechaPublicacion;
    private $contenido;
    private $idUsuarioTea;
    private $idCategoria;

    public function __construct($nombre, $fechaPublicacion, $contenido, $idUsuarioTea, $idCategoria)
    {
        $this->nombre = $nombre;
        $this->fechaPublicacion = $fechaPublicacion;
        $this->contenido = $contenido;
        $this->idUsuarioTea = $idUsuarioTea;
        $this->idCategoria = $idCategoria;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getFechaPublicacion()
    {
        return $this->fechaPublicacion;
    }

    public function getContenido()
    {
        return $this->contenido;
    }

    public function getIdUsuarioTea()
    {
        return $this->idUsuarioTea;
    }

    public function getIdCategoria()
    {
        return $this->idCategoria;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function setFechaPublicacion($fechaPublicacion)
    {
        $this->fechaPublicacion = $fechaPublicacion;
    }

    public function setContenido($contenido)
    {
        $this->contenido = $contenido;
    }

    public function setIdUsuarioTea($idUsuarioTea)
    {
        $this->idUsuarioTea = $idUsuarioTea;
    }

    public function setIdCategoria($idCategoria)
    {
        $this->idCategoria = $idCategoria;
    }
}
