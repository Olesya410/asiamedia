<?
$country_filter = isset($_GET['country']) ? $_GET['country'] : null;
$age_filter = isset($_GET['age']) ? $_GET['age'] : null;
$status_filter = isset($_GET['status']) ? $_GET['status'] : null;
$search_filter = isset($_GET['search']) ? $_GET['search'] : null;
$sort_filter = isset($_GET['sort']) ? $_GET['sort'] : null;
$genre_filter = isset($_GET['genre']) ? $_GET['genre'] : null;
$hundred_filter = isset($_GET['rating']) ? $_GET['rating'] : null;
// initialization
$sql_catalog_select = "SELECT * FROM `catalog` WHERE 1";

// first preparation
$sql_catalog_prepare = $db->prepare($sql_catalog_select);

// first execution to get all elements
$sql_catalog_prepare->execute();
$sql_catalog_arr = $sql_catalog_prepare->fetchAll();



if ($country_filter !== null) {
    $sql_catalog_select .= " AND `country` = :country";
}
if ($age_filter !== null) {
    $sql_catalog_select .= " AND `age` = :age";
}
if ($status_filter !== null) {
    $sql_catalog_select .= " AND `status` = :status";
}
if ($search_filter !== null) {
    $sql_catalog_select .= " AND `name` LIKE :search";
}
if ($genre_filter !== null) {
    $sql_catalog_select .= " AND `genre` LIKE :genre";
}

switch ($hundred_filter){
    case 'rating':
        $sql_catalog_select .= " ORDER BY `rating` DESC LIMIT 100"; 
}
switch ($sort_filter) {
    case 'name':
        $sql_catalog_select .= " ORDER BY `name` ASC";
        break;
    case 'date':
        $sql_catalog_select .= " ORDER BY `date` DESC"; 
        break;
    case 'rating':
        $sql_catalog_select .= " ORDER BY `rating` DESC"; 
        break;
    default:
        break;
}

$sql_catalog_prepare = $db->prepare($sql_catalog_select);

if ($country_filter !== null) {
    $sql_catalog_prepare->bindParam(":country", $country_filter);
}
if ($age_filter !== null) {
    $sql_catalog_prepare->bindParam(":age", $age_filter);
}
if ($status_filter !== null) {
    $sql_catalog_prepare->bindParam(":status", $status_filter);
}
if ($search_filter !== null) {
    $search_filter = "%{$search_filter}%";
    $sql_catalog_prepare->bindParam(":search", $search_filter);
}
if ($genre_filter !== null) {
    $genre_filter = "%{$genre_filter}%";
    $sql_catalog_prepare->bindParam(":genre", $genre_filter);
}

// second execution
$sql_catalog_prepare->execute();
$sql_catalog_arr = $sql_catalog_prepare->fetchAll();
$sql_catalog_prepare->closeCursor();
