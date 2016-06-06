<?php
/*05.06.2016 Osipov Gleb
 *classes to optimize the program
 *including of the blocks*/
define("TYPE_TEMPLATE", 0);
define('TYPE_META', 1);

class HTML{
    /*string: name of the site*/
    static $sitename = "MySite";
    /*array: array that will be collect names of files to include*/
    static $templates = [];
    /*string: name of the directory that contains blocks*/
    static $templates_dir = "templates/";
    /*array: for includes of css*/
    static $css = [];

    /*function: input name of the file with start block to array*/
    static public function header($title = ""){
        if($title == "")
            $title = HTML::$sitename;
        else
            $title = HTML::$sitename."-".$title;
        HTML::template("header", array($title));
    }

    /*function: input name of the file with end block to array*/
    static public function footer(){
        HTML::template("footer");
    }

    static public function template($name, $args = array())
    {
       if (file_exists(HTML::$templates_dir . $name . ".meta.php"))
            HTML::$templates[] = array($name . ".meta", array(), TYPE_META);
        HTML::$templates[] = array($name, $args, TYPE_TEMPLATE);
    }

    /*function: includes all files from array*/
    static public function flush()
    {
        foreach (HTML::$templates as $t) {
            list($name, $args, $type) = $t;
            if ($type != TYPE_META)
                continue;
            include(HTML::$templates_dir . $name . ".php");
        }
        foreach (HTML::$templates as $t) {
            list($name, $args, $type) = $t;
            if ($type == TYPE_META)
                continue;
            include(HTML::$templates_dir . $name . ".php");
        }
    }

}?>
