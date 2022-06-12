<?php
class Curriculum
{
    private $imagen;
    private $telefono;
    private $portafolio;
    private $acercaDeMi;
    private $direccion;
    private $genero;
    private $fechaNacimiento;
    private $titulo;
    private $experiencia;
    private $renta;
    private $nacionalidad_idnacionalidad;
    private $pais_idpais;
    private $region_idregion;
    private $usuarioTea_idusuarioTea;

    public function __construct($imagen = null, $telefono = null, $portafolio = null, $acercaDeMi = null, $direccion = null, $genero = null, $fechaNacimiento = null, $titulo = null, $experiencia = null, $renta = null, $nacionalidad_idnacionalidad = null, $pais_idpais = null, $region_idregion = null, $usuarioTea_idusuarioTea = null)
    {
        $this->imagen = $imagen;
        $this->telefono = $telefono;
        $this->portafolio = $portafolio;
        $this->acercaDeMi = $acercaDeMi;
        $this->direccion = $direccion;
        $this->genero = $genero;
        $this->fechaNacimiento = $fechaNacimiento;
        $this->titulo = $titulo;
        $this->experiencia = $experiencia;
        $this->renta = $renta;
        $this->nacionalidad_idnacionalidad = $nacionalidad_idnacionalidad;
        $this->pais_idpais = $pais_idpais;
        $this->region_idregion = $region_idregion;
        $this->usuarioTea_idusuarioTea = $usuarioTea_idusuarioTea;
    }

    public function getImagen()
    {
        return $this->imagen;
    }

    public function getTelefono()
    {
        return $this->telefono;
    }

    public function getPortafolio()
    {
        return $this->portafolio;
    }

    public function getAcercaDeMi()
    {
        return $this->acercaDeMi;
    }

    public function getDireccion()
    {
        return $this->direccion;
    }

    public function getGenero()
    {
        return $this->genero;
    }

    public function getFechaNacimiento()
    {
        return $this->fechaNacimiento;
    }

    public function getTitulo()
    {
        return $this->titulo;
    }

    public function getExperiencia()
    {
        return $this->experiencia;
    }

    public function getRenta()
    {
        return $this->renta;
    }

    public function getNacionalidad_idnacionalidad()
    {
        return $this->nacionalidad_idnacionalidad;
    }

    public function getPais_idpais()
    {
        return $this->pais_idpais;
    }

    public function getRegion_idregion()
    {
        return $this->region_idregion;
    }

    public function getUsuarioTea_idusuarioTea()
    {
        return $this->usuarioTea_idusuarioTea;
    }

    public function setImagen($imagen)
    {
        $this->imagen = $imagen;
    }

    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }

    public function setPortafolio($portafolio)
    {
        $this->portafolio = $portafolio;
    }

    public function setAcercaDeMi($acercaDeMi)
    {
        $this->acercaDeMi = $acercaDeMi;
    }

    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    }

    public function setGenero($genero)
    {
        $this->genero = $genero;
    }

    public function setFechaNacimiento($fechaNacimiento)
    {
        $this->fechaNacimiento = $fechaNacimiento;
    }

    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }

    public function setExperiencia($experiencia)
    {
        $this->experiencia = $experiencia;
    }

    public function setRenta($renta)
    {
        $this->renta = $renta;
    }

    public function setNacionalidad_idnacionalidad($nacionalidad_idnacionalidad)
    {
        $this->nacionalidad_idnacionalidad = $nacionalidad_idnacionalidad;
    }

    public function setPais_idpais($pais_idpais)
    {
        $this->pais_idpais = $pais_idpais;
    }

    public function setRegion_idregion($region_idregion)
    {
        $this->region_idregion = $region_idregion;
    }

    public function setUsuarioTea_idusuarioTea($usuarioTea_idusuarioTea)
    {
        $this->usuarioTea_idusuarioTea = $usuarioTea_idusuarioTea;
    }
}
