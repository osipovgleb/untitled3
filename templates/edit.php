<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 10.06.16
 * Time: 13:55
 *//*<input type="hidden" name="act" value="refactor">*/
?>

<h1>Профиль</h1>


<form method="post" action="profile.php?act=refactor">

<table>
<?php
$u = $args;
global $user;
foreach($u  as $k => $t){
    if (!($k == "id" || $k == "reg_date" || $k == "last_login")) {
        echo "<tr><td>|";
        echo $k . " => ";
        if ($user->is_admin() || !($k == "admin"))
          echo "<input type = \"text\" value = \"$u[$k]\" name = \"$k\">";
        echo "|</td></tr>";
    }
}?>
<tr><td>password : <input type = "text" name = "password"></td></tr>
</table>
<input type = "submit" value = "Применить">
</form>
