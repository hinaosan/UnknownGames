<?php
ini_set("display_errors",1);
error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Unknown Games -新規登録-</title>
  <link rel="stylesheet" type="text/css" href="/css/base.css">
  <link href="https://fonts.googleapis.com/css?family=Alegreya+Sans+SC:300" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="/js/jquery-3.6.0.min.js"></script>
  <script type="text/javascript"></script>
</head>
<body>
  <p class="hello">こんにちは！<br>どの会員で登録しますか？</p>
  <hr class="cp_hr06">
  <div class="kubun">
    <div class="hover">
      <a href="register_1.php">
        <img src="/img/controller.png" alt="一般ユーザー">
        <div class="hover-text">
          <p class="text1">好みのゲームを見つけ<br>遊びたいという方に</p>
        </div>
        <p>一般ユーザー</p>
      </a>
    </div>
    <div class="hover">
      <a href="register_2.php">
        <img src="/img/youtuber.png" alt="ゲーム実況者">
        <div class="hover-text">
          <p class="text1">好みのゲームを見つけ<br>実況したいという方に</p>
        </div>
        <p>ゲーム実況者</p>
      </a>
    </div>
    <div class="hover">
      <a href="register_3.php">
        <img src="/img/cord.png" alt="ゲーム制作者">
        <div class="hover-text">
          <p class="text1">作ったゲームを<br>届けたいという方に</p>
        </div>
        <p>ゲーム制作者</p>
      </a>
    </div>
  </div>
  <div class="back">
    <a href="index.php"><img src="/img/back.png" alt="もどる"> もどる</a>
  </div>
</body>
</html>
