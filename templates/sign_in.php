<?php
/**
 * Created by PhpStorm.
 * User: Osipov Gleb
 * Date: 06.06.16
 * Time: 14:15*/
include("../classes/helpers.php");
require_once("../classes/user.php");
$login = get_or_post("login");
$password = get_or_post("password");
?>

<h1>Вход</h1>
<p>Введите логин и пароль</p>
<form action='' method='POST'>
    <p><input type="text" value="<?php echo $login; ?>" name="login"></p>
    <p><input type="password" value="<?php echo $password; ?>" name="password"></p>
    <p><input type="submit" value="Проверить"></p>
</form>
<p>Или <a href="sign_up.php">зарегестрируйтесь</a></p>





