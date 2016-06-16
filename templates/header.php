<?php /* 05.06.2016 Osipov Gleb the start block of the program */
?>

<html>
<head>
    <title><?php echo $args[0];?></title>
    <?php HTML::put_css(); ?>
</head>

<body>
<div id="menu"><?php print(Menu::get_menu()); ?></div>
<div class="main">
    