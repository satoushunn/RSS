<?php

$feed = file_get_contents('https://sendai.keizai.biz/rss.xml');
$invalid_characters =  '/[^\x9\xa\x20-\xD7FF\xE000-\xFFFD]/';
$feed = preg_replace($invalid_characters,'',$feed);
$rss = simplexml_load_string($feed);

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>「仙台ニュース」</h1>
    <div id=nwes>
    <?php
    echo ('<br/>');
    echo ('ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー<br/>');
    foreach($rss->channel->item as $item){
    $title = $item->title;
    $date = date("Y年 n月 j日",strtotime($item->pubDate));
    $link = $item->link;
    echo ($date.'<br/>');
    echo ($title.'<br/>');
    echo ($link.'<br/>');
    echo ('ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー<br/>');
    }
    ?>
    </div>
</body>
</html>
