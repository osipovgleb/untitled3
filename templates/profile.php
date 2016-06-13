<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 09.06.16
 * Time: 18:25
 */
$user = $args;
?>

    <h1>Профиль</h1>

<?php
echo "<table>";
foreach($user  as $k => $t){
    echo "<tr>";
    echo "<td>|". $k . "=>" . $t . "|</td>";
    echo "</tr>";
}
echo "</table>";?>
<p><a href = "profile.php?view=edit&&id=<?php echo $user['id'];?>">Изменить</a></p>