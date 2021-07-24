<?php
ini_set("display_errors",1);
error_reporting(E_ALL);
session_cache_limiter('none');
session_start();
$fav = array();
$fav['made_name'] = strval($_GET['id']);
$fav['email'] = strval($_SESSION['email']);
require_once(ROOT_PATH .'Controllers/Controller.php');
$fav_creator = new Controller();
$fav_creator->c_favorite($fav);
$fav = "";
header("Location:" . $_SERVER['HTTP_REFERER']);
?>
