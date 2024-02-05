<?php
class Person{
    public const SPECIES='Homo Sapiens';
    public String $nombre;
    public int $edad;
    public String $ocupacion;

    public function __construct(String $nombre, int $edad, String $ocupacion) {
        $this->nombre = $nombre;
        $this->edad = $edad;
        $this->ocupacion = $ocupacion;
    }

    public function introduce(){
        echo "My name is " . $this->nombre;
    }
    public function describe_job(){
        echo "I am currently working as a(n) " . $this->ocupacion . "\n";
    }

    public static function greet_extraterrestrials(String $especie){
        echo "Welcome to Planet Earth " . $especie;
    }

}