<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 09.06.16
 * Time: 19:16
 */
require_once ("db.php");
class Menu{
    static $map = array(
        array("name" => "Главная", "url" => "index.php", "access" => "all"),                  //0
        array("name" => "Вход", "url" => "sign_in.php", "access" => "guest"),                   //1
        array("name" => "Выход", "url" => "sign_in.php?function=logout", "access" => "user"), //2
        array("name" => "Профиль", "url" => "profile.php", "access" => "user"),               //3
        array("name" => "Список пользователей", "url" => "users.php", "access" => "admin"),    //4
        array("name" => "Регестрация", "url" => "sign_up.php", "access" => "guest"),           //5
        array("name" => "Редактировать профиль", "url" => "profile.php?view=edit", "access" => "user"));  //6
    static function get_menu(){
        global $user;
        $head_str = "<p>";
        foreach (Menu::$map as $m)
        {
            if ($m['access'] == "all")
                $head_str .= "<a href='" . $m['url'] . "'>" . $m['name'] . "</a><br>";
            elseif ($user->is_auth())
            {
                if ($m['access'] == "user" || ($user->has_rights("users_upd") && $m['access'] == "admin"))
                    $head_str .= "<a  href='" . $m['url'] . "'>" . $m['name'] . "</a><br>";
            }
            elseif ($m['access'] == "guest")
                $head_str .= "<a href='" . $m['url'] . "'>" . $m['name'] . "</a><br>";
        }
        $head_str = substr($head_str, 0, strlen($head_str) - 4);
        $head_str .= "</p>";
        return $head_str;
    }
}?>