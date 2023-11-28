<?
include ('db_connect.php'); //подключаемся к БД
include ('global_module.php'); //подключается файл с глобальными функциями


if($_GET['action'] == "out") out(); //если передана переменная action, «разавторизируем» пользователя

if (login()) //вызываем функцию login, которая определяет, авторизирован пользователь или нет

{
    $UID = $_SESSION['id']; //если пользователь авторизирован, присваиваем переменной $UID его id
    $admin = is_admin($UID); //определяем, админ ли пользователь

}
else //если пользователь не авторизирован, проверяем, была ли нажата кнопка входа на сайт
{
    if(isset($_POST['log_in']))
    {
        $error = enter(); //функция входа на сайт

        if (count($error) == 0) //если ошибки отсутствуют, авторизируем пользователя
        {
            $UID = $_SESSION['id'];

            $admin = is_admin($UID);
        }
    }
}
include ('index.php'); //подключается файл с формой

?>

<?
If($UID) //если переменной нет, выводим форму
{?>
    <form action="/" method="post">

        Логин: <input type="text" name="login" />
        Пароль: <input type="password" name="password" />

        <input type="submit" value="Войти" name="log_in" />
    </form>
<?}
?>