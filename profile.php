<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 09.06.16
 * Time: 18:26
 */
include("classes/html.php");
include("classes/user.php");
require_once("classes/db.php");
require_once("classes/menu.php");


HTML::header("profile");
HTML::template("profile");
HTML::footer();
HTML::flush();

Session::store_session();
?>
