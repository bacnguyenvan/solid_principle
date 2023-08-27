<?php
/*
    - LSP states that objects of a superclass should be replaceable with objects of its subclass without break the application
*/

class Shape 
{
    protected $area;

    public function calculateArea()
    {

    }

    public function getArea()
    {
        return $this->area;
    }
}

class Rectangle extends Shape
{
    private $width;
    private $height;

    public function setDimension($width, $height)
    {
        $this->width = $width;
        $this->height = $height;

        $this->calculateArea($width, $height);
    }

    public function calculateArea()
    {
        $this->area = $this->width * $this->height;
    }
}

function printArea(Shape $shape)
{
    echo "Area: " . $shape->getArea();
}

$rectangle = new Rectangle();
$rectangle->setDimension(10, 10);
printArea($rectangle);