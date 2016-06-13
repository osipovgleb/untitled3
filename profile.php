<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 09.06.16
 * Time: 18:26
 */
include("classes/html.php");
include("classes/user.php");
require_once("classes/helpers.php");
require_once("classes/menu.php");

if (!$user->is_auth())
    header("Location: index.php");

if (!($id = get_or_post("id")))
    $res = $db->one_u($user->get_id());
elseif ((!$user->is_admin()) && ($id != $user->get_id())){
        echo "Sorry, it isn't you id, you can't do this, your id is ". $user->get_id() . ".";
        $res = $db->one_u($user->get_id());
}
else
    $res = $db->one_u($id);

if (get_or_post("act") == "refactor")
{
    $profile = array(
        "id" => $res['id'],
        "login" => get_or_post("login", $res['login']),
        "password" => get_or_post("password"),
        "name" => get_or_post("name", $res['name']),
        "email" => get_or_post("email", $res['email']));
    if ($user->update_profile($profile))
        header("Location: profile.php");
}
HTML::header("profile");

if (get_or_post("view") == "edit"){
    HTML::template("edit", $res);
}
else{
    HTML::template("profile", $res);
}

HTML::footer();
HTML::flush();

Session::store_session();
?>