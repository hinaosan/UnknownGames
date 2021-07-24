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
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Unknown Games -登録完了-</title>
  <link rel="stylesheet" type="text/css" href="/css/base.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="/js/jquery-3.6.0.min.js"></script>
  <script type="text/javascript">
  alert('登録しました!\n楽しいゲームライフをお楽しみください。');
  location.href = 'index.php';
  </script>
</head>
<body>
  <img src="/img/check.png" alt="" class="check">
</body>
</html>
