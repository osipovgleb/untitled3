<?php
/**
 * Created by PhpStorm.
 * User: Osipov Gleb
 * Date: 06.06.16
 * Time: 14:15*/

?>

<h1>Вход</h1>
<p>Введите логин и пароль</p>
<form action='' method='post'>
    <p><input type="text" name="login"></p>
    <p><input type="password" name="password"></p>
    <p><input type="submit" value="Проверить"></p>
</form>
<p>Или <a href="sign_up.php">зарегестрируйтесь</a></p>

<?php
global $user;
//echo $user->is_auth()."a";
if (!$user->is_auth())
  echo "<p> Не существует такого пользователя войдите или,<a href=\"sign_up.php\">зарегестрируйтесь</a>.</p>"; 
else
  echo "<p>Перейти к <a href=\"index.php\">таблице</a>.</p>";
?>




