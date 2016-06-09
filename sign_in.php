<?php
/**
 * Created by PhpStorm.
 * User: Osipov Gleb
 * Date: 06.06.16
 * Time: 15:09
 */ 
include("classes/html.php");
include("classes/user.php");
include("classes/helpers.php");
require_once("classes/menu.php");

$login = get_or_post("login");
$password = get_or_post("password");
$function = get_or_post("function");
$user->authorize($login, $password);

if ($function == "logout") {
    if (!$user->is_auth())
        header("Location: index.php");
    else{
        $user->fill_unauth();
        $user->set_session();
        header("Location: sign_in.php");
    }
}

HTML::header("sign_in");
HTML::template("sign_in");
HTML::footer();
HTML::flush();
Session::store_session();
?>

