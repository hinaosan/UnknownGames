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
$type = h($_SESSION['type']);
$name = h($_SESSION['name']);
$email = h($_SESSION['email']);
$pass = h($_SESSION['pass']);

if ($type == "1" || $type == "2") {
  $category = h($_SESSION['category']);
  $play_time = h($_SESSION['play_time']);
}
if ($type == "2") {
  $curl = h($_SESSION['curl']);
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Unknown Games -新規登録確認-</title>
  <link rel="stylesheet" type="text/css" href="/css/base.css">
  <link href="https://fonts.googleapis.com/css?family=Alegreya+Sans+SC:300" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="/js/jquery-3.6.0.min.js"></script>
  <script type="text/javascript"></script>
</head>
<body>
  <p class="hello">登録内容確認画面</p>
  <hr class="cp_hr06">
  <div id="koumoku" class="register">
    <div class="koumoku">
      <p class="attention">下記の内容をご確認の上、登録を押してください<br>
        内容を修正する場合はもどるを押してください。</p>
        <form method="post" action="complete.php">
          <p>登録区分</p>
          <div class="c-form">
            <?php
            if ($type == "1") {
              echo "一般ユーザー";
            } elseif ($type == "2") {
              echo "ゲーム実況者";
            } else {
              echo "ゲーム制作者";
            }
            ?>
            <input type="hidden" name="type" value="<?php echo $type; ?>">
          </div>
        </div>
        <div class="koumoku">
          <p>登録名</p>
          <div class="c-form">
            <?php
            echo $name;
            ?>
            <input type="hidden" name="name" value="<?php echo $name; ?>">
          </div>
        </div>
        <div class="koumoku">
          <p>メールアドレス</p>
          <div class="c-form">
            <?php
            echo $email;
            ?>
            <input type="hidden" name="kana" value="<?php echo $email; ?>">
          </div>
        </div>
        <div class="koumoku">
          <p>パスワード</p>
          <div class="c-form">
            <?php
            echo "**********";
            ?>
            <input type="hidden" name="tel" value="<?php echo $pass; ?>">
          </div>
        </div>
        <?php if ($type == "1" || $type == "2"): ?>
          <div class="koumoku">
            <p>好きなゲームジャンル</p>
            <div class="c-form">
              <?php
              echo $category;
              ?>
              <input type="hidden" name="email" value="<?php echo $category; ?>">
            </div>
          </div>
          <div class="koumoku">
            <p>理想プレイ時間</p>
            <div class="c-form">
              <?php
              echo $play_time;
              ?>
              <input type="hidden" name="email" value="<?php echo $play_time; ?>">
            </div>
          </div>
        <?php endif; ?>
        <?php if ($type == "2"): ?>
          <div class="koumoku">
            <p>チャンネルURL</p>
            <div class="c-form">
              <?php
              echo $curl;
              ?>
              <input type="hidden" name="url" value="<?php echo $curl; ?>">
            </div>
          </div>
        <?php endif; ?>
      </div>
      <input type="submit" name="post_btn" value="登録する" class="post_btn">
    </form>

  </div>
</div>
</div>
<div class="back">
  <a href=""  onclick="window.history.back(); return false;"><img src="/img/back.png" alt="もどる"> もどる</a>
</div>
</body>
</html>
