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

$login = get_or_post("login");
$password = get_or_post("password");
$user->authorize($login, $password);

/*print($login . ".l<br>");
print($password . ".p<br>");
print($user->is_auth() . ".a<br>");*/

HTML::header("sign_in");
HTML::template("sign_in", $user->is_auth());
HTML::footer();
HTML::flush();

Session::store_session();
?>

