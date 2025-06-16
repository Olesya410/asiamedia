<?php
if (session_start() === PHP_SESSION_NONE) {
    session_start();
}
ob_start();

error_reporting(E_ALL);
ini_set('display_errors', 'on');
mb_internal_encoding("UTF-8");

$template_path = "{$_SERVER['DOCUMENT_ROOT']}/template";
$page_path = "page";
$php_script_path = "{$_SERVER['DOCUMENT_ROOT']}/php";

$header_name = 'header.php';
$footer_name = 'footer.php';

$url_name = basename($_SERVER['REQUEST_URI']);
$url_name = preg_replace("#\.php#", '', $url_name);

include("{$php_script_path}/connect.php");

?>