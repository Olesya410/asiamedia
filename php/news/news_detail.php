<?
$newsItem = null;
$fullDescription = '';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $stmt = $db->prepare("SELECT * FROM `news` WHERE `id` = ?");
    $stmt->execute([$id]);
    $newsItem = $stmt->fetch(PDO::FETCH_ASSOC);

    $stmtDesc = $db->prepare("SELECT `description` FROM `news_full` WHERE `news_id` = ?");
    $stmtDesc->execute([$id]);
    $fullDescription = $stmtDesc->fetchColumn();

    if (!$newsItem) {
        $errorMessage = "Новость не найдена.";
    }
} else {
    $errorMessage = "Некорректный запрос.";
}

if (isset($errorMessage)){ ?>
    <div class="content" style="padding:20px;">
        <p><?= htmlspecialchars($errorMessage) ?></p>
    </div>
<? }
