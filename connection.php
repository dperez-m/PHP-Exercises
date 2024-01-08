<?php
/**
 * Summary of getConnection
 * Crea un objeto PDO
 * @return PDO|null un objeto PDO si ha habido éxito creando la conexión, null en caso contrario
 */
function getConnection()
{
    $configFile = "db_settings.ini";

    if (!$config = parse_ini_file($configFile, TRUE)) throw new exception('Unable to open ' . $configFile . ".");

    $dns = $config["database"]['driver'] . ":host=" . $config["database"]["host"] . ((!empty($config["database"]["port"])) ? (";port=" . $config["database"]["port"]) : "") . ";dbname=" . $config["database"]["schema"];
    $user = $config["database"]["username"];
    $pass = $config["database"]["password"];

    try {

        $con = new PDO($dns, $user, $pass,  array(
            PDO::ATTR_PERSISTENT => $config["database"]["persistent"]
        ));

        //Esto no hace falta en versión PHP 8 y superiores: https://www.php.net/manual/en/pdo.error-handling.php
        //PDO::ERRMODE_EXCEPTION: As of PHP 8.0.0, this is the default mode.
        //$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $ex) {

        echo "Error en la conexión: mensaje: " . $ex->getMessage();
    }
    return $con;
}