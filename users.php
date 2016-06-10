<?php
/**
 * Created by PhpStorm.
 * User: Osipov Gleb
 * Date: 09.06.16
 * Time: 21:22
 */

include("classes/html.php");
include("classes/user.php");
require_once("classes/db.php");
require_once("classes/menu.php");

HTML::header("all_users");
HTML::template("users", $db->all_u());
HTML::footer();
HTML::flush();

Session::store_session();
?>