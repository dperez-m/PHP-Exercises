<?php
namespace clases\people;
/**
 * Description of Alumno
 *
 * @author maria
 */


final class Alumno extends Persoa {

    const CUOTA_UNA_CLASE = 20;
    const CUOTA_DOS_CLASES = 32;
    const CUOTA_TRES_O_MAS_CLASES = 40;

    private \DateTimeImmutable $fecha_nacimiento;
    private $numClases;

    public function __construct(string $nome, string $apelidos, string $mobil, string $edad, $numClases = 0) {
        parent::__construct($nome, $apelidos, $mobil);
        $this->numClases = $numClases;
        $this->fecha_nacimiento = new \DateTimeImmutable($edad);
//        $date = new \DateTimeImmutable('now');
//        $this->edad = $date->modify('-' . $edad . ' year')->format('Y-m-d');
    }

    //Otra opción sería no añadir un constructor en esta clase
    //y cuando se llame a new Alumno($nome, $apelidos, $mobil) se llamaría
    //implícitamente al constructor de Persona

    public function setNumClases($numClases): void {
        $this->numClases = $numClases;
    }

    #[\Override] public function verInformacion()
    {
        $today = new \DateTimeImmutable();
        $edad = $today->diff($this->fecha_nacimiento);
        if ($edad->y >= 18){
            $cadea = implode (" ",
                [$this->nome,  $this->apelidos,
                    "(".$this->mobil.")<br/>"]);
            echo $cadea;
        }else {
            echo "No se puede mostrar información.";
        }

    }


    public function aPagar(): string {
        $importe = 0;

        if (($this->numClases != null) && ($this->numClases > 0)) {

            switch ($this->numClases) {
                case 1:
                    $importe = self::CUOTA_UNA_CLASE;
                    break;
                case 2:
                    $importe = self::CUOTA_DOS_CLASES;
                    break;
                default :
                    //asumimos números positivos
                    $importe = self::CUOTA_TRES_O_MAS_CLASES;
                    break;
            }
        } else {
            $importe = "Debe indicar previamente o número de clases";
        }
        return $importe;
    }

}
