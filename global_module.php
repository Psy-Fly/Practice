<?php
checkAuth('gogol', '321');

function checkAuth($login, $password){
    include('db_connect.php');

    $sql = "SELECT * FROM users WHERE login = '$login'";

    if($rez = mysqli_query($des, $sql)){
        foreach ($rez as $row){
            if ($row['password'] == $password){
                return true;
            }
        }
    }

}


?>