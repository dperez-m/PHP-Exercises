<?php

class Profesor extends Persona{
    private String $nif;
    private array $bailes;
    public function __construct(String $nombre, String $apellidos, int $telf, string $nif)
    {
        parent::__construct($nombre, $apellidos, $telf);
        $this->nif = $nif;
    }

    public function calcularSueldo(int $horas, int $importeHora = 16){
        return $horas * $importeHora;
    }

    public function añadirBaile(String $nombre, int $edad){
        foreach ($this->bailes as $baile){
            if ($baile->getName() == $nombre)
                $exists = true;
        }
        if (isset($exists))
        $bailes[] = new Baile($nombre, $edad);
    }

    public function eliminarBaile(String $nombre){
        foreach ($this->bailes as $baile){
            if ($baile->getName() == $nombre){
                $baile = null;
            }
        }
    }

    public function getBailes(){
        foreach ($this->bailes as $baile) {
            echo $baile.getName() . " (edad min: " . $baile.getEdad() . ")\n";
        }
    }

}