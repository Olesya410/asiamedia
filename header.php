<?php
include("{$php_script_path}/header/header_menu.php");
include("{$php_script_path}/catalog/catalog_filter.php");
include("{$php_script_path}/catalog/catalog_select.php");

?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Азиамедия</title>
    <link rel="icon" type="image/png" href="/image/favicon/favicon.ico" />
    <link rel="stylesheet" href="/css/style.css?version=15" />
</head>
<body>
    <div class="wrapper">
        <header>
            <div class="header-content">
                <div class="header-left">
                    <div class="header-logo">
                        <a href="/index.php">
                            <img src="/image/logo.jpg" alt="Логотип" />
                        </a>
                    </div>
                    <div class="header-link">
                        <?php
                            foreach ($menu as $menu_elem) {
                                echo "<a href=\"/{$page_path}/{$menu_elem['link']}\">{$menu_elem['name']}</a> ";
                            }
                        ?>
                    </div>
                </div>
                <div class="header-right">
                    <form class="header-search" action="/page/catalog.php">
                        <input type="text" placeholder="Поиск" name="search" value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
                        <button class="header-search-button" type="submit"><img src="/image/icons/icons8-лупа-50.png" alt="Поиск" style="height:24px; background-color:white" /></button>
                    </form>
                    <div class="header-account">
                        <?php if (isset($_SESSION['users']) && !empty($_SESSION['users'])): ?>
                            <span><a href="/page/account/user.php"><?= htmlspecialchars($_SESSION['users']['name']) ?></a></span>
                        <?php else: ?>
                            <a href="/page/account.php">Войти</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </header>