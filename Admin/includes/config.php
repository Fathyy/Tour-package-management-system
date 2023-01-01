<?php 
// DB credentials.
$host = 'localhost';
$username ='root';
$db = 'tms';
$password = '';

$dsn = "mysql:host=$host;dbname=$db;charset=UTF8";

try {
    
    $dbh = new PDO($dsn, $username, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
} 

catch (\PDOException $e) {
    echo $e->getMessage();
}

?>
