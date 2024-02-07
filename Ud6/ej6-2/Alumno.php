<?php

class Alumno extends Persona
{
    private int $numClases = 0;
    public function __construct(String $nombre, String $apellidos, int $telf){
        parent::__construct($nombre, $apellidos, $telf);
    }

    public function setNumClases(int $numClases){
        $this->numClases = $numClases;
    }

    public function aPagar(){
        if ($this->numClases != 0){
            return $this->numClases == 1 ? 20 : ($this->numClases == 2 ? 32 : 40);
        } else {
            echo "Debe indicar previamente o número de clases.";
            return 0;
        }
    }
}