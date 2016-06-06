<?php
define("TYPE_TEMPLATE", 1);

class HTML{
    static $sitename = "MySite";
    static $templates = [];
    static $templates_dir = "templates/";

    static public function header($title = ""){
        if($title == "")
            $title = HTML::$sitename;
        else
            $title = HTML::$sitename."-".$title;
        HTML::$templates = array("header", array($title));
    }

    static public function footer(){
        HTML::$templates = array("footer");
    }

    static public function template($name, $args = array()){
       HTML::$templates = array($name, $args, TYPE_TEMPLATE);
    }

    static public function flush(){
        foreach (HTML::$templates as $t){
          list($name, $args, $type) = $t;
            include(HTML::$templates_dir.$name.".php");
        }
      //  HTML::$templates = array(&name, $args(), TYPE_TEMPLATE);
    }
}
?>

