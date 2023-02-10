<?php
abstract class Report
{
    protected $quantity = 0;
    public function countQuantity(){
        $this->quantity++;
    }

    public function showReport(){
        return $this->quantity;
    }
}
