<?php
require_once(ROOT_PATH .'/Models/Games.php');
$login = new Games();
$user = $login->login($_SESSION['login']);
$_SESSION = array();
header('Location: index.php');
?>
