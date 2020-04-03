<?php
declare(strict_types=1);
spl_autoload_register(function ($class) {
    $file = 'classes/' . str_replace('\\', '/', $class) . '.php';
    if (file_exists($file)) {
        require $file;
    }
});
echo "STATIC CALL ClassScopeA" . '<br />';
echo 'ClassScopeA $staticvar: '  . ClassScopeA::$staticvar. '<br />';

$classA = new ClassScopeA();
echo "FROM classA Object" . '<br />';
var_dump($classA);
$classA->displayProperties();

echo "FROM classB Object" . '<br />';
$classB = new ClassScopeB();
var_dump($classB);
$classB->displayProperties();