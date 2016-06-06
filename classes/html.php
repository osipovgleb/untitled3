/*05.06.2016 Osipov Gleb
 *classes to optimize the program
 *including of the blocks*/

<?php
define("TYPE_TEMPLATE", 1);

class HTML{
    /*string: name of the site*/
    static $sitename = "MySite";
    /*array: array that will be collect names of files to include*/
    static $templates = [];
    /*string: name of the directory that contains blocks*/
    static $templates_dir = "templates/";

    /*function: input name of the file with start block to array*/
    static public function header($title = ""){
        if($title == "")
            $title = HTML::$sitename;
        else
            $title = HTML::$sitename."-".$title;
        HTML::$templates = array("header", array($title));
    }

    /*function: input name of the file with end block to array*/
    static public function footer(){
        HTML::$templates = array("footer");
    }

    /*static public function template($name, $args = array()){
       HTML::$templates = array($name, $args, TYPE_TEMPLATE);
    }*/

    /*function: includes all files from array*/
    static public function flush(){
        foreach (HTML::$templates as $t){
          list($name, $args, $type) = $t;
            include(HTML::$templates_dir.$name.".php");
        }
      //  HTML::$templates = array(&name, $args(), TYPE_TEMPLATE);
    }
}
?>

