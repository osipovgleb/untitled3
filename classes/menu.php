<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 09.06.16
 * Time: 19:16
 */

class Menu{
    static $map = array(
        array("name" => "Главная", "url" => "index.php", "unabled" => true),                  //0
        array("name" => "Вход", "url" => "sign_in.php", "unabled" => true),                   //1
        array("name" => "Выход", "url" => "sign_in.php?function=logout", "unabled" => false), //2
        array("name" => "Профиль", "url" => "profile.php", "unabled" => false),               //3
        array("name" => "Список пользователей", "url" => "users.php", "unabled" => false),    //3
        array("name" => "Регестрация", "url" => "sign_up.php", "unabled" => false));          //4


    static function get_menu(){
        global $user;
       if ($user->is_auth()){
           Menu::$map[1]["unabled"] = false;
           Menu::$map[2]["unabled"] = true;
           Menu::$map[3]["unabled"] = true;
           if ($user->is_admin())
               Menu::$map[4]["unabled"] = true;
           Menu::$map[5]["unabled"] = false;
       }

       $head_str = "<p>";
       foreach (Menu::$map as $k => $v) {
           if (Menu::$map[$k]["unabled"]){
               $head_str .= "<a href=\"" . $v["url"] . "\">" . $v["name"] . "</a>";
               if ($k != count(Menu::$map) - 1)
                   $head_str .= " | ";
           }
       }
        $head_str .= "</p>";
        return $head_str;
    }
}?>
