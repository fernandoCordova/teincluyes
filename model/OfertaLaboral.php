<?php 
class OfertaLaboral
{
    private $titulo;
    private $rubro;
    private $fechaInicio;
    private $fechaTermino;
    private $descripcion;
    private $tipoDeCargo;
    private $cantidadVacantes;
    private $area;
    private $region;
    private $comuna;
    private $direccion;
    private $duracion;
    private $jornada;
    private $sueldo;
    private $requisitosMinimos;
    private $experienciaMinima;
    private $estudiosMinimos;
    private $situacionAcademica;
    private $carreras;
    private $estado;
    private $usuarioEmpresa_idusuarioEmpresa;

    public function __construct($titulo, $rubro, $fechaInicio, $fechaTermino, $descripcion, $tipoDeCargo, $cantidadVacantes, $area, $region, $comuna, $direccion, $duracion, $jornada, $sueldo, $requisitosMinimos, $experienciaMinima,$estudiosMinimos , $situacionAcademica, $carreras, $estado, $usuarioEmpresa_idusuarioEmpresa)
    {
        $this->titulo = $titulo;
        $this->rubro = $rubro;
        $this->fechaInicio = $fechaInicio;
        $this->fechaTermino = $fechaTermino;
        $this->descripcion = $descripcion;
        $this->tipoDeCargo = $tipoDeCargo;
        $this->cantidadVacantes = $cantidadVacantes;
        $this->area = $area;
        $this->region = $region;
        $this->comuna = $comuna;
        $this->direccion = $direccion;
        $this->duracion = $duracion;
        $this->jornada = $jornada;
        $this->sueldo = $sueldo;
        $this->requisitosMinimos = $requisitosMinimos;
        $this->experienciaMinima = $experienciaMinima;
        $this->estudiosMinimos = $estudiosMinimos;
        $this->situacionAcademica = $situacionAcademica;
        $this->carreras = $carreras;
        $this->estado = $estado;
        $this->usuarioEmpresa_idusuarioEmpresa = $usuarioEmpresa_idusuarioEmpresa;
    }

    public function getTitulo()
    {
        return $this->titulo;
    }

    public function getRubro()
    {
        return $this->rubro;
    }

    public function getFechaInicio()
    {
        return $this->fechaInicio;
    }

    public function getFechaTermino()
    {
        return $this->fechaTermino;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function getTipoDeCargo()
    {
        return $this->tipoDeCargo;
    }

    public function getCantidadVacantes()
    {
        return $this->cantidadVacantes;
    }

    public function getArea()
    {
        return $this->area;
    }

    public function getRegion()
    {
        return $this->region;
    }


    public function getComuna()
    {
        return $this->comuna;
    }

    public function getDireccion()
    {
        return $this->direccion;
    }

    public function getDuracion()
    {
        return $this->duracion;
    }

    public function getJornada()
    {
        return $this->jornada;
    }

    public function getSueldo()
    {
        return $this->sueldo;
    }

    public function getRequisitosMinimos()
    {
        return $this->requisitosMinimos;
    }

    public function getExperienciaMinima()
    {
        return $this->experienciaMinima;
    }

    public function getEstudiosMinimos()
    {
        return $this->estudiosMinimos;
    }

    public function getSituacionAcademica()
    {
        return $this->situacionAcademica;
    }

    public function getCarreras()
    {
        return $this->carreras;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function getUsuarioEmpresa_idusuarioEmpresa()
    {
        return $this->usuarioEmpresa_idusuarioEmpresa;
    }

    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }

    public function setRubro($rubro)
    {
        $this->rubro = $rubro;
    }

    public function setFechaInicio($fechaInicio)
    {
        $this->fechaInicio = $fechaInicio;
    }

    public function setFechaTermino($fechaTermino)
    {
        $this->fechaTermino = $fechaTermino;
    }

    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    public function setTipoDeCargo($tipoDeCargo)
    {
        $this->tipoDeCargo = $tipoDeCargo;
    }

    public function setCantidadVacantes($cantidadVacantes)
    {
        $this->cantidadVacantes = $cantidadVacantes;
    }

    public function setArea($area)
    {
        $this->area = $area;
    }

    public function setRegion($region)
    {
        $this->region = $region;
    }

    public function setComuna($comuna)
    {
        $this->comuna = $comuna;
    }

    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    }

    public function setDuracion($duracion)
    {
        $this->duracion = $duracion;
    }

    public function setJornada($jornada)
    {
        $this->jornada = $jornada;
    }

    public function setSueldo($sueldo)
    {
        $this->sueldo = $sueldo;
    }

    public function setRequisitosMinimos($requisitosMinimos)
    {
        $this->requisitosMinimos = $requisitosMinimos;
    }

    public function setExperienciaMinima($experienciaMinima)
    {
        $this->experienciaMinima = $experienciaMinima;
    }

    public function setEstudiosMinimos($estudiosMinimos)
    {
        $this->estudiosMinimos = $estudiosMinimos;
    }

    public function setSituacionAcademica($situacionAcademica)
    {
        $this->situacionAcademica = $situacionAcademica;
    }

    public function setCarreras($carreras)
    {
        $this->carreras = $carreras;
    }

    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

    public function setUsuarioEmpresa_idusuarioEmpresa($usuarioEmpresa_idusuarioEmpresa)
    {
        $this->usuarioEmpresa_idusuarioEmpresa = $usuarioEmpresa_idusuarioEmpresa;
    }

    

}

?>