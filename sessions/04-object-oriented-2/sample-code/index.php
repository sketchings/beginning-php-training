<?php
declare(strict_types=1);
spl_autoload_register(function ($class) {
    $file = 'classes/' . str_replace('\\', '/', $class) . '.php';
    if (file_exists($file)) {
        require $file;
    }
});
 
echo User::encourage();
echo "<br />\n";
echo User::$encouragements[0];
echo "<br />\n";
$user = new Developer("rasmus lerdorf", "mr");
echo $user;
echo "<br />\n";
$developer = new Developer("rasmus lerdorf", "mr");
var_dump($developer);
echo $developer->getSalutation();
echo "<br />";
$developer->skills = array("JavasScript", "HTML", "CSS");
$developer->skills[] = "PHP";
echo $developer->getSkillsString();
echo "<br />";
use \MidwestPHP\User; // namespace referenced first
$stowe = new User();  // used from specified namespace

$stowe = new \MidwestPHP\User();  // full namespace path
$stowe->setName("mike stowe");
echo $stowe->greet();
echo "<br />";
if ($developer instanceof \User) {
    echo 'developer is a User<br />';
}
if (is_a($developer, 'UserInterface')) {
    echo 'developer is a UserInterface<br />';
}
if ($stowe instanceof \User) {
    echo 'stowe is a User<br />';
}
if (is_a($stowe, 'UserInterface')) {
    echo 'stowe is a UserInterface<br />';
}

/*if ($user instanceof WeightInterface) {
    if ($user->getWeight() > 100) {
        echo "";
    } else if ($user->getWeight() > 50) {

    } else {
        echo "";
    }
}*/