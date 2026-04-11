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