<?php
ini_set("display_errors",1);
error_reporting(E_ALL);
session_cache_limiter('none');
session_start();

if (empty($_SESSION)){
  header("location:index.php");
}

require_once(ROOT_PATH .'/Controllers/Controller.php');
$type = new Controller();

if ($_SESSION['game']['play_time'] == "指定なし") {
  $search = $type->notime_search($_SESSION['game']);
} else {
  $search = $type->search($_SESSION['game']);
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
<body id="notuser">
  <p class="hello">こちらのゲームはいかがでしょうか？</p>
  <hr class="cp_hr06">
  <div class="cp_cssslider">
    <?php $i = 1; ?>
    <?php foreach ($search as $key => $value): ?>
      <input type="radio" name="cp_switch" id="photo<?php echo $i; ?>" <?php if ($i == 1) { echo "checked"; } ?>>
      <label for="photo<?php echo $i; ?>"><img src="<?php echo($value['file_path']); ?>"></label>
      <img src="<?php echo($value['file_path']); ?>">
      <?php if ( $i >= 3 ) {
        break;
      } else {
        $i++;
      }
      ?>
    <?php endforeach; ?>
  </div>
  <div class="kwsk">
    <p>ログインすると<br>ゲームの詳しい情報を見ることができます！<br><br>
      <a href="register.php">⇒新規登録はこちら</a>
    </p>
  </div>
  <div class="sukima"></div>
  <div class="back">
    <a href="notuser.php"><img src="/img/back.png" alt="もどる"> 選びなおしてみる</a>
  </div>
  <div class="back">
    <a href="index.php"><img src="/img/back.png" alt="もどる"> TOPへ戻る</a>
  </div>
</body>
</html>
<?php $_SESSION['game'] = ""; ?>
