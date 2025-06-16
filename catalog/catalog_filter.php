<?php
$query = "SELECT * FROM `catalog_genre`";
$dbResult = $db->query($query);
$catalog_genre = $dbResult->fetchAll();
$dbResult->closeCursor();

$query = "SELECT * FROM `catalog_country`";
$dbResult = $db->query($query);
$catalog_country = $dbResult->fetchAll();
$dbResult->closeCursor();

$query = "SELECT * FROM `catalog_status`";
$dbResult = $db->query($query);
$catalog_status = $dbResult->fetchAll();
$dbResult->closeCursor();

$query = "SELECT * FROM `catalog_age`";
$dbResult = $db->query($query);
$catalog_age = $dbResult->fetchAll();
$dbResult->closeCursor();

$query = "SELECT * FROM `catalog_sort`";
$dbResult = $db->query($query);
$catalog_sort = $dbResult->fetchAll();
$dbResult->closeCursor();

?>