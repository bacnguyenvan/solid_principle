<?php
include_once('../single_responsibility_principle/index.php');

class MarijuanaGarden extends EmptyGarden
{
    public function items()
    {
        return array_fill(0, $this->width * $this->height, 'weed');
    }
}