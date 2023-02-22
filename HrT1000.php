<?php
class HrT1000 extends Manager
{
    public $quantityReprimands = 0;

    function getNewRebuke() {
        $this->quantityReprimands++;
    }
}