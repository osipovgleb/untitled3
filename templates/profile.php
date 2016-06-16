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
echo "<table id='mult' border='3px'>";
foreach($user  as $k => $t){
    echo "<tr><td>". $k . " : " . $t . "</td></tr>";
}
echo "</table>";?>
<p><a href = "profile.php?view=edit&&id=<?php echo $user['id'];?>">Изменить</a></p>