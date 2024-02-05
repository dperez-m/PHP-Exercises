<?php
require_once 'header.php';
// $my_class = new MiClase();
// $my_class->foo();
// echo "<p> cte pública " . MiClase::MY_PUBLIC . "</p>";
// //echo "<p> cte private " . MiClase::MY_PRIVATE . "</p>";
$puntoA = new Point(0, 0);
$puntoA->mostrarCoord();

$puntoB = new Point(100, 0);
$puntoB->mostrarCoord();
$figuras_arr[] = new Cuadrado("Cuadrado", 4, $puntoA, 4);
$figuras_arr[] = new Circulo("Círculo", 3.5, $puntoB);

foreach ($figuras_arr as $value){
    $area = $value->calcularArea();
    $value->verInformacion();
    echo "</br>El área es " . $area;

}
