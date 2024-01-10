<?php
require_once "connection.php";
require_once "index.php";
function insertuser($email, $pwd, $role) :bool {
    $hashedPwd = password_hash($pwd, PASSWORD_BCRYPT, ["cost" => 13]);

    try {
        $condb = getConnection();
        $condb->beginTransaction();
        $stmt = $condb->prepare("INSERT INTO usuario(email, pwdhash) VALUES (:mail, :pwd)");
        $stmt->bindParam(":mail", $email);
        $stmt->bindParam(":pwd", $hashedPwd);

        if ($stmt->execute()) {
            $user_id = $condb->lastInsertId();
        } else throw new Exception();

        $stmtRole = $condb->prepare("INSERT INTO usuario_rol(idUsuario, idRol) VALUES (:id, :rol)");
        $stmtRole->bindParam(":id", $user_id);
        $stmtRole->bindParam(":rol", $role);
        if (!$stmtRole->execute()) {
            throw new Exception();
        }

        $condb->commit();
    } catch (Exception $e) {
        echo '<div class="alert alert-danger" role="alert"> An error ocurred when registering the user, message: $e->getMessage()</div>';
        $condb->rollBack();
        return false;
    }
    echo '<div class="alert alert-success" role="alert"> The user has been registered.</div>';
    return true;
}
?>