<?php
session_start();
$word1 = htmlspecialchars($_SESSION['word'][1]);
$word2 = htmlspecialchars($_SESSION['word'][2]);
$word3 = htmlspecialchars($_SESSION['word'][3]);
$word4 = htmlspecialchars($_SESSION['word'][4]);
$word5 = htmlspecialchars($_SESSION['word'][5]);
$word6 = htmlspecialchars($_SESSION['word'][6]);

include 'inc/header.php';

echo '<h1>My Programming Story</h1>';

echo '<p>There once was a(n) ' . $word1;
echo ' programmer named ' . $word2; 
echo '. </p>';
echo '<p>This ' .  $word3; 
echo ' programmer used ' . $word4;
echo ' to learn to ' . $word5;
echo ' the ' . $word6 . '.</p>';

echo ' <a class="btn btn-default btn-lg" href="inc/cookie.php?save" role="button">Save Story</a>';
echo ' <a class="btn btn-default btn-lg" href="play.php" role="button">Play Again</a>';
echo ' <a class="btn btn-default btn-lg" href="index.php" role="button">Other Stories</a>';


include 'inc/footer.php';