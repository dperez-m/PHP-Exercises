<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Sign in</title>
</head>

<body>
    <?php
    require_once "connection.php";
    $email = null;
    $pwd = null;

    if (isset($_POST["inputEmail"])) {
        $email = $_POST["inputEmail"];
        if (isset($_POST["inputPassword"])) {
            $pwd = $_POST["inputPassword"];
            if (signIn($email, $pwd)){
                echo '<div class="alert alert-success" role="alert">You are logged in.</div>';
            } else echo '<div class="alert alert-danger" role="alert">Invalid password or email.</div>';
        }
    }
    ?>
    <h1>Sign in</h1>
    <form class="row gx-3 gy-2 align-items-center" method="post">
        <div class="col-sm-3">
            <label class="visually-hidden" for="inputEmail">Email</label>
            <div class="input-group">
                <div class="input-group-text">📧</div>
                <input type="email" class="form-control" id="inputEmail" name="inputEmail" placeholder="email@domain.com">
            </div>
        </div>
        </div>
        <div class="col-sm-3">
            <label class="visually-hidden" for="inputPassword">Password</label>
            <div class="input-group">
                <div class="input-group-text">🔐</div>
                <input type="password" class="form-control" id="inputPassword" name="inputPassword" placeholder="Your password">
            </div>
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary">Sign in</button>
        </div>
    </form>
    <?php

    function signIn($email, $pwd): bool
    {

        try {
            $condb = getConnection();
            $condb->beginTransaction();

            $stmt = $condb->prepare("SELECT email, pwdhash FROM usuario WHERE email LIKE :mail");
            $stmt->bindParam(":mail", $email);

            if (!$stmt->execute()) {
                throw new Exception("Error connecting to the database.");
            }
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
            $condb->rollBack();
            echo '<div class="alert alert-danger" role="alert"> An error ocurred when signin in: $e->getMessage()</div>';
            return false;
        }
        if (!empty($result)) {
            if ($email == $result["email"] && password_verify($pwd, $result["pwdhash"])) {
                return true;
            }
        }
        return false;
}
    ?>
</body>

</html>