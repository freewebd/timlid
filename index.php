<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

function debug($str)
{
    echo '<pre>';
    var_dump($str);
    echo '</pre>';
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
    public $moods;

    public function __construct()
    {
        $this->moods = require 'config/mood.php';
        $this->mood = $this->getMood();
        $this->changeMoodToWork($this->moods, $this->mood);
    }

    public function getMood()
    {
        $arr = require 'config/mood.php';
        $valRand = $this->random($arr);
        return array_filter($arr, function ($v, $k) use ($arr, $valRand) {
            return $k == $valRand;
        }, ARRAY_FILTER_USE_BOTH);
    }
    protected function arrayProcessing($arr)
    {
        foreach ($arr as $val) {
            $arr = $val;
        }
        return $arr;
    }
    public function changeMoodToWork($moods, $currentMood)
    {
        $keyIndex = 0;
        $keyCurrentMood = array_key_first($currentMood);
                  // debug($keyCurrentMood);
        foreach ($moods as $key){
             debug($key);
            if ($key === $keyCurrentMood){
                break;     
            } else{
                $keyIndex++;
            }
        }
        //debug($keyIndex);
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

        //debug($this->teamLead);

        echo <<<EOT
         

        EOT;
    }
}

$workday = new Working();
$workday->start();
