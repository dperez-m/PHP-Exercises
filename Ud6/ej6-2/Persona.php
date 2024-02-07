<?php

class Persona
{
private String $nombre;
private String $apellidos;
private int $telf;

    public function __construct(string $nombre, string $apellidos, int $telf)
    {
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->telf = $telf;
    }

    public function verInformacion(){
        echo $this->nombre . $this->apellidos . "(" . $this->telf . ")";
    }

}