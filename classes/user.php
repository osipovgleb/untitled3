<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 06.06.16
 * Time: 14:38
 */
class User
{
    static $authorized = false;

    static public function set_to_session()
    {
        Session::set("user", array('authorized' => User::$authorized));
    }

    function is_exists($login, $password){
        $str =  unserialize(file_get_contents(__DIR__."../logins.txt"));
        count();
        while();
        sscanf();
    }

  /*  static public function get_from_session()
    {
        $data = Session::get("user");
        list(User::$authorized) = $data;
    }

 /*   static public check_auth()
    {

    }*/
   /* static public function set_to_session()
    {
      Session::set("user", array('authorized' => User::$authorized));
    }*/
}
?>

