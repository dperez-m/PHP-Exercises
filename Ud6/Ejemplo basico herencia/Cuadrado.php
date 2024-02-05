<?php
class Cuadrado extends Figura
{
    private float $lado;

    private Point $bottonLeft;



    public function __construct(string $nombre, float $lado, Point $bottomLeft, int $num_lados = 0)
    {

        parent::__construct($nombre, $num_lados);
        $this->bottonLeft = $bottomLeft;
        $this->lado = $lado;

    }


    public function calcularArea()
    {
        parent::calcularArea();
        // return $this->lado * $this->lado;
        return pow($this->lado, 2);
    }

    public function getLado(): float
    {
        return $this->lado;
    }

    public function setLado(float $lado): void
    {
        $this->lado = $lado;
    }

    public function getBottonLeft(): Point
    {
        return $this->bottonLeft;
    }

    public function setBottonLeft(Point $bottonLeft): void
    {
        $this->bottonLeft = $bottonLeft;
    }

}