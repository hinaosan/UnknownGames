<?php
ini_set("display_errors",1);
error_reporting(E_ALL);
session_cache_limiter('none');
session_start();

if (empty($_SESSION)){
  header("location:index.php");
}

require_once(ROOT_PATH .'/Controllers/Controller.php');
$id = new Controller();
$email = $_SESSION['email'];
$user = $id->findid($email);

function h($str){
  return htmlspecialchars($str, ENT_QUOTES, "UTF-8");
}

$name = $_SESSION['game_review']['name'];
$game_id = h($_SESSION['game_review']['id']);
$review = h($_SESSION['game_review']['review']);

if ($user['type'] == "2") {
  $play_url = h($_SESSION['game_review']['play_url']);
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
<body>
  <header>
    <?php
    include('header.php');
    ?>
  </header>
  <div id="recommend" class="caption">
    <h2>投稿内容確認画面</h2>
  </div>
  <div id="koumoku" class="register">
    <div class="koumoku">
      <p class="attention">下記の内容をご確認の上、登録を押してください<br>
        内容を修正する場合はもどるを押してください。</p>
        <form method="post" action="review_complete.php">
          <input type="hidden" name="game_id" value="<?php echo $game_id; ?>">
          <p>登録名</p>
          <div class="c-form">
            <?php
            echo $name;
            ?>
            <input type="hidden" name="name" value="<?php echo $name; ?>">
          </div>
          <p>投稿内容</p>
          <div class="c-form">
            <?php
            echo nl2br($review);
            ?>
            <input type="hidden" name="review" value="<?php echo nl2br($review); ?>">
          </div>
          <?php if ($user['type'] == "2"): ?>
            <p>動画URL</p>
            <div class="c-form">
              <?php
              echo $play_url;
              ?>
              <input type="hidden" name="name" value="<?php echo $play_url; ?>">
            </div>
          <?php endif; ?>
        </div>
      </div>
      <input type="submit" name="post_btn" value="投稿する" class="post_btn">
    </form>
    <div class="back">
      <a href="#" onclick="window.history.back(); return false;"><img src="/img/back.png" alt="もどる"> もどる</a>
    </div>
  </body>
  </html>
