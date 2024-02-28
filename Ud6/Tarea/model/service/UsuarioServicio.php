<?php

class UsuarioServicio
{

    const USER_DOES_NOT_EXIST = "No existe usuario";
    const PWD_INCORRECT = "La contraseña no es correcta";
    private IUsuarioRepository $userRepository;
    private IRolRepository $rolRepository;

    public function __construct()
    {
        $this->userRepository = new UsuarioRepository();
        $this->rolRepository = new RolRepository();
    }


    public function getUsuarios(): array{

        $users = $this->userRepository->findAll();

        foreach ($users as $user) {
            $user->setRoles($this->rolRepository->findRolesByUserId($user->getId()));
        }
        return $users;
    }

    public function login(string $user, string $pwd, $rolId): ?Usuario
    {
        $user = $this->userRepository->findUsuarioByEmail($user);
        if (password_verify($pwd, $user->getPwdhash())){
            $roles = $this->rolRepository->findRolesByUserId($user->getId());
            $user->setRoles($roles);
            if ($this->isUserInRole($user, $rolId))
                return $user;
        }
        return null;
    }

    public function getRoles(): array
    {

        $roles = $this->rolRepository->findAll();

        return $roles;
    }

    public function getRoleById(int $roleId): ?Rol
    {

        return $this->rolRepository->read($roleId);




    }

    private function isUserInRole(Usuario $usuario, int $roleId): bool
    {
        $rolesArray = $usuario->getRoles();
        foreach ($rolesArray as $rol) {
            if ($rol->getId() === $roleId) {
                return true;
            }
        }

        return false;
    }


}

?>