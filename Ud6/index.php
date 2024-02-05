<?php
require_once "Person.php";

$person = new Person("Dani", 23, "Estudiante");

$person->describe_job();
$person->greet_extraterrestrials("marcianos");

