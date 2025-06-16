<?
$cardId = isset($_GET['id']) ? (int)$_GET['id'] : 0;

$dbResult = $db->prepare("SELECT * FROM catalog WHERE id = :id ");
$dbResult->execute(['id' => $cardId]);
$card = $dbResult->fetch();

if ($card === null) {
    echo "Товар не найден";
    exit; 
}

?>
