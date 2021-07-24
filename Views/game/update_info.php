<?php
ini_set("display_errors",1);
error_reporting(E_ALL);
session_cache_limiter('none');
session_start();

function h($str){
  return htmlspecialchars($str, ENT_QUOTES, "UTF-8");
}

if($_SERVER['REQUEST_METHOD'] === 'POST'){
  $category = h($_POST['category']);
  $play_time = h($_POST['play_time']);

  if (empty($_POST["category"]) || empty($_POST["play_time"])) {
    $Err = "ジャンル・プレイ時間を選択してください。";
  }

  if (empty($Err)) {
    $_SESSION['game'] = array();
    $_SESSION['game'] = $_POST;
    header("Location:update_game.php");
    exit;
  }
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Unknown Games</title>
  <link rel="stylesheet" type="text/css" href="/css/base.css">
  <link href="https://fonts.googleapis.com/css?family=Alegreya+Sans+SC:300" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="/js/jquery-3.6.0.min.js"></script>
  <script type="text/javascript"></script>
</head>
<body>
  <div class="modal-content" style="padding: 10px 35px;">
    <div id="login">
      <p class="log">条件を変える</p>
      <p>変更することで、おすすめに表示されるゲームが変わります</p>
      <?php if (!empty($Err)): ?>
        <p class="error" style="text-align: center;"><?php echo $Err; ?></p>
      <?php endif; ?>
      <form  action="" method="post">
        <div id="jouken">
          <p>好きなゲームジャンル<span class="error">*</span></p>
          <div class="cp_ipselect cp_sl02">
            <select name="category" size="1" class="c-form">
              <option value="">ジャンルをご選択ください</option>
              <option value="ホラー">ホラー</option>
              <option value="RPG">RPG</option>
              <option value="アドベンチャー">アドベンチャー</option>
            </select>
          </div>
          <p>理想プレイ時間<span class="error">*</span></p>
          <div class="cp_ipselect cp_sl02">
            <select name="play_time" size="1" class="c-form">
              <option value>上記ジャンルの理想プレイ時間をご選択ください</option>
              <option value="30分以下">30分以下</option>
              <option value="30～1時間">30～1時間</option>
              <option value="1時間～2時間">1時間～2時間</option>
              <option value="指定なし">指定なし</option>
            </select>
          </div>
          <button name="login" type="submit" class="l-btn">変更する</button>
        </form>
      </div>
    </div>
  </body>
  </html>
