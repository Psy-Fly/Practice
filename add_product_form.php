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
<h1>Добавить товар</h1>
<form action="obr_ins.php" method="POST">

    <table class="add_table">
        <tr>
            <td>Название</td>
            <td><input type="text" name="name_p"></td>
        </tr>
        <tr>
            <td>Цена</td>
            <td><input type="number" name="price_p"></td>
        </tr>
        <tr>
            <td>Кол-во</td>
            <td><input type="number" name="count_p"></td>
        </tr>
        <tr>
            <td><input type="submit" value="Добавить товар"></td>
        </tr>
    </table>
    <input type="hidden" name="add_product_user_id" value=4>
</form>
</body>
</html>