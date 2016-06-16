<?php
/**
 * Created by PhpStorm.
 * User: Osipov Gleb
 * Date: 08.06.16
 * Time: 12:27
 */

class DB {
    private $conn = null;

    function __construct($conn_string = "")
    {
        if ($conn_string == "") {
            return;
        }
        if (($this->conn = pg_connect($conn_string)) === false) {
            die("Не удалось подчиться к СУБД");
        }
    }

    function __destruct()
    {
        if ($this->conn !== null && $this->conn !== false)
            pg_close($this->conn);
    }

    function one_row($resource) {
        if ($resource === false)
            die("Все плохо: " . pg_last_error($this->conn));
        $res = pg_fetch_assoc($resource);
        return ($res === false ? null : $res);
    }

    function all_rows($resource)
    {
        if ($resource === false)
            die("Все плохо: " . pg_last_error($this->conn));
        $res = array();
        while (($row = pg_fetch_assoc($resource)) !== false)
            $res[] = $row;
        return $res;
    }

    function all_u() {
        $resource = pg_query($this->conn, "SELECT * FROM get_users(null)") or die(pg_last_error());
        return $this->all_rows($resource);
    }
    
    function one_u($id  = NULL) {
        $resource = pg_query_params($this->conn, "SELECT * FROM get_users($1)",
            array($id)) or die(pg_last_error());
        return $this->one_row($resource);
    }

    function check_auth($login, $password) {
        $resource = pg_query_params($this->conn, "SELECT * FROM sign_in($1, $2)", array($login, $password));
        return $this->one_row($resource);
    }

    function update_profile($profile)
    {
        return pg_query_params($this->conn, "SELECT * FROM update_user($1, $2, $3, $4, $5, $6)",  $profile);/*array($id, $login, $password, $name, $email, $role_id)*/
    }

    function create_profile($new_profile)
    {
        /*$new_profile = array("login" => $login, "password" => $password2, "name" => get_or_post("name"), "email" => get_or_post("email"),"reg_date" => date('Y-m-d'));*/
        $r = pg_query_params($this->conn, "SELECT * FROM user_create($1, $2, $3, $4, $5)", $new_profile);
        return pg_fetch_assoc($r);
    }

    function get_rights($id)
    {
        $resource = pg_query_params($this->conn, "SELECT * FROM get_rights($1)", array($id)) or die(pg_last_error());
        $t = $this->one_row($resource);
        return $t;
    }
}
$db = new DB("dbname=users user=mult");
