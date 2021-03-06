<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 09.06.16
 * Time: 18:26
 */
include("classes/init.php");

if (!$user->is_auth())
    header("Location: index.php");

if (!($id = get_or_post("id")))
    $res = $db->one_u($user->get_id());
elseif (!$user->has_rights("users_upd") && ($id != $user->get_id())){
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
        "password"=> get_or_post("password", null),
        "name" => get_or_post("name", $res['name']),
        "email" => get_or_post("email", $res['email']),
        "role_id" => get_or_post("role_id", $res['role_id']));
   // var_dump($profile);
    if($profile['password'] == "")
      $profile['password'] = NULL;
    if ($user->update_profile($profile)){
        $r = "Location: profile.php?id=" . $res['id'];
        header($r);
    }
}

if (get_or_post("view") == "edit"){
    HTML::header("edit_profile");
    HTML::template("edit", $res);
}
else{
    HTML::header("profile");
    HTML::template("profile", $res);
}



HTML::footer();
HTML::flush();

Session::store_session();
?>