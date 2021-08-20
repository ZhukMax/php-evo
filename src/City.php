<?php

class City
{
    /** @var string */
    public $title;

    /**
     * @param string $title
     */
    public function __construct($title)
    {
        $this->title = $title;
    }
}
