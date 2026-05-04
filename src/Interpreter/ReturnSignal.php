<?php

class ReturnSignal extends Exception
{
    public $value;

    public function __construct($value = null)
    {
        parent::__construct();
        $this->value = $value;
    }
}