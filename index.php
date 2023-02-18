<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

function debug($str)
{
    echo '<pre>';
    var_dump($str);
    echo '</pre>';
}
spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});
$junior = new Junior();
$junior->dayWork();

$t70 = new T70();
$t70->startMood();
$t70->changeMood($junior->work);
echo $t70->sayMood() . "<br>";

$mt1001 = new ManagerT1001('quantityPraises');
$hrt1000 = new HrT1000('quantityReprimands');
echo "Дані отримав менеджер 1001:" . $mt1001->getData($t70) . "<br>";
echo  "Дані отримав HR 1000:" . $hrt1000->getData($t70) . "<br>";
