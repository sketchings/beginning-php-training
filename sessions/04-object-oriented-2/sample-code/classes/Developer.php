<?php
declare(strict_types=1);
class Developer extends User
{
    public $skills = array();  // additional property
    public $title = "M."; //more open not less
    protected $acceptedTitles = ["Mr.", "Ms.", "Mrs.", "Mx.", "M.", "Miss"];
    public $level = [
        " Unicorn ",
        " Rock Star ",
        " Real(tm) ",
        " 10X "
    ];

    public function setTitle($title) { // reqired from interface
        $formatedTitle = trim(ucwords(strtolower($title)),".") . ".";
        if (in_array($formatedTitle, $this->acceptedTitles)) {
            $this->title = $formatedTitle;
        }
    }
    public function getTitle(): string { // reqired from interface
        return $this->title;
    }
    public function getSkillsString(): string {  // additional required from parent
        return implode(", ",$this->skills);
    }
    /*
    public function getSalutation(): string {  // overriding method
        return $this->name . ", Developer";
    }*/
    public function getSalutation() : string {  // extending method
        //return parent::getSalutation() . ", " //wont work when parent private
        return parent::__toString() . ", "
        . array_rand(array_flip($this->level))
        . __CLASS__;
    }
}