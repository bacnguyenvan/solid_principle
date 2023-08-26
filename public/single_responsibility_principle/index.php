<?php
/*
    - It states that a class should have A SINGLE RESPONSIBILITY.
    - A good practice to follow is to list the responsibility of the class in the comment doc-block.
    - This way you can remind yourself and others the purpose of this class and try to keep the responsibility minimal.
*/

class EmptyGarden
{
    protected $width;
    protected $height;

    public function __construct($width, $height)
    {
        $this->width = $width;
        $this->height = $height;
    }

    public function items()
    {
        $numberOfSpots = ceil($this->width * $this->height);

        return array_fill(0, $numberOfSpots, 'handful of dirt');
    }
}
