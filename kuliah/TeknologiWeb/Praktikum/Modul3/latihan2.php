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
}

$apple = new Fruit();
$banana = new Fruit();

$apple->setName("Apple");
$banana->setName("Banana");

echo $apple->getName();
echo "<br>";
echo $banana->getName();