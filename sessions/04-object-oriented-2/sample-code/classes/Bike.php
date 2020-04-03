<?php
declare(strict_types=1);
class Bike implements WeightInterface
{
    private $weight;

    public function setWeight(float $amount) {
        $this->weight = $amount;
    }
    public function getWeight(): float
    {
        return $this->weight;
    }
    
}