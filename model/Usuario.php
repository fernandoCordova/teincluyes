<?php
class Usuario
{
    private $correo;
    private $clave;
    private $rut;
    private $nombres;
    private $apellidos;
    private $create_usuario;
    private $update_usuario;
    private $tipoUsuario_idtipoUsuario;
    private $estado_idestado;

    public function __construct($correo, $clave, $rut, $nombres, $apellidos, $create_usuario = null, $update_usuario = null, $tipoUsuario_idtipoUsuario, $estado_idestado)
    {
        $this->correo = $correo;
        $this->clave = $clave;
        $this->rut = $rut;
        $this->nombres = $nombres;
        $this->apellidos = $apellidos;
        $this->create_usuario = $create_usuario;
        $this->update_usuario = $update_usuario;
        $this->tipoUsuario_idtipoUsuario = $tipoUsuario_idtipoUsuario;
        $this->estado_idestado = $estado_idestado;
    }

    public function getCorreo()
    {
        return $this->correo;
    }

    public function getClave()
    {
        return $this->clave;
    }

    public function getRut()
    {
        return $this->rut;
    }

    public function getNombres()
    {
        return $this->nombres;
    }

    public function getApellidos()
    {
        return $this->apellidos;
    }

    public function getCreate_usuario()
    {
        return $this->create_usuario;
    }

    public function getUpdate_usuario()
    {
        return $this->update_usuario;
    }

    public function getTipoUsuario_idtipoUsuario()
    {
        return $this->tipoUsuario_idtipoUsuario;
    }

    public function getEstado_idestado()
    {
        return $this->estado_idestado;
    }

    public function setCorreo($correo)
    {
        $this->correo = $correo;
    }

    public function setClave($clave)
    {
        $this->clave = $clave;
    }

    public function setRut($rut)
    {
        $this->rut = $rut;
    }

    public function setNombres($nombres)
    {
        $this->nombres = $nombres;
    }

    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;
    }

    public function setCreate_usuario($create_usuario)
    {
        $this->create_usuario = $create_usuario;
    }

    public function setUpdate_usuario($update_usuario)
    {
        $this->update_usuario = $update_usuario;
    }

    public function setTipoUsuario_idtipoUsuario($tipoUsuario_idtipoUsuario)
    {
        $this->tipoUsuario_idtipoUsuario = $tipoUsuario_idtipoUsuario;
    }

    public function setEstado_idestado($estado_idestado)
    {
        $this->estado_idestado = $estado_idestado;
    }
}
