<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 10.06.16
 * Time: 13:55
 */

$u = $args;
?>

<h1>Профиль</h1>

<form method="post" action="profile.php?id=<?php echo $args['id'];?>">
    <input type="hidden" name="act" value="refactor">
    <table>
        <?php
        global $user;
        foreach($u  as $k => $t){
            if (!($k == "id" || $k == "reg_date" || $k == "last_login"))
                if (($user->has_rights("users_upd") == 1) || !($k == "role_id"))
                    echo "<tr><td>". $k . " : <input type = 'text' value='$u[$k]' name = '$k'></td></tr>";
        }?>
        <tr><td>password : <input type = "text"  name = "password"></td></tr>
    </table>
    <input type = "submit" value = "Применить">
</form>