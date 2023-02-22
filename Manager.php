<?php
abstract class Manager
{
    function getNewData($nameRaport, $valueRaport)
    {
        $this->$nameRaport = $valueRaport;
    }
}
