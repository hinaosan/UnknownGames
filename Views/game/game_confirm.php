<?php
ini_set("display_errors",1);
error_reporting(E_ALL);
session_cache_limiter('none');
session_start();

if (empty($_SESSION)){
  header("location:index.php");
}

function h($str){
  return htmlspecialchars($str, ENT_QUOTES, "UTF-8");
}

$made_name = $_SESSION['game_post']['made_name'];
$game_name = h($_SESSION['game_post']['game_name']);
$category = h($_SESSION['game_post']['category']);
$play_time = h($_SESSION['game_post']['play_time']);
$system = h($_SESSION['game_post']['system']);
$spec = h($_SESSION['game_post']['spec']);
$story = h($_SESSION['game_post']['story']);
$sale = h($_SESSION['game_post']['sale']);

if (!empty($_SESSION['image']['name'])) {
  $imagename = h($_SESSION['image']['name']);
  $imagedata = h($_SESSION['image']['data']);
} else {
  $img = $_SESSION['game_post']['file_path'];
}

$host = $_SERVER['HTTP_REFERER'];
$str = parse_url($host);
if($str['path'] == "/game/game_edit.php"){
  $id = $_SESSION['game_post']['id'];
  $check = "1";
} elseif ($str['path'] == "/game/game_post.php"){
  $check = "2";
}

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Unknown Games -投稿内容確認-</title>
  <link rel="stylesheet" type="text/css" href="/css/base.css">
  <link href="https://fonts.googleapis.com/css?family=Alegreya+Sans+SC:300" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="/js/jquery-3.6.0.min.js"></script>
  <script type="text/javascript"></script>
</head>
<body id="top">
  <header class="myh">
    <?php
    include('header.php');
    ?>
  </header>
  <div id="recommend" class="caption">
    <h2>ゲーム詳細内容確認</h2>
  </div>
  <div id="koumoku" class="register">
    <div class="koumoku">
      <p class="attention">下記の内容をご確認の上、登録を押してください<br>
        内容を修正する場合はもどるを押してください。</p>
        <?php if ($check == "1"): ?>
          <form method="post" action="game_editcomplete.php">
          <?php elseif ($check == "2"): ?>
            <form method="post" action="game_complete.php">
            <?php endif; ?>
          </div>
          <div class="koumoku">
            <p>タイトル</p>
            <div class="c-form">
              <?php
              echo $game_name;
              ?>
              <input type="hidden" name="game_name" value="<?php echo $game_name; ?>">
            </div>
          </div>

          <div class="koumoku">
            <p>ジャンル</p>
            <div class="c-form">
              <?php
              echo $category;
              ?>
              <input type="hidden" name="category" value="<?php echo $category; ?>">
            </div>
          </div>

          <div class="koumoku">
            <p>プレイ時間</p>
            <div class="c-form">
              <?php
              echo $play_time;
              ?>
              <input type="hidden" name="play_time" value="<?php echo $play_time; ?>">
            </div>
          </div>

          <div class="koumoku">
            <p>操作方法</p>
            <div class="c-form">
              <?php
              echo $system;
              ?>
              <input type="hidden" name="spec" value="<?php echo $system; ?>">
            </div>
          </div>

          <div class="koumoku">
            <p>推奨環境</p>
            <div class="c-form">
              <?php
              echo nl2br($spec);
              ?>
              <input type="hidden" name="spec" value="<?php echo nl2br($spec); ?>">
            </div>
          </div>

          <div class="koumoku">
            <p>内容</p>
            <div class="c-form">
              <?php
              echo nl2br($story);
              ?>
              <input type="hidden" name="story" value="<?php echo nl2br($story); ?>">
            </div>
          </div>

          <div class="koumoku">
            <p>販売元URL</p>
            <div class="c-form">
              <?php
              echo $sale;
              ?>
              <input type="hidden" name="sale" value="<?php echo $sale; ?>">
            </div>
          </div>

          <div class="img-edit">
            <p>サムネイル画像</p>
            <div class="c-form">
              <?php if (!empty($imagename)): ?>
                <img src="image.php">
              <?php else: ?>
                <img src="<?php echo $img; ?>">
                <input type="hidden" name="file_path" value="<?php echo $img; ?>">
              <?php endif; ?>
            </div>
          </div>
        </div>
        <input type="submit" name="post_btn" value="登録する" class="post_btn">
      </form>
    </div>
  </div>
</div>
<div class="back">
  <a href="#" onclick="window.history.back(); return false;"><img src="/img/back.png" alt="もどる"> もどる</a>
</div>
</body>
</html>
