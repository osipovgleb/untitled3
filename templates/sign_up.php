<?php
/**
 * Created by PhpStorm.
 * User: Osipov Gleb
 * Date: 06.06.16
 * Time: 14:15*/

//global $user;
//value="<?php echo $login; "value="<?php echo $password1; " value=" echo $password2; "
?>
<h1>Регестрация</h1>
<p>Введите логин и пароль</p>
<form method="post" action="sign_up.php">
    <input type="hidden" name="act" value="sign_up">
    <p><input type="text" placeholder="ваш логин" name="login"></p>
    <p><input type="text" placeholder="ваше имя" name="name"></p>
    <p><input type="text" placeholder="ваш email" name="email"></p>
    <p><input type="password" placeholder="пароль" name="password1"></p>
    <p><input type="password" placeholder="повторите пароль" name="password2" ></p>
    <p><input type="submit" value="зарегестрироваться"></p>
</form>

