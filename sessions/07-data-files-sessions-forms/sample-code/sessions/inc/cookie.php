<?php
session_start();

if (isset($_GET['save'])) {
    $name = urlencode($_SESSION['word'][2]) . time();
    setcookie($name, implode(':', $_SESSION['word']), strtotime('+30 days'), '/');
} elseif (isset($_GET['read'])) {
    $_SESSION['word'] = array_combine(range(1,5), explode(':', $_COOKIE[$_GET['read']]));
    header('location: /story.php');
    exit;
} elseif (isset($_GET['delete'])) {
    setcookie($_GET['delete'], '', time() - 3600, '/');
}
header('location: /index.php');
exit;