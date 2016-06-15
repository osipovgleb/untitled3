<?php
/*05.06.2016 Osipov Gleb */
/*includes classes to type on screen*/

include("classes/html.php");
include("classes/helpers.php");
include("classes/user.php");
require_once("classes/db.php");
require_once("classes/menu.php");

HTML::header("mainpage");
HTML::template("index");
HTML::footer();
HTML::flush();

Session::store_session();
?>


