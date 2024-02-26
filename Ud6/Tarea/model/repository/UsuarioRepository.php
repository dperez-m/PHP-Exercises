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
    }


}