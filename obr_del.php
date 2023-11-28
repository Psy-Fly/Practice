<?php
include('db_connect.php');

if (!empty($_POST)){
    $id_del = $_POST['id_del'];
    if ($id_del != null){
        $str = implode(',', $id_del);
        $res = mysqli_query($des, "DELETE FROM Products WHERE id IN  (".$str.")");
        print(mysqli_error($des));
        include "MySqlPrac.php";
    }
    else{
        echo "Ошибка удаления";
    }

}
?>