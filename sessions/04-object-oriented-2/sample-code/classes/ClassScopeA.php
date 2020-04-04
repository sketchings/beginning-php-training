<?php
class ClassScopeA extends AbstractScope {
    const CLASS_CONSTANT = 'class constant';
    public $myvar = 100;
    public static $staticvar = 200;
    private $privatevar = 300;
    public function displayProperties() {
        echo 'parent constant: ' . parent::CLASS_CONSTANT .'<br />';
        echo 'self constant: ' . self::CLASS_CONSTANT . '<br />';
        echo 'static constant: ' . static::CLASS_CONSTANT .'<br />';
        echo '$this->privatevar: ' . '(' . gettype($this->privatevar) . ') '
           . $this->privatevar . '<br />';
    }
}