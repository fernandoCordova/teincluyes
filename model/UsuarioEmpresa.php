<?php
class UsuarioEmpresa
{
    private $nombreEmpresa;
    private $telefono;
    private $usuario_idusuario;

    public function __construct($nombreEmpresa, $telefono, $usuario_idusuario)
    {
        $this->nombreEmpresa = $nombreEmpresa;
        $this->telefono = $telefono;
        $this->usuario_idusuario = $usuario_idusuario;
    }

    public function getNombreEmpresa()
    {
        return $this->nombreEmpresa;
    }


    public function getTelefono()
    {
        return $this->telefono;
    }

    public function getUsuario_idusuario()
    {
        return $this->usuario_idusuario;
    }

    public function setNombreEmpresa($nombreEmpresa)
    {
        $this->nombreEmpresa = $nombreEmpresa;
    }

    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }

    public function setUsuario_idusuario($usuario_idusuario)
    {
        $this->usuario_idusuario = $usuario_idusuario;
    }
}
