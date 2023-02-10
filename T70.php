<?php
class T70
{
    public $currentMood;
    public $moods = [
        "goodMood" => [
            "name" => "Хороший настрій",
            "saySpeech" => "Сьогодні найкращий день"
        ],
        "normalMood" => [
            "name" => "Нормальний настрій",
            "saySpeech" => "Почав, та не з того кінця і зробив дірку до бублика"
        ],
        "badMood" => [
            "name" => "Поганий настрій",
            "saySpeech" => "Настрій похмурий, хмарний можливі грози."
        ],
        "noMode" => [
            "name" => "Настрій не попади на очі",
            "saySpeech" => "Завжди знайдеться один, який зіпсує поганий настрій!"
        ]
    ];
    public $manager;

    function __construct($mt1001, $hrt1000)
    {
        $this->manager['managert1001'] = $mt1001;
        $this->manager['hrt1000'] = $hrt1000;
    }
    /**Рандомно вибрати один з елементів масиву. Вхідні дані $this->moods */
    function startMood()
    {
        $this->currentMood = array_rand($this->moods);
    }
    /**Визначити поточний настрій T70. В залежності від якості роботи Junior. 
     *  $work може приймати значення 1 || 0.
     */
    function changeMood($workJunior)
    {
        $keyIndex = 0;
        foreach ($this->moods as $key => $val) {
            if ($key === $this->currentMood) {
                break;
            } else {
                $keyIndex++;
            }
        }
        $countArrMoods = count($this->moods) - 1;
        if ($workJunior === 1) {
            $keyIndex > 0 ? $keyIndex-- : $this->manager['managert1001']->countQuantity();
        }
        if ($workJunior === 0) {
            $keyIndex < $countArrMoods ? $keyIndex++ : $this->manager['hrt1000']->countQuantity();
        }
        $iterator = new ArrayIterator($this->moods);
        $iterator->seek($keyIndex);
        $this->currentMood = $iterator->current();
    }
    function sayMood()
    {
        return $this->currentMood['saySpeech'];
    }
}
