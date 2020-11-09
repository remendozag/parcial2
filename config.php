
<?php

$dbHost = 'rdsindentirmysql.crqhpy7ee5r1.sa-east-1.rds.amazonaws.com';
$dbName = 'upa2';
$dbUser = 'admin';
$dbPass = 'Sistemas2020';

try {
    $pdo = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(Exception $e) {
    echo $e->getMessage();
}

?>
