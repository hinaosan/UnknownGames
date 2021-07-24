<?php
ini_set("display_errors",1);
error_reporting(E_ALL);
session_start();
require_once(ROOT_PATH .'Controllers/Controller.php');
if (empty($_SESSION)){
  header("location:index.php");
}
$_SESSION['game']['email'] = $_SESSION['email'];
$register = new Controller();
$register->game_info($_SESSION['game']);
$_SESSION['game'] = array();
header("Location: mypage.php");
?>
