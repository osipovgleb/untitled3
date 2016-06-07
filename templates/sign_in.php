<?php
/**
 * Created by PhpStorm.
 * User: Osipov Gleb
 * Date: 06.06.16
 * Time: 14:15*/

include("classes/helpers.php");
include("classes/session.php");
include("classes/user.php");
$login = get_or_post("login");
$password = get_or_post("password");
?>
<h1>Вход</h1>
<p>Введите логин и пароль</p>
<form action='' method='GET'>
    <p><input type="text" value="<?php echo $login; ?>" name="login"></p>
    <p><input type="text" value="<?php echo $password; ?>" name="password"></p>
    <p><input type="submit" value="Проверить"></p>
</form>
<p>Или <a href="sign_up.php">зарегестрируйтесь</a></p>


<?php
$is_exist = User::is_exists($login, $password) ; 
if ($is_exist == 0)
    echo "<p> Не существует такого пользователя,<a href=\"sign_up.php\">зарегестрируйтесь</a>.</p>";
elseif ($is_exist == -1)
    echo "<p> Не правильный пароль, попробуйте <a href=\"sign_in.php\">еще раз</a>.</p>";
else {
//    set_to_session
    echo "<p>Перейти<a href=\"index.php\">к таблице</a>.</p>";
}
?>


