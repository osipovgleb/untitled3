<?php
/*05.06.2016 Osipov Gleb */
/*includes classes to type on screen*/
include("classes/html.php");
include("classes/session.php");
include("classes/helpers.php");
include("classes/user.php");
require_once("classes/db.php");

Session::start_session();
HTML::header("test1");

$login = get_or_post('login');
$password = get_or_post('password');
  
  HTML::template("index");
HTML::footer();
HTML::flush();


Session::store_session();
?>


