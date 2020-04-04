<?php

$file = '../data/xml/' . filter_input(INPUT_POST, 'file', FILTER_SANITIZE_STRING);
if ($xml = simplexml_load_file($file)) {
    $item = $xml->channel->addChild('item');
    $item->addChild('title', filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING));
    $item->addChild('link', filter_input(INPUT_POST, 'link', FILTER_SANITIZE_URL));
    $date = new DateTime(filter_input(INPUT_POST, 'pubDate', FILTER_SANITIZE_STRING));
    $item->addChild('pubDate', $date->format('D, d M Y H:i:s +0000'));
    $item->addChild('description', filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING));
    
    $itunes = "http://www.itunes.com/dtds/podcast-1.0.dtd";
    $item->addChild('subtitle', filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING), $itunes);
    $item->addChild('summary', filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING), $itunes);
    $item->addChild('explicit', filter_input(INPUT_POST, 'explicit', FILTER_SANITIZE_STRING), $itunes);
    $item->addChild('duration', filter_input(INPUT_POST, 'duration', FILTER_SANITIZE_STRING), $itunes);
    
    /*echo '<pre>';
    echo htmlspecialchars(str_replace('><', ">\n<", $xml->asXML()));
    echo '</pre>';*/
    $xml->asXML($file);
    header('location: /podcasts.php');
}