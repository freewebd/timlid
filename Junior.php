<?php
class Junior
{
    public $work;
    public $works = [
        "1" => "Делает успешно работу",
        "0" => "Косячит",
    ];
    function dayWork()
    {
        $this->work = array_rand($this->works);
    }
}
