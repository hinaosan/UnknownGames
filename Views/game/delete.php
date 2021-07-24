<?php
require_once(ROOT_PATH .'Controllers/Controller.php');
$delgame = new Controller();
$delgame->del();
header("Location: c-mypage.php");
?>
