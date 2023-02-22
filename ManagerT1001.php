<?php
class ManagerT1001 extends Manager
{    
    public $quantityPraises = 0;
    function getNewPraise() {
        $this->quantityPraises++;
    }
}