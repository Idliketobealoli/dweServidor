<?php
/**
 * @return PDO|void
 */
function getConnectionString()
{
    $server = "localhost";
    $identifier = "root";
    $password = "";
    $database = "agenda";
    $options = [
        PDO::ATTR_EMULATE_PREPARES   => false, // Modo emulación desactivado para prepared statements "reales"
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // Que los errores salgan como excepciones
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // El modo de fetch que queremos por defecto.
    ];

    try {
        $connectionString = new PDO("mysql:host=$server;dbname=$database;charset=utf8", $identifier, $password, $options);
    } catch (Exception $ex) {
        error_log("Error establishing the connection: " . $ex->getMessage());
        exit('Error establishing the connection.');
    }
    return $connectionString;
}
?>
