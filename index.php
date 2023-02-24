<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

function debug($str)
{
    echo '<pre>';
    var_dump($str);
    echo '</pre><hr>';
}
spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});
$junior = new Junior();
$junior->dayWork();

$mt1001 = new ManagerT1001();
$hrt1000 = new HrT1000();

$t70 = new T70();
$t70->startMood();
$t70->changeMood($junior->work);
echo $t70->sayMood() . "<br>";

if ($t70->wasPraise()) {
    $mt1001->getNewPraise();
}
if ($t70->wasRebuke()) {
    $hrt1000->getNewRebuke();
}


echo "Дані отримав менеджер 1001:" . $mt1001->quantityPraises . "<br>";
echo  "Дані отримав HR 1000:" . $hrt1000->quantityReprimands  . "<br>";
