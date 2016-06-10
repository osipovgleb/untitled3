<?php
/**
 * Created by PhpStorm.
 * User: Osipov Gleb
 * Date: 09.06.16
 * Time: 21:22
 */
$users = $args;
?>

<h1>Вы смотрите на всех пользователей</h1>

<?php
    foreach ($users as $k => $v) {
      print_r("|id = " . $users[$k]["id"] . "|login = " . "<a href=\"profile.php?id=" . $users[$k]["id"] ."\">" . $users[$k]["login"] . "</a>" ."|<br>");
    }
?>

