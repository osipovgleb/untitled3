<?php
/*05.06.2016 Osipov Gleb */
/*includes classes to type on screen*/

include("classes/init.php");

HTML::header("mainpage");
HTML::template("index");
HTML::footer();
HTML::flush();

Session::store_session();
?>


