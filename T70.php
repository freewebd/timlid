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
        debug("workJunior - " . $workJunior);
        $countMoods = count($this->moods) - 1;
        if ($workJunior === 1) {
            if ($keyIndex > 0) $keyIndex--;
        }
        if ($workJunior === 0) {
            if ($keyIndex < $countMoods) $keyIndex++;
        }
        $iterator = new ArrayIterator($this->moods);
        $iterator->seek($keyIndex);
        debug($this->currentMood = $iterator->current());
    }
    function sayMood()
    {
        return $this->currentMood['saySpeech'];
    }
}
