<?php

class Fruit
{
    // Properties
    public $name;
    public $color;

    // Constructor
    public function __construct($name)
    {
        $this->name = $name;
    }

    // Methods
    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }
}

$apple = new Fruit("Apple");
echo $apple->getName();