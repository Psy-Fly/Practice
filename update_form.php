<?php
include "db_connect.php";
$rez = $_GET['id_upd'];
$id = (int) $rez;

$query = mysqli_query($des, "SELECT * FROM Products WHERE id = '$id'");
$prod = mysqli_fetch_assoc($query);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .add_table{
            margin: 4% auto 0;
        }
        h1{
            text-align: center;
            margin-top: 4%;
        }
    </style>
</head>
<body>
<h1>Изменить товар</h1>
<form action="obr_upd.php" method="POST">

    <table class="add_table">
        <tr>
            <td>Id</td>
            <td><input type="text" name="id_p" readonly="readonly" value="<?=$id?>"></td>
        </tr>
        <tr>
            <td>Название</td>
            <td><input type="text" name="name_p" value="<?=$prod['name']?>"></td>
        </tr>
        <tr>
            <td>Цена</td>
            <td><input type="number" name="price_p" value="<?=$prod['price']?>"></td>
        </tr>
        <tr>
            <td>Кол-во</td>
            <td><input type="number" name="count_p" value="<?=$prod['count']?>"></td>
        </tr>
        <tr>
            <td><input type="submit" value="Изменить"></td>
        </tr>
    </table>
    <input type="hidden" name="add_product_user_id" value=4>
</form>
</body>
</html>