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
        foreach (Menu::$map as $k => $v) {
            if (Menu::$map[$k]["access"] == "all") {
                $head_str .= "<a href=\"" . $v["url"] . "\">" . $v["name"] . "</a>";
                if ($k != count(Menu::$map) - 1)
                    $head_str .= " | ";
            }
            if ($user->is_auth()){
                if(Menu::$map[$k]["access"] == "user" ) {
                    $head_str .= "<a href=\"" . $v["url"] . "\">" . $v["name"] . "</a>";
                    if ($k != count(Menu::$map) - 1)
                        $head_str .= " | ";
                }
                elseif ((Menu::$map[$k]["access"] == "admin" || Menu::$map[$k]["access"] == "user") && $user->is_admin()) {
                    $head_str .= "<a href=\"" . $v["url"] . "\">" . $v["name"] . "</a>";
                    if ($k != count(Menu::$map) - 1)
                        $head_str .= " | ";
                }
            }
            elseif(Menu::$map[$k]["access"] == "guest") {
                $head_str .= "<a href=\"" . $v["url"] . "\">" . $v["name"] . "</a>";
                if ($k != count(Menu::$map) - 1)
                    $head_str .= " | ";
            }
        }
        $head_str .= "</p>";
        return $head_str;
    }
}?>