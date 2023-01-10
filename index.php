<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

function debug($str)
{
    echo '<pre>';
    var_dump($str);
    echo '</pre>';
    exit;
}

trait RandomTrait
{
    public function random(array $arr)
    {
        $resultElem = array_rand($arr);
        return $resultElem;
    }
}

class TeamLeadT70
{
    use RandomTrait;
    public $mood;

    public function __construct()
    {
        $this->mood = $this->getMood();
    }

    public function getMood()
    {
        $arr = require 'config/mood.php';
        $valRand = $this->random($arr);
        return array_filter($arr, function ($v, $k) use ($arr, $valRand) {
            return $k == $valRand;
        }, ARRAY_FILTER_USE_BOTH);
    }
    public function arrayProcessing($arr)
    {
        foreach ($arr as $val) {
            $arr = $val;
        }
        return $arr;
    }
    public function getMoodProperty($arg)
    {
        $moodProperty = $this->arrayProcessing($this->getMood());
        return $moodProperty[$arg];
    }
    public function changeMoonToWork()
    {

    }
}

class Junior
{
    use RandomTrait;
    public $workQuality;

    public function __construct()
    {
        $arr = require 'config/workQuality.php';
        $this->workQuality = $this->random($arr);
    }
}
class Working
{
    protected $teamLead;
    protected $junior;

    public function __construct()
    {
        $this->teamLead = new TeamLeadT70();
        $this->junior = new Junior();
    }
    public function start()
    {
        debug($this->teamLead);
        
        echo <<<EOT
         

        EOT;
    }
}

$workday = new Working();
$workday->start();
