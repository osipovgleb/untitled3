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
            array('authenticated' => $this->authenticated,
                'profile' => $this->profile));
    }
    
    function fill_unauth() {
        $this->authenticated = false;
        $this->profile = array();
    }

    function authorize($login, $password)
    {
        global $db;
        if (($this->profile = $db->check_auth($login, $password)) !== null)
        {
            $this->authenticated = true;
        //    $this->profile[''] = $db->get_rights($this->profile['id']);
            $this->set_session();
            return true;
        }
        $this->fill_unauth();
        return false;
    }

    function is_auth() {
        return $this->authenticated;
    }

    function get_id() {
        return $this->profile["id"];
    }

    function update_profile($profile)
    {
        global $db;
        if ($db->update_profile($profile))
        {
            $this->profile['login'] = $profile['login'];
            $this->profile['name'] = $profile['name'];
            $this->profile['email'] = $profile['email'];
            $this->set_session();
            return true;
        }
        return false;
    }

    function create_profile($new_profile)
    {
        global $db;
        if (($res = $db->create_profile($new_profile)['user_create']) > 0)
        {
            $this->authenticated = true;
            $this->profile['login'] = $new_profile['login'];
            $this->profile['password'] = $new_profile['password'];
            $this->set_session();
            return $res;
        }
        return $res;
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