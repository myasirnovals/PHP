<?php

class Fruit
{
    // Properties
    public $name;
    public $color;

    // Methods
    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getColor()
    {
        return $this->color;
    }

    public function setColor($color)
    {
        $this->color = $color;
    }
}

$apple = new Fruit();
$banana = new Fruit();

$apple->setName("Apple");
$apple->setColor("Red");
$banana->setName("Banana");
$banana->setColor("Yellow");

echo $apple->getName() . " is " . $apple->getColor();
echo "<br>";
echo $banana->getName() . " is " . $banana->getColor();