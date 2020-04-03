<?php
spl_autoload_register(function ($class) {
    $file = 'classes/' . $class . '.php';
    if (file_exists($file)) {
        require $file;
    }
});
 
echo User::encourage();
echo "<br />\n";
echo User::$encouragements[0];
echo "<br />\n";
$user = new User("rasmus lerdorf", "mr");
echo $user;