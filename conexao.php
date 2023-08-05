<?php 

$servername = "10.70.230.53:3306";
$username = "sisaluno";
$password = "sisaluno2023";
$dbname = "sisaluno";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conexão bem-sucedida";

} catch (PDOException $e) {
    echo "Falha na conexão:";

}

