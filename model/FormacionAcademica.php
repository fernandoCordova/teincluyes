<?php
class FormacionAcademica
{
    private $carrera;
    private $mencion;
    private $modalidad;
    private $situacion;
    private $fechaInicio;
    private $fechaTermino;
    private $institucion;
    private $pais_idpais;
    private $region_idregion;
    private $nivelEstudio_idnivelEstudio;
    private $curriculum_idcurriculum;

    public function __construct($carrera, $mencion, $modalidad, $situacion, $fechaInicio, $fechaTermino,$institucion, $pais_idpais, $region_idregion, $nivelEstudio_idnivelEstudio, $curriculum_idcurriculum)
    {
        $this->carrera = $carrera;
        $this->mencion = $mencion;
        $this->modalidad = $modalidad;
        $this->situacion = $situacion;
        $this->fechaInicio = $fechaInicio;
        $this->fechaTermino = $fechaTermino;
        $this->institucion = $institucion;
        $this->pais_idpais = $pais_idpais;
        $this->region_idregion = $region_idregion;
        $this->nivelEstudio_idnivelEstudio = $nivelEstudio_idnivelEstudio;
        $this->curriculum_idcurriculum = $curriculum_idcurriculum;
    }

    public function getCarrera()
    {
        return $this->carrera;
    }

    public function getMencion()
    {
        return $this->mencion;
    }

    public function getModalidad()
    {
        return $this->modalidad;
    }

    public function getSituacion()
    {
        return $this->situacion;
    }

    public function getFechaInicio()
    {
        return $this->fechaInicio;
    }

    public function getFechaTermino()
    {
        return $this->fechaTermino;
    }

    public function getInstitucion()
    {
        return $this->institucion;
    }

    public function getPais_idpais()
    {
        return $this->pais_idpais;
    }

    public function getRegion_idregion()
    {
        return $this->region_idregion;
    }

    public function getNivelEstudio_idnivelEstudio()
    {
        return $this->nivelEstudio_idnivelEstudio;
    }

    public function getCurriculum_idcurriculum()
    {
        return $this->curriculum_idcurriculum;
    }

    public function setCarrera($carrera)
    {
        $this->carrera = $carrera;
    }

    public function setMencion($mencion)
    {
        $this->mencion = $mencion;
    }

    public function setModalidad($modalidad)
    {
        $this->modalidad = $modalidad;
    }

    public function setSituacion($situacion)
    {
        $this->situacion = $situacion;
    }

    public function setFechaInicio($fechaInicio)
    {
        $this->fechaInicio = $fechaInicio;
    }

    public function setFechaTermino($fechaTermino)
    {
        $this->fechaTermino = $fechaTermino;
    }

    public function setInstitucion($institucion)
    {
        $this->institucion = $institucion;
    }

    public function setPais_idpais($pais_idpais)
    {
        $this->pais_idpais = $pais_idpais;
    }

    public function setRegion_idregion($region_idregion)
    {
        $this->region_idregion = $region_idregion;
    }

    public function setNivelEstudio_idnivelEstudio($nivelEstudio_idnivelEstudio)
    {
        $this->nivelEstudio_idnivelEstudio = $nivelEstudio_idnivelEstudio;
    }

    public function setCurriculum_idcurriculum($curriculum_idcurriculum)
    {
        $this->curriculum_idcurriculum = $curriculum_idcurriculum;
    }
}
