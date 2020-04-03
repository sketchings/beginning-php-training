<?php
class UserWithTypes {
    public $name;
    public $title = "Mx.";
    public $acceptedTitles = ["Mr.", "Ms.", "Mrs.", "Mx."];
    public static $encouragements = [ "You are beautiful!",  "You have this!"];

    public static function encourage(): string {
        $int = array_rand(self::$encouragements, 1);
        return self::$encouragements[$int];
    } 

    public function getSalutation(): string {
        return "Hello " . $this->title . " " . $this->name;
    }
    public function setName(string $name) {
        $this->name = ucwords(strtolower($name));
    }
    public function setTitle(?string $title) {
        $formatedTitle = trim(ucwords(strtolower($title)),".") . ".";
        if (in_array($formatedTitle, $this->acceptedTitles)) {
            $this->title = $formatedTitle;
        }
    }
    public function __construct(string $name, string $title = '') {
        $this->setName($name);
        $this->setTitle($title);
    }
    public function __toString(): string {
        return $this->getSalutation() . ", " . __CLASS__ 
        . ". " . self::encourage();
    }
}