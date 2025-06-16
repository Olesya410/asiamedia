<?
$query = "SELECT * FROM `news`";
$dbResult = $db->query($query);
$news = $dbResult->fetchAll(PDO::FETCH_ASSOC);
$dbResult->closeCursor();

$query = "SELECT * FROM `news` LIMIT 4";
$dbResult = $db->query($query);
$news_index = $dbResult->fetchAll(PDO::FETCH_ASSOC);
$dbResult->closeCursor();
?>