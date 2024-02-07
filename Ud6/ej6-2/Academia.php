<?php

class Academia
{
private array $profesores;
private array $alumnos;

    /**
     * @param array $alumnos
     */
    public function __construct($nombre)
    {
        define("NOMBRE", $nombre);
    }

    public function añadirProfesor(String $nombre, String $apellidos, int $telf, string $nif){
        $profesores[] = new Profesor($nombre, $apellidos, $telf, $nif);
    }

    public function añadirAlumno(String $nombre, String $apellidos, int $telf){
        $alumnos[] = new Alumno($nombre, $apellidos, $telf);
    }

}