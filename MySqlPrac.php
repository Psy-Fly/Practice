<?php
include "db_connect.php";

$sql = 'SELECT * FROM Products';
if (isset($_GET['sort']) ){
    switch ($_GET['sort']){
        case "nameAsc":
            $sql = 'SELECT * FROM Products ORDER BY name';
            break;
        case "nameDesc":
            $sql = 'SELECT * FROM Products ORDER BY name DESC';
            break;
        case "priceDesc":
            $sql = 'SELECT * FROM Products ORDER BY price DESC';
            break;
        case "priceAsc":
            $sql = 'SELECT * FROM Products ORDER BY price';
            break;
        case "countAsc":
            $sql = 'SELECT * FROM Products ORDER BY count';
            break;
        case "countDesc":
            $sql = 'SELECT * FROM Products ORDER BY count Desc';
            break;
        default:
            $sql = 'SELECT * FROM Products';
            break;
    }
}
if (isset($sql))
    $result = mysqli_query($des, $sql);

$from = $_POST['from'];
$to = $_POST['to'];
if (!empty($_POST['from'])){
    $sql = "SELECT * FROM Products WHERE price >= $from";
}else if(!empty($_POST['to']))
{
    $sql = "SELECT * FROM Products WHERE price <= $to && price >= 0";
}
if(!empty($_POST['to']) && !empty($_POST['from'])){
    $sql = "SELECT * FROM Products WHERE price <= $to && price >= $from";
}

if (!empty($sql))
    $result = mysqli_query($des, $sql);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Products</title>
</head>
<body>
<div class="login_button"><a href="/add_product_form.php">Добавить</a></div>
<form action="obr_del.php" method="post">
<table>
<tr>
    <td>

    </td>
    <td>
        <span>Название</span>
        <form action=""></form>
        <form action="MySqlPrac.php" method="get">
            <?php
            if (isset($_GET['sort']) && $_GET['sort'] == "nameAsc"){
                echo '<input type="text" name="sort" value="nameDesc" style="display: none">';
                echo '<input name="test" class="sortButton" type="submit" value="(А-Я)">';
            }
            else{
                echo '<input type="text" name="sort" value="nameAsc" style="display: none">';
                echo '<input name="test" class="sortButton" type="submit" value="(Я-А)">';
            }
            ?>
        </form>
    </td>
    <td>
        Кол-во
        <form action="MySqlPrac.php" method="get">
            <?php
            if (isset($_GET['sort']) && $_GET['sort'] == "countAsc"){
                echo '<input type="text" name="sort" value="countDesc" style="display: none">';
                echo '<input name="test" class="sortButton" type="submit" value="⇑">';
            }
            else{
                echo '<input type="text" name="sort" value="countAsc" style="display: none">';
                echo '<input name="test" class="sortButton" type="submit" value="⇓">';
            }
            ?>
        </form>
    </td>
    <td>
        Цена
        <form action="MySqlPrac.php" method="get">
            <?php
            if (isset($_GET['sort']) && $_GET['sort'] == "priceDesc"){
                echo '<input type="text" name="sort" value="priceAsc" style="display: none">';
                echo '<input name="test" class="sortButton" type="submit" value="⇓">';
            }
            else{
                echo '<input type="text" name="sort" value="priceDesc" style="display: none">';
                echo '<input name="test" class="sortButton" type="submit" value="⇑">';
            }
            ?>
        </form>
    </td>
    <td></td>

</tr>

    <?php
    if (isset($result)){
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";

            echo "<td>";

            echo "<input type='checkbox' name='id_del[]' value='{$row["id"]}'>";

            echo "</td>";
            echo "<td>";
            echo $row['name'];
            echo "</td>";
            echo "<td>";
            echo $row['count'];
            echo "</td>";
            echo "<td>";
            echo $row['price'];
            echo "</td>";
            echo "<td>";
            echo '<form action="update_form.php" method="get">';
            echo "<input type='hidden' name='id_upd' value='{$row["id"]}'>";
            echo "<input type='submit' value='Изменить'>";
            echo '</form>';
            echo "</td>";
            echo "</tr>";
        }
    }
?>

</table>
    <input type="submit" value="Удалить строки"><br><br>
</form>

<form action="MySqlPrac.php" method="post">
    <span>От</span>
    <input type="text" name="from">
    <span>До</span>
    <input type="text" name="to">
    <input type="submit" value="Сортировать">
</form>
</body>
</html>
