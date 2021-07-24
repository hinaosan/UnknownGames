<?php
ini_set("display_errors",1);
error_reporting(E_ALL);
session_start();
require_once(ROOT_PATH .'Controllers/Controller.php');
if (empty($_SESSION)){
  header("location:index.php");
}

$path_parts = pathinfo($_SESSION['image']['name']);
$imagedata = $_SESSION['image']['data'];
$file_path = "/img/game_img/".uniqid().'.'.$path_parts['extension'];
file_put_contents($_SERVER["DOCUMENT_ROOT"].$file_path, $imagedata);

$_SESSION['game_post']['file_path'] = $file_path;

$register = new Controller();
$register->game_post($_SESSION['game_post']);
$_SESSION['game_post'] = array();
$_SESSION['image'] = array();
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
  alert('登録完了しました!\n投稿ありがとうございます。');
  location.href = 'c-mypage.php';
  </script>
</head>
<body>
  <img src="/img/check.png" alt="" class="check">
</body>
</html>
