<?php
$des = mysqli_connect("localhost", "root", "", "kb14");
if ($des == false){
    print("Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error());
}
mysqli_set_charset($des, "utf8");
?>