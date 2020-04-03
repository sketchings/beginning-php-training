<?php
class User {
    public $name;
    public $title = "Mx.";
    public $acceptedTitles = ["Mr.", "Ms.", "Mrs.", "Mx."];
    public static $encouragements = [ "You are beautiful!",  "You have this!"];

    public static function encourage() {
        $int = array_rand(self::$encouragements, 1);
        return self::$encouragements[$int];
    } 

    public function getSalutation() {
        return "Hello " . $this->title . " " . $this->name;
    }
    public function setName($name) {
        $this->name = ucwords(strtolower($name));
    }
    public function setTitle($title) {
        $formatedTitle = trim(ucwords(strtolower($title)),".") . ".";
        if (in_array($formatedTitle, $this->acceptedTitles)) {
            $this->title = $formatedTitle;
        }
    }
    public function __construct($name, $title = '') {
        $this->setName($name);
        $this->setTitle($title);
    }
    public function __toString() {
        return $this->getSalutation() . ", " . __CLASS__ 
        . ". " . self::encourage();
    }
}
 