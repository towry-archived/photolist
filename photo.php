<?php

class Photo
{
    private $path;

    private $name;

    public function __construct( $path, $name = null )
    {
        $this->path = $path;
    }

    public function html( $alt = null )
    {
        $path = $this->path;
        $alt = $alt == null ? '' : $alt;

        return '<img src="' . $path . '" alt="' . $alt . '"" />';
    }

    public function getPath()
    {
        return $this->path;
    }
}
