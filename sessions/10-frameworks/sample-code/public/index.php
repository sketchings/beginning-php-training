<?php
require __DIR__ . '/../vendor/autoload.php';

require __DIR__ . '/../src/config.php';

$app = new \Slim\App(["settings" => $config]);

require __DIR__ . '/../src/dependencies.php';

require __DIR__ . '/../src/routes.php';

$app->run();
