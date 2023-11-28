<?php
include('db_connect.php');

if (!empty($_POST)){
    $name = $_POST['name_p'];
    $price = $_POST['price_p'];
    $count = $_POST['count_p'];
    $user_id = $_POST['add_product_user_id'];
    if (!($name=="" or $price=="" or $count=="")){
        $res = mysqli_query($des, "SELECT * FROM Products WHERE name='$name' and price = '$price' and count='$count'");
        if (!(mysqli_fetch_array($res))){
            $sql = "INSERT INTO Products (name, price, count, user_id) values ('$name', $price, $count, $user_id);";
            $result = mysqli_query($des, $sql);
            print(mysqli_error($des));
            include "MySqlPrac.php";
        }else{
            echo "Данные уже добавлены";
        }
    }
    else{
        echo "Заполнены не все поля!";
    }



}
