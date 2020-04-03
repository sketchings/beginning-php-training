<?php
declare(strict_types=1);
abstract class User implements UserInterface, WeightInterface { //class
    protected $name; //property
    protected $title = "Mx.";
    private $acceptedTitles = ["Mr.", "Ms.", "Mrs.", "Mx."];
    public static $encouragements = [
        "You are beautiful!",  
        "You have this!", 
        "Stop touching your face!"
    ];
    protected $weight;

    public static function encourage() {
        $int = array_rand(self::$encouragements,1);
        return self::$encouragements[$int];
    } 

    private function getSalutation(): string {
        return "Hello " . $this->title . " " . $this->name;
    }
    public function setName($name) {
        $this->name = ucwords(strtolower($name));
    }
    public function getName(): string { //method
        return $this->name;
    }

    public function setWeight(float $amount) {
        $this->weight = $amount;
    }
    public function getWeight(): float {
        return $this->weight;
    }
    public function __construct(string $name, string $title = '') {
        $this->setName($name);
        $this->setTitle($title);
    }
    public function __toString() : string {
        return $this->getSalutation() . " " . __CLASS__ 
        . ". " . self::encourage();
    }
    abstract public function getSkillsString(): string;
}
 