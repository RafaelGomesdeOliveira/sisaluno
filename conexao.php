<?php 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sisADP";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Conexão bem-sucedida";

} catch (PDOException $e) {
    // echo "Falha na conexão:";

}
