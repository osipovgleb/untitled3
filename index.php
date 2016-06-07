<?php
/*05.06.2016 Osipov Gleb */
/*includes classes to type on screen*/
include("classes/html.php");
include("classes/session.php");

Session::start_session();
Session::store_session();

HTML::header("test1");
HTML::template("index");
HTML::footer();
HTML::flush();

//Session::finish_session();
?>


