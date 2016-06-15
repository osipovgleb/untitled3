<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 06.06.16
 * Time: 14:24
 */

class Session
{
    static $cookie_name = "SPR2016";
    static $session_dir = "sessions/";
    static $data = array();
    static $session_started = false;
    static $uid = "";
    static $auth = false;
        
    static public function start_session()
    {
        Session::$session_started = true;
        if (isset($_COOKIE[Session::$cookie_name]))
            Session::restore_session();
        else
        {
            Session::$uid = md5(microtime(true));
            setcookie(Session::$cookie_name, Session::$uid);
        }
    }
    
    static public function store_session()
    {
        if (!Session::$session_started)
            return;
        if (file_put_contents(Session::$session_dir.Session::$uid, serialize(Session::$data)) === false)
            die("Couldn't save session data.");
    }
    
    static private function restore_session()
    {
        Session::$uid = $_COOKIE[Session::$cookie_name];
        Session::$data = unserialize(file_get_contents(Session::$session_dir.Session::$uid));
	}

    static public function set($name, $value)
    {
        if (Session::$session_started === false)
            return;
        Session::$data[$name] = $value;
    }
    
    static public function get($name)
    {
        if (!isset(Session::$data[$name]))
            return null;
        return Session::$data[$name];
    }
}

Session::start_session();
?>