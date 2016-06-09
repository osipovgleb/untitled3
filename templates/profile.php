<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 09.06.16
 * Time: 18:25
 */?>

<h1>Профиль</h1>

<?php
global $user;
echo "<table>";
    foreach($user->profile()  as $t){
      echo "<tr>";
        echo "<td>|" . $t . "|</td>";
      echo "</tr>";
    }
    echo "</table>";
echo "<p><a href = \"index.php\">Вернуться на главную</a></p>";
?>