<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 15.06.16
 * Time: 17:46
 */

$error = $args;//errolr number(-1, not UNIQUE ;-2, password is null
if ($error == -1)
    echo "<p>Пользователь с таким логином уже существует.</p>";
elseif ($error == -2)
    echo "<p>Пароль не может быть пустым.</p>";
?>
<p>Попробовать <a href = "sign_up.php">зарегестрироватьтся</a> еще раз.</p>
