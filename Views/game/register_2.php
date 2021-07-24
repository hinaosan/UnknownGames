<?php
ini_set("display_errors",1);
error_reporting(E_ALL);
session_cache_limiter('none');
session_start();

$Err = [];
$name = $email = $pass = $category = $play_time = $curl = "";
function h($str){
  return htmlspecialchars($str, ENT_QUOTES, "UTF-8");
}
if($_SERVER['REQUEST_METHOD'] === 'POST'){

  $name = h($_POST['name']);
  $email = h($_POST['email']);
  $pass = h($_POST['pass']);
  $category = h($_POST['category']);
  $play_time = h($_POST['play_time']);
  $curl = h($_POST['curl']);

  if (empty($_POST["name"]) || mb_strlen($_POST["name"]) > 20) {
    $Err["name"] = "氏名は必須入力です。20文字以内でご入力ください。";
  }

  if (empty($_POST["email"]) || preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/",$_POST["email"])==0 ) {
    $Err["email"] = "メールアドレスは正しくご入力ください。";
  }

  if (preg_match("/\A[a-z\d]{8,32}+\z/i",$_POST["pass"])==0 || empty($_POST["pass"])) {
    $Err["pass"] = "8~32桁の英数字の組み合わせでご入力ください。";
  }

  if (empty($_POST["category"])) {
    $Err["category"] = "ジャンルを選択してください。";
  }

  if (empty($_POST["play_time"])) {
    $Err["play_time"] = "プレイ時間を選択してください。";
  }

  if (preg_match("/^(https?\:\/\/)?(www\.youtube\.com|youtu\.?be)\/.+$/",$_POST["curl"])==0 || empty($_POST["curl"])) {
    $Err["curl"] = "チャンネルURLは正しくご入力ください。";
  }

  if (count($Err) == 0) {
    $_SESSION = $_POST;
    header("Location:confirm.php");
    exit;
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Unknown Games -新規登録入力-</title>
  <link rel="stylesheet" type="text/css" href="/css/base.css">
  <link href="https://fonts.googleapis.com/css?family=Alegreya+Sans+SC:300" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="/js/jquery-3.6.0.min.js"></script>
  <script type="text/javascript"></script>
</head>
<body>
  <p class="hello">新規ユーザー登録</p>
  <hr class="cp_hr06">
  <div id="koumoku">
    <div class="koumoku">
      <form method="post" name="post" action="">
        <p>登録区分　：　ゲーム実況者</p>
        <input type="hidden" name="type" value="2">
        <p>登録名<span class="error">*</span></p>
        <?php if (isset($Err["name"])): ?>
          <span class="error"><?php echo $Err["name"];?></span>
          <input type="text" name="name" placeholder="ゲーム太郎" class="c-form" value="<?php echo $name;?>">
        </div>
      <?php else: ?>
        <input type="text" name="name" placeholder="ゲーム太郎" class="c-form"  value="<?php echo $name;?>">
      </div>
    <?php endif; ?>

    <div class="koumoku">
      <p>メールアドレス<span class="error">*</span></p>
      <?php if (isset($Err["email"])): ?>
        <span class="error"><?php echo $Err["email"];?></span>
        <input type="text" name="email" placeholder="game@daisuki.co.jp" class="c-form" value="<?php echo $email;?>">
      </div>
    <?php else: ?>
      <input type="text" name="email" placeholder="game@daisuki.co.jp" class="c-form" value="<?php echo $email;?>">
    </div>
  <?php endif; ?>

  <div class="koumoku">
    <p>パスワード<span class="error">*</span></p>
    <?php if (isset($Err["pass"])): ?>
      <span class="error"><?php echo $Err["pass"];?></span>
      <input type="password" name="pass" class="c-form" value="<?php echo $pass;?>">
    </div>
  <?php else: ?>
    <input type="password" name="pass" class="c-form" value="<?php echo $pass;?>">
  </div>
<?php endif; ?>

<p>好きなゲームジャンル<span class="error">*</span></p>
<?php if (isset($Err["category"])): ?>
  <span class="error"><?php echo $Err["category"];?></span>
  <div class="cp_ipselect cp_sl02">
    <select name="category" size="1" class="c-form">
      <option value>
        <?php if ($category != null): ?>
          <?php echo $category; ?>
        <?php else: ?>ジャンルをご選択ください
        <?php endif; ?>
      </option>
      <option value="ホラー">ホラー</option>
      <option value="RPG">RPG</option>
      <option value="アドベンチャー">アドベンチャー</option>
    </select>
  </div>
<?php else: ?>
  <div class="cp_ipselect cp_sl02">
    <select name="category" size="1" class="c-form">
      <option value>
        <?php if ($category != null): ?>
          <?php echo $category; ?>
        <?php else: ?>ジャンルをご選択ください
        <?php endif; ?>
      </option>
      <option value="ホラー">ホラー</option>
      <option value="RPG">RPG</option>
      <option value="アドベンチャー">アドベンチャー</option>
    </select>
  </div>
<?php endif; ?>

<p>理想プレイ時間<span class="error">*</span></p>
<?php if (isset($Err["play_time"])): ?>
  <span class="error"><?php echo $Err["play_time"]; ?></span>
  <div class="cp_ipselect cp_sl02">
    <select name="play_time" size="1" class="c-form">
      <option value>
        <?php if ($play_time != null): ?>
          <?php echo $play_time; ?>
        <?php else: ?>上記ジャンルの理想プレイ時間をご選択ください
        <?php endif; ?>
      </option>
      <option value="30分以下">30分以下</option>
      <option value="30～1時間">30～1時間</option>
      <option value="1時間～2時間">1時間～2時間</option>
      <option value="指定なし">指定なし</option>
    </select>
  </div>
<?php else: ?>
  <div class="cp_ipselect cp_sl02">
    <select name="play_time" size="1" class="c-form">
      <option value>
        <?php if ($play_time != null): ?>
          <?php echo $play_time; ?>
        <?php else: ?>上記ジャンルの理想プレイ時間をご選択ください
        <?php endif; ?>
      </option>
      <option value="30分以下">30分以下</option>
      <option value="30～1時間">30～1時間</option>
      <option value="1時間～2時間">1時間～2時間</option>
      <option value="指定なし">指定なし</option>
    </select>
  </div>
<?php endif; ?>

<div class="koumoku">
  <p>チャンネルURL<span class="error">*</span></p>
  <?php if (isset($Err["curl"])): ?>
    <span class="error"><?php echo $Err["curl"]; ?></span>
    <input type="text" name="curl" placeholder="https://www.youtube.com/channel/...." class="c-form" value="<?php echo $curl;?>">
  </div>
<?php else: ?>
  <input type="text" name="curl" placeholder="https://www.youtube.com/channel/...." class="c-form" value="<?php echo $curl;?>">
</div>
<?php endif; ?>
</div>
<input type="submit" name="post_btn" value="確認画面へ" class="post_btn">
</form>
</div>
</div>
</div>
<div class="back">
  <a href="register.php"><img src="/img/back.png" alt="もどる"> 選びなおす</a>
</div>
</body>
</html>
