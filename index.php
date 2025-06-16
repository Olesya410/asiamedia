<?
include("{$_SERVER['DOCUMENT_ROOT']}/php/core.php");
include("{$template_path}/{$header_name}");
include("{$php_script_path}/card/random.php");
include("{$php_script_path}/card/card_filter.php");
include("{$php_script_path}/news/news_filter.php");
?>

        <div class="banner"></div>
        <div class="random" id="random" onclick="location.href='/page/card.php?id=<?= $random['id']?>'">
                <div class="random-content" >
                    <p>Может быть вам помочь подобрать рандомный сериал?</p>
                </div>
            </div>
        <div class="content">
            <div class="recommendation">
                <div class="rec-title">
                    <h1>Рекомендации</h1>
                </div>
                <div class="rec-content">
                        <div class="slider">
                            <div class="slider-content">
                                <? foreach($cards as $card){?>
                                <div class="rec-card" >
                                    <img src="/<?=$card['img']?>" alt="<?=$card['name']?>">
                                    <button type="submit" class="rec-button"onclick="location.href='/page/card.php?id=<?= $card['id']?>'">Подробнее</button>
                                </div>
                                <?}?>
                            </div>
                        </div>
                        <button class="prev" type="submit"><img src="image/icons/left_icon-icons.com_61213.png"></button>
                        <button class="next" type="submit"><img src="image/icons/right_icon-icons.com_61212.png"></button>
                </div>
            </div>
            <div class="news-index">
                <div class="news-title">
                    <h1>Новости аниме</h1>
                </div>
                <a href="/page/news.php" class="news-index-more-link"><h2>Смотреть больше</h2></a>
                <div class="news-index-container">
                    <? foreach ($news_index as $news){?>
                    <div class="news-index-card" onclick="location.href='/page/news_full.php?id=<?= $news['id']?>'">
                        <img src="/<?=$news['img']?>" alt="Описание изображения" class="news-index-image">
                        <p class="news-index-title"><?=$news['name']?></p>
                        <p class="news-index-date"><?=$news['date']?></p>
                    </div>
                    <?}?>
                </div>
            </div>
            <div class="news-index">
                <div class="news-title">
                    <h1>Новости дорам и сериалов</h1>
                </div>
                <a href="/page/news.php" class="news-index-more-link"><h2>Смотреть больше</h2></a>
                <div class="news-index-container">
                    <? foreach ($news_index as $news){?>
                    <div class="news-index-card" onclick="location.href='/page/news_full.php?id=<?= $news['id']?>'">
                        <img src="/<?=$news['img']?>" alt="Описание изображения" class="news-index-image">
                        <p class="news-index-title"><?=$news['name']?></p>
                        <p class="news-index-date"><?=$news['date']?></p>
                    </div>
                    <?}?>
                </div>
            </div>
        </div>
<script src="/js/script.js"></script>
<?
include("{$template_path}/{$footer_name}");   
?>