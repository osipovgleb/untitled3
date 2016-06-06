<?php
/**
 * Created by PhpStorm.
 * User: Osipov Gleb
 * Date: 06.06.16
 * Time: 14:15*/


include("classes/user.php");
include("classes/helpers.php");
$x = get_or_post("x");
$y = get_or_post("y");
?>
    <h1>Таблица умножения</h1>
      <p>Введите числа</p>
    <form>
        <p><input type="text" value="<?php echo $x; ?>" name="x"> <input type="text" value="<?php echo $y; ?>" name="y"> <input type="submit" value="Считать"></p>
    </form>

<?php
if (!User::$authorized)
     echo "<p> <a href=\"sign_in.php\">Необходимо войти</a>.</p>";
else {
    echo "<table>";
    for ($j = 1; $j <= $y; $j++) {
        echo "<tr>";
        for ($i = 1; $i <= $x; $i++)
            echo "<td>" . $i * $j . "</td>";
        echo "</tr>";
    }
    echo "</table>";
}
?>

