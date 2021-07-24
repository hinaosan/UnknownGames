<?php
ini_set("display_errors",1);
error_reporting(E_ALL);
session_start();
require_once(ROOT_PATH .'Controllers/Controller.php');
if (empty($_SESSION)){
  header("location:index.php");
}
$register = new Controller();
$register->post($_SESSION);
$_SESSION = array();
header("location:index.php");
?>
