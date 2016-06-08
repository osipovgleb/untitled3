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

    function all_rows($resource) {
        if ($resource === false)
            die("Все плохо: " . pg_last_error($this->conn));
        $res = array();
        while (($row = pg_fetch_assoc($resource)) !== false)
            $res[] = $row;
        return $res;
    }

    function get_test() {
        $resource = pg_query(
            $this->conn,
            "SELECT * FROM users"
        );
        return $this->all_rows($resource);
    }

    function check_auth($login, $password) {
        $resource = pg_query_params(
            $this->conn,
            "SELECT
                id, login,
                name,
                email,
                reg_date,
                last_login
            FROM users WHERE
                login=$1 AND password=$2 AND NOT disabled",
            array($login, $password)
        );
        return $this->one_row($resource);
    }
}
$db = new DB("dbname=users user=mult");