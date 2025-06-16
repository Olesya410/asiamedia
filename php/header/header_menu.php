<?php 
$query = "SELECT * FROM `menu`";
$dbResult = $db->query($query);
$menu = $dbResult->fetchAll();
$dbResult->closeCursor();
?>
