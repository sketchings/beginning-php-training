<?php
$container = $app->getContainer();

$container['view'] = new \Slim\Views\PhpRenderer("../src/View/");

$container['logger'] = function($c) {
    $logger = new \Monolog\Logger('my_logger');
    $file_handler = new \Monolog\Handler\StreamHandler("../logs/app.log");
    $logger->pushHandler($file_handler);
    return $logger;
};

$container['db'] = function ($c) {
    $db = $c['settings']['db'];
    switch ($db['dsn']) {
        case 'mysql':
            $pdo = new PDO("mysql:host=" . $db['host'] . ";dbname=" . $db['dbname'],
                $db['user'], $db['pass']);
            break;
        case 'sqlite':
            $pdo = new PDO('sqlite:' . $db['dbname']);
            break;
    }
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    return $pdo;
};