<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 06.06.16
 * Time: 14:38
 */
require_once("session.php");
require_once ("db.php");
class User {
    private $authenticated;
    private $profile;
    static $session_key = "user_info";
    
    function __construct(){
        $this->get_from_session();
    }
    
    function __destruct() {
        $this->set_session();
    }
    
    function get_from_session() {
        if (!Session::$session_started) {
            $this->fill_unauth();
            return false;
        }
        if (($sess_data = Session::get(User::$session_key)) === null) {
            $this->fill_unauth();
            return false;
        }
        $this->authenticated = $sess_data['authenticated'];
        $this->profile = $sess_data['profile'];
        return $this->authenticated;
    }
    
    function set_session() {
        Session::set(User::$session_key,
            array(
                'authenticated' => $this->authenticated,
                'profile' => $this->profile
            ));
    }
    
    function fill_unauth() {
        $this->authenticated = false;
        $this->profile = array();
    }
    
    function authorize($login, $password) {
        global $db;

        if (($this->profile = $db->check_auth($login, $password)) === null)
            $this->fill_unauth();
        else
            $this->authenticated = true;
        $this->set_session();
    }

    function is_auth() {
        return $this->authenticated;
    }

    function is_admin() {
        return $this->profile["admin"] == 't';
    }

    function profile() {
        return $this->profile;
    }
}
$user = new User();

?>