<?php
/**
 * Created by PhpStorm.
 * User: Osipov Gleb
 * Date: 06.06.16
 * Time: 15:09
 */ 
include("classes/html.php");
include("classes/user.php");

$user->authorize($login, $password);
if (!$user->is_auth())
    echo "<p> Не существует такого пользователя или,<a href=\"sign_up.php\">зарегестрируйтесь</a>.</p>";
else
    echo "<p>Перейти к <a href=\"../index.php\">таблице</a>.</p>";

HTML::header("sign_in");
HTML::template("sign_in");
HTML::footer();
HTML::flush();

Session::store_session();

?>

