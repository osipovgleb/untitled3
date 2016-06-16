<?php
/**
 * Created by PhpStorm.
 * User: Osipov Gleb
 * Date: 06.06.16
 * Time: 15:09
 */
include("classes/init.php");
$login = get_or_post("login");
$password = get_or_post("password");
$function = get_or_post("function");
if ($function == "logout") {
    if (!$user->is_auth())
        header("Location: index.php");
    else{
        $user->fill_unauth();
        $user->set_session();
        header("Location: sign_in.php");
    }
}

if ($user->is_auth()) {
    Session::store_session();
    header("Location: index.php");
    exit(0);
}
elseif ( $user->authorize($login, $password) === true){/*$login !== null && $password !== null &&*/
    Session::store_session();
    header("Location: index.php");
    exit(0);
}

HTML::header("sign_in");
HTML::template("sign_in");
HTML::footer();
HTML::flush();
Session::store_session();
?>
