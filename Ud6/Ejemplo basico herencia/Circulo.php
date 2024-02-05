<?php
class Circulo extends Figura
{
    public const PI = 3.1416;
    private float $radio;

    private Point $centro;

    public function __construct(string $nombre, float $radio, Point $centro)
    {
        parent::__construct($nombre);
        $this->radio = $radio;
        $this->centro = $centro;
    }


    public function calcularArea()
    {
        parent::calcularArea();
        //return $this->radio * $this->radio * self::PI;
        return pow($this->radio, 2) * self::PI;
    }

    public function getRadio(): float
    {
        return $this->radio;
    }

    public function setRadio(float $radio): void
    {
        $this->radio = $radio;
    }

    public function getCentro(): Point
    {
        return $this->centro;
    }

    public function setCentro(Point $centro): void
    {
        $this->centro = $centro;
    }

}