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
    public $isPraise = false;
    public $isRebuke = false;

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
        $maxIndexMoods = count($this->moods) - 1;
        if ($workJunior === 1 && $keyIndex > 0)
            $keyIndex--;
        if ($workJunior === 0 && $keyIndex < $maxIndexMoods)
            $keyIndex++;
        $iterator = new ArrayIterator($this->moods);
        $iterator->seek($keyIndex);
        $this->currentMood = $iterator->current();

        if ($keyIndex === 0 && $workJunior === 1)
            $this->isPraise = true;
        if ($keyIndex === $maxIndexMoods && $workJunior === 0)
            $this->isRebuke = true;
    }
    function wasPraise()
    {
        if ($this->isPraise) {
            $this->isPraise = false;
            return true;
        }
    }
    function wasRebuke()
    {
        if ($this->isRebuke) {
            $this->isRebuke = false;
            return true;
        }
    }
    function sayMood()
    {
        return $this->currentMood['saySpeech'];
    }
}
