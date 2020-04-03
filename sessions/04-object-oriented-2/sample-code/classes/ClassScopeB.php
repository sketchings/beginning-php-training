<?php
class ClassScopeB extends ClassScopeA {
    const CLASS_CONSTANT = 'classB constant';
    public $myvar = 1000;
    public static $staticvar = 2000;
    private $privatevar = 3000;
    final public function displayProperties()
    {
        parent::displayProperties();
    }
}