<?php
namespace clases\people;

use traits\Logger;

/**
 * Description of Persoa
 *
 * @author maria
 */
abstract class Persoa implements \JsonSerializable {
    use Logger;
   protected $nome;
   protected $apelidos;
   protected $mobil;


   public function __construct(string $nome, string $apelidos, string $mobil) {
       $this->nome = $nome;
       $this->apelidos = $apelidos;
       $this->mobil = $mobil;
   }


   public function getNome(): string{
       return $this->nome;
   }

   public function getApelidos():string {
       return $this->apelidos;
   }

   public function getMobil():string {
       return $this->mobil;
   }

   public function setNome(string $nome): void {
       $this->nome = $nome;
   }

   public function setApelidos(string $apelidos): void {
       $this->apelidos = $apelidos;
   }

   public function setMobil(string $mobil): void {
       $this->mobil = $mobil;
   }

   public abstract function verInformacion();

   public function jsonSerialize(): mixed
   {
       $this->log("Serializando...");
       return $this->nome;
   }


}
