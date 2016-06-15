<?php
/**
 * Created by PhpStorm.
 * User: Osipov Gleb
 * Date: 06.06.16
 * Time: 14:15*/
list() = 
$x = get_or_post("x");
$y = get_or_post("y");
global $user;
if (!$user->is_auth())
    echo "<p><a href = \"sign_in.php\" >Войдите</a > или <a href=\"sign_up.php\">зарегестрируйтесь</a>.</p >";
else 
{
    echo "<h1 > Таблица умножения </h1 >";
    echo "<p > Введите числа </p >";
    echo "<form ><p><input type = \"text\" value = \"$x\" name = \"x\"></p>";
    echo "<p><input type = \"text\" value = \"$y\" name = \"y\"></p>";
    echo "<p><input type = \"submit\" value = \"Считать\" ></p>";
    echo "</form >";
    
    echo "<table border='1px' cellpadding='5px' text='center'>";/*style='overflow:auto; width: 300px; height: 300px;'*/
    for ($j = 1; $j <= $y; $j++) {
        echo "<tr>";
        for ($i = 1; $i <= $x; $i++)
            echo "<td>" . $i * $j . "</td>";
        echo "</tr>";
    }
    echo "</table>";
}

