<?php
ini_set("display_errors",1);
error_reporting(E_ALL);
session_cache_limiter('none');
session_start();

require_once(ROOT_PATH .'/Controllers/Controller.php');
$id = new Controller();
$email = $_SESSION['email'];
$user = $id->findid($email);

if ($user['play_time'] == "指定なし") {
  $search = $id->notime_search($user);
} else {
  $search = $id->search($user);
}
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
<body id="top">
  <header>
    <?php
    include('header.php');
    ?>
  </header>
  <div id="recommend" class="caption">
    <h2>あなたへおすすめのゲームはこちら</h2>
  </div>
<div class="cp_cssslider">
  <?php $i = 1; ?>
  <?php foreach ($search as $key => $value): ?>
    <input type="radio" name="cp_switch" id="photo<?php echo $i; ?>" <?php if ($i == 1) { echo "checked"; } ?>>
    <label for="photo<?php echo $i; ?>"><img src="<?php echo($value['file_path']); ?>">
      <div class="details">
        <a href="game.php?id=<?=$value['id']?>" class="kwsk2">詳細画面へ</a>
      </div>
    </label>
    <img src="<?php echo($value['file_path']); ?>">
    <?php $i++; ?>
  <?php endforeach; ?>
  <input type="radio" name="cp_switch" id="photo<?php echo $i+1; ?>">
  <label for="photo<?php echo $i+1; ?>"><img src="/img/title-1615530258792.jpeg">
    <div class="details">
      <a href="https://dmg.umamusume.jp/?gclid=CjwKCAjwoNuGBhA8EiwAFxomA6ed9qP1ckMdN5zaTvZpRtLFrx1MUyVSaMROdCjHtywFy5lr0rqbjRoCXpkQAvD_BwE" class="kwsk2" target="_blank" rel="noopener noreferrer">詳細画面へ</a>
    </div>
  </label>
  <img src="/img/title-1615530258792.jpeg">
</div>
<a href="update_info.php" id="condition" class="btn-circle-border-double">条件を変える</a>
<div class="jump">
  <a href="#recommend"><img src="/img/top.png" alt=""><br>PAGE TOP</a>
</div>
</body>
</html>
