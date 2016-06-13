<?php
/**
 * Created by PhpStorm.
 * User: Osipov Gleb
 * Date: 06.06.16
 * Time: 15:09
 */ 
include("classes/html.php");
include("classes/session.php");
require_once("classes/menu.php");
require_once("classes/user.php");
require_once("classes/helpers.php");

$login = get_or_post("login");
$password1 = get_or_post("password1");
$password2 = get_or_post("password2");

if ($user->is_auth()) {
    Session::store_session();
    header("Location: index.php");
    exit(0);
}

if (get_or_post("act") == "sign_up")
{
    if ($password1 == $password2) {
        $new_profile = array("login" => $login, "password" => $password2, "email" => get_or_post("email"),"name" => get_or_post("name"), "reg_date" => date('Y-m-d'));
        if ($user->create_profile($new_profile)){
            $user->authorize($login, $password2);
            Session::store_session();

            header("Location: index.php");
            exit(0);
        }
    }
    else
        echo "Пароли не совпадают";
}


HTML::header("sign_up");
HTML::template("sign_up");
HTML::footer();
HTML::flush();
Session::store_session();
?>
