<?php
/**
 * Created by PhpStorm.
 * User: Osipov Gleb
 * Date: 06.06.16
 * Time: 15:09
 */ 
include("classes/html.php");
include("classes/session.php");
//require_once("classes/menu.php");


HTML::header("sign_up");
HTML::template("sign_up");
HTML::footer();
HTML::flush();
?>
