<?php
ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Creador de cookies</title>
</head>
<body>
    <h1>Introduzca datos para crear una cookie</h1>
<form method="post">
  <div class="form-group">
    <div class="col-3">
        <label for="exampleInputEmail1">Cookie name</label>
        <input type="text" class="form-control" id="cookieName" name="cookieName" required>
    </div>
  </div>
  <div class="form-group">
    <div class="col-3">
        <label for="exampleInputPassword1">Cookie value</label>
        <input type="text" class="form-control" id="cookieVal" name="cookieVal" required>
    </div>
  </div>
  <div class="form-group">
    <div class="col-3">
        <label for="exampleInputPassword1">Cookie expiration seconds</label>
        <input type="number" class="form-control" id="expirationTime" name="expirationTime">
      </div>
    </div>
    <button type="submit" class="btn btn-primary">Añadir cookie</button>
  </form>
  <?php
if (isset($_POST["cookieName"]) && isset($_POST["cookieVal"])){
  $cookieName = $_POST['cookieName'];
  $cookieVal = $_POST["cookieVal"];
  if ($_POST["expirationTime"] != "")
    $expTime = time() + $_POST["expirationTime"];
  else $expTime = 0;
  setcookie("cookiesTabla[$cookieName]" , $cookieVal, $expTime);
  header("Refresh:0");
}
//var_dump($_COOKIE["hola"]);
if (isset($_COOKIE['cookiesTabla']))
include_once "tabla_cookies.php";
?>
</body>
</html>
<?php
ob_end_flush();
?>