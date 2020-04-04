<?php
/*
 * read xml data for PHP podcasts
 * write a new xml file for a podcast
 */
$title = 'Podcast Recomendations';
require 'inc/header.php';

/*echo '<pre>';
echo htmlspecialchars(
    file_get_contents('data/xml/educate_yourself.xml')
);
echo '</pre>';*/

$files = array();
$files[]= 'http://simplecast.com/podcasts/279/rss';
$dir = 'data/xml';
if ($fh = opendir($dir)) {
    while (($entry = readdir($fh)) !== false) {
        if (substr($entry, 0, 1) != '.') {
            $files[] = $dir . '/' . $entry;
        }
    }
    closedir($fh);
}

if (!empty($files)) {
    foreach ($files as $file) {
        $xml = simplexml_load_file($file);

        echo '<div class="panel panel-default">';
        
        echo '<div class="panel-heading">';
        echo '<h3 class="panel-title"><a href="' . $xml->channel->link .'" target="_blank">' . $xml->channel->title .'</a></h3>';
        echo '</div>';
    
        echo '<div class="panel-body">';
        echo '<p>' . $xml->channel->description .'</p>';
        $random = rand(0, count($xml->channel->item)-1);
        echo '<p><strong>Sample: ' . $xml->channel->item[$random]->title .'</strong> - ';
        echo $xml->channel->item[$random]->description .'</p>';
        echo '<audio controls>';
        echo '<source src="' . $xml->channel->item[$random]->enclosure->attributes()->url .'" type="audio/mpeg">';
        echo 'Your browser does not support the audio element.';
        echo '</audio>';
        echo '<p><a href="' . $xml->channel->link .'" target="_blank">Lean more and subscribe</a></p>';
        echo '</div>';
        
        echo '</div>';
    }
}

require 'inc/footer.php';