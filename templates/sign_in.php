<?php
/**
 * Created by PhpStorm.
 * User: Osipov Gleb
 * Date: 06.06.16
 * Time: 14:15*/

include("classes/helpers.php");
include("classes/session.php");
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
if (/*Session::$data[$login] == $password*/  $password == $login)
    echo "<p><a href=\"index.php\">перейти к таблице</a>.</p>";
else
    echo "<p><a href=\"sign_in.php\">не правильно, попробуйте еще раз</a>.</p>";
?>


