<?php
class ExperienciaLaboral
{
    private $cargo;
    private $nombreEmpresa;
    private $fechaIncio;
    private $fechaTermino;
    private $continuidad;
    private $descripcion;
    private $tipoTrabajo_idtipoTrabajo;
    private $jerarquiaEmpresa_idjerarquiaEmpresa;
    private $actividadEmpresa_idactividadEmpresa;
    private $curriculum_idcurriculum;

    public function __construct($cargo, $nombreEmpresa, $fechaIncio, $fechaTermino, $continuidad, $descripcion, $tipoTrabajo_idtipoTrabajo, $jerarquiaEmpresa_idjerarquiaEmpresa, $actividadEmpresa_idactividadEmpresa, $curriculum_idcurriculum)
    {
        $this->cargo = $cargo;
        $this->nombreEmpresa = $nombreEmpresa;
        $this->fechaIncio = $fechaIncio;
        $this->fechaTermino = $fechaTermino;
        $this->continuidad = $continuidad;
        $this->descripcion = $descripcion;
        $this->tipoTrabajo_idtipoTrabajo = $tipoTrabajo_idtipoTrabajo;
        $this->jerarquiaEmpresa_idjerarquiaEmpresa = $jerarquiaEmpresa_idjerarquiaEmpresa;
        $this->actividadEmpresa_idactividadEmpresa = $actividadEmpresa_idactividadEmpresa;
        $this->curriculum_idcurriculum = $curriculum_idcurriculum;
    }

    public function getCargo()
    {
        return $this->cargo;
    }

    public function getNombreEmpresa()
    {
        return $this->nombreEmpresa;
    }

    public function getFechaIncio()
    {
        return $this->fechaIncio;
    }

    public function getFechaTermino()
    {
        return $this->fechaTermino;
    }

    public function getContinuidad()
    {
        return $this->continuidad;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function getTipoTrabajo_idtipoTrabajo()
    {
        return $this->tipoTrabajo_idtipoTrabajo;
    }

    public function getJerarquiaEmpresa_idjerarquiaEmpresa()
    {
        return $this->jerarquiaEmpresa_idjerarquiaEmpresa;
    }

    public function getActividadEmpresa_idactividadEmpresa()
    {
        return $this->actividadEmpresa_idactividadEmpresa;
    }

    public function getCurriculum_idcurriculum()
    {
        return $this->curriculum_idcurriculum;
    }

    public function setCargo($cargo)
    {
        $this->cargo = $cargo;
    }

    public function setNombreEmpresa($nombreEmpresa)
    {
        $this->nombreEmpresa = $nombreEmpresa;
    }

    public function setFechaIncio($fechaIncio)
    {
        $this->fechaIncio = $fechaIncio;
    }

    public function setFechaTermino($fechaTermino)
    {
        $this->fechaTermino = $fechaTermino;
    }

    public function setContinuidad($continuidad)
    {
        $this->continuidad = $continuidad;
    }

    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    public function setTipoTrabajo_idtipoTrabajo($tipoTrabajo_idtipoTrabajo)
    {
        $this->tipoTrabajo_idtipoTrabajo = $tipoTrabajo_idtipoTrabajo;
    }

    public function setJerarquiaEmpresa_idjerarquiaEmpresa($jerarquiaEmpresa_idjerarquiaEmpresa)
    {
        $this->jerarquiaEmpresa_idjerarquiaEmpresa = $jerarquiaEmpresa_idjerarquiaEmpresa;
    }

    public function setActividadEmpresa_idactividadEmpresa($actividadEmpresa_idactividadEmpresa)
    {
        $this->actividadEmpresa_idactividadEmpresa = $actividadEmpresa_idactividadEmpresa;
    }

    public function setCurriculum_idcurriculum($curriculum_idcurriculum)
    {
        $this->curriculum_idcurriculum = $curriculum_idcurriculum;
    }

    


}
