<?php
class Figura
{
    protected int $num_lados;
    protected string $nombre;

    

    public function calcularArea()
    {
        echo "<p> Calculando el área de $this->nombre ...</p>";
    }

    public function __construct(string $nombre, int $num_lados = 0)
    {
        $this->nombre = $nombre;
        $this->num_lados = $num_lados;
    }

    public function verInformacion(){
        echo "Nombre: " . $this->nombre;
        if ($this->num_lados != 0){
            echo "</br>Numero de lados: " . $this->num_lados;
        }
    }

    public function getNumLados(): int
    {
        return $this->num_lados;
    }

    public function setNumLados(int $num_lados): void
    {
        $this->num_lados = $num_lados;
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): void
    {
        $this->nombre = $nombre;
    }

}