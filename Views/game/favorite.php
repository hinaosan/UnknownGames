<?php
ini_set("display_errors",1);
error_reporting(E_ALL);
session_cache_limiter('none');
session_start();
$fav = array();
$fav['game_id'] = strval($_GET['id']);
$fav['email'] = strval($_SESSION['email']);
require_once(ROOT_PATH .'Controllers/Controller.php');
$fav_game = new Controller();
$fav_game->favorite($fav);
$fav = "";
header("Location:" . $_SERVER['HTTP_REFERER']);
?>
