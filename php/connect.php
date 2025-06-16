<?php
$base = 'asiamedia';
$user = "root";
$pass = 'root';

$dbname = 'dbname=' . $base . ';';
$host = 'host=localhost';
$mdh = 'mysql:' . $dbname . $host;

$opt = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => true,
    PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => true,
];

$db = null;
try {
    $db = new PDO($mdh, $user, $pass, $opt);
} catch (Exception $exception) {
    die($exception->getMessage());
}
?>