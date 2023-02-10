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

$mt1001 = new ManagerT1001();
$hrt1000 = new HrT1000();

$t70 = new T70($mt1001, $hrt1000);
$t70->startMood();
$t70->changeMood($junior->work);
echo $t70->sayMood(). "<br>";
echo "Звіт менеджера 1001:" . $mt1001->showReport(). "<br>";
echo  "Звіт HR 1000:" . $hrt1000->showReport(). "<br>";