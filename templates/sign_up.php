<?php
/**
 * Created by PhpStorm.
 * User: Osipov Gleb
 * Date: 06.06.16
 * Time: 14:15*/

include("classes/helpers.php");
include("classes/session.php");
$login = get_or_post("login");
$password1 = get_or_post("password");
$password2 = get_or_post("password");
?>
<h1>Регестрация</h1>
<p>Введите логин и пароль</p>
<form action='' method='GET'>
    <p><input type="text" value="<?php echo $login; ?>" name="login"></p>
    <p><input type="text" value="<?php echo $password1; ?>" name="password"></p>
    <p><input type="text" value="<?php echo $password2; ?>" name="password"></p>
    <p><input type="submit" value="зарегестрироваться"></p>
</form>
<p>Вернуться к  <a href="sign_in.php">входу</a></p>


<?php
if (/*Session::$data[$login] == $password*/  $password1 == $password2)
    echo "<p><a href=\"index.php\">перейти к таблице</a>.</p>";
else
    echo "<p><a href=\"sign_up.php\">пароли различются, попробуйте еще раз</a>.</p>";
?>

