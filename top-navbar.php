

<!-- need to use full file path over relative file path  -->
<?php 
//gets value of absolute file path for all pages

$index = $_SERVER['SITE_HTMLROOT'].'index.php';
$phpLibrary = $_SERVER['SITE_HTMLROOT'].'phpHome.php';
$pizza = $_SERVER['SITE_HTMLROOT'].'pizza/home.php';
$stock = $_SERVER['SITE_HTMLROOT'].'stock/home.php';
$classes = $_SERVER['SITE_HTMLROOT'].'classes/home.php';

print '<a href="'.$index.'"> Home </a> | <a href="'.$phpLibrary.'"> PHP Library </a> | <a href="'.$pizza.'"> Pizza </a> | <a ="'.$stock.'"> Stock Exchange </a>| <a href="'.$classes.'"> Classes and Objects </a>';
?>