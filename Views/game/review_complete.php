<?php
ini_set("display_errors",1);
error_reporting(E_ALL);
session_start();

if (empty($_SESSION)){
  header("location:index.php");
}

require_once(ROOT_PATH .'Controllers/Controller.php');
$post = new Controller();
if (count($_SESSION['game_review']) == '4') {
  $post->review4($_SESSION['game_review']);
} else {
  $post->review5($_SESSION['game_review']);
}
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
  alert('登録しました!\n投稿ありがとうございます。');
  location.href = 'game.php?id=<?=$_SESSION['game_review']['id']?>';
  </script>
</head>
<body>
  <img src="/img/check.png" alt="" class="check">
</body>
</html>
<?php $_SESSION['game_review'] = ""; ?>
