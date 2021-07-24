<?php
ini_set("display_errors",1);
error_reporting(E_ALL);
session_cache_limiter('none');
session_start();

if (empty($_SESSION)){
  header("location:login.php");
}

require_once(ROOT_PATH .'/Controllers/Controller.php');
$id = new Controller();
$fav_list = $id->myfav_list($_SESSION['email']);
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Unknown Games</title>
  <link rel="stylesheet" type="text/css" href="/css/base.css">
  <link rel="stylesheet" type="text/css" href="/css/carousel.css">
  <link href="https://fonts.googleapis.com/css?family=Alegreya+Sans+SC:300" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="/js/jquery-3.6.0.min.js"></script>
  <script type="text/javascript"></script>
</head>
<body id="pagetop">
  <header>
    <?php
    include('header.php');
    ?>
  </header>
  <div id="recommend" class="caption">
    <h2>登録ゲーム制作者　一覧</h2>
  </div>
  <?php if (empty($fav_list['fav_creator'])): ?>
    <div class="favorite">
      <img src="/img/null.png">
      <div class="gaiyou">
        <p>まだ登録がないようです。</p>
        <p>お気に入り機能を使うと<br>ここに制作者が追加されます。</p>
      </div>
    </div>
  <?php else: ?>
    <?php foreach ($fav_list['fav_creator'] as $key => $value): ?>
      <div class="favorite">
        <img src="/img/creator.png" style="zoom:20%;">
        <div class="gaiyou">
          <p>登録名：<?php echo $value['name']; ?></p>
        </div>
        <a href="c-mypage.php?id=<?=$value['id']?>" class="kwsk">この制作者のゲーム一覧画面へ</a>
      </div>
    <?php endforeach; ?>
  <?php endif; ?>
  <div class="jump">
    <a href="#recommend"><img src="/img/top.png" alt=""><br>PAGE TOP</a>
  </div>
</body>
</html>
