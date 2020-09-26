<?php


namespace App;


class Example
{
    protected $dep = null;
    protected $count = 0;
    public function __construct(Dep $dep, $count)
    {
        $this->dep = $dep;
        $this->count = $count;
    }

}
