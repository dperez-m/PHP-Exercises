<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Uso de sesiones</title>
</head>
<body>
    <?php
    if (session_status() !== PHP_SESSION_ACTIVE) {
        $iniciada = session_start();
    }

    if (isset ($_POST["inputTxt"])){
        if (!isset($_SESSION["textos"])){
            $_SESSION["textos"] = array();
            $_SESSION["textos"][0] = $_POST["inputTxt"];
        } else {
            array_push($_SESSION["textos"], $_POST["inputTxt"]);
        }
    }
    
    if (isset($_POST["btnCerrar"])){
        if (session_status() !== PHP_SESSION_ACTIVE) {
            $iniciada = session_start();
        }
        $_SESSION = array();
    
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                    $params["path"], $params["domain"],
                    $params["secure"], $params["httponly"]
            );
        }
        session_destroy();
    }
    
    if ($iniciada && isset($_SESSION["textos"])){
        echo "<h1>Contenido de la sesión:</h1>";
        echo "<ul>";
        foreach ($_SESSION["textos"] as $key => $value) {
            echo "<li>$value</li>";
        }
        echo "</ul>";
    }
    ?>
    <form method="post">
  <div class="col-2">
    <label for="inputTxt" class="form-label">Texto:</label>
    <input type="text" class="form-control" id="inputTxt" name="inputTxt">
  </div>
</br>
    <button type="submit" class="btn btn-primary">Enviar</button>
    <div>
</br>
        <button type="submit" class="btn btn-secondary" name="btnCerrar">Cerrar Sesión</button>
    </div>
</form>
</body>
</html>