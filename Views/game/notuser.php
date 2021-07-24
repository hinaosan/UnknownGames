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
    header("Location:notuser_result.php");
    exit;
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Unknown Games</title>
  <link rel="stylesheet" type="text/css" href="/css/base.css">
  <link href="https://fonts.googleapis.com/css?family=Alegreya+Sans+SC:300" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="/js/jquery-3.6.0.min.js"></script>
  <script type="text/javascript"></script>
</head>
<body>
  <p class="hello">こんにちは！<br>あなたの好みを教えてください。</p>
  <hr class="cp_hr06">
  <div class="koumoku" id="koumoku">
    <?php if (!empty($Err)): ?>
      <p class="error" style="text-align: center;"><?php echo $Err; ?></p>
    <?php endif; ?>
    <form action="" method="post">
      <label>好きなジャンルは？</label>
      <div class="cp_ipselect cp_sl02" style="margin:20px 0;">
        <select name="category" size="1" class="c-form">
          <option value="">選択してください</option>
          <option value="ホラー">ホラー</option>
          <option value="RPG">RPG</option>
          <option value="アドベンチャー">アドベンチャー</option>
        </select>
      </div>
      <label>上記ジャンルの理想プレイ時間は？</label>
      <div class="cp_ipselect cp_sl02" style="margin:20px 0;">
        <select name="play_time" size="1" class="c-form">
          <option value>選択してください</option>
          <option value="30分以下">30分以下</option>
          <option value="30～1時間">30～1時間</option>
          <option value="1時間～2時間">1時間～2時間</option>
          <option value="指定なし">指定なし</option>
        </select>
      </div>
    </div>
    <input type="submit" name="post_btn" value="探　す" class="post_btn">
  </form>
  <div class="back">
    <a href="index.php"><img src="/img/back.png" alt="もどる"> もどる</a>
  </div>
</body>
</html>
