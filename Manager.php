<?php
abstract class Manager
{
    protected $reportType;
    function __construct($reportType){
        $this->reportType = $reportType;
    }
    public function getData(T70 $terminator){
        return $terminator->{$this->reportType};
    }
}
