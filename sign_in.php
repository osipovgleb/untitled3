<?php
/**
 * Created by PhpStorm.
 * User: Osipov Gleb
 * Date: 06.06.16
 * Time: 15:09
 */ 
include("classes/html.php");
HTML::header("sign_in");
HTML::template("sign_in");
HTML::footer();
HTML::flush();
?>

