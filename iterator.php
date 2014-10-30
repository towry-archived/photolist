<?php

class PhotoIterator implements  Iterator
{
    protected $photolist;

    protected $current = 0;

    public function __construct( PhotoList $photolist )
    {
        $this->photolist = $photolist;
    }

    public function current()
    {
        return $this->photolist->getPhoto( $this->current );
    }

    public function next()
    {
        $this->current++;
    }

    public function key()
    {
        return $this->current;
    }

    public function valid()
    {
        return $this->current < $this->photolist->count();
    }

    public function rewind()
    {
        $this->current = 0;
    }
}
