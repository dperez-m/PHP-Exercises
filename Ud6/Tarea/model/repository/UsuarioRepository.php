<?php

class UsuarioRepository extends BaseRepository implements IUsuarioRepository
{

    public function __construct()
    {
        parent::__construct();
        $this->table_name = "usuario";
        $this->pk_name = "id";
        $this->class_name = "Usuario";
        $this->default_order_column = "email";
    }

    #[\Override] public function create($object)
    {
        return null;
    }

    #[\Override] public function update($object): bool
    {
        return false;
    }

    #[\Override] public function findUsuarioByEmail($email): Usuario
    {
        $consulta = "SELECT * FROM usuario WHERE email = $email";

        $pdostmt = $this->conn->prepare($consulta);
        $pdostmt->execute();

        $user = $pdostmt->fetchAll(PDO::FETCH_CLASS, $this->class_name);
        return $user; //Checkear si falla
    }


}