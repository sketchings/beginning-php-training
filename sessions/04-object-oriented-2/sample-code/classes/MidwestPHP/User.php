<?php
declare(strict_types=1);
namespace MidwestPHP;
class User implements \UserInterface {
    protected $name;
    protected $title = "Mx.";
    private $acceptedTitles = ["Mr.", "Ms.", "Mrs.", "Mx."];

    public function greet(): string {
        return "Hello " . __CLASS__ . " "
        . $this->title . " " . $this->name;
    }
    public function setName(string $name){
        $this->name = '';
        $words = explode(' ', $name);
        foreach ($words as $word) {
            $this->name .= strtoupper(substr($word, 0, 1));
        }
    }
    public function getName(): string { //method
        return $this->name;
    }

    public function setTitle($title) {
        $formatedTitle = trim(ucwords(strtolower($title)),".") . ".";
        if (in_array($formatedTitle, $this->acceptedTitles)) {
            $this->title = $formatedTitle;
        }
    }
    public function getTitle(): string { //method
        return $this->title;
    }
}
 