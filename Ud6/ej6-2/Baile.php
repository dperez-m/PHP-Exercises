<?php

class Baile{
    private String $name = "";
    private int $edad = 8;

    /**
     * @param string $name
     * @param int $edad
     */
    public function __construct(string $name, int $edad)
    {
        $this->name = $name;
        if ($edad >= 8) {
            $this->edad = $edad;
        } else
            return null;
    }

    public function getName(): string{
        return $this->name;
    }

    public function getEdad(): int
    {
        return $this->edad;
    }



}